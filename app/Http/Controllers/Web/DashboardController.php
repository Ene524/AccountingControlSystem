<?php

namespace App\Http\Controllers\Web;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Interfaces\Eloquent\ICompanyService;
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
    private ICompanyService $companyService;

    public function __construct(IDashboardService $dashboardService,ICompanyService $companyService)
    {
        $this->dashboardService = $dashboardService;
        $this->companyService = $companyService;
    }

    public function index()
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

        return view('modules.dashboard.create-update-company.index.index', compact('countries', 'cities', 'towns', 'taxOffices', 'integrators'));
    }

    public function selectCompany(Request $request)
    {
        $response = $this->dashboardService->selectCompany($request->company_id);

        if ($response->isSuccess()) {
            return redirect()->route('dashboard.index')->with('success', $response->getMessage());
        } else {
            return redirect()->route('dashboard.showUserCompanyDashboard')->with('error', $response->getMessage());
        }
    }
}
