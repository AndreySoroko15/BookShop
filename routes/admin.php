<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductParentController;
use App\Http\Controllers\Admin\ParamController;
use App\Http\Controllers\Admin\CategoryController;

Route::group(['prefix' => 'admin', 'middleware' => ['auth', IsAdminMiddleware::class]], function () {
    Route::resource('products', ProductController::class);
    Route::resource('product-parents', ProductParentController::class)
        ->parameters(['product-parents' => 'productParents']);
    Route::resource('params', ParamController::class);
    Route::resource('categories', CategoryController::class);
});
