<?php

namespace App\Services\Eloquent;

use App\Core\ServiceResponse;
use App\Interfaces\Eloquent\ICustomerService;
use App\Models\Customer;

class CustomerService implements ICustomerService
{

    /**
     * @param int $company_id
     * @param string $code
     * @param string $title
     * @param string|null $first_name
     * @param string|null $last_name
     * @param bool $is_person
     * @param string|null $tax_number
     * @param string|null $identity_number
     * @param string|null $phone
     * @param string|null $fax
     * @param string|null $mobile_phone
     * @param string|null $web_site
     * @param string|null $email
     * @param string|null $address
     * @param string|null $city
     * @param string|null $town
     * @param string|null $country
     * @param string|null $tax_office
     * @param string|null $postal_code
     * @param string|null $specode1
     * @param string|null $specode2
     * @param string|null $specode3
     * @param string|null $note
     * @param bool $is_active
     * @return ServiceResponse
     */
    public function create(
        int     $company_id,
        string  $code,
        string  $title,
        ?string $first_name,
        ?string $last_name,
        bool    $is_person,
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
        bool    $is_active
    ): ServiceResponse
    {
        $customer = Customer::create([
            'company_id' => $company_id,
            'code' => $code,
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
     * @return ServiceResponse
     */
    public function getAll(): ServiceResponse
    {
        $customers = Customer::where('company_id', auth()->user()->company_id)->get();
        return new ServiceResponse(true, "Müşteriler getirildi", $customers, 200);
    }
    /**
     * @param int $id
     * @return ServiceResponse
     */
    public function delete(int $id): ServiceResponse
    {
        $customer = $this->getById($id)->getData();
        if (!$customer) {
            return new ServiceResponse(false, "Müşteri bulunamadı", null, 404);
        } else {
            $customer->delete();
            return new ServiceResponse(true, "Müşteri silindi", null, 200);
        }
    }

    /**
     * @param int $id
     * @param string $code
     * @param string $title
     * @param string|null $first_name
     * @param string|null $last_name
     * @param bool $is_person
     * @param string|null $tax_number
     * @param string|null $identity_number
     * @param string|null $phone
     * @param string|null $fax
     * @param string|null $mobile_phone
     * @param string|null $web_site
     * @param string|null $email
     * @param string|null $address
     * @param string|null $city
     * @param string|null $town
     * @param string|null $country
     * @param string|null $tax_office
     * @param string|null $postal_code
     * @param string|null $specode1
     * @param string|null $specode2
     * @param string|null $specode3
     * @param string|null $note
     * @param bool $is_active
     * @return ServiceResponse
     */
    public function update(
        int     $id,
        string  $code,
        string  $title,
        ?string $first_name,
        ?string $last_name,
        bool    $is_person,
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
        bool    $is_active): ServiceResponse
    {
        $customer = $this->getById($id)->getData();
        if (!$customer) {
            return new ServiceResponse(false, "Müşteri bulunamadı", null, 404);
        } else {
            $customer->code = $code;
            $customer->title = $title;
            $customer->first_name = $first_name;
            $customer->last_name = $last_name;
            $customer->is_person = $is_person;
            $customer->tax_number = $tax_number;
            $customer->identity_number = $identity_number;
            $customer->phone = $phone;
            $customer->fax = $fax;
            $customer->mobile_phone = $mobile_phone;
            $customer->web_site = $web_site;
            $customer->email = $email;
            $customer->address = $address;
            $customer->city = $city;
            $customer->town = $town;
            $customer->country = $country;
            $customer->tax_office = $tax_office;
            $customer->postal_code = $postal_code;
            $customer->specode1 = $specode1;
            $customer->specode2 = $specode2;
            $customer->specode3 = $specode3;
            $customer->note = $note;
            $customer->is_active = $is_active;
            $customer->save();
            return new ServiceResponse(true, "Müşteri güncellendi", $customer, 200);
        }
    }

    /**
     * @param int $id
     * @return ServiceResponse
     */
    public function getById(int $id): ServiceResponse
    {
        $customer = Customer::find($id);
        if ($customer) {
            return new ServiceResponse(true, "Müşteri bulundu", $customer, 200);
        } else {
            return new ServiceResponse(false, "Müşteri bulunamadı", null, 404);
        }
    }
}
