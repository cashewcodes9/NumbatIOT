<?php

use Illuminate\Support\Facades\Route;

Route::post('/register', 'AuthController@register');
Route::post('/login', 'AuthController@login');

#Route::post('/refresh', 'AuthController@refresh');
Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'AuthController@logout');
});
