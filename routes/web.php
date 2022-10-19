<?php

use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Artisan;

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

/*
Route::get('/duplicate/2', function() {
    Product::query()
        ->where('product_type_id', 3)
        ->where('product_category_id', 1)
        ->get()
        ->each(function ($product) {
            $slug = Product::max('id') . '-' . str($product->name)->slug;

            Product::create([
                'is_active' => $product->is_active,
                'product_type_id' => 2,
                'product_category_id' => $product->product_category_id,
                'slug' => $slug,
                'name' => $product->name,
                'code' => 'C'.substr($product->code,1),
                'description' => str($product->description)->replace('Vinilo autoadhesivo troquelado', 'Vinilo con imán troquelado'),
                'keywords' => $product->keywords,
                'image' => $product->image,
                'is_new' => 0,
                'is_bestseller' => 0,
                'offer_price' => null,
            ]);
        });
});
*/