<?php

use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DaftarKandidatController;
use App\Http\Controllers\PilihController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
 * Route untuk halaman CSSMoRA E-Voting Portal.
 */

// Beranda – menggunakan BerandaController yang sudah ada
Route::get('/', BerandaController::class)->name('home');

Route::middleware('auth')->get('/dashboard', function () {
    return redirect()->route('home');
})->name('dashboard');

// Daftar Kandidat
Route::get('/daftar-kandidat', DaftarKandidatController::class)->name('daftar-kandidat');

// Pilih Kandidat
Route::prefix('pilih')->name('pilih.')->group(function () {
    Route::get('/', [PilihController::class, 'index'])->name('index');
    Route::post('/', [PilihController::class, 'store'])->name('store');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
