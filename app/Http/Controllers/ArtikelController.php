<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Artikel::all();

        return view('pages.artikel.index', compact('items'));
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
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        if ($validator->fails()) {
            Alert::toast('Perhatikan data yang diisi', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $extension = $request->file('gambar')->extension();
        $imageNames = uniqid('img_', microtime()) . '.' . $extension;
        $request->file('gambar')->move(public_path('images/gambar-artikel'), $imageNames);

        Artikel::create([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => $imageNames,
        ]);

        Alert::toast('Data Artikel Telah Ditambah', 'success');
        return redirect()->route('artikel.index');
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
        $item = Artikel::findOrFail($id);

        return view('pages.artikel.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'konten' => 'required',
            'gambar' => 'nullable|image|mimes:png,jpg,jpeg'
        ]);

        if ($validator->fails()) {
            Alert::toast('Perhatikan data yang diisi', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item = Artikel::findOrFail($id);

        if ($request->gambar) {
            $extension = $request->file('gambar')->extension();
            $imageNames = uniqid('img_', microtime()) . '.' . $extension;
            $request->file('gambar')->move(public_path('images/gambar-artikel'), $imageNames);
        } else {
            $imageNames = $item->gambar;
        }

        $item->update([
            'judul' => $request->judul,
            'konten' => $request->konten,
            'gambar' => $imageNames,
        ]);

        Alert::toast('Data Artikel Telah Diubah', 'success');
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Artikel::findOrFail($id);

        $item->delete();

        Alert::toast('Data Artikel Telah Dihapus', 'success');
        return redirect()->route('artikel.index');
    }
}
