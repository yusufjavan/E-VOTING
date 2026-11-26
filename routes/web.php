<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\PilihController;
use App\Http\Controllers\DaftarKandidatController;

/*
 * Route untuk halaman CSSMoRA E-Voting Portal.
 * Demo ini berjalan tanpa login.
 */

// Beranda – menggunakan BerandaController yang sudah ada
Route::get('/', BerandaController::class)->name('home');

// Daftar Kandidat
Route::get('/daftar-kandidat', DaftarKandidatController::class)->name('daftar-kandidat');

// Pilih Kandidat
Route::prefix('pilih')->name('pilih.')->group(function () {
    Route::get('/', [PilihController::class, 'index'])->name('index');
    Route::post('/', [PilihController::class, 'store'])->name('store');
});
