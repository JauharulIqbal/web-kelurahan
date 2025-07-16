<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Blog\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Blog\GaleriController;
use App\Http\Controllers\Blog\KontakController;
use App\Http\Controllers\Blog\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\KategoriUmkmController;
use App\Http\Controllers\Blog\UmkmController as BlogUmkmController;
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

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Admin Routes
Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/umkm', AdminUmkmController::class)->names('admin.umkm');
    Route::get('/umkm/export/pdf', [AdminUmkmController::class, 'exportPdf'])->name('admin.umkm.export.pdf');
    Route::resource('/kategori-umkm', KategoriUmkmController::class)->names('admin.kategori-umkm');
});



// // Admin Routes
// Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
//     Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

//     Route::resource('/umkm', AdminUmkmController::class)->names('admin.umkm');
// });
