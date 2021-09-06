<?php

use Illuminate\Support\Facades\Route;

/** PRODUCTS API ROUTES **/
Route::apiResource('products', 'Website\Api\ProductController');
Route::apiResource('checkout', 'Website\Api\CheckoutController');
Route::apiResource('cart', 'Website\Api\CartController');
Route::post('cart/delete/', 'Website\Api\CartController@destroy');
/** END PRODUCTS API ROUTES **/
