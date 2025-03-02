<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return 'Welcome to MPFIT test project';
});

Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
