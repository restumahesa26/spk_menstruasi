<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RiwayatDiagnosa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    function sort_array_by_key($array, $sort_key){
        $key_array = array_column($array, $sort_key);
        array_multisort($key_array, SORT_DESC, $array); //or SORT_ASC
        return $array;
    }

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

        $array = array_values(unserialize($item->hasil_diagnosa));
        $sort = $this->sort_array_by_key($array, 'hasil_cf');
        $hasil = array_splice($sort, 0, 3);

        return view('pages.riwayat.show', compact('item', 'hasil'));
    }
}
