<?php

use App\Http\Controllers\Api\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/user', function () {
        return User::all();
    });
});

Route::post('register', [UserController::class, 'register'])->name('api.user.register');
Route::post('login', [UserController::class, 'login'])->name('api.user.login');
Route::post('forgotPassword', [UserController::class, 'forgotPassword'])->name('api.user.forgotPassword');

