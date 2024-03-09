<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Core\HttpResponse;
use App\Http\Requests\Web\CompanyController\CreateRequest;
use App\Http\Requests\Web\CompanyController\UpdateRequest;
use App\Http\Requests\Web\Eloquent\DeleteRequest;
use App\Http\Requests\Web\Eloquent\GetByIdRequest;
use App\Interfaces\Eloquent\ICompanyService;

class CompanyController extends Controller
{
    use HttpResponse;

    private ICompanyService $companyService;

    public function __construct(ICompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function create(CreateRequest $request)
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
            city_id: $request->city_id,
            town_id: $request->town_id,
            country_id: $request->country_id,
            tax_office_id: $request->tax_office_id,
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
            integrator_id: $request->integrator_id
        );

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }

    public function update(UpdateRequest $request){
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
            city_id: $request->city_id,
            town_id: $request->town_id,
            country_id: $request->country_id,
            tax_office_id: $request->tax_office_id,
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
            integrator_id: $request->integrator_id
        );

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
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

    public function getById(GetByIdRequest $request)
    {
        $response = $this->companyService->getById($request->Id);

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }

    public function delete(DeleteRequest $request)
    {
        $response = $this->companyService->delete($request->Id);

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }


}
