<?php

namespace App\Http\Requests\Web\ProductController;

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
            'code' => 'required|string',
            'name' => 'required|string',
            'type' => 'required',
            'is_active' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Kod alanı boş bırakılamaz.',
            'name.required' => 'Ad alanı boş bırakılamaz.',
            'type.required' => 'Tip alanı boş bırakılamaz.',
            'is_active.required' => 'Aktif alanı boş bırakılamaz.',
        ];
    }
}
