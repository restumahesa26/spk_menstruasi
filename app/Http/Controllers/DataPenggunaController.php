<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class DataPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = User::where('role', 'pengguna')->get();

        return view('pages.data-pengguna.index', compact('items'));
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
            'nama' => 'required|string|max:50',
            'username' => 'required|string|max:20',
            'email' => 'required|string|max:50|email|unique:users',
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults() ]
        ]);

        if ($validator->fails()) {
            Alert::toast('Perhatikan data yang diisi', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'nama' => $request->nama,
            'username' => $request->username,
            'email' => $request->email,
            'role' => 'pengguna',
            'password' => Hash::make($request->password),
        ]);

        Alert::toast('Data Pengguna Telah Ditambah', 'success');
        return redirect()->route('data-pengguna.index');
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
        $item = User::findOrFail($id);

        return view('pages.data-pengguna.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:50',
            'username' => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            Alert::toast('Perhatikan data yang diisi', 'error');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $item = User::findOrFail($id);

        if ($item->email !== $request->email) {
            $validator2 = Validator::make($request->all(), [
                'email' => 'required|string|max:50|email|unique:users',
            ]);

            if ($validator2->fails()) {
                Alert::toast('Perhatikan data yang diisi', 'error');
                return redirect()->back()->withErrors($validator2)->withInput();
            }
        }

        if ($request->password) {
            $validator3 = Validator::make($request->all(), [
                'password' => ['required', 'string', 'confirmed', Rules\Password::defaults() ]
            ]);

            if ($validator->fails()) {
                Alert::toast('Perhatikan data yang diisi', 'error');
                return redirect()->back()->withErrors($validator3)->withInput();
            }
        }

        $item->nama = $request->nama;
        $item->username = $request->username;
        $item->email = $request->email;
        if ($request->password) {
            $item->password = Hash::make($request->password);
        }
        $item->save();

        Alert::toast('Data Pengguna Telah Diubah', 'success');
        return redirect()->route('data-pengguna.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = User::findOrFail($id);

        $item->delete();

        Alert::toast('Data Pengguna Telah Dihapus', 'success');
        return redirect()->route('data-pengguna.index');
    }
}
