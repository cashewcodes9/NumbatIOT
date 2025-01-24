<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/devices', [DeviceController::class, 'index'])->name('devices');
Route::middleware('auth:api')->group(function () {
    Route::post('/refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::get('/user', [AuthController::class, 'index'])->name('userIndex');

    //Route::post('/logout', [AuthController::class, 'logout']);
});
