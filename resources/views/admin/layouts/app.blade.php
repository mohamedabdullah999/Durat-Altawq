<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>لوحة التحكم - مؤسسة درة الطوق</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700;800&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Cairo', sans-serif; }
        .sidebar-transition { transition: transform 0.3s ease-in-out; }
    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-gray-100 text-gray-800 antialiased selection:bg-green-600 selection:text-white" x-data="{ sidebarOpen: false }">

    <div class="flex h-screen overflow-hidden">

        <aside :class="sidebarOpen ? 'translate-x-0' : 'translate-x-full'" class="sidebar-transition fixed inset-y-0 right-0 z-50 w-64 bg-green-900 text-white shadow-2xl md:relative md:translate-x-0 flex flex-col">

            <div class="flex items-center justify-center h-20 border-b border-green-800 px-4">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 rounded-full bg-white p-1">
                        <img src="{{ $settings['site_logo'] ?? '' }}" alt="" class="w-full h-full object-contain rounded-full">
                    </div>
                    <span class="text-xl font-bold tracking-wide">إدارة درة الطوق</span>
                </div>
            </div>

           <nav class="flex-1 px-4 py-6 space-y-2 overflow-y-auto">

                <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.dashboard') ? 'bg-green-700 text-white shadow-inner font-bold' : 'text-green-100 hover:bg-green-800 font-semibold' }}">
                    <span class="text-2xl">📊</span>
                    <span class="text-lg">لوحة المتابعة</span>
                </a>

                <a href="{{ route('admin.services.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.services.*') ? 'bg-green-700 text-white shadow-inner font-bold' : 'text-green-100 hover:bg-green-800 font-semibold' }}">
                    <span class="text-2xl">💻</span>
                    <span class="text-lg">الخدمات</span>
                </a>

 <a href="{{ route('admin.products.index') }}"
   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all font-semibold {{ request()->routeIs('admin.products.*') ? 'bg-green-800 text-white shadow-md' : 'text-green-100 hover:bg-green-800' }}">
    <span class="text-2xl">📦</span>
    <span class="text-lg">المنتجات</span>
</a>

                <a href="{{ route('admin.contact_messages.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.contact_messages.*') ? 'bg-green-700 text-white shadow-inner font-bold' : 'text-green-100 hover:bg-green-800 font-semibold' }}">
                    <span class="text-2xl">✉️</span>
                    <span class="text-lg">رسائل الزوار</span>
                </a>

                <a href="{{ route('admin.partners.index') }}"
   class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all font-semibold {{ request()->routeIs('admin.partners.*') ? 'bg-green-800 text-white shadow-md' : 'text-green-100 hover:bg-green-800' }}">
    <span class="text-2xl">🤝</span>
    <span class="text-lg">شركاء النجاح</span>
</a>
                <a href="{{ route('admin.settings.index') }}" class="flex items-center gap-3 px-4 py-3 rounded-xl transition-all {{ request()->routeIs('admin.settings.*') ? 'bg-green-700 text-white shadow-inner font-bold' : 'text-green-100 hover:bg-green-800 font-semibold' }}">
                    <span class="text-2xl">⚙️</span>
                    <span class="text-lg">إعدادات الموقع</span>
                </a>

            </nav>

            <div class="p-4 border-t border-green-800">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="w-full flex items-center justify-center gap-2 px-4 py-3 bg-red-500 hover:bg-red-600 text-white rounded-xl transition font-bold shadow-md">
                        <span>تسجيل الخروج</span>
                        <span>🚪</span>
                    </button>
                </form>
            </div>
        </aside>

        <div x-show="sidebarOpen" @click="sidebarOpen = false" x-transition.opacity class="fixed inset-0 z-40 bg-black/50 md:hidden"></div>

        <div class="flex-1 flex flex-col overflow-hidden">

            <header class="h-20 bg-white shadow-sm flex items-center justify-between px-6 z-10 relative">

                <button @click="sidebarOpen = !sidebarOpen" class="md:hidden text-gray-600 hover:text-green-600 focus:outline-none transition">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                </button>

                <h2 class="hidden md:block text-2xl font-bold text-green-900">
                    @yield('header_title', 'لوحة التحكم')
                </h2>

                <div class="flex items-center gap-5 mr-auto md:mr-0">
                    <a href="{{ route('home') }}" target="_blank" class="hidden sm:flex items-center gap-2 text-sm font-bold text-gray-600 hover:text-green-600 transition bg-gray-100 hover:bg-green-50 px-4 py-2 rounded-lg border border-gray-200">
                        <span>الموقع</span>
                        <span>🌐</span>
                    </a>

                    <div class="flex items-center gap-3 pl-4 border-l border-gray-200">
                        <span class="font-bold text-green-900">{{ Auth::user()?->name ?? 'المدير' }}</span>
                        <div class="w-10 h-10 rounded-full bg-green-100 text-green-700 flex items-center justify-center font-bold text-xl shadow-inner border border-green-200">
                            👨‍💼
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50/50 p-4 md:p-8">

                @if(session('success'))
                    <div class="mb-6 bg-green-100 border border-green-400 text-green-800 px-4 py-4 rounded-xl shadow-sm relative flex items-center gap-3 animate-pulse" role="alert">
                        <span class="text-2xl">✅</span>
                        <span class="block sm:inline font-bold text-lg">{{ session('success') }}</span>
                    </div>
                @endif

                @yield('content')

            </main>
        </div>
    </div>

</body>
</html>
