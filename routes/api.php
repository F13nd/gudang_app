<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\TransactionController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('monthly_transaction', [TransactionController::class, 'monthlyTransaction']);
Route::get('average_product_entry', [TransactionController::class, 'averageProductEntry']);

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('profile', [AuthController::class, 'profile']);

    Route::get('product', [ProductController::class, 'index']);

    Route::group(['middleware' => 'role:supplier'], function(){
        Route::post('product', [ProductController::class, 'store']);
    });

    Route::group(['middleware' => 'role:distributor'], function(){
        Route::post('product/take', [ProductController::class, 'take']);
    });
});