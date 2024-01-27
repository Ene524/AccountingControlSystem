<?php

namespace App\Http\Requests\Api\CompanyController;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'title' => 'required|string|max:255',
            'short_title' => 'required|string|max:50',
            'is_person' => 'required|boolean',
            'first_name' => $this->is_person ? 'required|string|max:255' : '',
            'last_name' => $this->is_person ? 'required|string|max:255' : '',
            'tax_number' => $this->is_person ? '' : 'required|max:10',
            'identity_number' => $this->is_person ? 'required|max:11':'',
            'address' => 'required|string|max:255',
            'city_id' => 'required|integer',
            'town_id' => 'required|integer',
            'country_id' => 'required|integer',
            'tax_office_id' => 'required|integer',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'fax' => 'required|string|max:255',
            'postal_code' => 'required|string|max:255',
            'web_site' => 'required|string|max:255',
            'commercial_register_number' => 'required|string|max:255',
            'mernis_number' => 'required|string|max:255',
            'e_invoice_status' => 'required|boolean',
            'e_archive_status' => 'required|boolean',
            'e_dispatch_status' => 'required|boolean',
            'e_producer_status' => 'required|boolean',
            'e_voucher_status' => 'required|boolean',
            'web_service_username' => 'required|string|max:255',
            'web_service_password' => 'required|string|max:255',
            'integrator_id' => 'required|integer',
        ];
    }
}
