<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Models\TypeOfService;
use App\Models\AksiPeminjaman;
use App\Models\StatusPeminjaman;
use App\Models\DescriptionOfService;
use App\Models\InformasiUmumPeminjaman;

class PeminjamanDetailController extends Controller
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
            // Validasi input informasi umum peminjaman
            $validatedData = $request->validate([
                'nama_pemakai' => 'required',
                'no_pegawai' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|date',
                'tanggal_masuk' => 'required|date',
                'jabatan' => 'required',
                'unit_kerja' => 'required',
                'no_telpon' => 'required',
                'divisi_id' => 'required|exists:divisis,id',
                'software' => 'nullable|array',
                'hardware' => 'nullable|array',
                'data_komunikasi' => 'nullable|string',
                'user_id' => 'nullable|string',
                'deskripsi' => 'required',
                'attachment' => 'required',
                'justification' => 'required',
                'request_by' => 'required|date',
                'fungsi' => 'required',
                'it_recommendation' => 'required|in:accepted,not_accepted',
                'reason' => 'required',
                'approved1' => 'required|exists:users,id',
                'approve2' => 'required|exists:users,id',
                'assigned_to' => 'required|date',
                'priority' => 'required|in:1,2,3',
                'action' => 'required',
                'estimasi_kerja' => 'required',
                'tanggal_mulai' => 'required|date',
                'completed_by' => 'required',
                'expense_amount' => 'required|numeric',
                'completion_date' => 'required|date',
                'user_acceptance' => 'required|date',
            ]);

            $validatedData['surat_id'] = $request->surat;

            // Simpan informasi umum peminjaman
            InformasiUmumPeminjaman::create($validatedData);


            foreach ($validatedData['software'] as $software) {
                TypeOfService::create([
                    'software' => $software,
                    'surat_id' => $request->surat,
                ]);
            }

            foreach ($validatedData['hardware'] as $hardware) {
                TypeOfService::create([
                    'hardware' => $hardware,
                    'surat_id' => $request->surat,
                ]);
            }


            // Simpan description of service
            DescriptionOfService::create($validatedData);

            // Simpan status peminjaman
            StatusPeminjaman::create($validatedData);


            // Simpan aksi peminjaman
            AksiPeminjaman::create($validatedData);

            return redirect(route('surat-peminjaman.index'))->with('success', 'Data peminjaman berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage()]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat_peminjaman_detail)
    {
        try {
            // Validate input data
            $validatedData = $request->validate([
                'nama_pemakai' => 'required',
                'no_pegawai' => 'required',
                'tempat_lahir' => 'required',
                'tanggal_lahir' => 'required|date',
                'tanggal_masuk' => 'required|date',
                'jabatan' => 'required',
                'unit_kerja' => 'required',
                'no_telpon' => 'required',
                'divisi_id' => 'required|exists:divisis,id',
                'software' => 'nullable|array',
                'hardware' => 'nullable|array',
                'data_komunikasi' => 'nullable|string',
                'user_id' => 'nullable|string',
                'deskripsi' => 'required',
                'attachment' => 'required',
                'justification' => 'required',
                'request_by' => 'required|date',
                'fungsi' => 'required',
                'it_recommendation' => 'required|in:accepted,not_accepted',
                'reason' => 'required',
                'approved1' => 'required|exists:users,id',
                'approve2' => 'required|exists:users,id',
                'assigned_to' => 'required|date',
                'priority' => 'required|in:1,2,3',
                'action' => 'required',
                'estimasi_kerja' => 'required',
                'tanggal_mulai' => 'required|date',
                'completed_by' => 'required',
                'expense_amount' => 'required|numeric',
                'completion_date' => 'required|date',
                'user_acceptance' => 'required|date',
            ]);

            $validatedData['surat_id'] = $surat_peminjaman_detail->id;

            // Update informasi umum peminjaman
            $informasi = InformasiUmumPeminjaman::where('surat_id', $surat_peminjaman_detail->id)->first();
            $informasi->update($validatedData);





            $TOS = TypeOfService::where('surat_id', $surat_peminjaman_detail->id)->get();

            // Hardware yang ada di database
            $existing_hardware = $TOS->pluck('hardware')->toArray();

            // Hardware baru dari form
            $new_hardware = $validatedData['hardware'] ?? [];

            // Hapus hardware yang dihapus dari form
            foreach ($existing_hardware as $hardware) {
                if (!in_array($hardware, $new_hardware)) {
                    TypeOfService::where('surat_id', $surat_peminjaman_detail->id)
                        ->where('hardware', $hardware)
                        ->delete();
                }
            }

            // Tambahkan atau perbarui hardware dari form
            foreach ($new_hardware as $hardware) {
                TypeOfService::updateOrCreate(
                    ['hardware' => $hardware, 'surat_id' => $surat_peminjaman_detail->id],
                    ['hardware' => $hardware]
                );
            }

            // Update or create TypeOfService entries for software
            if (isset($validatedData['software'])) {
                foreach ($validatedData['software'] as $software) {
                    TypeOfService::updateOrCreate(
                        ['software' => $software, 'surat_id' => $surat_peminjaman_detail->id],
                        ['software' => $software]
                    );
                }
            };

            // Update description of service
            $description = DescriptionOfService::where('surat_id', $surat_peminjaman_detail->id)->first();
            $description->update($validatedData);

            // Update status peminjaman
            $status = StatusPeminjaman::where('surat_id', $surat_peminjaman_detail->id)->first();
            $status->update($validatedData);

            // Update aksi peminjaman
            $aksi = AksiPeminjaman::where('surat_id', $surat_peminjaman_detail->id)->first();
            $aksi->update($validatedData);

            return redirect(route('surat-peminjaman.index'))->with('success', 'Data peminjaman berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
