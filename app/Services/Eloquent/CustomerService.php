<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\ICustomerService;
use App\Models\Customer;

class CustomerService implements ICustomerService
{

    public function create(
        int    $company_id,
        string $customer_code,
        string $title,
        ?string $first_name,
        ?string $last_name,
        bool   $is_person,
        ?string $tax_number,
        ?string $identity_number,
        ?string $phone,
        ?string $fax,
        ?string $mobile_phone,
        ?string $web_site,
        ?string $email,
        ?string $address,
        ?string $city,
        ?string $town,
        ?string $country,
        ?string $tax_office,
        ?string $postal_code,
        ?string $specode1,
        ?string $specode2,
        ?string $specode3,
        ?string $note,
        bool   $is_active
    ): ServiceResponse {
        $customer = Customer::create([
            'company_id' => $company_id,
            'customer_code' => $customer_code,
            'title' => $title,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'is_person' => $is_person,
            'tax_number' => $tax_number,
            'identity_number' => $identity_number,
            'phone' => $phone,
            'fax' => $fax,
            'mobile_phone' => $mobile_phone,
            'web_site' => $web_site,
            'email' => $email,
            'address' => $address,
            'city' => $city,
            'town' => $town,
            'country' => $country,
            'tax_office' => $tax_office,
            'postal_code' => $postal_code,
            'specode1' => $specode1,
            'specode2' => $specode2,
            'specode3' => $specode3,
            'note' => $note,
            'is_active' => $is_active
        ]);

        return new ServiceResponse(true, "Müşteri oluşturuldu", $customer, 201);
    }

    /**
     * @inheritDoc
     */
    public function getAll(): ServiceResponse
    {
        $customers = Customer::where('company_id', auth()->user()->company_id)->get();
        return new ServiceResponse(true, "Müşteriler getirildi", $customers, 200);
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): ServiceResponse
    {

    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): ServiceResponse
    {
        // TODO: Implement delete() method.
    }
}
