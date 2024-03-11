<?php

namespace App\Http\Requests\Web\CompanyController;

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
            'short_title' => 'required|string|max:50,nullable',
            'is_person' => 'required|boolean,nullable',
            'first_name' => $this->is_person ? 'required|string|max:255,nullable' : '',
            'last_name' => $this->is_person ? 'required|string|max:255,nullable' : '',
            'tax_number' => $this->is_person ? '' : 'required|max:10,numeric,nullable',
            'identity_number' => $this->is_person ? 'required|max:11,numeric,nullable':'',
            'address' => 'required|string|max:255,nullable',
            'city_id' => 'required|integer,nullable',
            'town_id' => 'required|integer,nullable',
            'country_id' => 'required|integer,nullable',
            'tax_office_id' => 'required|integer,nullable',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'fax' => 'required|string|max:255,nullable',
            'postal_code' => 'required|string|max:255,nullable',
            'web_site' => 'required|string|max:255,nullable',
            'commercial_register_number' => 'required|string|max:255,nullable',
            'mernis_number' => 'required|string|max:255,nullable',
            'e_invoice_status' => 'required|boolean,nullable',
            'e_archive_status' => 'required|boolean,nullable',
            'e_dispatch_status' => 'required|boolean,nullable',
            'e_producer_status' => 'required|boolean,nullable',
            'e_voucher_status' => 'required|boolean,nullable',
            'web_service_username' => 'required|string|max:255,nullable',
            'web_service_password' => 'required|string|max:255,nullable',
            'integrator_id' => 'required|integer,nullable',
        ];
    }
}
