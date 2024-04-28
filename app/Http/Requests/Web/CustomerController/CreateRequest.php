<?php

namespace App\Http\Requests\Web\CustomerController;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return bool;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_id' => 'required|integer',
            'customer_code' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'is_person' => 'required|boolean',
            'tax_number' => 'required|string|max:10',
            'identity_number' => 'required|string|max:11',
            'phone' => 'required|string|max:255',
            'fax' => 'required|string|max:255',
            'mobile_phone' => 'required|string|max:255',
            'web_site' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'city' => 'required|string|max:100',
            'town' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'tax_office' => 'nullable|string',
            'postal_code' => 'nullable|string|max:10',
            'specode1' => 'required|string|max:50',
            'specode2' => 'required|string|max:50',
            'specode3' => 'required|string|max:50',
            'note' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ];
    }
}
