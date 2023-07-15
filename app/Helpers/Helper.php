<?php

namespace App\Helpers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\RiwayatDiagnosa;
use Illuminate\Support\Facades\Auth;

class Helper
{
    public static function penyakit()
    {
        $items = Penyakit::orderBy('nama', 'ASC')->get();

        return $items;
    }

    public static function gejala()
    {
        $items = Gejala::orderBy('nama', 'ASC')->get();

        return $items;
    }

    public static function hitungDiagnosa()
    {
        if (Auth::user()->role == 'pengguna') {
            $diagnosa = RiwayatDiagnosa::where('user_id', Auth::user()->id)->count();
        } else {
            $diagnosa = RiwayatDiagnosa::count();
        }

        return $diagnosa;
    }
}
