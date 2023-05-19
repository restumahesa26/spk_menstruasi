<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class GejalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Gejala::all();

        return view('pages.gejala.index', compact('items'));
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
            'nama' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            Alert::toast('Perhatikan data yang diisi', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        Gejala::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        Alert::toast('Data Gejala Telah Ditambah', 'success');
        return redirect()->route('gejala.index');
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
        $item = Gejala::findOrFail($id);

        return view('pages.gejala.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255'
        ]);

        if ($validator->fails()) {
            Alert::toast('Perhatikan data yang diisi', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item = Gejala::findOrFail($id);

        $item->update([
            'kode' => $request->kode,
            'nama' => $request->nama,
        ]);

        Alert::toast('Data Gejala Telah Diubah', 'success');
        return redirect()->route('gejala.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Gejala::findOrFail($id);

        $item->delete();

        Alert::toast('Data Gejala Telah Dihapus', 'success');
        return redirect()->route('gejala.index');
    }
}
