<?php

namespace App\Providers;

use App\Interfaces\Eloquent\ICommonService;
use App\Interfaces\Eloquent\ICompanyService;
use App\Interfaces\Eloquent\ICustomerService;
use App\Interfaces\Eloquent\IDashboardService;
use App\Interfaces\Eloquent\IProductService;
use App\Interfaces\Eloquent\IUserCompanyConnectService;
use App\Interfaces\Eloquent\IUserService;
use App\Services\Eloquent\CommonService;
use App\Services\Eloquent\CompanyService;
use App\Services\Eloquent\CustomerService;
use App\Services\Eloquent\DashboardService;
use App\Services\Eloquent\ProductService;
use App\Services\Eloquent\UserCompanyConnectService;
use App\Services\Eloquent\UserService;
use Illuminate\Support\ServiceProvider;

class InterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(ICompanyService::class, CompanyService::class);
        $this->app->bind(IUserCompanyConnectService::class, UserCompanyConnectService::class);
        $this->app->bind(IDashboardService::class, DashboardService::class);
        $this->app->bind(ICustomerService::class, CustomerService::class);
        $this->app->bind(IProductService::class, ProductService::class);
        $this->app->bind(ICommonService::class, CommonService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
