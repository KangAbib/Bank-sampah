<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\TypeProductController;

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


Route::get('/', [LandingPageController::class, 'index']);

// handle auth
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('logout', [AdminController::class, 'logout'])->name('logout');


Route::middleware(['auth.admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('index');

    Route::resource('products', ProductController::class);
    Route::resource('typeproduct', TypeProductController::class);

    // Handle pemesanan
    Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan.index');

    // Handle pelanggan
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('/pickup', [PickupController::class, 'index'])->name('pickup.index');
    Route::put('/pemesanan/{id}/status/{status}', [PemesananController::class, 'updateStatus'])->name('pemesanan.updateStatus');
});





Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login');

Route::post('/keluar', [LoginController::class, 'logout'])->name('keluar');

Route::middleware(['auth.pelanggan'])->group(function () {
    Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog.index');
    Route::post('/pemesanan/{id}', [PemesananController::class, 'buatPemesanan'])->name('pemesanan.buat');
    Route::get('/history', [PemesananController::class, 'viewHistory'])->name('history');



});
