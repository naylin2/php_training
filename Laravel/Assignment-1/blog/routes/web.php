<?php

use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MailController;
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

//Practise Mail
Route::get('/sendhtmlemail',[MailController::class, 'html_email']);

Route::get('/', function () {
    return redirect()->route('phones.index');
});
Route::get('/email', [MailController::class, 'create']);
Route::post('/email', [MailController::class, 'sendEmail'])->name('send.email');

Route::get('/mail-phone/{id}', [MailController::class, 'mailPhone'])->name('phones.mail');

Route::resource('phones', PhoneController::class);
Route::get('/trash/phones', [PhoneController::class, 'showTrash'])->name('show.trash');
Route::get('/search/phones', [PhoneController::class, 'searchDate'])->name('search.date');
Route::get('/search.name/phones', [PhoneController::class, 'searchName'])->name('search.name');
Route::get('/search.detail/phones', [PhoneController::class, 'searchDetail'])->name('search.name');
Route::get('/export-phones', [PhoneController::class, 'export']);
Route::post('phone-import', [PhoneController::class, 'fileImport'])->name('file-import');

Route::resource('products', ProductController::class);
Route::get('/trash/products', [ProductController::class, 'showTrash'])->name('show.trash');

