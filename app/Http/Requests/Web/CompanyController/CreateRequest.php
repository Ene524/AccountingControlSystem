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
            'tax_number' => $this->is_person!=0 ? '' : 'required|max:10',
            'identity_number' => $this->is_person==1 ? 'required|max:11':'',
            'is_person' => 'required',
            'address' => 'required|string|max:255,nullable',
            'city' => 'required',
            'town' => 'required',
            'country' => 'required',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Ünvan zorunludur',
            'short_title.required' => 'Kısa ünvan zorunludur',
            'is_person.required' => 'Kişi bilgisi zorunludur',
            'first_name.required' => 'Ad zorunludur',
            'last_name.required' => 'Soyad zorunludur',
            'tax_number.required' => 'Vergi numarası zorunludur',
            'identity_number.required' => 'Kimlik numarası zorunludur',
            'address.required' => 'Adres zorunludur',
            'city.required' => 'Şehir bilgisi zorunludur',
            'town.required' => 'İlçe bilgisi zorunludur',
            'country.required' => 'Ülke bilgisi zorunludur',
            'email.required' => 'E-posta zorunludur',
            'phone.required' => 'Telefon zorunludur',

        ];

    }


}
