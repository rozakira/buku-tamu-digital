<?php

use App\Http\Controllers\GuestController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

// Route autentikasi dari Laravel Breeze
require __DIR__.'/auth.php';

// =====================================================
// HALAMAN BUKU TAMU
// =====================================================

// Halaman utama - sumber: Direct
Route::get('/', [GuestController::class, 'create'])
    ->name('guest.form');

// Halaman dari WhatsApp
Route::get('/whatsapp', [GuestController::class, 'create'])
    ->defaults('source', 'whatsapp');

// Halaman dari Instagram
Route::get('/instagram', [GuestController::class, 'create'])
    ->defaults('source', 'instagram');

// Halaman dari Facebook
Route::get('/facebook', [GuestController::class, 'create'])
    ->defaults('source', 'facebook');

// Simpan data tamu
Route::post('/guest', [GuestController::class, 'store'])
    ->name('guest.store');


// =====================================================
// HALAMAN ADMIN
// =====================================================

Route::middleware('auth')->prefix('admin')->group(function () {

    // Dashboard admin
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    // Daftar tamu + pencarian
    Route::get('/guests', [DashboardController::class, 'guests'])
        ->name('admin.guests');
});