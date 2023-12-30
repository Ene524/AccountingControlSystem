<?php

namespace App\Providers;

use App\Interfaces\Eloquent\ICompanyService;
use App\Interfaces\Eloquent\IUserService;
use App\Services\Eloquent\CompanyService;
use App\Services\Eloquent\UserService;
use Illuminate\Support\ServiceProvider;

class InterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IUserService::class,UserService::class);
        $this->app->bind(ICompanyService::class,CompanyService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
