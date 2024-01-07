<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\ICompanyService;
use App\Models\Company;

/**
 *
 */
class CompanyService implements ICompanyService
{

    public function create(string $title, string $short_title, bool $is_person, string $first_name, string $last_name, string $tax_number, string $identity_number, string $address, int $city_id, int $town_id, int $country_id, int $tax_office_id, string $email, string $phone, string $fax, string $postal_code, string $web_site, string $commercial_register_number, string $mernis_number, bool $e_invoice_status, bool $e_archive_status, bool $e_dispatch_status, bool $e_producer_status, bool $e_voucher_status, string $web_service_username, string $web_service_password, int $integrator_id): ServiceResponse
    {
        Company::create([
            'title' => $title,
            'short_title' => $short_title,
            'is_person' => $is_person,
            'first_name' => $first_name,
            'last_name' => $last_name,
            'tax_number' => $tax_number,
            'identity_number' => $identity_number,
            'address' => $address,
            'city_id' => $city_id,
            'town_id' => $town_id,
            'country_id' => $country_id,
            'tax_office_id' => $tax_office_id,
            'email' => $email,
            'phone' => $phone,
            'fax' => $fax,
            'postal_code' => $postal_code,
            'web_site' => $web_site,
            'commercial_register_number' => $commercial_register_number,
            'mernis_number' => $mernis_number,
            'e_invoice_status' => $e_invoice_status,
            'e_archive_status' => $e_archive_status,
            'e_dispatch_status' => $e_dispatch_status,
            'e_producer_status' => $e_producer_status,
            'e_voucher_status' => $e_voucher_status,
            'web_service_username' => $web_service_username,
            'web_service_password' => $web_service_password,
            'integrator_id' => $integrator_id
        ]);

        return new ServiceResponse(
            true,
            'Company created successfully',
            null,
            200
        );
    }

    public function getAll(): ServiceResponse
    {
        $response = Company::all();
        return new ServiceResponse(
            true,
            'Company listed successfully',
            $response,
            200
        );
    }

    public function getById(int $id): ServiceResponse
    {
        $company = Company::where('id', $id)->first();
        return new ServiceResponse(true, "Company is found", $company, 200);
    }

    public function delete(int $id): ServiceResponse
    {
        $company = Company::where('id', $id)->first();

        return new ServiceResponse(true, "Company is found", $company, 200);
    }
}
