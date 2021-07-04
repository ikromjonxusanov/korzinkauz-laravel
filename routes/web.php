<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategorysController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
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


Route::resource('/product', ProductsController::class);
Route::resource('/category', CategorysController::class);
Route::get('/category/{id}/products', [CategorysController::class, 'relevant_data']);
Route::resource('/users', UserController::class);

Auth::routes();

Route::get('/', \App\Http\Controllers\HomeController::class)->name('home');
