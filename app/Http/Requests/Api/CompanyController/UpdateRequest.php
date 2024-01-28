<?php

namespace App\Http\Requests\Api\CompanyController;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'Id' => 'required|integer',
            'title' => 'required|string',
            'short_title' => 'required|string',
            'is_person' => 'required|boolean',
            'first_name' => $this->is_person ? 'required|string|max:255' : '',
            'last_name' => $this->is_person ? 'required|string|max:255' : '',
            'tax_number' => $this->is_person ? '' : 'required|max:10',
            'identity_number' => $this->is_person ? 'required|max:11':'',
            'address' => 'required|string',
            'city_id' => 'required|integer',
            'town_id' => 'required|integer',
            'country_id' => 'required|integer',
            'tax_office_id' => 'required|integer',
            'email' => 'required|string',
            'phone' => 'required|string',
            'fax' => 'required|string',
            'postal_code' => 'required|string',
            'web_site' => 'required|string',
            'commercial_register_number' => 'required|string',
            'mernis_number' => 'required|string',
            'e_invoice_status' => 'required|boolean',
            'e_archive_status' => 'required|boolean',
            'e_dispatch_status' => 'required|boolean',
            'e_producer_status' => 'required|boolean',
            'e_voucher_status' => 'required|boolean',
            'web_service_username' => 'required|string',
            'web_service_password' => 'required|string',
            'integrator_id' => 'required|integer',
        ];
    }
}
