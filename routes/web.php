<?php

use App\Http\Controllers\Web\CommonController;
use App\Http\Controllers\Web\CompanyController;
use App\Http\Controllers\Web\CompanyUserConnectController;
use App\Http\Controllers\Web\DashboardController;
use App\Http\Controllers\Web\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware(["auth", "checkVerified"])->group(function () {
    Route::prefix('user')->group(function () {
        Route::delete('delete', [UserController::class, 'delete'])->name('user.delete');
        Route::get('getAll', [UserController::class, 'getAll'])->name('user.getAll');
        Route::get('findByEmail', [UserController::class, 'findByEmail'])->name('user.findByEmail');
        Route::post('getById', [UserController::class, 'getById'])->name('user.getById');
        Route::post('updatePassword', [UserController::class, 'updatePassword'])->name('password.update');
        Route::delete('delete', [UserController::class, 'delete'])->name('user.delete');

    });
    Route::prefix('userCompanyConnect')->group(function () {
        Route::post('create', [CompanyUserConnectController::class, 'create'])->name('companyUserConnect.create');
        Route::post('delete', [CompanyUserConnectController::class, 'delete'])->name('companyUserConnect.delete');
    });
    Route::prefix('company')->group(function () {
        Route::post('create', [CompanyController::class, 'create'])->name('company.create');
        Route::post('update', [CompanyController::class, 'update'])->name('company.update');
        Route::get('getAll', [CompanyController::class, 'getAll'])->name('company.getAll');
        Route::get('getById', [CompanyController::class, 'getById'])->name('company.getById');
        Route::delete('delete', [CompanyController::class, 'delete'])->name('company.delete');
    });
    Route::prefix('dashboard')->group(function () {
        Route::get('index', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('userCompanyDashboard', [DashboardController::class, 'showUserCompanyDashboard'])->name('dashboard.showUserCompanyDashboard');
        Route::get('createCompany', [DashboardController::class, 'showCreateCompany'])->name('dashboard.showCreateCompany');
    });
    Route::prefix('common')->group(function () {
        Route::get('getCountries', [CommonController::class, 'getCountries'])->name('common.getCountries');
        Route::get('getCitiesByCountryId', [CommonController::class, 'getCitiesByCountryId'])->name('common.getCitiesByCountryId');
    });
});

#region Public Routes
Route::get('register', [UserController::class, 'showRegister'])->name('user.showRegister');
Route::post('register', [UserController::class, 'register'])->name('user.register');
Route::get('email/verify/{token}', [UserController::class, 'verifyEmail'])->name('verification.verify');
Route::get('showResendEmail', [UserController::class, 'showResendEmail'])->name('verification.notice');
Route::post('resendEmail', [UserController::class, 'resendEmail'])->name('verification.resend');


Route::get('/', [UserController::class, 'showLogin'])->name('user.showLogin');
Route::post('login', [UserController::class, 'login'])->name('user.login');

Route::get('logout', [UserController::class, 'logout'])->name('user.logout');

Route::get('forgotPassword', [UserController::class, 'showForgotPassword'])->name('password.showForgotPassword');
Route::post('forgotPassword', [UserController::class, 'forgotPassword'])->name('password.forgotPassword');

Route::get('resetPassword/{token}', [UserController::class, 'showPasswordResetToken'])->name('password.showResetToken');
Route::get('resetPassword', [UserController::class, 'showPasswordReset'])->name('password.resetShow');
Route::post('resetPassword', [UserController::class, 'sendPasswordReset'])->name('password.reset');
#endregion
