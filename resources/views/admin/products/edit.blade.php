@extends('admin.layouts.app')

@section('header_title', 'تعديل المنتج')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-2xl font-bold text-green-900">✏️ تعديل بيانات المنتج</h3>
            <p class="text-gray-500 text-sm mt-1">تعديل: {{ $product->name }}</p>
        </div>
        <a href="{{ route('admin.products.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2 rounded-xl font-bold transition-all flex items-center gap-2">
            <span>&larr;</span>
            <span>عودة للقائمة</span>
        </a>
    </div>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-gray-700 mb-2">اسم المنتج / العمل <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" required
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 outline-none transition">
                @error('name') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">صورة المنتج / العمل</label>
                <input type="file" name="image" accept="image/*"
                       class="w-full text-gray-500 font-medium text-sm bg-gray-50 file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-green-100 file:hover:bg-green-200 file:text-green-700 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all">
                @error('image') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                <p class="text-xs text-gray-400 mt-2 font-semibold">💡 اترك هذا الحقل فارغاً إذا كنت لا تود تغيير الصورة الحالية.</p>

                @if($product->image)
                    <div class="mt-4 p-4 border border-gray-100 rounded-xl bg-gray-50 inline-block">
                        <p class="text-xs font-bold text-gray-500 mb-2">الصورة الحالية:</p>
                        <div class="w-32 h-32 rounded-xl bg-white border border-gray-200 flex items-center justify-center p-2 overflow-hidden shadow-sm">
                            <img src="{{ asset($product->image) }}" alt="Current Image" class="max-w-full max-h-full object-contain">
                        </div>
                    </div>
                @endif
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">رابط التوجيه (للمزيد من التفاصيل)</label>
                <input type="text" name="link" value="{{ old('link', $product->link) }}" dir="ltr"
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 outline-none transition text-left">
                @error('link') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
            </div>

            <div class="md:col-span-2">
                <label class="block text-sm font-bold text-gray-700 mb-2">وصف مختصر (اختياري)</label>
                <textarea name="description" rows="4"
                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 outline-none transition resize-none">{{ old('description', $product->description) }}</textarea>
                @error('description') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
            </div>
        </div>

        <div class="flex justify-end pt-4 border-t border-gray-50">
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-10 py-3 rounded-xl font-bold shadow-lg shadow-blue-200 transition-all transform hover:-translate-y-1">
                تحديث البيانات
            </button>
        </div>
    </form>

@endsection
