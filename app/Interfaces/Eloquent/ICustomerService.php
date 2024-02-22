<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;

interface ICustomerService extends IEloquentService
{
    public function create(
        int    $company_id,
        string $customer_code,
        string $title,
        string $first_name,
        string $last_name,
        bool   $is_person,
        int    $type,
        string $tax_number,
        int    $tax_office_id,
        string $identity_number,
        string $phone,
        string $fax,
        string $mobile_phone,
        string $web_site,
        string $email,
        string $address,
        int    $city_id,
        int    $country_id,
        string $postal_code,
        string $specode1,
        string $specode2,
        string $specode3,

    ): ServiceResponse;
}
