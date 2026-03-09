<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function prepareForValidation()
    {
        $urlFields = ['site_logo' , 'about_image', 'social_facebook', 'social_twitter', 'social_linkedin'];

        foreach ($urlFields as $link) {
            if ($this->filled($link)) {
                $value = trim($this->input($link));
                if (!str_starts_with($value, 'http://') && !str_starts_with($value, 'https://') && str_contains($value, '.')) {
                    $this->merge([$link => 'https://' . $value]);
                }
            }
        }
    }

    public function rules(): array
    {
        return [
            'hero_title'      => 'nullable|string|max:255',
            'hero_subtitle'   => 'nullable|string|max:1000',
            'about_video_url' => 'nullable|url|max:2048',
            'about_text'      => 'nullable|string|max:2000',

            'contact_address' => 'nullable|string|max:255',
            'contact_phone'   => 'nullable|string|max:20',
            'contact_email'   => 'nullable|email|max:255',
            'site_logo'       => 'nullable|url|max:255',

            'social_facebook' => 'nullable|url|max:255',
            'social_twitter'  => 'nullable|url|max:255',
            'social_linkedin' => 'nullable|url|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'hero_title.max'      => 'العنوان الرئيسي لا يمكن أن يتجاوز 255 حرفاً.',
            'hero_subtitle.max'   => 'النص الفرعي لا يمكن أن يتجاوز 1000 حرف.',
            'site_logo.url'       => 'رابط شعار الموقع غير صالح.',
            'about_image.url'     => 'رابط صورة عن الشركة غير صالح.',
            'contact_email.email' => 'البريد الإلكتروني غير صالح.',
            'contact_phone.max'   => 'رقم الهاتف لا يمكن أن يتجاوز 20 حرفاً.',
            'about_video_url.url' => 'رابط الفيديو "عن الشركة" غير صالح.',
            'social_facebook.url' => 'رابط فيسبوك غير صالح.',
            'social_twitter.url'  => 'رابط تويتر غير صالح.',
            'social_linkedin.url' => 'رابط لينكدإن غير صالح.',
        ];
    }
}
