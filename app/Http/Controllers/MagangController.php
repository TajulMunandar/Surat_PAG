<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Surat;
use Illuminate\Http\Request;

class MagangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Surat Magang";
        $breadcrumb = "Surat Magang";
        $users = User::all();
        $magangs = Surat::Where('jenis', 2)->with('users')->get();
        return view('page.surat.magang.index')->with(compact('title', 'breadcrumb', 'users', 'magangs'));
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

        return redirect('/dashboard/surat/surat-magang')->with('success', 'Surat baru berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Surat $surat_magang)
    {
        $title = "Detail Surat Magang";
        $breadcrumb = "Detail Surat Magang";
        return view('page.surat.magang.create')->with(compact('surat_magang', 'title', 'breadcrumb'));
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

            $magang = Surat::findOrFail($id);
            $magang->update($validatedData);

            return redirect('/dashboard/surat/surat-magang')->with('success', 'Surat  berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('surat-magang.index')->with('failed', 'Data gagal diperbarui! ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $magang = Surat::findOrFail($id);

            $magang->delete();

            return redirect('/dashboard/surat/surat-magang')->with('success', 'Surat berhasil dihapus!');
        } catch (\Exception $exception) {
            return redirect()->route('surat-magang.index')->with('failed', 'Data gagal dihapus! ' . $exception->getMessage());
        }
    }
}
