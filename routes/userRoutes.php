<?php

use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/usuarios', [userController::class, 'index']);

Route::get('/usuarios/{id}', [userController::class, 'show']);

Route::post('/usuarios', [userController::class, 'store']);

Route::put('/usuarios/{id}', [userController::class, 'update']);

Route::delete('/usuarios/{id}', [userController::class, 'destroy']);
