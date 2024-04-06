<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;

interface IDashboardService
{
    public function showUserCompanyDashboard(): ServiceResponse;

    public function selectCompany(int $company_id): ServiceResponse;
}