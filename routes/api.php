<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PickupController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TypeProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::put('/pelanggan/{id}', [PelangganController::class, 'edit']);
Route::get('/pelangganindex ', [PelangganController::class, 'tampilpelanggan']);
Route::post('/pelanggan/login', [PelangganController::class, 'login'])->name('login');
Route::post('/pelanggan/register', [PelangganController::class, 'register'])->name('register');
Route::get('/pelanggan/{id}', [PelangganController::class, 'show']);
Route::post('/pickup/submit', [PickupController::class, 'pickup'])->name('pickup.submit');
Route::get('tipeproduk', [TypeProductController::class, 'showall'])->name('tipeproduk.show');
Route::get('produk', [ProductController::class,'showproduk']);
Route::get('/getpickupdata', [PickupController::class, 'show']);
Route::get('/sumharga', [PickupController::class, 'sumHarga']);

