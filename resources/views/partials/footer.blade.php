<footer class="bg-green-900 text-white pt-16 pb-8 border-t-4 border-green-600">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-12 text-center md:text-right">
            <div>
                <h3 class="text-2xl font-bold mb-4 text-green-400">مؤسسة درة الطوق</h3>
                <p class="text-gray-300 leading-relaxed">نقدم لك الحلول التقنية المبتكرة التي تحتاجها للارتقاء بأعمالك وتسهيل التحول الرقمي لمؤسستك.</p>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4 text-green-400">روابط سريعة</h3>
                <ul class="space-y-2 text-gray-300">
                    <li><a href="#about" class="hover:text-white transition">عن الشركة</a></li>
                    <li><a href="#services" class="hover:text-white transition">خدماتنا</a></li>
                    <li><a href="#products" class="hover:text-white transition">منتجاتنا</a></li>
                    <li><a href="#contact" class="hover:text-white transition">تواصل معنا</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-xl font-bold mb-4 text-green-400">تابعنا</h3>
                <div class="flex justify-center md:justify-start gap-4">
                    <a href="{{ $settings['social_twitter'] ?? "#" }} " target="_blank" class="w-10 h-10 rounded-full bg-white bg-opacity-10 flex items-center justify-center hover:bg-green-600 transition">𝕏</a>
                    <a href="{{ $settings['social_linkedin'] ?? "#" }}" target="_blank" class="w-10 h-10 rounded-full bg-white bg-opacity-10 flex items-center justify-center hover:bg-green-600 transition">in</a>
                    <a href="{{ $settings['social_facebook'] ?? "#" }}" target="_blank" class="w-10 h-10 rounded-full bg-white bg-opacity-10 flex items-center justify-center hover:bg-green-600 transition">f</a>
                </div>
            </div>
        </div>
        <div class="text-center text-green-200/50 border-t border-green-800 pt-8 mt-8">
            <p>جميع الحقوق محفوظة &copy; {{ date('Y') }} لمؤسسة درة الطوق</p>
        </div>
    </div>
</footer>
