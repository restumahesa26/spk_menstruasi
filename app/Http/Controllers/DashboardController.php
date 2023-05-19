<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RiwayatDiagnosa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $items = RiwayatDiagnosa::latest()->paginate(6);

        return view('pages.dashboard', compact('items'));
    }
}
