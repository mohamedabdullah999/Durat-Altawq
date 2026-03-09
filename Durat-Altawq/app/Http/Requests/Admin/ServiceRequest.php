<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    /**
     * Determine if the user is autho   rized to make this request.
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
            'description' => 'required|string',
            'icon' => 'nullable|string',
            'link' => 'nullable|url|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'حقل العنوان مطلوب.',
            'description.required' => 'حقل الوصف مطلوب.',
            'icon.required' => 'حقل الصوره مطلوب.',
            'link.url' => 'الرابط غير صالح.',
            'link.max' => 'الرابط لا يمكن أن يتجاوز 255 حرفاً.',
        ];
    }
}
