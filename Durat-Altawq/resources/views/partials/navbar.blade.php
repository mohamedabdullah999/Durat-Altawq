<nav class="bg-white/90 backdrop-blur-md shadow-sm sticky top-0 z-50">
    <div class="container mx-auto px-4 py-3 flex items-center justify-between">

        <div class="flex items-center gap-3">
            <div class="w-14 h-14 rounded-full overflow-hidden border-2 border-green-500 flex items-center justify-center p-1 bg-white shadow-sm">
                <img src="https://i.ibb.co/wZYP2DzW/Chat-GPT-Image-Feb-28-2026-01-03-03-PM.png" alt="" class="w-full h-full object-contain rounded-full">
            </div>
            <div class="flex flex-col">
                <span class="font-bold text-xl text-green-800">درة الطوق</span>
                <span class="text-xs text-gray-500 font-semibold tracking-wide">Durat Al-Tawq</span>
            </div>
        </div>

        <ul class="hidden md:flex items-center gap-6 text-gray-600 font-semibold text-sm">
            <li><a href="#" class="hover:text-green-600 transition duration-300">الرئيسية</a></li>
            <li><a href="#about" class="hover:text-green-600 transition duration-300">عن الشركة</a></li>
            <li><a href="#services" class="hover:text-green-600 transition duration-300">خدماتنا</a></li>
            <li><a href="#products" class="hover:text-green-600 transition duration-300">منتجاتنا</a></li>
            <li><a href="#partners" class="hover:text-green-600 transition duration-300">شركائنا</a></li>
            <li><a href="#contact" class="hover:text-green-600 transition duration-300">تواصل معنا</a></li>
        </ul>

        <div class="flex items-center gap-3">
            @auth
                <a href="{{ route('admin.dashboard') }}" class="hidden sm:inline-block bg-green-600 text-white px-4 py-2 rounded-md text-sm font-bold hover:bg-green-700 transition shadow-sm">
                    لوحة التحكم
                </a>
                <form method="POST" action="{{ route('logout') }}" class="m-0 p-0 inline">
                    @csrf
                    <button type="submit" class="text-red-500 text-sm font-bold hover:text-red-700 underline transition">
                        خروج 🚪
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="hidden sm:inline-block border-2 border-green-800 text-green-800 px-4 py-2 rounded-md text-sm font-bold hover:bg-green-800 hover:text-white transition shadow-sm">
                    دخول الإدارة 🔒
                </a>
            @endauth

            <button id="mobile-menu-btn" class="md:hidden text-green-800 p-2 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
        </div>

    </div>

    <div id="mobile-menu" class="hidden md:hidden bg-white border-t border-gray-100 absolute w-full shadow-lg">
        <ul class="flex flex-col px-4 py-4 space-y-4 text-gray-600 font-semibold text-sm">
            <li><a href="#" class="block hover:text-green-600">الرئيسية</a></li>
            <li><a href="#about" class="block hover:text-green-600">عن الشركة</a></li>
            <li><a href="#services" class="block hover:text-green-600">خدماتنا</a></li>
            <li><a href="#products" class="block hover:text-green-600">منتجاتنا</a></li>
            <li><a href="#partners" class="block hover:text-green-600">شركائنا</a></li>
            <li><a href="#contact" class="block hover:text-green-600">تواصل معنا</a></li>
            @guest
                <li class="pt-2 border-t border-gray-100"><a href="{{ route('login') }}" class="block text-green-800 font-bold">دخول الإدارة 🔒</a></li>
            @else
                <li class="pt-2 border-t border-gray-100"><a href="{{ route('admin.dashboard') }}" class="block text-green-600 font-bold">لوحة التحكم ⚙️</a></li>
            @endguest
        </ul>
    </div>
</nav>

<script>
    document.getElementById('mobile-menu-btn').addEventListener('click', function() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    });
</script>
