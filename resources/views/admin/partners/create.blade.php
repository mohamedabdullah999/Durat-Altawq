@extends('admin.layouts.app')

@section('header_title', 'إضافة شريك جديد')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-2xl font-bold text-green-900">✨ إضافة شريك</h3>
            <p class="text-gray-500 text-sm mt-1">قم بإدخال بيانات الشريك ورفع اللوجو الخاص به.</p>
        </div>
        <a href="{{ route('admin.partners.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-6 py-2 rounded-xl font-bold transition-all flex items-center gap-2">
            <span>&larr;</span>
            <span>عودة للقائمة</span>
        </a>
    </div>

    <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 space-y-6">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">اسم الشريك / الشركة <span class="text-red-500">*</span></label>
                <input type="text" name="name" value="{{ old('name') }}" required
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-green-500 outline-none transition">
                @error('name') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-gray-700 mb-2">لوجو الشريك (صورة) <span class="text-red-500">*</span></label>

                <input type="file" name="logo" accept="image/*" required
                       class="w-full text-gray-500 font-medium text-sm bg-gray-50 file:cursor-pointer cursor-pointer file:border-0 file:py-3 file:px-4 file:mr-4 file:bg-green-100 file:hover:bg-green-200 file:text-green-700 rounded-xl border border-gray-200 focus:outline-none focus:ring-2 focus:ring-green-500 transition-all">

                @error('logo') <p class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</p> @enderror
                <p class="text-xs text-gray-400 mt-2 font-semibold">💡 الصيغ المدعومة: JPG, PNG, WEBP (الحد الأقصى 2 ميجابايت)</p>
            </div>
        </div>

        <div class="flex justify-end pt-4 border-t border-gray-50">
            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-10 py-3 rounded-xl font-bold shadow-lg shadow-green-200 transition-all transform hover:-translate-y-1">
                حفظ الشريك
            </button>
        </div>
    </form>

@endsection
