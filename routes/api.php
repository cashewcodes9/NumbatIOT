<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::middleware('auth:api')->group(function () {
    Route::middleware('auth:api')->post('/refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::middleware('auth:api')->get('/user', [AuthController::class, 'index'])->name('userIndex');

    //Route::post('/logout', [AuthController::class, 'logout']);
});
