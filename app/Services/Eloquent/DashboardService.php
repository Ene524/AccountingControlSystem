<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\IDashboardService;
use Illuminate\Support\Facades\Auth;

class DashboardService implements IDashboardService
{

    public function showUserCompanyDashboard(): ServiceResponse
    {
        $companies = Auth::user()->companies()->get();
        if ($companies->isEmpty()) {
            return new ServiceResponse(false, 'Kullanıcıya ait firma bulunamadı', null, 404);
        } else {
            return new ServiceResponse(true, 'Kullanıcı firmaları getirildi', $companies, 200);
        }
    }

    public function selectCompany(int $company_id): ServiceResponse
    {
        if ($company_id == null) {
            return new ServiceResponse(false, 'Firma seçilmedi', null, 404);
        } else {
            $user = Auth::user();
            $user->company_id = $company_id;
            $user->save();
            return new ServiceResponse(true, 'Firma seçildi', null, 200);
        }
    }
}