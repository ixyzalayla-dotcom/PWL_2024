```php
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\KategoriController;

// 1. Halaman Home
Route::get('/', [HomeController::class, 'index']);

// 2. Halaman Products (Route Prefix)
Route::prefix('category')->group(function () {
    Route::get('/food-beverage', [ProductController::class, 'foodBeverage']);
    Route::get('/beauty-health', [ProductController::class, 'beautyHealth']);
    Route::get('/home-care', [ProductController::class, 'homeCare']);
    Route::get('/baby-kid', [ProductController::class, 'babyKid']);
});

// 3. Halaman User (Route Param)
Route::get('/user/{id}/name/{name}', [UserController::class, 'profile']);

// 4. Halaman Penjualan
Route::get('/penjualan', [PenjualanController::class, 'index']);

// 5. Halaman Transaksi
Route::resource('transactions', TransactionController::class);

// 6. Halaman Level (Praktikum 4 - DB Facade)
Route::get('/level', [LevelController::class, 'index']);
Route::post('/level/add', [LevelController::class, 'store']);
Route::put('/level/{id}', [LevelController::class, 'update']);
Route::delete('/level/{id}', [LevelController::class, 'destroy']);

// 7. Halaman Kategori (Praktikum 5 - Query Builder)
Route::get('/kategori', [KategoriController::class, 'index']);
Route::post('/kategori/store', [KategoriController::class, 'store']);
Route::put('/kategori/{id}', [KategoriController::class, 'update']);
Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);

// 8. Halaman User (Praktikum 6 - Eloquent Models)
Route::get('/user', [UserController::class, 'index']);
Route::post('/user/store', [UserController::class, 'store']);
Route::put('/user/{id}', [UserController::class, 'update']);