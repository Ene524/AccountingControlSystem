<?php

use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\CompanyUserConnectController;
use App\Http\Controllers\Api\UserController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::prefix('company')->group(function () {
        Route::get('create', [CompanyController::class, 'create'])->name('api.company.create');
        //Route::get('getAll', [CompanyController::class, 'getAll'])->name('api.company.getAll');
        //Route::get('getById/{id}', [CompanyController::class, 'getById'])->name('api.company.getById');
        //Route::delete('delete/{id}', [CompanyController::class, 'delete'])->name('api.company.delete');
    });

    Route::post('connectCompanyUser', [CompanyUserConnectController::class, 'connectCompanyUser'])->name('api.company.connectCompanyUser');


    #region User Test
    Route::get('/user', function () {
        return User::all();
    });
    #endregion
});

Route::post('register', [UserController::class, 'register'])->name('api.user.register');
Route::post('login', [UserController::class, 'login'])->name('api.user.login');
Route::post('forgotPassword', [UserController::class, 'forgotPassword'])->name('password.forgot');
Route::post('resetPassword/{token}', [UserController::class, 'resetPassword'])->name('password.reset');
