<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Surat;
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
        $users = User::all();
        $peminjamans = Surat::Where('jenis', 3)->with('users')->get();
        return view('page.surat.peminjaman.index')->with(compact('title', 'breadcrumb', 'users', 'peminjamans'));
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

        return redirect('/dashboard/surat-peminjaman')->with('success', 'Surat baru berhasil dibuat!');
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
        try {
            $validatedData = $request->validate([
                'user_id' => 'required',
            ]);

            $peminjaman = Surat::findOrFail($id);
            $peminjaman->update($validatedData);

            return redirect('/dashboard/surat-peminjaman')->with('success', 'Surat  berhasil diperbarui!');
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

            return redirect('/dashboard/surat-peminjaman')->with('success', 'Surat berhasil dihapus!');
        } catch (\Exception $exception) {
            return redirect()->route('surat-peminjaman.index')->with('failed', 'Data gagal dihapus! ' . $exception->getMessage());
        }
    }
}
