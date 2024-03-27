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
            'is_person' => 'required',
            'first_name' => $this->is_person ? 'required|string|max:255,nullable' : '',
            'last_name' => $this->is_person ? 'required|string|max:255,nullable' : '',
            'tax_number' => $this->is_person ? '' : 'required|max:10,numeric,nullable',
            'identity_number' => $this->is_person ? 'required|max:11,numeric,nullable' : '',
            'address' => 'required|string|max:255,nullable',
            'city_id' => 'required',
            'town_id' => 'required',
            'country_id' => 'required',
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
            'city_id.required' => 'Şehir bilgisi zorunludur',
            'town_id.required' => 'İlçe bilgisi zorunludur',
            'country_id.required' => 'Ülke bilgisi zorunludur',
            'email.required' => 'E-posta zorunludur',
            'phone.required' => 'Telefon zorunludur',
            'fax.required' => 'Faks zorunludur',
            'postal_code.required' => 'Posta kodu zorunludur',
            'web_site.required' => 'Web sitesi zorunludur',
            'commercial_register_number.required' => 'Ticaret sicil numarası zorunludur',
            'mernis_number.required' => 'Mernis numarası zorunludur',
            'e_invoice_status.required' => 'E-fatura durumu zorunludur',
            'e_archive_status.required' => 'E-arşiv durumu zorunludur',
            'e_dispatch_status.required' => 'E-gönderi durumu zorunludur',
            'e_producer_status.required' => 'E-üretici durumu zorunludur',
            'e_voucher_status.required' => 'E-makbuz durumu zorunludur',
            'web_service_username.required' => 'Web servisi kullanıcı adı zorunludur',
            'web_service_password.required' => 'Web servisi şifresi zorunludur',
            'integrator_id.required' => 'Entegratör bilgisi zorunludur',
        ];

    }



}
