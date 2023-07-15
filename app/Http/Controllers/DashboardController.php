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
        if(Auth::user()->role == 'admin' || Auth::user()->role == 'dokter') {
            $items = RiwayatDiagnosa::with('penyakit')->latest()->paginate(10);
        } else {
            $items = RiwayatDiagnosa::with('penyakit')->where('user_id', Auth::user()->id)->latest()->get();
        }
        $items2 = Artikel::all();

        return view('pages.dashboard', compact('items', 'items2'));
    }
}
