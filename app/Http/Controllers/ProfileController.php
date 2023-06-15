<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\RiwayatPenyakit;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Validation\Rules;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        if (Auth::user()->role == 'pengguna') {
            $penyakit = RiwayatPenyakit::where('user_id', Auth::user()->id)->latest()->get();
        } else {
            $penyakit = NULL;
        }

        return view('pages.profile', compact('penyakit'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // membuat validasi untuk nama, username, dan nip
        $request->validate([
            'nama' => ['required', 'string', 'max:100'],
            'username' => ['required', 'string', 'max:50'],
        ]);

        // membuat validasi untuk email
        if ($request->email !== Auth::user()->email) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            ]);
        }

        // membuat validasi untuk password
        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        }

        // memanggil data user berdasarkan id user yang sedang login
        $item = User::where('id', Auth::user()->id)->first();

        // lakukan update data satu persatu
        $item->nama = $request->nama;
        $item->username = $request->username;
        $item->email = $request->email;
        if ($request->password) {
            $item->password = Hash::make($request->password);
        }
        $item->save();

        Alert::toast('Profil Telah Diupdate', 'success');
        return redirect()->route('profile.edit');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function tambah_riwayat_penyakit(Request $request)
    {
        $request->validate([
            'penyakit' => 'required|string|max:255'
        ]);

        RiwayatPenyakit::create([
            'user_id' => Auth::user()->id,
            'penyakit' => $request->penyakit
        ]);

        Alert::toast('Berhasil Tambah Riwayat Penyakit', 'success');
        return redirect()->route('profile.edit');
    }

    public function hapus_riwayat_penyakit($id)
    {
        $item = RiwayatPenyakit::findOrFail($id);

        $item->delete();

        Alert::toast('Berhasil Hapus Riwayat Penyakit', 'success');
        return redirect()->route('profile.edit');
    }
}
