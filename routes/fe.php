<?php

use Illuminate\Support\Facades\Route;

Route::get('/product/list', [\App\Http\Controllers\ProductController::class, 'list'])
    ->name('product.list');

Route::get('/add-to-cart/{id}', [\App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.add');

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'list',
]);
