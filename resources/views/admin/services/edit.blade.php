@extends('admin.layouts.app')

@section('header_title', 'تعديل الخدمة')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-2xl font-bold text-green-900">تعديل الخدمة: <span class="text-green-600">{{ $service->title }}</span></h3>
            <p class="text-gray-500 text-sm mt-1">تحديث بيانات الخدمة الحالية.</p>
        </div>
        <a href="{{ route('admin.services.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2 rounded-xl font-bold transition flex items-center gap-2">
            <span>العودة للقائمة</span>
            <span>🔙</span>
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 max-w-4xl mx-auto">

        <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="space-y-6">

                <div>
                    <label for="title" class="block text-sm font-bold text-gray-700 mb-2">عنوان الخدمة <span class="text-red-500">*</span></label>
                    <input type="text" name="title" id="title" value="{{ old('title', $service->title) }}"
                           class="w-full px-4 py-3 rounded-xl border @error('title') border-red-500 bg-red-50 @else border-gray-200 bg-gray-50 focus:bg-white @enderror focus:ring-2 focus:ring-green-500 outline-none transition"
                           required>
                    @error('title')
                        <p class="text-red-500 text-sm mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">أيقونة الخدمة (صورة)</label>

                    <input type="file" name="icon" accept="image/*"
                           class="w-full text-gray-500 font-medium text-sm bg-gray-50 file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-green-100 file:hover:bg-green-200 file:text-green-700 rounded-xl border @error('icon') border-red-500 @else border-gray-200 @enderror focus:outline-none focus:ring-2 focus:ring-green-500 transition-all">

                    @error('icon')
                        <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-400 mt-2 font-semibold">💡 اترك هذا الحقل فارغاً إذا كنت لا تود تغيير الأيقونة الحالية.</p>

                    @if($service->icon)
                        <div class="mt-4 p-4 border border-gray-100 rounded-xl bg-gray-50 inline-block">
                            <p class="text-xs font-bold text-gray-500 mb-2">الأيقونة الحالية:</p>
                            <div class="w-20 h-20 rounded-full bg-white border border-gray-200 flex items-center justify-center p-2 overflow-hidden shadow-sm">
                                <img src="{{ asset($service->icon) }}" alt="Current Icon" class="max-w-full max-h-full object-contain">
                            </div>
                        </div>
                    @endif
                </div>

                <div>
                    <label for="description" class="block text-sm font-bold text-gray-700 mb-2">وصف الخدمة <span class="text-red-500">*</span></label>
                    <textarea name="description" id="description" rows="5"
                              class="w-full px-4 py-3 rounded-xl border @error('description') border-red-500 bg-red-50 @else border-gray-200 bg-gray-50 focus:bg-white @enderror focus:ring-2 focus:ring-green-500 outline-none transition resize-y"
                              required>{{ old('description', $service->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1 font-semibold">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label class="block text-sm font-bold text-gray-700 mb-2">رابط "تعرف المزيد" (اختياري)</label>
                    <input type="url" name="link" value="{{ old('link', $service->link) }}" dir="ltr"
                            class="w-full px-4 py-3 rounded-xl border @error('link') border-red-500 @else border-gray-200 @enderror focus:ring-2 focus:ring-green-500 outline-none transition text-left"
                            placeholder="https://example.com/details">
                    @error('link')
                    <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p>
                    @enderror
                </div>

            </div>

            <div class="mt-8 pt-5 border-t border-gray-100 flex items-center justify-end gap-3">
                <a href="{{ route('admin.services.index') }}" class="px-6 py-2.5 rounded-xl font-bold text-gray-500 hover:bg-gray-100 transition">
                    إلغاء
                </a>
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-2.5 rounded-xl font-bold shadow-md transition-all flex items-center gap-2">
                    <span>حفظ التعديلات</span>
                    <span>💾</span>
                </button>
            </div>

        </form>
    </div>

@endsection
