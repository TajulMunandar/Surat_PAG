<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use App\Models\Uraian;
use Illuminate\Http\Request;
use App\Models\AlatPelindung;
use App\Models\InformasiUmum;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class JsaDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validatedData = $request->validate([
                'pekerjaan' => 'required',
                'tag_no' => 'required',
                'lokasi_kerja' => 'required',
                'dibuat_oleh' => 'required',
                'nama' => 'required',
                'seksi' => 'required',
                'tanda_tangan' => 'required|file|mimes:jpg,png,jpeg',
                'nama_pengawas' => 'required',
                'seksi_pengawas' => 'required',
                'tanggal' => 'required|date',
                'ttd_pengawas' => 'required|file|mimes:jpg,png,jpeg',
                'alat' => 'required|array',
                'langkah_kerja' => 'required|array',
                'bahaya_kecelakaan' => 'required|array',
                'tindakan_pencegahan' => 'required|array',
            ]);

            // Simpan file tanda tangan dan tanda tangan pengawas
            if ($request->hasFile('tanda_tangan')) {
                $validatedData['tanda_tangan'] = $request->file('tanda_tangan')->store('tanda_tangan', 'public');
            }
            if ($request->hasFile('ttd_pengawas')) {
                $validatedData['ttd_pengawas'] = $request->file('ttd_pengawas')->store('ttd_pengawas', 'public');
            }

            $validatedData['surat_id'] = $request->surat;

            // Buat informasi umum
            InformasiUmum::create($validatedData);

            // Simpan data alat pelindung
            foreach ($validatedData['alat'] as $alat) {
                AlatPelindung::create([
                    'pertimbangan_lain' => $request->pertimbangan_lain,
                    'alat' => $alat,
                    'surat_id' => $request->surat,
                ]);
            }

            // Simpan data uraian analisa keselamatan
            foreach ($validatedData['langkah_kerja'] as $index => $langkah_kerja) {
                Uraian::create([
                    'surat_id' => $request->surat,
                    'langkah_kerja' => $langkah_kerja,
                    'bahaya_kecelakaan' => $validatedData['bahaya_kecelakaan'][$index],
                    'tindakan_pencegahan' => $validatedData['tindakan_pencegahan'][$index],
                ]);
            }

            return redirect(route('surat-jsa.index'))->with('success', 'Surat baru berhasil dibuat!');
        } catch (\Exception $e) {
            // Tangani pengecualian dan berikan feedback
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat membuat surat: ' . $e->getMessage()]);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, string $id)
    {
        // Validasi data yang masuk
        $validatedData = $request->validate([
            'pekerjaan' => 'required',
            'tag_no' => 'required',
            'lokasi_kerja' => 'required',
            'dibuat_oleh' => 'required',
            'nama' => 'required',
            'seksi' => 'required',
            'tanda_tangan' => 'nullable|file|mimes:jpg,png,jpeg',
            'nama_pengawas' => 'required',
            'seksi_pengawas' => 'required',
            'tanggal' => 'required|date',
            'ttd_pengawas' => 'nullable|file|mimes:jpg,png,jpeg',
            'alat' => 'required|array',
            'langkah_kerja' => 'required|array',
            'bahaya_kecelakaan' => 'required|array',
            'tindakan_pencegahan' => 'required|array',
        ]);

        DB::beginTransaction();
        try {
            // Ambil informasi umum berdasarkan $id
            $informasi = InformasiUmum::where('surat_id', $id)->firstOrFail();

            // Simpan file tanda tangan jika ada file baru
            if ($request->hasFile('tanda_tangan')) {
                if ($informasi->tanda_tangan) {
                    Storage::disk('public')->delete($informasi->tanda_tangan);
                }
                $validatedData['tanda_tangan'] = $request->file('tanda_tangan')->store('tanda_tangan', 'public');
            }

            // Simpan file tanda tangan pengawas jika ada file baru
            if ($request->hasFile('ttd_pengawas')) {
                if ($informasi->ttd_pengawas) {
                    Storage::disk('public')->delete($informasi->ttd_pengawas);
                }
                $validatedData['ttd_pengawas'] = $request->file('ttd_pengawas')->store('ttd_pengawas', 'public');
            }

            // Update informasi umum dengan data yang divalidasi
            $informasi->update($validatedData);

            // Hapus data alat pelindung lama dan simpan yang baru
            AlatPelindung::where('surat_id', $id)->delete();
            foreach ($validatedData['alat'] as $alat) {
                AlatPelindung::create([
                    'surat_id' => $id,
                    'alat' => $alat,
                    'pertimbangan_lain' => $request->pertimbangan_lain,
                ]);
            }

            // Hapus data uraian lama dan simpan yang baru
            Uraian::where('surat_id', $id)->delete();
            foreach ($validatedData['langkah_kerja'] as $index => $langkah_kerja) {
                Uraian::create([
                    'surat_id' => $id,
                    'langkah_kerja' => $langkah_kerja,
                    'bahaya_kecelakaan' => $validatedData['bahaya_kecelakaan'][$index],
                    'tindakan_pencegahan' => $validatedData['tindakan_pencegahan'][$index],
                ]);
            }

            // Commit transaksi jika tidak ada masalah
            DB::commit();

            return redirect()->route('surat-jsa.index')->with('success', 'Surat berhasil diperbarui!');
        } catch (\Exception $e) {
            // Rollback transaksi jika terjadi kesalahan
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui surat: ' . $e->getMessage()]);
        }
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
