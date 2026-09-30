<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return redirect()->route('products.index');
});


Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/create', [ProductController::class, 'create'])
    ->name('products.create');

Route::post('/products', [ProductController::class, 'store'])
    ->name('products.store');

Route::get('/products/{id}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/products/featured', [ProductController::class, 'featured'])
    ->name('products.featured');

Route::get('/products/filter/{stock?}', [ProductController::class, 'filter'])
    ->name('products.filter');
