<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CompanyUserConnectController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::prefix('user')->group(function () {
        Route::delete('delete', [UserController::class, 'delete'])->name('user.delete');
        Route::get('getAll', [UserController::class, 'getAll'])->name('user.getAll');
        Route::get('findByEmail', [UserController::class, 'findByEmail'])->name('user.findByEmail');
        Route::post('getById', [UserController::class, 'getById'])->name('user.getById');
        //Route::post('updatePassword', [UserController::class, 'updatePassword'])->name('password.update');
    });

    Route::prefix('userCompanyConnect')->group(function () {
        Route::post('create', [CompanyUserConnectController::class, 'create'])->name('api.companyUserConnect.create');
        //Route::get('getAll', [CompanyUserConnectController::class, 'getAll'])->name('api.companyUserConnect.getAll');
        //Route::get('getById/{id}', [CompanyUserConnectController::class, 'getById'])->name('api.companyUserConnect.getById');
        //Route::delete('delete/{id}', [CompanyUserConnectController::class, 'delete'])->name('api.companyUserConnect.delete');
    });
    Route::prefix('company')->group(function () {
        Route::post('create', [CompanyController::class, 'create'])->name('api.company.create');
        //Route::get('getAll', [CompanyController::class, 'getAll'])->name('api.company.getAll');
        //Route::get('getById/{id}', [CompanyController::class, 'getById'])->name('api.company.getById');
        //Route::delete('delete/{id}', [CompanyController::class, 'delete'])->name('api.company.delete');
    });

});


Route::prefix('user')->group(function () {
    Route::post('register', [UserController::class, 'register'])->name('user.register');
    Route::post('login', [UserController::class, 'login'])->name('user.login');
    Route::post('forgotPassword', [UserController::class, 'forgotPassword'])->name('password.forgot');
    Route::post('resetPassword/{token}', [UserController::class, 'resetPassword'])->name('password.reset');
});



