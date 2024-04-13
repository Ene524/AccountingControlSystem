<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\ICompanyService;
use App\Models\Company;
use Illuminate\Support\Facades\Auth;

/**
 *
 */
class CompanyService implements ICompanyService
{
    /**
     * @return ServiceResponse
     */
    public function getAll(): ServiceResponse
    {
        $companies = Company::paginate(100);
        return new ServiceResponse(
            true,
            'Company listed successfully',
            $companies,
            200
        );
    }

    /**
     * @param int $id
     * @return ServiceResponse
     */
    public function delete(int $id): ServiceResponse
    {
        $company = $this->getById($id);
        if ($company->isSuccess()) {
            $company->getData()->delete();
            $company->getData()->users()->detach();
            return new ServiceResponse(true, 'Firma silindi ve kullanıcı bağlantıları koparıldı', null, 200);
        }
        return new ServiceResponse(false, 'Firma bulunamadı', null, 404);
    }

    /**
     * @param int $id
     * @return ServiceResponse
     */
    public function getById(int $id): ServiceResponse
    {
        $company = Company::where('id', $id)->first();
        if (!$company) {
            return new ServiceResponse(false, "Company not found", null, 404);
        }
        return new ServiceResponse(true, "Company is found", $company, 200);
    }


    /**
     * @param string $title
     * @param string $short_title
     * @param bool $is_person
     * @param string|null $first_name
     * @param string|null $last_name
     * @param string|null $tax_number
     * @param string|null $identity_number
     * @param string $address
     * @param string $city
     * @param string $town
     * @param string $country
     * @param string $tax_office
     * @param string $email
     * @param string $phone
     * @param string|null $fax
     * @param string|null $postal_code
     * @param string|null $web_site
     * @param string|null $commercial_register_number
     * @param string|null $mernis_number
     * @param bool|null $e_invoice_status
     * @param bool|null $e_archive_status
     * @param bool|null $e_dispatch_status
     * @param bool|null $e_producer_status
     * @param bool|null $e_voucher_status
     * @param string|null $web_service_username
     * @param string|null $web_service_password
     * @param int|null $integrator_id
     * @return ServiceResponse
     */
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
    ): ServiceResponse
    {
        $company = Company::create([
            'title' => $title,
            'short_title' => $short_title,
            'is_person' => $is_person,
            'first_name' => $first_name ?? '',
            'last_name' => $last_name ?? '',
            'tax_number' => $tax_number ?? '',
            'identity_number' => $identity_number ?? '',
            'address' => $address,
            'city' => $city,
            'town' => $town,
            'country' => $country,
            'tax_office' => $tax_office,
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

        $user = Auth::user();
        $user->companies()->syncWithoutDetaching($company->id);
        return new ServiceResponse(
            true,
            'Company created successfully',
            null,
            200
        );
    }

    /**
     * @param int $id
     * @param string $title
     * @param string $short_title
     * @param bool $is_person
     * @param string $first_name
     * @param string $last_name
     * @param string $tax_number
     * @param string $identity_number
     * @param string $address
     * @param int $city_id
     * @param int $town_id
     * @param int $country_id
     * @param int $tax_office_id
     * @param string $email
     * @param string $phone
     * @param string $fax
     * @param string $postal_code
     * @param string $web_site
     * @param string $commercial_register_number
     * @param string $mernis_number
     * @param bool $e_invoice_status
     * @param bool $e_archive_status
     * @param bool $e_dispatch_status
     * @param bool $e_producer_status
     * @param bool $e_voucher_status
     * @param string $web_service_username
     * @param string $web_service_password
     * @param int $integrator_id
     * @return ServiceResponse
     */
    public function update(
        int     $id,
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
        ?int    $integrator_id): ServiceResponse
    {
        $company = $this->getById($id)->getData();

        if (!$company) {
            return new ServiceResponse(false, "Company not found", null, 404);
        } else {
            $company->title = $title;
            $company->short_title = $short_title;
            $company->is_person = $is_person;
            $company->first_name = $first_name ?? '';
            $company->last_name = $last_name ?? '';
            $company->tax_number = $tax_number ?? '';
            $company->identity_number = $identity_number ?? '';
            $company->address = $address;
            $company->city = $city;
            $company->town = $town;
            $company->country = $country;
            $company->tax_office = $tax_office;
            $company->email = $email;
            $company->phone = $phone;
            $company->fax = $fax;
            $company->postal_code = $postal_code;
            $company->web_site = $web_site;
            $company->commercial_register_number = $commercial_register_number;
            $company->mernis_number = $mernis_number;
            $company->e_invoice_status = $e_invoice_status;
            $company->e_archive_status = $e_archive_status;
            $company->e_dispatch_status = $e_dispatch_status;
            $company->e_producer_status = $e_producer_status;
            $company->e_voucher_status = $e_voucher_status;
            $company->web_service_username = $web_service_username;
            $company->web_service_password = $web_service_password;
            $company->integrator_id = $integrator_id;
            $company->save();
            return new ServiceResponse(
                true,
                'Company updated successfully',
                null,
                200
            );
        }
    }
}
