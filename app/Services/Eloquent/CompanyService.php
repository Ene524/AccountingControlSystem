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

        return new ServiceResponse(true, 'Firmalar başarılı bir şekilde listelendi', $companies, 200);
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
            if (auth()->user()->company_id == $id) {
                auth()->user()->company_id = null;
                auth()->user()->save();
            }

            //$company->getData()->users()->detach(); Kullanıcılarla ilişkili olan firmaları silmek için
            return new ServiceResponse(true, 'Firma silindi', null, 200);
        }

        return new ServiceResponse(false, 'Firma bulunamadı', null, 404);
    }

    /**
     * @param int $id
     * @return ServiceResponse
     */
    public function getById(int $id): ServiceResponse
    {
        $company = Company::find($id);
        if ($company) {
            return new ServiceResponse(true, 'Firma bulundu', $company, 200);

        } else {
            return new ServiceResponse(false, 'Firma bulunamadı', null, 404);
        }
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
     * @param bool $is_active
     * @return ServiceResponse
     */
    public function create(
        string $title,
        string $short_title,
        bool $is_person,
        ?string $first_name,
        ?string $last_name,
        ?string $tax_number,
        ?string $identity_number,
        string $address,
        string $city,
        string $town,
        string $country,
        string $tax_office,
        string $email,
        string $phone,
        ?string $fax,
        ?string $postal_code,
        ?string $web_site,
        ?string $commercial_register_number,
        ?string $mernis_number,
        ?bool $e_invoice_status,
        ?bool $e_archive_status,
        ?bool $e_dispatch_status,
        ?bool $e_producer_status,
        ?bool $e_voucher_status,
        ?string $web_service_username,
        ?string $web_service_password,
        ?int $integrator_id,
        bool $is_active
    ): ServiceResponse {
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
            'integrator_id' => $integrator_id,
            'is_active' => $is_active,
        ]);

        $user = Auth::user();
        $user->companies()->syncWithoutDetaching($company->id);

        return new ServiceResponse(
            true,
            'Firma başarılı bir şekilde oluşturuldu',
            null,
            200
        );
    }

    /**
     * @param int $id
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
     * @param bool $is_active
     * @return ServiceResponse
     */
    public function update(
        int $id,
        string $title,
        string $short_title,
        bool $is_person,
        ?string $first_name,
        ?string $last_name,
        ?string $tax_number,
        ?string $identity_number,
        string $address,
        string $city,
        string $town,
        string $country,
        string $tax_office,
        string $email,
        string $phone,
        ?string $fax,
        ?string $postal_code,
        ?string $web_site,
        ?string $commercial_register_number,
        ?string $mernis_number,
        ?bool $e_invoice_status,
        ?bool $e_archive_status,
        ?bool $e_dispatch_status,
        ?bool $e_producer_status,
        ?bool $e_voucher_status,
        ?string $web_service_username,
        ?string $web_service_password,
        ?int $integrator_id,
        bool $is_active
    ): ServiceResponse {
        $company = $this->getById($id)->getData();

        if (! $company) {
            return new ServiceResponse(false, 'Firma bulunamadı', null, 404);
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
            $company->is_active = $is_active;
            $company->save();

            return new ServiceResponse(true, 'Firma başarıyla güncellendi', null, 200);
        }
    }
}
