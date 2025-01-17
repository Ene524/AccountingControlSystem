<?php

namespace App\Http\Controllers\Web;

use App\Core\HttpResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Web\CustomerController\CreateRequest;
use App\Interfaces\Eloquent\ICustomerService;

class CustomerController extends Controller
{
    use HttpResponse;

    private ICustomerService $customerService;
    public function __construct(ICustomerService $customerService)
    {
        $this->customerService = $customerService;
    }
    public function index()
    {
        return view('modules.customer.index.index');
    }
    public function getCustomers()
    {
        $response = $this->customerService->getAll();

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }
    public function create()
    {
        return view('modules.customer.create.index');
    }
    public function store(CreateRequest $request)
    {
        $response = $this->customerService->create(
            company_id: auth()->user()->company_id,
            code: $request->code,
            title: $request->title,
            first_name: $request->first_name,
            last_name: $request->last_name,
            is_person: $request->is_person,
            tax_number: $request->tax_number,
            identity_number: $request->identity_number,
            phone: $request->phone,
            fax: $request->fax,
            mobile_phone: $request->mobile_phone,
            web_site: $request->web_site,
            email: $request->email,
            address: $request->address,
            city: $request->city,
            town: $request->town,
            country: $request->country,
            tax_office: $request->tax_office,
            postal_code: $request->postal_code,
            specode1: $request->specode1,
            specode2: $request->specode2,
            specode3: $request->specode3,
            note: $request->note,
            is_active: $request->is_active
        );

        if ($response->isSuccess()) {
            return redirect()->route('customer.index')->with('success', $response->getMessage());
        } else {
            return redirect()->route('customer.create')->with('error', $response->getMessage());
        }
    }
    public function edit($id)
    {
        $response = $this->customerService->getById($id);

        if ($response->isSuccess()) {
            return view('modules.customer.edit.index', compact('response'));
        } else {
            return view('modules.customer.index.index', compact('response'))->with('error', $response->getMessage());
        }
    }
    public function update(CreateRequest $request)
    {
        $response = $this->customerService->update(
            id: $request->id,
            code: $request->code,
            title: $request->title,
            first_name: $request->first_name,
            last_name: $request->last_name,
            is_person: $request->is_person,
            tax_number: $request->tax_number,
            identity_number: $request->identity_number,
            phone: $request->phone,
            fax: $request->fax,
            mobile_phone: $request->mobile_phone,
            web_site: $request->web_site,
            email: $request->email,
            address: $request->address,
            city: $request->city,
            town: $request->town,
            country: $request->country,
            tax_office: $request->tax_office,
            postal_code: $request->postal_code,
            specode1: $request->specode1,
            specode2: $request->specode2,
            specode3: $request->specode3,
            note: $request->note,
            is_active: $request->is_active
        );

        if ($response->isSuccess()) {
            return redirect()->route('customer.index')->with('success', $response->getMessage());
        } else {
            return redirect()->route('customer.edit', $request->id)->with('error', $response->getMessage());
        }
    }
    public function delete()
    {
        $response = $this->customerService->delete(request()->id);

        return $this->httpResponse(
            $response->isSuccess(),
            $response->getMessage(),
            $response->getData(),
            $response->getStatusCode()
        );
    }
}
