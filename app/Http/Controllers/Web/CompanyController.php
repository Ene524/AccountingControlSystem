<?php

namespace App\Http\Controllers\Web;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\CompanyController\CreateRequest;
use App\Http\Requests\Web\CompanyController\UpdateRequest;
use App\Http\Requests\Web\Eloquent\DeleteRequest;
use App\Http\Requests\Web\Eloquent\GetByIdRequest;
use App\Interfaces\Eloquent\ICommonService;
use App\Interfaces\Eloquent\ICompanyService;
use App\Models\City;
use App\Models\Country;
use App\Models\Integrators;
use App\Models\TaxOffice;
use App\Models\Town;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    use HttpResponse;

    private ICompanyService $companyService;
    private ICommonService $commonService;

    public function __construct(ICompanyService $companyService, ICommonService $commonService)
    {
        $this->companyService = $companyService;
        $this->commonService = $commonService;
    }

    public function create()
    {
        $countries = $this->commonService->getCountries();
        $cities = $this->commonService->getCities();
        $towns = $this->commonService->getTowns();
        $taxOffices = $this->commonService->getTaxOffices();
        $integrators = $this->commonService->getIntegrators();
        return view('modules.dashboard.create-update-company.index.index', compact('countries', 'cities', 'towns', 'taxOffices', 'integrators'));
    }
    public function store(CreateRequest $request)
    {

        $response = $this->companyService->create(
            title: $request->title,
            short_title: $request->short_title,
            is_person: $request->is_person,
            first_name: $request->first_name,
            last_name: $request->last_name,
            tax_number: $request->tax_number,
            identity_number: $request->identity_number,
            address: $request->address,
            city: $request->city,
            town: $request->town,
            country: $request->country,
            tax_office: $request->tax_office,
            email: $request->email,
            phone: $request->phone,
            fax: $request->fax,
            postal_code: $request->postal_code,
            web_site: $request->web_site,
            commercial_register_number: $request->commercial_register_number,
            mernis_number: $request->mernis_number,
            e_invoice_status: $request->e_invoice_status,
            e_archive_status: $request->e_archive_status,
            e_dispatch_status: $request->e_dispatch_status,
            e_producer_status: $request->e_producer_status,
            e_voucher_status: $request->e_voucher_status,
            web_service_username: $request->web_service_username,
            web_service_password: $request->web_service_password,
            integrator_id: $request->integrator_id,
            is_active: $request->is_active
        );
        return redirect()->route("dashboard.showUserCompanyDashboard")->with('success', $response->getMessage());
    }

    public function update(UpdateRequest $request)
    {
        $response = $this->companyService->update(
            id: $request->id,
            title: $request->title,
            short_title: $request->short_title,
            is_person: $request->is_person,
            first_name: $request->first_name,
            last_name: $request->last_name,
            tax_number: $request->tax_number,
            identity_number: $request->identity_number,
            address: $request->address,
            city: $request->city,
            town: $request->town,
            country: $request->country,
            tax_office: $request->tax_office,
            email: $request->email,
            phone: $request->phone,
            fax: $request->fax,
            postal_code: $request->postal_code,
            web_site: $request->web_site,
            commercial_register_number: $request->commercial_register_number,
            mernis_number: $request->mernis_number,
            e_invoice_status: $request->e_invoice_status,
            e_archive_status: $request->e_archive_status,
            e_dispatch_status: $request->e_dispatch_status,
            e_producer_status: $request->e_producer_status,
            e_voucher_status: $request->e_voucher_status,
            web_service_username: $request->web_service_username,
            web_service_password: $request->web_service_password,
            integrator_id: $request->integrator_id,
            is_active: $request->is_active
        );


        if ($response->isSuccess()) {
            return redirect()->route('dashboard.showUserCompanyDashboard')->with('success', $response->getMessage());
        } else {
            return redirect()->route('dashboard.showUserCompanyDashboard')->with('error', $response->getMessage());
        }
    }

    public function edit($id)
    {
        $response = $this->companyService->getById($id);
        $countries = $this->commonService->getCountries();
        $cities = $this->commonService->getCities();
        $towns = $this->commonService->getTowns();
        $taxOffices = $this->commonService->getTaxOffices();
        $integrators = $this->commonService->getIntegrators();
        return view('modules.dashboard.create-update-company.index.index', compact('response', 'countries', 'cities', 'towns', 'taxOffices', 'integrators'));
    }

    public function getAll()
    {
        $response = $this->companyService->getAll();


        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }

    public function getById(GetByIdRequest $id)
    {
        $response = $this->companyService->getById($id);

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }

    public function delete(DeleteRequest $request)
    {
        $response = $this->companyService->delete($request->id);

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }
}
