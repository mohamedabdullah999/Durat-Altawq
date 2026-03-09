<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PartnerRequest extends FormRequest
{
    public function prepareForValidation()
    {
        if ($this->filled('logo')) {
            $value = trim($this->input('logo'));
            if (!str_starts_with($value, 'http://') && !str_starts_with($value, 'https://') && str_contains($value, '.')) {
                $this->merge(['logo' => 'https://' . $value]);
            }
        }
    }

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
            'logo' => 'required|url|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'اسم الشريك مطلوب.',
            'logo.required' => 'رابط اللوجو مطلوب.',
            'logo.url'      => 'رابط اللوجو غير صالح.',
        ];
    }
}
