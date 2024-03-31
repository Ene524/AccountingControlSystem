<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use App\Models\Integrators;
use App\Models\TaxOffice;
use App\Models\Town;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        //$company= Auth::user()->companies()->where('id', $request->company_id)->first();
        //dd($company);
        return view('modules.dashboard.index.index');
    }

    public function showUserCompanyDashboard()
    {
        $companies = auth()->user()->companies()->get();
        return view('modules.dashboard.user-company-dashboard.index.index', compact('companies'));
    }

    public function showCreateCompany()
    {
        $countries = Country::all();
        $cities = City::all();
        $towns = Town::all();
        $taxOffices = TaxOffice::all();
        $integrators = Integrators::all();

        return view('modules.dashboard.create-company.index.index', compact('countries', 'cities', 'towns', 'taxOffices', 'integrators'));
    }

    public function selectCompany(Request $request)
    {
        $user=auth()->user();
        $user->company_id=$request->company_id;
        $user->save();
        return redirect()->route('dashboard.index');
    }
}
