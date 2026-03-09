@extends('admin.layouts.app')

@section('header_title', 'تفاصيل الرسالة')

@section('content')

    <div class="flex items-center justify-between mb-6">
        <div>
            <h3 class="text-2xl font-bold text-green-900">تفاصيل الرسالة</h3>
            <p class="text-gray-500 text-sm mt-1">قراءة محتوى الرسالة الواردة من الزائر.</p>
        </div>
        <a href="{{ route('admin.contact_messages.index') }}" class="bg-gray-100 hover:bg-gray-200 text-gray-700 px-5 py-2 rounded-xl font-bold transition flex items-center gap-2">
            <span>العودة للقائمة</span>
            <span>🔙</span>
        </a>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 md:p-8 max-w-4xl mx-auto">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8 pb-8 border-b border-gray-100">
            <div>
                <p class="text-sm text-gray-500 font-semibold mb-1">اسم المُرسل</p>
                <p class="text-lg font-bold text-gray-900">{{ $message->name }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-semibold mb-1">رقم الهاتف</p>
                <p class="text-lg font-bold text-gray-900" dir="ltr">{{ $message->phone }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-semibold mb-1">البريد الإلكتروني</p>
                <p class="text-lg font-bold text-gray-900">{{ $message->email ?? 'لم يتم إدخال بريد' }}</p>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-semibold mb-1">تاريخ الإرسال</p>
                <p class="text-lg font-bold text-gray-900" dir="ltr">{{ $message->created_at->format('Y-m-d h:i A') }}</p>
            </div>
        </div>

        <div class="space-y-4">
            <div>
                <p class="text-sm text-gray-500 font-semibold mb-1">الموضوع</p>
                <h4 class="text-xl font-bold text-green-800 bg-green-50 p-4 rounded-xl border border-green-100">
                    {{ $message->subject ?? 'بدون عنوان' }}
                </h4>
            </div>

            <div>
                <p class="text-sm text-gray-500 font-semibold mb-2 mt-6">محتوى الرسالة</p>
                <div class="bg-gray-50 p-6 rounded-xl border border-gray-200 text-gray-800 leading-relaxed whitespace-pre-line text-lg">
                    {{ $message->content }}
                </div>
            </div>
        </div>

    </div>

@endsection
