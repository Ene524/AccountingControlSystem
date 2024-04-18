<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\ICustomerService;
use App\Models\Customer;

class CustomerService implements ICustomerService
{

    public function create(int $company_id, string $customer_code, string $title, string $first_name, string $last_name, bool $is_person, string $tax_number, string $identity_number, string $phone, string $fax, string $mobile_phone, string $web_site, string $email, string $address, string $city, string $town, string $country, string $tax_office, string $postalCode, string $specode1, string $specode2, string $specode3, string $note, bool $is_active): ServiceResponse
    {
        // TODO: Implement create() method.
    }

    /**
     * @inheritDoc
     */
    public function getAll(): ServiceResponse
    {
        $customers = Customer::all();
        return new ServiceResponse(true, "Müşteriler getirildi", $customers, 200);
    }

    /**
     * @inheritDoc
     */
    public function getById(int $id): ServiceResponse
    {
        // TODO: Implement getById() method.
    }

    /**
     * @inheritDoc
     */
    public function delete(int $id): ServiceResponse
    {
        // TODO: Implement delete() method.
    }
}
