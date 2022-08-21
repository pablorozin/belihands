<?php

use App\Http\Controllers\WebController;
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

Route::controller(WebController::class)->group(function () {
    Route::get('/', 'home')->name('web.home');
    Route::get('/nosotros', 'about_us')->name('web.about_us');
    Route::get('/tienda', 'products')->name('web.products');
    Route::get('/tienda/{slug}', 'product')->name('web.product');
    Route::post('/contacto', 'contact')->name('web.contact');
});
