<?php

namespace App\Http\Controllers;

use App\Models\Surat;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalJsa = Surat::where('jenis', 1)->count();
        $totalPeminjaman = Surat::where('jenis', 2)->count();
        $title = "DASHBOARD";
        return view('page.Dashboard')->with(compact('title', 'totalJsa', 'totalPeminjaman'));
    }
}
