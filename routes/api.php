<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    ProductController,
    BrandController,
    CategoryController,
    SupplierController
};

Route::group(['middleware' => ['jwt.verify']], function () {

    Route::get('/product', [ProductController::class, 'listAll']);
    Route::get('/product/{id}', [ProductController::class, 'findById']);
    Route::post('/product', [ProductController::class, 'create']);
    Route::put('/product/{id}', [ProductController::class, 'update']);
    Route::delete('/product/{id}', [ProductController::class, 'delete']);
    
    Route::get('/brand', [BrandController::class, 'listAll']);
    Route::get('/brand/{id}', [BrandController::class, 'findById']);
    Route::post('/brand', [BrandController::class, 'create']);
    Route::put('/brand/{id}', [BrandController::class, 'update']);
    Route::delete('/brand/{id}', [BrandController::class, 'delete']);
    
    Route::get('/category', [CategoryController::class, 'listAll']);
    Route::get('/category/{id}', [CategoryController::class, 'findById']);
    Route::post('/category', [CategoryController::class, 'create']);
    Route::put('/category/{id}', [CategoryController::class, 'update']);
    Route::delete('/category/{id}', [CategoryController::class, 'delete']);
    
    Route::get('/supplier', [SupplierController::class, 'listAll']);
    Route::get('/supplier/{id}', [SupplierController::class, 'findById']);
    Route::post('/supplier', [SupplierController::class, 'create']);
    Route::put('/supplier/{id}', [SupplierController::class, 'update']);
    Route::delete('/supplier/{id}', [SupplierController::class, 'delete']);

});
