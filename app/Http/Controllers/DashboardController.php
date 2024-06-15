<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "DASHBOARD";
        return view('page.Dashboard')->with(compact('title'));
    }
}
