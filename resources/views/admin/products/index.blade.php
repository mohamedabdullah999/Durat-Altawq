@extends('admin.layouts.app')

@section('header_title', 'إدارة المنتجات / الأعمال')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-2xl font-bold text-green-900">📦 المنتجات والأعمال</h3>
            <p class="text-gray-500 text-sm mt-1">عرض وإدارة المنتجات أو سابقة الأعمال الخاصة بالمؤسسة.</p>
        </div>
        <a href="{{ route('admin.products.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-xl font-bold shadow-md transition-all flex items-center gap-2">
            <span>إضافة منتج جديد</span>
            <span>+</span>
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 font-semibold shadow-sm text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-right text-sm text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 font-bold">الصورة</th>
                        <th class="px-6 py-4 font-bold">اسم المنتج</th>
                        <th class="px-6 py-4 font-bold">رابط التوجيه</th>
                        <th class="px-6 py-4 font-bold">تاريخ الإضافة</th>
                        <th class="px-6 py-4 font-bold text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($products as $product)
                        <tr class="border-b border-gray-50 hover:bg-gray-50/50 transition">
                            <td class="px-6 py-4">
                                @if($product->image)
                                    <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-16 h-16 object-cover rounded-lg border border-gray-200 shadow-sm">
                                @else
                                    <div class="w-16 h-16 bg-gray-100 rounded-lg flex items-center justify-center text-gray-400 text-xs border border-gray-200">لا توجد</div>
                                @endif
                            </td>
                            <td class="px-6 py-4 font-bold text-gray-900 text-base">
                                {{ $product->name }}
                            </td>
                            <td class="px-6 py-4">
                                @if($product->link)
                                    <a href="{{ $product->link }}" target="_blank" class="text-blue-500 hover:text-blue-700 font-semibold underline" dir="ltr">رابط المنتج ↗</a>
                                @else
                                    <span class="text-gray-400">لا يوجد</span>
                                @endif
                            </td>
                            <td class="px-6 py-4" dir="ltr">
                                {{ $product->created_at->format('Y-m-d') }}
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-3">
                                    <a href="{{ route('admin.products.edit', $product->id) }}" class="text-blue-600 hover:text-blue-800 font-bold bg-blue-50 px-3 py-1 rounded-lg transition">تعديل</a>

                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا المنتج؟');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 font-bold bg-red-50 px-3 py-1 rounded-lg transition">حذف</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center text-gray-400 bg-gray-50">
                                <div class="text-4xl mb-3">📦</div>
                                <p class="font-bold text-lg">لا توجد منتجات حتى الآن.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($products->hasPages())
            <div class="p-6 border-t border-gray-100">
                {{ $products->links() }}
            </div>
        @endif
    </div>

@endsection
