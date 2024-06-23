<?php

namespace App\Http\Controllers;

use App\Models\AlatPelindung;
use App\Models\InformasiUmum;
use App\Models\User;
use App\Models\Surat;
use App\Models\Uraian;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class JsaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Surat JSA";
        $breadcrumb = "Surat JSA";
        if (auth()->user()->role == 1) {
            $users = User::all();
            $jsas = Surat::Where('jenis', 1)->with('users')->get();
        } elseif (auth()->user()->role == 2) {
            $users = User::Where('divisi_id', auth()->user()->divisi_id)->get();
            $jsas = Surat::whereHas('users', function ($query) {
                $query->where('divisi_id', auth()->user()->divisi_id);
            })
                ->where('jenis', 1)
                ->with('users')
                ->get();
        } else {
            $users = User::Where('id', auth()->user()->id)->get();
            $jsas = Surat::Where('user_id', auth()->user()->id)->Where('jenis', 1)->with('users')->get();
        }

        return view('page.surat.jsa.index')->with(compact('title', 'breadcrumb', 'users', 'jsas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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

        return redirect('/dashboard/surat/surat-jsa')->with('success', 'Surat baru berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Surat $surat_jsa)
    {
        $title = "Detail Surat JSA";
        $breadcrumb = "Tambah Detail Surat JSA";
        return view('page.surat.jsa.create')->with(compact('surat_jsa', 'title', 'breadcrumb'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat_jsa)
    {
        $informasi = InformasiUmum::where('surat_id', $surat_jsa->id)->first();
        $alat = AlatPelindung::where('surat_id', $surat_jsa->id)->first();
        $uraians = Uraian::where('surat_id', $surat_jsa->id)->get();
        $title = "Detail Surat JSA";
        $breadcrumb = "Edit Detail Surat JSA";
        return view('page.surat.jsa.edit')->with(compact('surat_jsa', 'title', 'breadcrumb', 'informasi', 'alat', 'uraians'));
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

            $jsa = Surat::findOrFail($id);
            $jsa->update($validatedData);

            return redirect('/dashboard/surat/surat-jsa')->with('success', 'Surat  berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $exception) {
            return redirect()->route('surat-jsa.index')->with('failed', 'Data gagal diperbarui! ' . $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $surat = Surat::findOrFail($id);

            // Menghapus relasi AlatPelindung
            $surat->alat_pelindung->each(function ($alatPelindung) {
                $alatPelindung->delete();
            });

            // Menghapus relasi InformasiUmum
            $surat->informasi_umum->each(function ($informasiUmum) {
                $informasiUmum->delete();
            });

            // Menghapus relasi Uraian
            $surat->uraian->each(function ($uraian) {
                $uraian->delete();
            });

            // Hapus surat
            Surat::destroy($surat->id);

            return redirect('/dashboard/surat/surat-jsa')->with('success', 'Surat berhasil dihapus!');
        } catch (\Exception $exception) {
            return redirect()->route('surat-jsa.index')->with('failed', 'Data gagal dihapus! ' . $exception->getMessage());
        }
    }

    public function generatePDF(Surat $surat_jsa)
    {
        $informasi = InformasiUmum::where('surat_id', $surat_jsa->id)->first();
        $alat = AlatPelindung::where('surat_id', $surat_jsa->id)->get();
        $uraians = Uraian::where('surat_id', $surat_jsa->id)->get();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isRemoteEnabled', true);

        $pdf = new Dompdf($options);

        $htmlContent = view('template.jsa', compact('surat_jsa', 'informasi', 'alat', 'uraians'))->render();
        $pdf->loadHtml($htmlContent);
        $pdf->setPaper('legal', 'landscape');

        $pdf->render();

        // Parameter 'false' untuk menampilkan PDF di browser tanpa memaksa unduhan
        return $pdf->stream('Jsa.pdf');
    }
}
