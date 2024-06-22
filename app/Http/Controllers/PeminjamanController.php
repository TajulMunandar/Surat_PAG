<?php

namespace App\Http\Controllers;

use App\Models\AksiPeminjaman;
use App\Models\DescriptionOfService;
use App\Models\Divisi;
use App\Models\InformasiUmumPeminjaman;
use App\Models\StatusPeminjaman;
use App\Models\User;
use App\Models\Surat;
use App\Models\TypeOfService;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Surat Peminjaman";
        $breadcrumb = "Surat Peminjaman";

        // Cek role pengguna yang sedang terautentikasi
        if (auth()->user()->role == 1) { // Jika pengguna adalah Admin (role == 1)

            // Mengambil semua pengguna dari tabel users
            $users = User::all();

            // Mengambil semua surat peminjaman (jenis == 1) bersama dengan relasi users
            $peminjamans = Surat::Where('jenis', 1)->with('users')->get();
        } elseif (auth()->user()->role == 2) { // Jika pengguna adalah Supervisor (role == 2)

            // Mengambil semua pengguna yang berada dalam divisi yang sama dengan pengguna yang sedang terautentikasi
            $users = User::Where('divisi_id', auth()->user()->divisi_id)->get();

            // Mengambil surat peminjaman (jenis == 1) yang berhubungan dengan pengguna dalam divisi yang sama
            $peminjamans = Surat::whereHas('users', function ($query) {
                // Menggunakan whereHas untuk filter berdasarkan divisi_id pengguna
                $query->where('divisi_id', auth()->user()->divisi_id);
            })
                ->where('jenis', 1) // Filter jenis surat peminjaman
                ->with('users') // Mengambil relasi users
                ->get();
        } else { // Jika pengguna adalah Pengguna Biasa (role selain 1 atau 2)

            // Mengambil pengguna yang sedang terautentikasi saja
            $users = User::Where('id', auth()->user()->id)->get();

            // Mengambil surat peminjaman (jenis == 1) yang dibuat oleh pengguna yang sedang terautentikasi
            $peminjamans = Surat::Where('user_id', auth()->user()->id)
                ->Where('jenis', 1) // Filter jenis surat peminjaman
                ->with('users') // Mengambil relasi users
                ->get();
        }

        // Mengembalikan view dengan data yang di-compact
        return view('page.surat.peminjaman.index', compact('title', 'breadcrumb', 'users', 'peminjamans'));
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
        $validatedData = $request->validate([
            'user_id' => 'required|max:255',
            'jenis' => 'required'
        ]);

        Surat::create($validatedData);

        return redirect('/dashboard/surat/surat-peminjaman')->with('success', 'Surat baru berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Surat $surat_peminjaman)
    {
        $title = "Detail Surat Peminjaman";
        $breadcrumb = "Detail Surat Peminajaman";
        $divisis = Divisi::all();
        $users = User::all();
        return view('page.surat.peminjaman.create')->with(compact('surat_peminjaman', 'title', 'breadcrumb', 'divisis', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat_peminjaman)
    {
        $title = "Edit Detail Surat Peminjaman";
        $breadcrumb = "Edit Detail Surat Peminajaman";
        $divisis = Divisi::all();
        $users = User::all();
        $informasi = InformasiUmumPeminjaman::where('surat_id', $surat_peminjaman->id)->first();
        $TOS = TypeOfService::where('surat_id', $surat_peminjaman->id)->get();
        $DOS = DescriptionOfService::where('surat_id', $surat_peminjaman->id)->first();
        $status_peminjaman = StatusPeminjaman::where('surat_id', $surat_peminjaman->id)->get();
        $aksi_peminjaman = AksiPeminjaman::where('surat_id', $surat_peminjaman->id)->first();
        return view('page.surat.peminjaman.edit')->with(compact(
            'surat_peminjaman',
            'title',
            'breadcrumb',
            'divisis',
            'users',
            'informasi',
            'TOS',
            'DOS',
            'status_peminjaman',
            'aksi_peminjaman'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $validatedData = $request->validate([
                'user_id' => 'required',
            ]);

            $peminjaman = Surat::findOrFail($id);
            $peminjaman->update($validatedData);

            return redirect('/dashboard/surat/surat-peminjaman')->with('success', 'Surat  berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('surat-peminjaman.index')->with('failed', 'Data gagal diperbarui! ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $peminjaman = Surat::findOrFail($id);

            $peminjaman->delete();

            return redirect('/dashboard/surat/surat-peminjaman')->with('success', 'Surat berhasil dihapus!');
        } catch (\Exception $exception) {
            return redirect()->route('surat-peminjaman.index')->with('failed', 'Data gagal dihapus! ' . $exception->getMessage());
        }
    }
}
