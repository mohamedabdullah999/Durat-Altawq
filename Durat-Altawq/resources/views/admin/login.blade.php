<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>تسجيل الدخول - لوحة الإدارة</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <style> body { font-family: 'Cairo', sans-serif; } </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center p-4 selection:bg-green-600 selection:text-white">

    <div class="bg-white p-6 sm:p-10 rounded-2xl shadow-xl w-full max-w-md border border-gray-100">

        <div class="text-center mb-8">
            <div class="w-20 h-20 mx-auto rounded-full overflow-hidden border-2 border-green-500 mb-4 p-1 shadow-sm">
                <img src="{{ asset('images/WhatsApp Image 2026-02-28 at 13.21.47.jpeg') }}" alt="درة الطوق" class="w-full h-full object-contain rounded-full">
            </div>
            <h1 class="text-2xl font-bold text-green-900">تسجيل الدخول للإدارة</h1>
            <p class="text-gray-500 mt-2 text-sm">مؤسسة درة الطوق</p>
        </div>

        <form method="POST" action="{{ route('login.submit') }}" class="space-y-6">
            @csrf

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">البريد الإلكتروني</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" required autofocus
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition bg-gray-50 focus:bg-white text-left" dir="ltr">

                @error('email')
                    <p class="text-red-500 text-sm font-semibold mt-2">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">كلمة المرور</label>
                <input type="password" name="password" id="password" required
                    class="w-full px-4 py-3 border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-green-600 focus:border-transparent transition bg-gray-50 focus:bg-white text-left" dir="ltr">
                @error('password')
                    <p class="text-red-500 text-sm font-semibold mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-green-600 text-white font-bold py-3 px-4 rounded-xl hover:bg-green-700 transition duration-300 shadow-md transform hover:-translate-y-1">
                دخول 🔒
            </button>
        </form>

        <div class="mt-6 text-center">
            <a href="{{ route('home') }}" class="text-sm text-gray-500 hover:text-green-600 transition">&larr; العودة للموقع الرئيسي</a>
        </div>
    </div>

</body>
</html>
