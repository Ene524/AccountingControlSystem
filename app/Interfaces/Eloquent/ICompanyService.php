<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;

interface ICompanyService extends IEloquentService
{
    public function create(
        string  $title,
        string  $short_title,
        bool    $is_person,
        ?string $first_name,
        ?string $last_name,
        ?string $tax_number,
        ?string $identity_number,
        string  $address,
        string  $city,
        string  $town,
        string  $country,
        string  $tax_office,
        string  $email,
        string  $phone,
        ?string $fax,
        ?string $postal_code,
        ?string $web_site,
        ?string $commercial_register_number,
        ?string $mernis_number,
        ?bool   $e_invoice_status,
        ?bool   $e_archive_status,
        ?bool   $e_dispatch_status,
        ?bool   $e_producer_status,
        ?bool   $e_voucher_status,
        ?string $web_service_username,
        ?string $web_service_password,
        ?int    $integrator_id
    ): ServiceResponse;

    public function update(
        int    $id,
        string $title,
        string $short_title,
        bool   $is_person,
        string $first_name,
        string $last_name,
        string $tax_number,
        string $identity_number,
        string $address,
        int    $city_id,
        int    $town_id,
        int    $country_id,
        int    $tax_office_id,
        string $email,
        string $phone,
        string $fax,
        string $postal_code,
        string $web_site,
        string $commercial_register_number,
        string $mernis_number,
        bool   $e_invoice_status,
        bool   $e_archive_status,
        bool   $e_dispatch_status,
        bool   $e_producer_status,
        bool   $e_voucher_status,
        string $web_service_username,
        string $web_service_password,
        int    $integrator_id): ServiceResponse;
}
