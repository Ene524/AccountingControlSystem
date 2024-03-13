<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('modules.dashboard.index.index');
    }

    public function userCompanyDashboard(){
        $company = auth()->user()->company;
        return view('modules.dashboard.user-company-dashboard.index.index', compact('company'));
    }
}
