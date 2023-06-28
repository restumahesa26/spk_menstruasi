<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RiwayatDiagnosa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index()
    {
        if(Auth::user()->role == 'admin' || Auth::user()->role == 'dokter') {
            $items = RiwayatDiagnosa::with('penyakit')->latest()->get();
        } else {
            $items = RiwayatDiagnosa::with('penyakit')->where('user_id', Auth::user()->id)->latest()->get();
        }

        return view('pages.riwayat.index', compact('items'));
    }

    public function show(string $id)
    {
        $item = RiwayatDiagnosa::findOrFail($id);

        return view('pages.riwayat.show', compact('item'));
    }
}
