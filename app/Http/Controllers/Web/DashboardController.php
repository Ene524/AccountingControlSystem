<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('modules.dashboard.index.index');
    }

    public function showUserCompanyDashboard()
    {
        $companies = auth()->user()->company;
        return view('modules.dashboard.user-company-dashboard.index.index', compact('companies'));
    }

    public function showCreateCompany()
    {
        return view('modules.dashboard.create-company.index.index');
    }
}
