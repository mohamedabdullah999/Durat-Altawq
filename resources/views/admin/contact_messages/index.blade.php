@extends('admin.layouts.app')

@section('header_title', 'رسائل الزوار')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-2xl font-bold text-green-900">صندوق الوارد</h3>
            <p class="text-gray-500 text-sm mt-1">إدارة الرسائل والاستفسارات الواردة من عملاء الموقع.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 font-semibold">
            {{ session('success') }}
        </div>
    @endif
    @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-xl mb-6 font-semibold">
            {{ session('error') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-right">
                <thead class="bg-gray-50 border-b border-gray-100">
                    <tr>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700">الاسم</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700">رقم الهاتف</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700">الموضوع</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700">التاريخ</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700">الحالة</th>
                        <th class="px-6 py-4 text-sm font-bold text-gray-700 text-center">الإجراءات</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($messages as $message)
                        <tr class="hover:bg-gray-50 transition {{ $message->is_read ? '' : 'bg-green-50/50 font-bold' }}">
                            <td class="px-6 py-4 text-sm text-gray-800">{{ $message->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-800" dir="ltr">{{ $message->phone }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ Str::limit($message->subject ?? 'بدون عنوان', 30) }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500">{{ $message->created_at->format('Y-m-d') }}</td>
                            <td class="px-6 py-4 text-sm">
                                @if($message->is_read)
                                    <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs font-semibold">مقروءة</span>
                                @else
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold animate-pulse">جديدة</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm flex justify-center gap-2">
                                <a href="{{ route('admin.contact_messages.show', $message->id) }}" class="bg-blue-50 text-blue-600 hover:bg-blue-100 px-3 py-1.5 rounded-lg transition font-semibold text-xs">
                                    👁️ عرض
                                </a>

                                <form action="{{ route('admin.contact_messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذه الرسالة؟');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-50 text-red-600 hover:bg-red-100 px-3 py-1.5 rounded-lg transition font-semibold text-xs">
                                        🗑️ حذف
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center text-gray-500 font-semibold">
                                لا توجد رسائل واردة حتى الآن.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="p-4 border-t border-gray-100">
            {{ $messages->links() }}
        </div>
    </div>

@endsection
