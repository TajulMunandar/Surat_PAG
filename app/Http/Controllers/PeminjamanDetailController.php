<?php

namespace App\Http\Controllers;

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
                'surat' => 'required|exists:surat_peminjaman,id',
            ]);

            $validatedData['surat_id'] = $request->surat;

            // Simpan informasi umum peminjaman
            InformasiUmumPeminjaman::create($validatedData);

            // Validasi input type of services
            $validatedData = $request->validate([
                'software' => 'nullable|array',
                'software.*' => 'string',
                'other_text' => 'nullable|required_if:software.*,',
                'hardware' => 'nullable|array',
                'hardware.*' => 'string',
                'data_komunikasi' => 'nullable|string',
                'user_id' => 'nullable|string',
                'surat_id' => $request->surat,
            ]);

            // Simpan type of services
            if (isset($validatedData['software'])) {
                foreach ($validatedData['software'] as $software) {
                    TypeOfService::create([
                        'software' => $software,
                        'surat_id' => $request->surat,
                    ]);
                }
            }

            if (isset($validatedData['other_text'])) {
                TypeOfService::create([
                    'nama' => $validatedData['other_text'],
                    'surat_id' => $request->surat,
                ]);
            }

            if (isset($validatedData['hardware'])) {
                foreach ($validatedData['hardware'] as $hardware) {
                    TypeOfService::create([
                        'nama' => $hardware,
                        'surat_id' => $request->surat,
                    ]);
                }
            }

            // Validasi input description of service
            $validatedData = $request->validate([
                'deskripsi' => 'required',
                'attachment' => 'required',
                'justification' => 'required',
                'surat_id' => 'required|exists:surat_peminjaman,id',
            ]);

            // Simpan description of service
            DescriptionOfService::create($validatedData);

            // Validasi input status peminjaman
            $validatedData = $request->validate([
                'request_by' => 'required|date',
                'fungsi' => 'required',
                'it_recommendation' => 'required|in:accepted,not_accepted',
                'reason' => 'required',
                'approved1' => 'required|exists:users,id',
                'approve2' => 'required|exists:users,id',
                'assigned_to' => 'required|date',
                'priority' => 'required|in:1,2,3',
                'action' => 'required',
                'surat_id' => $request->surat,
            ]);

            // Simpan status peminjaman
            StatusPeminjaman::create($validatedData);

            // Validasi input aksi peminjaman
            $validatedData = $request->validate([
                'estimasi_kerja' => 'required',
                'tanggal_mulai' => 'required|date',
                'completed_by' => 'required',
                'expense_amount' => 'required|numeric',
                'completion_date' => 'required|date',
                'user_acceptance' => 'required|date',
                'surat_id' => $request->surat,
            ]);

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
