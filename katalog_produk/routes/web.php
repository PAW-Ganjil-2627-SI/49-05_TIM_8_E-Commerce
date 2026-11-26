<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return redirect()->route('katalog.index');
});

Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog.index');


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



Route::middleware(['auth', 'role:admin'])->group(function () {
   
    Route::get('/katalog/tambah', [KatalogController::class, 'create'])->name('katalog.create');
    Route::post('/katalog', [KatalogController::class, 'store'])->name('katalog.store');

    
    Route::get('/katalog/{id}/edit', [KatalogController::class, 'edit'])->name('katalog.edit');
    Route::put('/katalog/{id}', [KatalogController::class, 'update'])->name('katalog.update');

   
    Route::delete('/katalog/{id}', [KatalogController::class, 'destroy'])->name('katalog.destroy');
});