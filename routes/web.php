<?php

use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataAdminController;
use App\Http\Controllers\DataDokterController;
use App\Http\Controllers\DataPenggunaController;
use App\Http\Controllers\DiagnosaController;
use App\Http\Controllers\GejalaController;
use App\Http\Controllers\PenyakitController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\RulePenyakitController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])
    ->group(function() {
        Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
        Route::resource('gejala', GejalaController::class);
        Route::resource('penyakit', PenyakitController::class);
        Route::resource('rule-penyakit', RulePenyakitController::class);
        Route::resource('data-admin', DataAdminController::class);
        Route::resource('data-dokter', DataDokterController::class);
        Route::resource('data-pengguna', DataPenggunaController::class);
        Route::resource('artikel', ArtikelController::class);
        Route::get('/diagnosa', [DiagnosaController::class, 'index'])->name('diagnosa.index');
        Route::post('/diagnosa/store', [DiagnosaController::class, 'diagnosa'])->name('diagnosa.store');
        Route::get('/riwayat-diagnosa', [RiwayatController::class, 'index'])->name('riwayat-diagnosa.index');
        Route::get('/riwayat-diagnosa/show/{id}', [RiwayatController::class, 'show'])->name('riwayat-diagnosa.show');
    });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
