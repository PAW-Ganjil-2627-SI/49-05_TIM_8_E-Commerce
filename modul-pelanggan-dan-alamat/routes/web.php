<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AuthController;



Route::get('/tes-koneksi', function () {
 try {
    DB::connection()->getPdo();
    return "DB berhasil connect!";
 } catch (\Exception $e){
    return "DB gagal connect " . $e->getMessage();
 }
})->withoutMiddleware('web');

Route::get('/daftar-pelanggan', [PelangganController::class, 'daftar'])->name('pelanggan.daftar');

Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');

Route::get('/', [PelangganController::class, 'index'])->name('home');
Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');

Route::middleware('auth')->group(function () {
Route::get('/pelanggan/{pelanggan}/edit', [PelangganController::class, 'edit'])
        ->name('pelanggan.edit')
        ->can('update', 'pelanggan');

    Route::put('/pelanggan/{pelanggan}', [PelangganController::class, 'update'])
        ->name('pelanggan.update')
        ->can('update', 'pelanggan');

    Route::delete('/pelanggan/{pelanggan}', [PelangganController::class, 'destroy'])
        ->name('pelanggan.destroy')
        ->can('delete', 'pelanggan');
});


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware('role:admin,staff')->group(function () {
        Route::get('/pelanggan/create', [PelangganController::class, 'create'])->name('pelanggan.create');
        Route::post('/pelanggan', [PelangganController::class, 'store'])->name('pelanggan.store');
        Route::get('/pelanggan/{pelanggan}', [PelangganController::class, 'show'])->name('pelanggan.show');
    });

    Route::middleware('role:admin')->group(function () {
      Route::get('/pelanggan/{pelanggan}/edit', [PelangganController::class, 'edit'])
            ->name('pelanggan.edit')
            ->can('update', 'pelanggan');

        Route::put('/pelanggan/{pelanggan}', [PelangganController::class, 'update'])
            ->name('pelanggan.update')
            ->can('update', 'pelanggan');

        Route::delete('/pelanggan/{pelanggan}', [PelangganController::class, 'destroy'])
            ->name('pelanggan.destroy')
            ->can('delete', 'pelanggan');
    });

    Route::get('/pelanggan/create', [PelangganController::class, 'create'])
    ->middleware('auth')
    ->can('tambah-data')
    ->name('pelanggan.create');

});

