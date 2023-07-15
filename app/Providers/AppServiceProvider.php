<?php

namespace App\Providers;

use App\Models\Gejala;
use App\Models\Penyakit;
use App\Models\RiwayatDiagnosa;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('gejala', function ()
        {
            $gejala = Gejala::count();
            return $gejala;
        });

        Blade::directive('penyakit', function ()
        {
            $penyakit = Penyakit::count();
            return $penyakit;
        });

        Blade::directive('pengguna', function ()
        {
            $pengguna = User::where('role', 'pengguna')->count();
            return $pengguna;
        });

        Blade::directive('diagnosa', function ()
        {
            if (Auth::user()->role == 'pengguna') {
                $diagnosa = RiwayatDiagnosa::where('user_id', Auth::user()->id)->count();
            } else {
                $diagnosa = RiwayatDiagnosa::count();
            }

            return $diagnosa;
        });
    }
}
