@extends('layouts.app')

@section('content')

    <style>
        /* شيلنا الأنيميشن القديم وسبنا بس إخفاء شريط التمرير */
        .hide-scrollbar::-webkit-scrollbar { display: none; }
        .hide-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    <section class="bg-gradient-to-b from-white/80 to-green-100/80 backdrop-blur-md py-40 text-center px-4 animate-fade-in-up">
        <div class="container mx-auto">
            <h1 class="text-4xl md:text-5xl lg:text-7xl font-extrabold text-green-900 mb-6 leading-tight">
                {{ $settings['hero_title'] ?? 'مؤسسة درة الطوق.. شريكك الموثوق للتحول الرقمي' }}
            </h1>
            <p class="text-lg md:text-2xl text-gray-700 mb-10 max-w-4xl mx-auto font-medium">
                {{ $settings['hero_subtitle'] ?? 'نقدم أفضل الحلول التقنية المبتكرة لضمان نمو أعمالك في العصر الرقمي.' }}
            </p>
            <a href="#contact" class="bg-green-600 text-white px-10 py-4 rounded-full font-bold text-lg hover:bg-green-800 transition duration-300 transform hover:scale-105 shadow-md inline-block">ابدأ مشروعك معنا</a>
        </div>
    </section>

    <section id="about" class="py-24 bg-white/70 backdrop-blur-sm" data-animate>
        <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 gap-16 items-center">
            <div class="p-4 rounded-xl">
                <h2 class="text-4xl font-bold text-green-900 mb-8 pb-4 relative inline-block">عن الشركة<span class="absolute bottom-0 right-0 h-1 w-20 bg-green-600 rounded-full"></span></h2>
                <p class="text-gray-600 leading-relaxed text-xl text-justify mb-6">
                    {!! nl2br(e($settings['about_text'] ?? 'نحن في مؤسسة درة الطوق نسعى لتقديم خدمات تقنية متكاملة تواكب رؤية المستقبل. نعتمد على أحدث التقنيات لبناء أنظمة وحلول تساهم في تطور أعمال عملائنا...')) !!}
                </p>
                <a href="#services" class="text-green-600 font-bold text-lg hover:underline transition duration-300">اقرأ المزيد عن خدماتنا &larr;</a>
            </div>
            <div class="aspect-video rounded-3xl overflow-hidden shadow-2xl relative border-4 border-green-200 group bg-black">
                @if(!empty($settings['about_video_url']))
                    @php
                    $videoUrl = $settings['about_video_url'];
                    $embedUrl = $videoUrl;

                    if (str_contains($videoUrl, 'youtu.be/')) {
                        $videoId = explode('?', explode('youtu.be/', $videoUrl)[1])[0];
                        $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                    }
                    elseif (str_contains($videoUrl, 'watch?v=')) {
                        $videoId = explode('&', explode('watch?v=', $videoUrl)[1])[0];
                        $embedUrl = 'https://www.youtube.com/embed/' . $videoId;
                    }
                    @endphp

            <iframe class="w-full h-full"
                    src="{{ $embedUrl }}"
                    title="فيديو تعريفي"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
            </iframe>
                @else
                    <img src="{{ asset($settings['about_image'] ?? 'https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80') }}" alt="بيئة عمل تقنية" class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-105">
                    <div class="absolute inset-0 bg-green-900 bg-opacity-30 flex items-center justify-center transition-opacity duration-500 group-hover:bg-opacity-50 cursor-pointer">
                        <svg class="w-20 h-20 text-white opacity-90 group-hover:scale-110 transition-transform duration-300 drop-shadow-lg" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM9.555 7.168A1 1 0 008 8v4a1 1 0 001.555.832l3-2a1 1 0 000-1.664l-3-2z" clip-rule="evenodd"></path></svg>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="py-20 bg-green-900/95 backdrop-blur-md text-white shadow-inner" data-animate>
        <div class="container mx-auto px-4 text-center max-w-5xl">
            <h2 class="text-3xl md:text-4xl font-bold mb-16 text-green-300">تعرف على مؤسستنا بالأرقام</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-12">
                <div class="p-8 bg-white/5 backdrop-blur-sm rounded-3xl hover:bg-white/10 transition duration-300 shadow-xl border border-white/10 transform hover:-translate-y-2 flex flex-col items-center justify-center">
                    <h3 class="text-6xl font-black mb-4 text-green-400">+{{ $partners->count() }}</h3>
                    <p class="text-2xl font-semibold text-gray-100">شركاء نجاح</p>
                </div>
                <div class="p-8 bg-white/5 backdrop-blur-sm rounded-3xl hover:bg-white/10 transition duration-300 shadow-xl border border-white/10 transform hover:-translate-y-2 flex flex-col items-center justify-center">
                    <h3 class="text-6xl font-black mb-4 text-green-400">{{ $products->count() }}</h3>
                    <p class="text-2xl font-semibold text-gray-100">منتجات رقمية</p>
                </div>
                <div class="p-8 bg-white/5 backdrop-blur-sm rounded-3xl hover:bg-white/10 transition duration-300 shadow-xl border border-white/10 transform hover:-translate-y-2 flex flex-col items-center justify-center">
                    <h3 class="text-6xl font-black mb-4 text-green-400">{{ $services->count() }}</h3>
                    <p class="text-2xl font-semibold text-gray-100">خدمات تقنية</p>
                </div>
            </div>
        </div>
    </section>

   <section id="services" class="py-24 bg-gray-50/60 backdrop-blur-md overflow-hidden" data-animate>
        <div class="container mx-auto px-4 mb-16">
            <h2 class="text-4xl font-bold text-center text-green-900">خدماتنا المتميزة</h2>
        </div>
        <div class="w-full overflow-hidden" dir="ltr">
            <div class="flex gap-8 px-4 py-4 carousel-container overflow-x-auto hide-scrollbar snap-x snap-mandatory" dir="rtl">
                @forelse($services as $service)
                    <div class="w-[85vw] sm:w-[22rem] shrink-0 snap-start bg-white border border-gray-100 rounded-3xl shadow-sm hover:shadow-xl hover:border-green-300 transition duration-300 flex flex-col items-center group pt-8">

                        <div class="h-40 w-40 bg-gray-50 rounded-full flex items-center justify-center p-2 border-4 border-green-50 group-hover:border-green-200 transition duration-300 shadow-md overflow-hidden relative z-10">
                            @if($service->icon)
                                <img src="{{ asset($service->icon) }}" alt="{{ $service->title }}" class="w-full h-full object-cover rounded-full hover:scale-110 transition duration-500">
                            @else
                                <span class="text-5xl opacity-70">💻</span>
                            @endif
                        </div>

                        <div class="p-8 flex flex-col flex-1 text-center w-full">
                            <h3 class="text-2xl font-bold mb-3 text-green-900">{{ $service->title }}</h3>
                            <p class="text-gray-500 text-base leading-relaxed mb-8 flex-1">{{ Str::limit($service->description, 90) }}</p>

                            @if($service->link)
                                <a href="{{ $service->link }}" target="_blank" class="mt-auto block w-full bg-green-50 border border-green-100 text-green-700 font-bold py-3 px-6 rounded-xl hover:bg-green-600 hover:text-white transition duration-300">
                                    تعرف المزيد
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center w-full text-gray-500">لا توجد خدمات متوفرة حالياً ....</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="products" class="py-24 bg-white/70 backdrop-blur-sm overflow-hidden" data-animate>
        <div class="container mx-auto px-4 mb-16">
            <h2 class="text-4xl font-bold text-center text-green-900">منتجاتنا الرائدة</h2>
        </div>
        <div class="w-full overflow-hidden" dir="ltr">
            <div class="flex gap-8 px-4 py-4 carousel-container overflow-x-auto hide-scrollbar snap-x snap-mandatory" dir="rtl">
                @forelse($products as $product)
                    <div class="w-[85vw] sm:w-[22rem] shrink-0 snap-start bg-white border border-gray-100 rounded-3xl shadow-sm hover:shadow-xl hover:border-green-300 transition duration-300 flex flex-col items-center group pt-8">

                        <div class="h-40 w-40 bg-gray-50 rounded-full flex items-center justify-center p-2 border-4 border-green-50 group-hover:border-green-200 transition duration-300 shadow-md overflow-hidden relative z-10">
                            @if($product->image)
                                <img src="{{ asset($product->image) }}" alt="{{ $product->name }}" class="w-full h-full object-cover rounded-full hover:scale-110 transition duration-500">
                            @else
                                <span class="text-5xl opacity-70">📦</span>
                            @endif
                        </div>

                        <div class="p-8 flex flex-col flex-1 text-center w-full">
                            <h3 class="text-2xl font-bold mb-3 text-green-900">{{ $product->name }}</h3>
                            <p class="text-gray-500 text-base leading-relaxed mb-8 flex-1">{{ Str::limit($product->description, 90) }}</p>

                            @if($product->link)
                                <a href="{{ $product->link }}" target="_blank" class="mt-auto block w-full bg-green-50 border border-green-100 text-green-700 font-bold py-3 px-6 rounded-xl hover:bg-green-600 hover:text-white transition duration-300">
                                    تعرف المزيد
                                </a>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center w-full text-gray-500">جاري إضافة المنتجات...</p>
                @endforelse
            </div>
        </div>
    </section>

   <section id="partners" class="py-16 bg-green-50/50 backdrop-blur-md shadow-inner overflow-hidden" data-animate>
        <div class="container mx-auto px-4 text-center mb-10">
            <h2 class="text-3xl font-bold text-green-900 relative inline-block">شركائنا في النجاح<span class="absolute bottom-0 right-0 h-1 w-20 bg-green-600 rounded-full transform translate-y-2"></span></h2>
        </div>
        <div class="w-full overflow-hidden" dir="ltr">
            <div class="flex items-center gap-8 px-4 py-4 carousel-container overflow-x-auto hide-scrollbar snap-x snap-mandatory" dir="rtl">
                @forelse($partners as $partner)
                    <div class="w-[85vw] sm:w-72 shrink-0 snap-start bg-white border border-gray-100 rounded-3xl shadow-sm hover:shadow-xl hover:border-green-300 transition duration-300 flex flex-col items-center group pt-8 pb-8">

                        <div class="h-40 w-40 bg-white rounded-full flex items-center justify-center p-4 border-4 border-green-50 group-hover:border-green-200 transition duration-300 shadow-md overflow-hidden relative z-10">
                            @if($partner->logo)
                                <img src="{{ asset($partner->logo) }}" alt="{{ $partner->name }}" class="w-full h-full object-cover rounded-full hover:scale-110 transition duration-500">
                            @else
                                <div class="w-full h-full bg-white rounded-full flex items-center justify-center shadow-inner">
                                    </div>
                            @endif
                        </div>

                        <div class="pt-6 flex flex-col items-center text-center w-full px-4">
                            <h4 class="text-xl font-bold text-green-900 group-hover:text-green-700 transition duration-300">{{ $partner->name }}</h4>
                        </div>
                    </div>
                @empty
                    <p class="text-center w-full text-gray-500">جاري تحديث قائمة الشركاء...</p>
                @endforelse
            </div>
        </div>
    </section>

    <section id="contact" class="py-24 bg-white backdrop-blur-md" data-animate>
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-green-900 relative inline-block">تواصل معنا<span class="absolute bottom-0 right-0 h-1 w-20 bg-green-600 rounded-full transform translate-y-2"></span></h2>
                <p class="text-gray-600 mt-6 text-lg max-w-2xl mx-auto">هل لديك استفسار أو ترغب في بدء مشروعك الرقمي معنا؟ نحن هنا للرد على كافة استفساراتك.</p>
            </div>
            <div class="max-w-6xl mx-auto bg-gray-50 rounded-3xl shadow-lg overflow-hidden flex flex-col md:flex-row border border-gray-100">

                <div class="md:w-2/5 bg-green-900 text-white p-10 flex flex-col justify-center relative overflow-hidden">
                    <div class="absolute -right-10 -top-10 w-40 h-40 bg-green-600 rounded-full opacity-50"></div>
                    <div class="absolute -left-10 -bottom-10 w-40 h-40 bg-green-600 rounded-full opacity-50"></div>
                    <h3 class="text-2xl font-bold mb-8 relative z-10 text-green-300">معلومات الاتصال</h3>
                    <div class="space-y-8 relative z-10">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white/10 text-green-300 rounded-full flex items-center justify-center text-xl shrink-0">📍</div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">العنوان الفعلي</h4>
                                <p class="text-gray-300 leading-relaxed">{{ $settings['contact_address'] ?? 'المملكة العربية السعودية، الرياض' }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white/10 text-green-300 rounded-full flex items-center justify-center text-xl shrink-0">📞</div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">رقم التواصل</h4>
                                <p class="text-gray-300" dir="ltr">{{ $settings['contact_phone'] ?? '+966 5X XXX XXXX' }}</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 bg-white/10 text-green-300 rounded-full flex items-center justify-center text-xl shrink-0">✉️</div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">البريد الإلكتروني</h4>
                                <p class="text-gray-300">{{ $settings['contact_email'] ?? 'info@durat-altawq.com' }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="md:w-3/5 p-10 bg-white">
                    @if(session('success'))
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-xl mb-6 font-semibold text-center">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{route('contact_messages.store')}}" method="POST" class="space-y-6">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2" for="name">الاسم الكامل</label>
                                <input type="text" id="name" name="name" value="{{ old('name') }}" class="w-full px-4 py-3 rounded-xl border @error('name') border-red-500 @else border-gray-200 @enderror focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-100 transition bg-gray-50 focus:bg-white" placeholder="اسمك">
                            </div>
                            <div>
                                <label class="block text-gray-700 font-semibold mb-2" for="phone">رقم الجوال</label>
                                <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" class="w-full px-4 py-3 rounded-xl border @error('phone') border-red-500 @else border-gray-200 @enderror focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-100 transition bg-gray-50 focus:bg-white" placeholder="مثال: 05XXXXXXXX" dir="rtl">
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2" for="email">البريد الإلكتروني</label>
                            <input type="email" id="email" name="email" value="{{ old('email') }}" class="w-full px-4 py-3 rounded-xl border @error('email') border-red-500 @else border-gray-200 @enderror focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-100 transition bg-gray-50 focus:bg-white" placeholder="example@domain.com" dir="rtl">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2" for="subject">الموضوع</label>
                            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" class="w-full px-4 py-3 rounded-xl border @error('subject') border-red-500 @else border-gray-200 @enderror focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-100 transition bg-gray-50 focus:bg-white" placeholder="عنوان رسالتك">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-semibold mb-2" for="content">الرسالة</label>
                            <textarea id="content" name="content" rows="4" class="w-full px-4 py-3 rounded-xl border @error('content') border-red-500 @else border-gray-200 @enderror focus:outline-none focus:border-green-600 focus:ring-2 focus:ring-green-100 transition bg-gray-50 focus:bg-white resize-none" placeholder="اكتب تفاصيل استفسارك أو طلبك هنا...">{{ old('content') }}</textarea>
                        </div>
                        <button type="submit" class="w-full bg-green-600 text-white font-bold text-lg py-4 rounded-xl hover:bg-green-800 transition duration-300 shadow-md transform hover:-translate-y-1">إرسال الرسالة</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const carousels = document.querySelectorAll('.carousel-container');

            carousels.forEach(carousel => {
                setInterval(() => {
                    // إيقاف التمرير لو الماوس على العنصر عشان العميل يقدر يقرأ التفاصيل براحته
                    if (carousel.matches(':hover')) return;

                    // حساب أقصى مسافة للتمرير
                    const maxScroll = carousel.scrollWidth - carousel.clientWidth;
                    const currentScroll = Math.abs(carousel.scrollLeft);

                    // لو وصلنا للآخر (بنسيب 10 بيكسل كنسبة خطأ في تقريب المتصفحات)
                    if (currentScroll >= maxScroll - 10) {
                        // ارجع للأول خالص بنعومة
                        carousel.scrollTo({ left: 0, behavior: 'smooth' });
                    } else {
                        // حرك بمقدار عرض الشاشة الظاهر عشان يجيب المجموعة اللي بعدها
                        carousel.scrollBy({ left: -carousel.clientWidth, behavior: 'smooth' });
                    }
                }, 4000); // 4000 = 4 ثواني وقوف
            });
        });
    </script>
@endsection
