<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VoucherDiskonController;
use Illuminate\Support\Facades\Route;

// Halaman utama diarahkan ke daftar voucher
Route::get('/', fn () => redirect()->route('voucher.daftar'))->name('home');

// Publik: daftar voucher boleh dibuka tanpa login
Route::get('/voucher', [VoucherDiskonController::class, 'daftar'])->name('voucher.daftar');

// Hanya untuk yang BELUM login (halaman login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
});

// Hanya untuk yang SUDAH login
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Di dalam auth: dibatasi lagi berdasarkan peran
    Route::middleware('role:admin,kasir')->group(function () {
        Route::get('/voucher/create', [VoucherDiskonController::class, 'create'])->name('voucher.create');
        Route::post('/voucher', [VoucherDiskonController::class, 'store'])->name('voucher.store');

        // Policy: dicek per data (kasir tidak boleh edit voucher kedaluwarsa)
        Route::get('/voucher/{voucher}/edit', [VoucherDiskonController::class, 'edit'])
            ->name('voucher.edit')
            ->can('update', 'voucher');
        Route::put('/voucher/{voucher}', [VoucherDiskonController::class, 'update'])
            ->name('voucher.update')
            ->can('update', 'voucher');
    });

    // Hapus: hanya admin
    Route::delete('/voucher/{voucher}', [VoucherDiskonController::class, 'destroy'])
        ->name('voucher.destroy')
        ->middleware('role:admin');

    // Gate: halaman rekap hanya untuk yang punya izin 'lihat-rekap-voucher'
    Route::get('/voucher-rekap', [VoucherDiskonController::class, 'rekap'])
        ->can('lihat-rekap-voucher')
        ->name('voucher.rekap');

    Route::get('/voucher/{voucher}/edit', [VoucherDiskonController::class, 'edit'])
            ->name('voucher.edit')
            ->can('update', 'voucher');
    Route::put('/voucher/{voucher}', [VoucherDiskonController::class, 'update'])
        ->name('voucher.update')
        ->can('update', 'voucher');
});