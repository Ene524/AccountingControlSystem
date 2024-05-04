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
            'customer_code' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'first_name' => $this->is_person == 1 ? 'required|string|max:255' : '',
            'last_name' => $this->is_person == 1 ? 'required|string|max:255' : '',
            'is_person' => 'required|boolean',
            'tax_number' => $this->is_person != 1 ? 'required|string|size:10' : '',
            'identity_number' => $this->is_person == 1 ? 'required|string|size:11' : '',
            'is_active' => 'boolean',
        ];
    }
}
