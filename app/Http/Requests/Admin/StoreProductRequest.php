<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function prepareForValidation()
    {
        $urlFields = ['image', 'link'];
        foreach ($urlFields as $link) {
            if ($this->filled($link)) {

                $value = trim($this->input($link));
                if (!str_starts_with($value, 'http://') && !str_starts_with($value, 'https://') && str_contains($value, '.')) {
                    $value = 'https://' . $value;
                    $this->merge([$link => $value]);
                }

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
            'description' => 'required|string|max:1000',
            'image' => 'nullable|url|max:2048',
            'link' => 'nullable|url|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'اسم المنتج مطلوب.',
            'name.string' => 'اسم المنتج يجب أن يكون نصاً.',
            'name.max' => 'اسم المنتج لا يمكن أن يتجاوز 255 حرفاً.',
            'description.string' => 'وصف المنتج يجب أن يكون نصاً.',
            'description.max' => 'وصف المنتج لا يمكن أن يتجاوز 1000 حرفاً.',
            'link.url' => 'الرابط غير صالح.',
            'link.max' => 'الرابط لا يمكن أن يتجاوز 255 حرفاً.',
        ];
    }
}
