@extends('admin.layouts.app')

@section('header_title', 'إضافة خدمة جديدة')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-2xl font-bold text-green-900">✨ إضافة خدمة جديدة</h3>
            <p class="text-gray-500 text-sm mt-1">أدخل بيانات الخدمة وارفع الأيقونة لتظهر مباشرة في الموقع.</p>
        </div>
        <a href="{{ route('admin.services.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2 rounded-xl font-bold transition flex items-center gap-2">
            <span>&larr;</span>
            <span>العودة للقائمة</span>
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 max-w-4xl mx-auto">
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="space-y-6">

                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">عنوان الخدمة <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                           class="w-full px-4 py-3 rounded-xl border @error('title') border-red-500 bg-red-50 @else border-gray-200 bg-gray-50 focus:bg-white @enderror focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition"
                           placeholder="مثال: تصميم المواقع الإلكترونية" required>
                    @error('title') <p class="text-red-500 text-sm mt-1 font-semibold">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">أيقونة الخدمة (صورة) <span class="text-red-500">*</span></label>
                    <input type="file" name="icon" accept="image/*" required
                           class="w-full text-gray-500 font-medium text-sm bg-gray-50 file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-green-100 file:hover:bg-green-200 file:text-green-700 rounded-xl border @error('icon') border-red-500 @else border-gray-200 @enderror focus:outline-none focus:ring-2 focus:ring-green-500 transition-all">
                    @error('icon') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                    <p class="text-xs text-gray-400 mt-2 font-semibold">💡 يفضل رفع أيقونة أو صورة بخلفية شفافة (PNG, SVG).</p>
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">رابط "تعرف المزيد" (اختياري)</label>
                    <input type="url" name="link" value="{{ old('link') }}" dir="ltr"
                           class="w-full px-4 py-3 rounded-xl border @error('link') border-red-500 bg-red-50 @else border-gray-200 bg-gray-50 focus:bg-white @enderror focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition text-left"
                           placeholder="https://example.com/details">
                    @error('link') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="description" class="block text-sm font-bold text-gray-700 mb-2">وصف الخدمة <span class="text-red-500">*</span></label>
                    <textarea name="description" id="description" rows="5"
                              class="w-full px-4 py-3 rounded-xl border @error('description') border-red-500 bg-red-50 @else border-gray-200 bg-gray-50 focus:bg-white @enderror focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition resize-y"
                              placeholder="اكتب وصفاً جذاباً للخدمة يظهر للعملاء..." required>{{ old('description') }}</textarea>
                    @error('description') <p class="text-red-500 text-sm mt-1 font-semibold">{{ $message }}</p> @enderror
                </div>

            </div>

            <div class="mt-8 pt-5 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.services.index') }}" class="px-6 py-2.5 rounded-xl font-bold text-gray-500 hover:bg-gray-100 transition">
                    إلغاء
                </a>
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-8 py-2.5 rounded-xl font-bold shadow-md transition-all transform hover:-translate-y-0.5 flex items-center gap-2">
                    <span>حفظ ونشر الخدمة</span>
                </button>
            </div>
        </form>
    </div>

@endsection
