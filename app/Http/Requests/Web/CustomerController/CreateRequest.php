<?php

namespace App\Http\Requests\Web\CustomerController;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => 'required|string|max:50',
            'title' => 'required|string|max:255',
            'first_name' => $this->is_person == 1 ? 'required|string|max:255' : '',
            'last_name' => $this->is_person == 1 ? 'required|string|max:255' : '',
            'is_person' => 'required',
            'tax_number' => $this->is_person != 1 ? 'required|string|size:10' : '',
            'identity_number' => $this->is_person == 1 ? 'required|string|size:11' : '',
            'is_active' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Kod zorunludur',
            'title.required' => 'Ünvan zorunludur',
            'first_name.required' => 'Ad zorunludur',
            'last_name.required' => 'Soyad zorunludur',
            'is_person.required' => 'Tür seçimi zorunludur',
            'tax_number.required' => 'Vergi numarası zorunludur',
            'identity_number.required' => 'Kimlik numarası zorunludur',
            'tax_number.size' => 'Vergi numarası 10 haneli olmalıdır',
            'identity_number.size' => 'Kimlik numarası 11 haneli olmalıdır',
            'is_active.required' => 'Durum seçimi zorunludur'
        ];
    }
}
