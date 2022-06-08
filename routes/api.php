<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductoController;

Route::get('/productos', [ProductoController::class, 'listAll']);
Route::get('/productos/{id}', [ProductoController::class, 'findById']);
Route::post('/productos', [ProductoController::class, 'create']);
Route::put('/productos/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/{id}', [ProductoController::class, 'delete']);