<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/hello', function () {
    return "Hello";
});
Route::get('/world', function () {
    return "World";
});

// 8. Route dengan satu parameter
Route::get('/user/{name}', function ($name) {
    return "Nama saya: " . $name;
});

// 11. Route dengan multiple parameter
Route::get('/posts/{postId}/comments/{commentId}', function ($postId, $commentId) {
    return "Post ke-" . $postId . " Comment ke-" . $commentId;
});

// 13. Route articles dengan parameter id
Route::get('/articles/{id}', function ($id) {
    return "Halaman Artikel dengan ID " . $id;
});
use Illuminate\Support\Facades\Route;
2. Route::get('/hello', function () {
    return /"Hello";
