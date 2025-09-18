<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArsipController;
use App\Http\Controllers\KategoriController;


// Route untuk Arsip Surat
Route::get('/', [ArsipController::class, 'index'])->name('arsip.index');
Route::get('/arsip/create', [ArsipController::class, 'create'])->name('arsip.create');
Route::post('/arsip', [ArsipController::class, 'store'])->name('arsip.store');
Route::delete('/arsip/{arsip}', [ArsipController::class, 'destroy'])->name('arsip.destroy');
Route::get('/arsip/{arsip}', [ArsipController::class, 'show'])->name('arsip.show');
Route::get('/arsip/{arsip}/download', [ArsipController::class, 'download'])->name('arsip.download');

// Route untuk Kategori Surat
Route::resource('kategori', KategoriController::class);

// Route untuk Halaman About
Route::get('/about', function () {
    return view('about');
})->name('about');