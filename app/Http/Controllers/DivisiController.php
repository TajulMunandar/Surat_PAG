<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;

class DivisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = "Data Divisi";
        $breadcrumb = "Divisi";
        $divisis = Divisi::all();
        return view('page.divisi.index')->with(compact('title', 'breadcrumb', 'divisis'));
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
    { {
            $validatedData = $request->validate([
                'nama_divisi' => 'required',
            ]);

            Divisi::create($validatedData);

            return redirect('/dashboard/divisi')->with('success', 'Divisi baru berhasil dibuat!');
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
        try {
            $validatedData = $request->validate([
                'nama_divisi' => 'required',
            ]);

            $divisi = Divisi::findOrFail($id);
            $divisi->update($validatedData);

            return redirect('/dashboard/divisi')->with('success', 'Divisi  berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('divisi.index')->with('failed', 'Data gagal diperbarui! ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $divisi = Divisi::findOrFail($id);
            $divisi->delete();

            return redirect('/dashboard/divisi')->with('success', 'Divisi  berhasil dihapus!');
        } catch (\Exception $exception) {
            return redirect()->route('divisi.index')->with('failed', 'Data gagal dihapus! ' . $exception->getMessage());
        }
    }
}
