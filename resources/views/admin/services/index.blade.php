@extends('admin.layouts.app')

@section('header_title', 'إدارة الخدمات')

@section('content')

    <div class="flex flex-col sm:flex-row justify-between items-center mb-6 gap-4">
        <div>
            <h3 class="text-2xl font-bold text-green-900">الخدمات المُقدمة</h3>
            <p class="text-gray-500 text-sm mt-1">إدارة الخدمات التي تظهر للعملاء في الموقع الرئيسي.</p>
        </div>
        <a href="{{ route('admin.services.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2.5 rounded-xl font-bold shadow-md transition-all flex items-center gap-2 transform hover:-translate-y-0.5">
            <span>+</span>
            <span>إضافة خدمة جديدة</span>
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-right">
                <thead class="bg-green-50 border-b border-green-100 text-green-800">
                    <tr>
                        <th class="p-4 font-bold w-16">#</th>
                        <th class="p-4 font-bold w-24">الأيقونة</th>
                        <th class="p-4 font-bold">عنوان الخدمة</th>
                        <th class="p-4 font-bold">الوصف المختصر</th>
                        <th class="p-4 font-bold w-32 text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-50">
                    @forelse($services as $index => $service)
                        <tr class="hover:bg-gray-50/50 transition duration-150">
                            <td class="p-4 text-gray-500 font-semibold">
                                {{ $services->firstItem() + $index }}
                            </td>
            <td class="p-4 text-center">
            @if($service->icon)
                <img src="{{ asset($service->icon) }}" alt="{{ $service->title }}"
                     class="w-12 h-12 object-contain rounded-lg bg-gray-50 border border-gray-200 shadow-sm p-1 inline-block">
            @else
                <div class="w-12 h-12 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 text-xl border border-gray-200 inline-flex">
                🔹
            </div>
            @endif
            </td>

            <td class="p-4 font-bold text-gray-800">
                {{ $service->title }}
            </td>

            <td class="p-4 text-gray-600 text-sm">
                {{ Str::limit($service->description, 50) }}
            </td>

            <td class="p-4 flex items-center justify-center gap-2">
                <a href="{{ route('admin.services.edit', $service) }}" class="p-2 text-blue-600 bg-blue-50 hover:bg-blue-600 hover:text-white rounded-lg transition" title="تعديل">
                ✏️
            </a>

            <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('هل أنت متأكد من حذف هذه الخدمة نهائياً؟');">
                @csrf
                @method('DELETE')
                <button type="submit" class="p-2 text-red-600 bg-red-50 hover:bg-red-600 hover:text-white rounded-lg transition" title="حذف">
                🗑️
                </button>
            </form>
            </td>
            </tr>
            @empty
                <tr>
                    <td colspan="5" class="p-12 text-center">
                        <div class="text-6xl mb-4 opacity-30">📭</div>
                        <h4 class="text-xl font-bold text-gray-700 mb-2">لا توجد خدمات مضافة حتى الآن</h4>
                        <p class="text-gray-500 mb-6">ابدأ بإضافة أول خدمة لتظهر في الموقع الرئيسي.</p>
                        <a href="{{ route('admin.services.create') }}" class="inline-block bg-green-100 text-green-700 hover:bg-green-200 px-6 py-2 rounded-lg font-bold transition">إضافة خدمة الآن</a>
                    </td>
                </tr>
            @endforelse
                </tbody>
            </table>
        </div>

        @if($services->hasPages())
            <div class="p-4 border-t border-gray-100 bg-gray-50">
                {{ $services->links() }}
            </div>
        @endif
    </div>

@endsection
