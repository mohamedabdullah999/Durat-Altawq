@extends('admin.layouts.app')

@section('header_title', 'إعدادات الموقع العامة')

@section('content')

    <div class="mb-6">
        <h3 class="text-2xl font-bold text-green-900">⚙️ إعدادات الموقع</h3>
        <p class="text-gray-500 text-sm mt-1">تحكم في كافة النصوص، الروابط، ومعلومات التواصل المعروضة في واجهة الموقع.</p>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 font-semibold shadow-sm text-center">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
        @csrf
        @method('PUT')

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <h4 class="text-lg font-bold text-green-800 mb-6 flex items-center gap-2 border-b border-gray-50 pb-4">
                <span>🎨</span> الهوية البصرية للموقع
            </h4>
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">رابط لوجو الموقع (Logo URL)</label>
                    <input type="url" name="site_logo" value="{{ old('site_logo', $settings['site_logo'] ?? '') }}" dir="ltr"
                           class="w-full px-4 py-3 rounded-xl border @error('site_logo') border-red-500 bg-red-50 @else border-gray-200 bg-gray-50 focus:bg-white @enderror focus:ring-2 focus:ring-green-500 outline-none transition text-left"
                           placeholder="https://example.com/logo.png">
                    <p class="text-xs text-gray-400 mt-2">يفضل أن تكون الصورة بصيغة PNG وبخلفية شفافة.</p>
                    @error('site_logo') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <h4 class="text-lg font-bold text-green-800 mb-6 flex items-center gap-2 border-b border-gray-50 pb-4">
                <span>🚀</span> النصوص الرئيسية (الهيدر)
            </h4>
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">العنوان الرئيسي الكبير (Hero Title)</label>
                    <input type="text" name="hero_title" value="{{ old('hero_title', $settings['hero_title'] ?? '') }}"
                           class="w-full px-4 py-3 rounded-xl border @error('hero_title') border-red-500 bg-red-50 @else border-gray-200 bg-gray-50 focus:bg-white @enderror focus:ring-2 focus:ring-green-500 outline-none transition"
                           placeholder="مثال: مؤسسة درة الطوق.. شريكك الموثوق">
                    @error('hero_title') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">النص الفرعي (Hero Subtitle)</label>
                    <textarea name="hero_subtitle" rows="2"
                              class="w-full px-4 py-3 rounded-xl border @error('hero_subtitle') border-red-500 bg-red-50 @else border-gray-200 bg-gray-50 focus:bg-white @enderror focus:ring-2 focus:ring-green-500 outline-none transition resize-none"
                              placeholder="نقدم أفضل الحلول التقنية المبتكرة...">{{ old('hero_subtitle', $settings['hero_subtitle'] ?? '') }}</textarea>
                    @error('hero_subtitle') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <h4 class="text-lg font-bold text-green-800 mb-6 flex items-center gap-2 border-b border-gray-50 pb-4">
                <span>🏢</span> قسم "عن الشركة"
            </h4>
            <div class="grid grid-cols-1 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">رابط الفيديو "عن الشركة" (Video URL)</label>
                    <input type="url" name="about_video_url" value="{{ old('about_video_url', $settings['about_video_url'] ?? '') }}" dir="ltr"
                           class="w-full px-4 py-3 rounded-xl border @error('about_video_url') border-red-500 bg-red-50 @else border-gray-200 bg-gray-50 focus:bg-white @enderror focus:ring-2 focus:ring-green-500 outline-none transition text-left"
                           placeholder="https://example.com/video.mp4">
                    @error('about_video_url') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">النص التعريفي (About Text)</label>
                    <textarea name="about_text" rows="5"
                              class="w-full px-4 py-3 rounded-xl border @error('about_text') border-red-500 bg-red-50 @else border-gray-200 bg-gray-50 focus:bg-white @enderror focus:ring-2 focus:ring-green-500 outline-none transition"
                              placeholder="نحن في مؤسسة درة الطوق نسعى لتقديم...">{{ old('about_text', $settings['about_text'] ?? '') }}</textarea>
                    @error('about_text') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <h4 class="text-lg font-bold text-green-800 mb-6 flex items-center gap-2 border-b border-gray-50 pb-4">
                <span>📞</span> بيانات الاتصال
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label class="block text-sm font-bold text-gray-700 mb-2">العنوان الفعلي</label>
                    <input type="text" name="contact_address" value="{{ old('contact_address', $settings['contact_address'] ?? '') }}"
                           class="w-full px-4 py-3 rounded-xl border @error('contact_address') border-red-500 bg-red-50 @else border-gray-200 bg-gray-50 focus:bg-white @enderror focus:ring-2 focus:ring-green-500 outline-none transition"
                           placeholder="المملكة العربية السعودية، الرياض...">
                    @error('contact_address') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">رقم الجوال / الهاتف</label>
                    <input type="text" name="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" dir="ltr"
                           class="w-full px-4 py-3 rounded-xl border @error('contact_phone') border-red-500 bg-red-50 @else border-gray-200 bg-gray-50 focus:bg-white @enderror focus:ring-2 focus:ring-green-500 outline-none transition text-left"
                           placeholder="+966 5X XXX XXXX">
                    @error('contact_phone') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">البريد الإلكتروني الرسمي</label>
                    <input type="email" name="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" dir="ltr"
                           class="w-full px-4 py-3 rounded-xl border @error('contact_email') border-red-500 bg-red-50 @else border-gray-200 bg-gray-50 focus:bg-white @enderror focus:ring-2 focus:ring-green-500 outline-none transition text-left"
                           placeholder="info@domain.com">
                    @error('contact_email') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
            <h4 class="text-lg font-bold text-blue-800 mb-6 flex items-center gap-2 border-b border-gray-50 pb-4">
                <span>🌐</span> روابط السوشيال ميديا
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">فيسبوك</label>
                    <input type="text" name="social_facebook" value="{{ old('social_facebook', $settings['social_facebook'] ?? '') }}" dir="ltr"
                           class="w-full px-4 py-3 rounded-xl border @error('social_facebook') border-red-500 bg-red-50 @else border-gray-200 bg-gray-50 focus:bg-white @enderror focus:ring-2 focus:ring-blue-500 outline-none transition text-left">
                    @error('social_facebook') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">تويتر (X)</label>
                    <input type="text" name="social_twitter" value="{{ old('social_twitter', $settings['social_twitter'] ?? '') }}" dir="ltr"
                           class="w-full px-4 py-3 rounded-xl border @error('social_twitter') border-red-500 bg-red-50 @else border-gray-200 bg-gray-50 focus:bg-white @enderror focus:ring-2 focus:ring-gray-800 outline-none transition text-left">
                    @error('social_twitter') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">لينكد إن</label>
                    <input type="text" name="social_linkedin" value="{{ old('social_linkedin', $settings['social_linkedin'] ?? '') }}" dir="ltr"
                           class="w-full px-4 py-3 rounded-xl border @error('social_linkedin') border-red-500 bg-red-50 @else border-gray-200 bg-gray-50 focus:bg-white @enderror focus:ring-2 focus:ring-blue-700 outline-none transition text-left">
                    @error('social_linkedin') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>
            </div>
        </div>

        <div class="flex justify-end sticky bottom-6 z-10">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-12 py-4 rounded-xl font-black text-lg shadow-2xl shadow-green-200 transition-all transform hover:-translate-y-1 flex items-center gap-3 border-2 border-white">
                <span>حفظ التعديلات</span>
                <span>💾</span>
            </button>
        </div>
    </form>

@endsection
