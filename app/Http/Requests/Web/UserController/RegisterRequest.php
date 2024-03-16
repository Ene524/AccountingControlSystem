<?php

namespace App\Http\Requests\Web\UserController;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'email|required|string|max:255|unique:users,email',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Ad Soyad alanı zorunludur',
            'name.max' => 'Ad Soyad alanı en fazla 255 karakter olmalıdır',
            'email.required' => 'E-posta alanı zorunludur',
            'email.unique' => 'Bu e-posta adresi zaten kullanılmaktadır',
            'email.email' => 'E-posta alanı geçerli bir e-posta adresi olmalıdır',
            'email.max' => 'E-posta alanı en fazla 255 karakter olmalıdır',
            'password.required' => 'Şifre alanı zorunludur',
            'password.min' => 'Şifre alanı en az 8 karakter olmalıdır',

        ];
    }
}
