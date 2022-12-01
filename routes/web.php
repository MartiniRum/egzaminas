<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/',[\App\Http\Controllers\BookController::class, 'index'])->name('books');
Route::get('/likes',[\App\Http\Controllers\BookController::class, 'index'])->name('likes');
Route::resource('books',\App\Http\Controllers\BookController::class);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
