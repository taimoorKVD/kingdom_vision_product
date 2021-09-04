<?php

use Illuminate\Support\Facades\Route;

/** PRODUCTS API ROUTES **/
Route::apiResource('products', 'Website\Api\ProductController');
Route::apiResource('checkout', 'Website\Api\CheckoutController');
/** END PRODUCTS API ROUTES **/
