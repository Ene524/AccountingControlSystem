<?php

namespace App\Http\Controllers\Web;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Interfaces\Eloquent\IDashboardService;
use App\Models\City;
use App\Models\Country;
use App\Models\Integrators;
use App\Models\TaxOffice;
use App\Models\Town;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use HttpResponse;

    private IDashboardService $dashboardService;

    public function __construct(IDashboardService $dashboardService)
    {
        $this->dashboardService = $dashboardService;
    }

    public function index(Request $request)
    {
        return view('modules.dashboard.index.index');
    }

    public function showUserCompanyDashboard()
    {
        $response = $this->dashboardService->showUserCompanyDashboard();
        return view('modules.dashboard.user-company-dashboard.index.index', compact('response'));
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
        $response = $this->dashboardService->selectCompany($request->company_id);
        if ($response->isSuccess()) {
            return redirect()->route('dashboard.index');
        } else {
            return redirect()->route('dashboard.index')->with('error', $response->getMessage());
        }
    }
}
