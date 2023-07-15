<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\RulePenyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RulePenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items =  Penyakit::orderBy('kode', 'ASC')->get();

        return view('pages.rule-penyakit.index', compact('items'));
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
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Penyakit::findOrFail($id);
        $gejalas = Gejala::orderBy('kode', 'ASC')->get();
        $penyakits = Penyakit::orderBy('kode', 'ASC')->get();
        $gejalaPenyakit = $data->rule();
        $gejalaId = $gejalaPenyakit->pluck('gejala_id')->toArray();

        return view('pages.rule-penyakit.detail', compact('data', 'gejalas', 'penyakits', 'gejalaPenyakit', 'gejalaId'));
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
        // $input = $request->all();

        // $gejala = array();

        // $penyakitList = DB::table('gejala_penyakit')->where(['penyakit_id' => $id])->get();

        // foreach($input as $key => $value) {
        //     if(str_contains($key, 'gejala')) {
        //         $gejala_id = explode('-', $key)[1];

        //         $gejala_penyakit = DB::table('gejala_penyakit')
        //         ->where(['penyakit_id' => $id, 'gejala_id' => $gejala_id]);

        //         if(count($gejala_penyakit->get()) == 0) {
        //             DB::table('gejala_penyakit')
        //                 ->insert([
        //                 'penyakit_id' => $id,
        //                 'gejala_id' => $gejala_id,
        //                 'value_cf' => $value
        //             ]);
        //         } else {
        //             if($gejala_penyakit->first()->value_cf != $value) {
        //                 $gejala_penyakit->update(['value_cf' => $value]);
        //             }
        //         }
        //         $gejala[] = $gejala_id;
        //     }
        // }

        // foreach($penyakitList as $penyakit) {
        //     if(!in_array($penyakit->gejala_id, $gejala)) {
        //         $data = DB::table('gejala_penyakit')
        //             ->where(['penyakit_id' => $id, 'gejala_id' => $penyakit->gejala_id])
        //             ->first();

        //         DB::table('gejala_penyakit')->delete($data->id);
        //     }
        // }

        if ($request->nilai_md && $request->nilai_mb) {
            $nilai_md = array();

            foreach ($request->nilai_md as $value) {
                $nilai_md[] = $value;
            }

            $nilai_mb = array();

            foreach ($request->nilai_mb as $value) {
                $nilai_mb[] = $value;
            }
        }

        RulePenyakit::where('penyakit_id', $id)->delete();

        if ($request->nilai_md && $request->nilai_mb) {
            foreach ($request->gejala as $key => $value) {
                RulePenyakit::create([
                    'penyakit_id' => $id,
                    'gejala_id' => $value,
                    'nilai_mb' => $request->nilai_mb[$key],
                    'nilai_md' => $request->nilai_md[$key],
                    'nilai_cf' => $request->nilai_mb[$key] - $request->nilai_md[$key]
                ]);
            }
        }

        Alert::toast('Data Rule Penyakit Berhasil Disimpan', 'success');
        return redirect()->route('rule-penyakit.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
