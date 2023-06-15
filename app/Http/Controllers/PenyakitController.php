<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PenyakitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Penyakit::withCount('rule')->get();

        return view('pages.penyakit.index', compact('items'));
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
        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'pencegahan' => 'required|string',
            'pengobatan' => 'required|string',
        ]);

        if ($validator->fails()) {
            Alert::toast('Perhatikan data yang diisi', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Penyakit::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'pencegahan' => $request->pencegahan,
            'pengobatan' => $request->pengobatan,
        ]);

        Alert::toast('Data Penyakit Telah Ditambah', 'success');
        return redirect()->route('penyakit.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Penyakit::findOrFail($id);

        return view('pages.penyakit.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'pencegahan' => 'required|string',
            'pengobatan' => 'required|string',
        ]);

        if ($validator->fails()) {
            Alert::toast('Perhatikan data yang diisi', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item = Penyakit::findOrFail($id);

        $item->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'pencegahan' => $request->pencegahan,
            'pengobatan' => $request->pengobatan,
        ]);

        Alert::toast('Data Penyakit Telah Diubah', 'success');
        return redirect()->route('penyakit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Penyakit::findOrFail($id);

        $item->delete();

        Alert::toast('Data Penyebab Telah Dihapus', 'success');
        return redirect()->route('penyakit.index');
    }
}
