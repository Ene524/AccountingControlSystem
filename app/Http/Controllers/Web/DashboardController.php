<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Integrators;
use App\Models\Subdivision;
use App\Models\TaxOffice;

class DashboardController extends Controller
{
    public function index()
    {
        return view('modules.dashboard.index.index');
    }

    public function showUserCompanyDashboard()
    {
        $companies = auth()->user()->company()->get();
        return view('modules.dashboard.user-company-dashboard.index.index', compact('companies'));
    }

    public function showCreateCompany()
    {
        $countries = Country::all();
        $cities = City::all();
        $subdivisions = Subdivision::all();
        $taxOffices = TaxOffice::all();
        $integrators = Integrators::all();

        return view('modules.dashboard.create-company.index.index', compact('countries', 'cities', 'subdivisions', 'taxOffices', 'integrators'));
    }
}
