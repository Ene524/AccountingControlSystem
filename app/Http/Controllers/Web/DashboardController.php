<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('modules.dashboard.index.index');
    }

    public function userCompanyDashboard()
    {
        $companies = auth()->user()->company;
        //dd($companies);
        return view('modules.dashboard.user-company-dashboard.index.index', compact('companies'));
    }
}
