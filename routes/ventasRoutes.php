<?php


use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ventasController;

Route::get('/ventas', [ventasController::class, 'index']);

Route::post('/ventas', [ventasController::class, 'store']);
