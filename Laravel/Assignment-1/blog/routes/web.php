<?php

use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('phones', PhoneController::class);
Route::get('/trash/phones', [PhoneController::class, 'showTrash'])->name('show.trash');

Route::resource('products', ProductController::class);
Route::get('/trash/products', [ProductController::class, 'showTrash'])->name('show.trash');
