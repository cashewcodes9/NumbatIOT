<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DeviceController;
use Illuminate\Support\Facades\Route;

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Testing without authentication routes //TODO: remove this
//Route::get('/devices', [DeviceController::class, 'index'])->name('devices');
//Route::get('/users/{id}/devices', [DeviceController::class, 'getUserDevices']);
//Route::get('user/devices', [DeviceController::class, 'getUserDevices'])->name('userDevices');

Route::middleware('auth:api')->group(function () {
    Route::post('/refresh', [AuthController::class, 'refresh'])->name('refresh');
    Route::get('/user', [AuthController::class, 'index'])->name('userIndex');
    Route::get('user/devices', [DeviceController::class, 'getUserDevices'])->name('userDevices');
    Route::get('/device/{id}', [DeviceController::class, 'show'])->name('deviceShow');
});
