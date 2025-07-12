<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Blog\HomeController;
use App\Http\Controllers\Blog\ProfileController;
use App\Http\Controllers\Blog\GaleriController;
use App\Http\Controllers\Blog\KontakController;
use App\Http\Controllers\Blog\UmkmController as BlogUmkmController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UmkmController as AdminUmkmController;

// BlogPages Routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/profile', [ProfileController::class, 'index']);
Route::get('/galeri', [GaleriController::class, 'index']);
Route::get('/kontak', [KontakController::class, 'index']);

Route::prefix('umkm')->group(function () {
    Route::get('/', [BlogUmkmController::class, 'index']);
    Route::get('/jasa', [BlogUmkmController::class, 'jasa']);
    Route::get('/makanan', [BlogUmkmController::class, 'makanan']);
    Route::get('/minuman', [BlogUmkmController::class, 'minuman']);
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::resource('/umkm', AdminUmkmController::class)->names('admin.umkm');
});

