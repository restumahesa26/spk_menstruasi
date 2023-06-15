<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\RiwayatDiagnosa;
use App\Models\RiwayatPenyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $items = RiwayatDiagnosa::latest()->paginate(6);
        $items2 = Artikel::all();

        return view('pages.dashboard', compact('items', 'items2'));
    }
}
