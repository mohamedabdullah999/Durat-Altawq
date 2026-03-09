@extends('admin.layouts.app')

@section('header_title', 'لوحة المتابعة الرئيسية')

@section('content')
    <div class="mb-8 bg-white rounded-2xl p-6 shadow-sm border border-gray-100 flex items-center justify-between hover:shadow-md transition-shadow">
        <div>
            <h3 class="text-2xl font-bold text-green-900 mb-2">أهلاً بك يا {{ Auth::user()?->name ?? 'مدير النظام' }}! 👋</h3>
            <p class="text-gray-500 font-semibold">هنا نظرة سريعة على أداء مؤسسة درة الطوق اليوم.</p>
        </div>
        <div class="hidden md:flex w-20 h-20 bg-green-50 rounded-full items-center justify-center text-4xl shadow-inner border border-green-100">
            🚀
        </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-green-100 text-green-600 rounded-xl flex items-center justify-center text-3xl group-hover:scale-110 transition-transform">
                    💻
                </div>
                <span class="text-green-600 bg-green-50 px-3 py-1 rounded-full text-xs font-extrabold border border-green-200">نشط</span>
            </div>
            <h4 class="text-gray-500 text-sm font-bold mb-1">إجمالي الخدمات</h4>
            <p class="text-4xl font-black text-gray-800">{{$stats['services']}}</p>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-blue-100 text-blue-600 rounded-xl flex items-center justify-center text-3xl group-hover:scale-110 transition-transform">
                    📦
                </div>
                <span class="text-blue-600 bg-blue-50 px-3 py-1 rounded-full text-xs font-extrabold border border-blue-200">نشط</span>
            </div>
            <h4 class="text-gray-500 text-sm font-bold mb-1">المنتجات المتاحة</h4>
            <p class="text-4xl font-black text-gray-800">{{$stats['products']}}</p>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-yellow-100 text-yellow-600 rounded-xl flex items-center justify-center text-3xl group-hover:scale-110 transition-transform">
                    ✉️
                </div>
                <span class="text-yellow-600 bg-yellow-50 px-3 py-1 rounded-full text-xs font-extrabold border border-yellow-200">نشط</span>
            </div>
            <h4 class="text-gray-500 text-sm font-bold mb-1">رسائل الزوار</h4>
            <p class="text-4xl font-black text-gray-800">{{$stats['messages']}}</p>
        </div>

        <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100 hover:-translate-y-1 hover:shadow-lg transition-all duration-300 group">
            <div class="flex items-center justify-between mb-4">
                <div class="w-14 h-14 bg-purple-100 text-purple-600 rounded-xl flex items-center justify-center text-3xl group-hover:scale-110 transition-transform">
                    🤝
                </div>
                <span class="text-purple-600 bg-purple-50 px-3 py-1 rounded-full text-xs font-extrabold border border-purple-200">موثوق</span>
            </div>
            <h4 class="text-gray-500 text-sm font-bold mb-1">شركاء النجاح</h4>
            <p class="text-4xl font-black text-gray-800">{{$stats['partners']}}</p>
        </div>

    </div>

    <div class="bg-white rounded-2xl p-6 shadow-sm border border-gray-100">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-xl font-bold text-green-900">أحدث رسائل الزوار</h3>
            <a href="{{ route('admin.contact_messages.index') }}" class="text-sm font-bold text-green-600 hover:text-green-800 transition">عرض الكل &larr;</a>
        </div>

        <div class="text-center py-16 text-gray-400 bg-gray-50 rounded-xl border border-dashed border-gray-200">
            <div class="text-5xl mb-4 opacity-50">📭</div>
            <p class="font-semibold text-lg">{{$stats['messages']}}</p>
            <p class="text-sm mt-2">ستظهر هنا أحدث الاستفسارات القادمة من الموقع الرئيسي.</p>
        </div>
    </div>
@endsection
