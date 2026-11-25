<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lumbini Health Care Center - Specialist Hospital & Polyclinic in Bhairahawa</title>
    
    <!-- Meta SEO -->
    <meta name="description" content="Lumbini Health Care Center in Bhairahawa, Nepal provides premier gynecology, obstetrics, pediatrics, general medicine, 24/7 emergency & pharmacy, digital ultrasound, and laboratory diagnostics.">
    <meta name="keywords" content="Lumbini Health Care Center, Bhairahawa Hospital, Gynecology Clinic Nepal, Doctor Bhairahawa, Ultrasound Bhairahawa, Rupandehi Health">

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpg') }}">

    <!-- Google Fonts: Prata (Headings) & Karla (Body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=Prata&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
</head>
<body x-data="{
        mobileMenuOpen: false,
        searchOpen: false,
        searchQuery: '',
        bagOpen: false,
        videoOpen: false,
        activeDoctor: null,
        activeService: null,
        activeTestimonial: 0,
        activeFaq: null,
        showBackToTop: false,
        testimonials: @js($testimonials),
        services: @js($services),
        doctors: @js($doctors),
        blogPosts: @js($blogPosts)
    }"
    @scroll.window="showBackToTop = (window.pageYOffset > 400)"
    class="bg-white text-[#223645] font-['Karla',sans-serif] antialiased selection:bg-[#e12454] selection:text-white">

    <!-- ============================================================ -->
    <!-- 1. TOP BAR HEADER (Solid Crimson #e12454 matching Brivona)   -->
    <!-- ============================================================ -->
    <div class="bg-[#e12454] text-white text-xs py-2 px-4 relative z-40">
        <div class="max-w-7xl mx-auto flex flex-wrap justify-between items-center font-medium">
            <div class="flex items-center gap-3">
                <span class="opacity-90 flex items-center gap-1.5">
                    <span class="inline-block w-1.5 h-1.5 rounded-full bg-white animate-ping"></span>
                    Need Help: Provide comprehensive quality care and support services.
                </span>
            </div>
            <div class="flex items-center gap-5">
                <a href="tel:+977071591486" class="flex items-center gap-1.5 hover:underline transition">
                    <i class="fa-solid fa-phone text-xs opacity-90"></i>
                    <span>+977-071-591486</span>
                </a>
                <span class="opacity-40">|</span>
                <a href="mailto:info@lumbinihealthcare.com" class="hidden sm:flex items-center gap-1.5 hover:underline transition">
                    <i class="fa-solid fa-envelope text-xs opacity-90"></i>
                    <span>info@lumbinihealthcare.com</span>
                </a>
                <span class="opacity-40 hidden sm:inline">|</span>
                <span class="hidden md:flex items-center gap-1.5">
                    <i class="fa-solid fa-location-dot text-xs opacity-90"></i>
                    <span>Siddharthanagar-8, Bhairahawa</span>
                </span>
                <span class="opacity-40 hidden md:inline">|</span>
                <div class="flex items-center gap-3">
                    <a href="https://www.facebook.com/profile.php?id=100031414824460" target="_blank" rel="noopener noreferrer" title="Facebook" class="hover:opacity-80 transition text-sm">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="#" class="hover:opacity-80 transition text-sm"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="hover:opacity-80 transition text-sm"><i class="fa-brands fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- 2. MAIN NAVIGATION HEADER                                    -->
    <!-- ============================================================ -->
    <header class="sticky top-0 z-40 bg-white shadow-sm border-b border-slate-100 transition">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 h-20 flex items-center justify-between">
            <!-- Brand Logo with Official LHC Emblem -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="h-13 w-13 rounded-2xl bg-white p-1 border border-slate-200/80 shadow-sm flex items-center justify-center overflow-hidden group-hover:scale-105 transition">
                    <img src="{{ asset('images/logo.jpg') }}" alt="LHC - Lumbini Health Care Clinic" class="w-full h-full object-contain">
                </div>
                <div>
                    <span class="text-2xl font-['Prata',serif] font-bold tracking-tight text-[#223645] flex items-center gap-1">
                        Lumbini <span class="text-[#e12454]">Health</span>
                    </span>
                    <span class="block text-[10px] font-bold uppercase tracking-widest text-[#647589]">Care Clinic &bull; Bhairahawa</span>
                </div>
            </a>

            <!-- Navigation Links (Desktop) -->
            <nav class="hidden lg:flex items-center gap-8 text-sm font-semibold text-[#223645]">
                <a href="#home" class="text-[#e12454] hover:text-[#e12454] transition py-2 relative after:content-[''] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#e12454]">Home</a>
                <a href="#about" class="hover:text-[#e12454] transition py-2">About</a>
                <a href="{{ route('services.index') }}" class="hover:text-[#e12454] transition py-2">Services</a>
                <a href="#doctors" class="hover:text-[#e12454] transition py-2">Doctors</a>
                <a href="#testimonials" class="hover:text-[#e12454] transition py-2">Testimonials</a>
                <a href="#faq" class="hover:text-[#e12454] transition py-2">FAQ</a>
                <a href="#blog" class="hover:text-[#e12454] transition py-2">Blog</a>
                <a href="#contact" class="hover:text-[#e12454] transition py-2">Contact Us</a>
            </nav>

            <!-- Action Controls: Bag, Search, Appointment CTA, Hamburger -->
            <div class="flex items-center gap-3 sm:gap-4">
                <button type="button" @click="bagOpen = true" class="relative text-slate-700 hover:text-[#e12454] transition p-2 cursor-pointer" title="Quick Clinic Overview">
                    <i class="fa-solid fa-bag-shopping text-base"></i>
                    <span class="absolute top-0 right-0 w-4 h-4 bg-[#e12454] text-white text-[10px] font-bold rounded-full flex items-center justify-center">3</span>
                </button>
                <button type="button" @click="searchOpen = true" class="text-[#e12454] hover:text-[#c91845] transition p-2 cursor-pointer" title="Search Clinic Information">
                    <i class="fa-solid fa-magnifying-glass text-base"></i>
                </button>
                <a href="#appointment" class="hidden sm:inline-flex px-7 py-3 rounded-full bg-[#223645] hover:bg-[#e12454] text-white text-xs font-bold uppercase tracking-wider transition duration-300 shadow-md active:scale-95">
                    Get Appointment
                </a>

                <!-- Mobile Hamburger Button -->
                <button type="button" @click="mobileMenuOpen = true" class="lg:hidden p-2 text-slate-700 hover:text-[#e12454] focus:outline-none transition cursor-pointer" aria-label="Open mobile navigation">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- ============================================================ -->
    <!-- 3. HERO BANNER SLIDER (Brivona Revolution-style, Dynamic)   -->
    <!-- ============================================================ -->
    <style>
        .hero-banner picture {
            display: block;
            width: 100%;
        }

        .hero-banner picture img {
            object-fit: cover;
            display: block;
            width: 100%;
            height: auto;
        }
    </style>

    <section id="home" class="relative">
        @php($publishedSliderCount = $sliders->count())
        <div class="swiper heroSlider" data-slide-count="{{ max($publishedSliderCount, 1) }}">
            <div class="swiper-wrapper">
                @forelse ($sliders as $slide)
                <div class="swiper-slide">
                    <div class="hero-banner relative overflow-hidden">
                        <!-- Background Image -->
                        <picture>
                            <source media="(max-width: 767px)" srcset="{{ $slide->mobile_image_url }}">
                            <source media="(min-width: 768px) and (max-width: 1023px)" srcset="{{ $slide->tablet_image_url }}">
                            <img src="{{ $slide->image_url }}" alt="{{ $slide->mobile_title ?: ($slide->title ?? 'Lumbini Health Care') }}" loading="{{ $loop->first ? 'eager' : 'lazy' }}">
                        </picture>
                        <!-- Gradient overlay -->
                        <div class="absolute inset-0 bg-gradient-to-r from-[#223645]/80 via-[#223645]/40 to-transparent"></div>

                        <!-- Content -->
                        <div class="absolute inset-0 z-10 flex items-center">
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                                <div class="max-w-2xl space-y-6">
                                    @if($slide->subtitle || $slide->mobile_subtitle)
                                    <p class="hidden md:block text-sm md:text-base text-white/80 font-medium uppercase tracking-widest slide-subtitle" style="opacity:0; transform:translateY(30px);">
                                        {{ $slide->subtitle }}
                                    </p>
                                    <p class="md:hidden text-sm text-white/80 font-medium uppercase tracking-widest slide-subtitle" style="opacity:0; transform:translateY(30px);">
                                        {{ $slide->mobile_subtitle ?: $slide->subtitle }}
                                    </p>
                                    @endif

                                    @if($slide->title || $slide->mobile_title)
                                    <h1 class="hidden md:block text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-['Prata',serif] text-white leading-[1.1] slide-title" style="opacity:0; transform:translateY(40px);">
                                        {!! nl2br(e($slide->title)) !!}
                                    </h1>
                                    <h1 class="md:hidden text-4xl font-['Prata',serif] text-white leading-[1.1] slide-title" style="opacity:0; transform:translateY(40px);">
                                        {!! nl2br(e($slide->mobile_title ?: $slide->title)) !!}
                                    </h1>
                                    @endif

                                    @if($slide->button_text)
                                    <div class="flex flex-wrap items-center gap-5 pt-2 slide-cta" style="opacity:0; transform:translateY(30px);">
                                        <a href="{{ $slide->button_link ?? '#appointment' }}"
                                           class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-[#e12454] hover:bg-[#c91845] text-white text-sm font-bold uppercase tracking-wider transition duration-300 shadow-lg shadow-[#e12454]/30 hover:shadow-xl hover:shadow-[#e12454]/40 active:scale-95">
                                            <span>{{ $slide->button_text }}</span>
                                            <i class="fa-solid fa-arrow-right text-xs"></i>
                                        </a>
                                        <button type="button" @click="videoOpen = true" class="flex items-center gap-3 group cursor-pointer focus:outline-none">
                                            <span class="w-14 h-14 rounded-full bg-white/20 backdrop-blur-sm text-white flex items-center justify-center text-sm shadow-lg group-hover:bg-white group-hover:text-[#e12454] transition duration-300">
                                                <i class="fa-solid fa-play ml-0.5"></i>
                                            </span>
                                            <span class="text-sm font-bold uppercase tracking-wider text-white group-hover:text-white/80 transition hidden sm:inline">
                                                Watch Video
                                            </span>
                                        </button>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <!-- Fallback static slide when no DB slides exist -->
                <div class="swiper-slide">
                    <div class="hero-banner relative overflow-hidden">
                        <img src="{{ asset('images/slider_user.jpg') }}" alt="Lumbini Health Care Center" class="block w-full h-auto">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#223645]/80 via-[#223645]/40 to-transparent"></div>
                        <div class="absolute inset-0 z-10 flex items-center">
                            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                                <div class="max-w-2xl space-y-6">
                                    <p class="text-sm sm:text-base text-white/80 font-medium uppercase tracking-widest">
                                        Welcome to Lumbini Health Care
                                    </p>
                                    <h1 class="text-4xl sm:text-5xl lg:text-6xl xl:text-7xl font-['Prata',serif] text-white leading-[1.1]">
                                        Best Health Care <br><span class="text-[#e12454]">Clinic In Bhairahawa</span>
                                    </h1>
                                    <div class="flex flex-wrap items-center gap-5 pt-2">
                                        <a href="#appointment" class="inline-flex items-center gap-2 px-8 py-4 rounded-full bg-[#e12454] hover:bg-[#c91845] text-white text-sm font-bold uppercase tracking-wider transition duration-300 shadow-lg shadow-[#e12454]/30">
                                            <span>Book Appointment</span>
                                            <i class="fa-solid fa-arrow-right text-xs"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>

            <!-- Navigation controls are only needed when there is more than one published banner. -->
            @if ($publishedSliderCount > 1)
            <div class="swiper-button-prev !bg-transparent after:!text-white after:!text-sm !left-4 md:!left-8"></div>
            <div class="swiper-button-next !bg-transparent after:!text-white after:!text-sm !right-4 md:!right-8"></div>

            <div class="swiper-pagination !bottom-6 [&_.swiper-pagination-bullet]:!w-3 [&_.swiper-pagination-bullet]:!h-3 [&_.swiper-pagination-bullet]:!bg-white/50 [&_.swiper-pagination-bullet]:!opacity-100 [&_.swiper-pagination-bullet-active]:!bg-[#e12454] [&_.swiper-pagination-bullet-active]:!w-8 [&_.swiper-pagination-bullet-active]:!rounded-full"></div>
            @endif
        </div>
    </section>


    <!-- ============================================================ -->
    <!-- MOBILE OFF-CANVAS NAVIGATION DRAWER                          -->
    <!-- ============================================================ -->
    <div x-show="mobileMenuOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-hidden lg:hidden" 
         style="display: none;" 
         @keydown.escape.window="mobileMenuOpen = false">
        
        <!-- Backdrop -->
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="mobileMenuOpen = false"></div>

        <div class="fixed inset-y-0 right-0 max-w-full flex pl-10">
            <div x-show="mobileMenuOpen"
                 x-transition:enter="transform transition ease-in-out duration-300"
                 x-transition:enter-start="translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transform transition ease-in-out duration-300"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="translate-x-full"
                 class="w-screen max-w-xs sm:max-w-sm bg-white shadow-2xl p-6 flex flex-col justify-between overflow-y-auto">
                
                <div>
                    <!-- Drawer Header -->
                    <div class="flex items-center justify-between pb-6 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-10 h-10 rounded-xl bg-white p-0.5 border border-slate-200 flex items-center justify-center overflow-hidden shadow-sm">
                                <img src="{{ asset('images/logo.jpg') }}" alt="LHC Logo" class="w-full h-full object-contain">
                            </div>
                            <div>
                                <span class="text-lg font-['Prata',serif] font-bold text-[#223645] block leading-tight">Lumbini Health</span>
                                <span class="text-[9px] uppercase tracking-wider text-[#647589] font-bold">Care Clinic</span>
                            </div>
                        </div>
                        <button type="button" @click="mobileMenuOpen = false" class="p-2 text-slate-400 hover:text-slate-700 rounded-lg">
                            <i class="fa-solid fa-xmark text-lg"></i>
                        </button>
                    </div>

                    <!-- Drawer Nav Links -->
                    <nav class="py-6 space-y-4">
                        <a href="#home" @click="mobileMenuOpen = false" class="block text-sm font-bold text-[#e12454] hover:text-[#e12454] transition py-1">Home</a>
                        <a href="#about" @click="mobileMenuOpen = false" class="block text-sm font-semibold text-[#223645] hover:text-[#e12454] transition py-1">About Us</a>
                        <a href="{{ route('services.index') }}" @click="mobileMenuOpen = false" class="block text-sm font-semibold text-[#223645] hover:text-[#e12454] transition py-1">Our Services</a>
                        <a href="#doctors" @click="mobileMenuOpen = false" class="block text-sm font-semibold text-[#223645] hover:text-[#e12454] transition py-1">Specialist Doctors</a>
                        <a href="#testimonials" @click="mobileMenuOpen = false" class="block text-sm font-semibold text-[#223645] hover:text-[#e12454] transition py-1">Patient Testimonials</a>
                        <a href="#faq" @click="mobileMenuOpen = false" class="block text-sm font-semibold text-[#223645] hover:text-[#e12454] transition py-1">Frequently Asked Questions</a>
                        <a href="#blog" @click="mobileMenuOpen = false" class="block text-sm font-semibold text-[#223645] hover:text-[#e12454] transition py-1">Health Articles / Blog</a>
                        <a href="#contact" @click="mobileMenuOpen = false" class="block text-sm font-semibold text-[#223645] hover:text-[#e12454] transition py-1">Contact & Emergency</a>
                        <a href="/stnapanel" class="block text-sm font-semibold text-[#e12454] hover:underline pt-2 border-t border-slate-100">
                            <i class="fa-solid fa-lock text-xs mr-1"></i> Admin Portal
                        </a>
                    </nav>
                </div>

                <!-- Drawer Footer CTAs -->
                <div class="pt-6 border-t border-slate-100 space-y-4">
                    <a href="#appointment" @click="mobileMenuOpen = false" class="w-full py-3.5 px-6 rounded-full bg-[#e12454] hover:bg-[#c91845] text-white text-xs font-bold uppercase tracking-wider text-center block shadow-md">
                        Book Appointment Now
                    </a>
                    <a href="tel:+977071591486" class="w-full py-3 px-6 rounded-full border border-slate-200 text-slate-700 text-xs font-bold uppercase tracking-wider text-center flex items-center justify-center gap-2 hover:bg-slate-50">
                        <i class="fa-solid fa-phone text-[#e12454]"></i>
                        <span>Call +977-071-591486</span>
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- INTERACTIVE SEARCH MODAL                                     -->
    <!-- ============================================================ -->
    <div x-show="searchOpen" 
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto p-4 sm:p-6 md:p-20 flex items-start justify-center" 
         style="display: none;"
         @keydown.escape.window="searchOpen = false">
        
        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" @click="searchOpen = false"></div>

        <div class="relative w-full max-w-2xl bg-white rounded-2xl shadow-2xl border border-slate-200 overflow-hidden z-10" @click.away="searchOpen = false">
            <div class="p-4 border-b border-slate-100 flex items-center gap-3">
                <i class="fa-solid fa-magnifying-glass text-[#e12454] text-lg ml-2"></i>
                <input type="text" x-model="searchQuery" placeholder="Search medical services, doctors, or health topics..."
                       class="w-full py-2 px-2 text-slate-800 placeholder-slate-400 focus:outline-none text-base font-medium"
                       autofocus>
                <button type="button" @click="searchOpen = false" class="p-2 text-slate-400 hover:text-slate-600 rounded-lg">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>

            <!-- Instant Search Suggestions & Results -->
            <div class="p-6 max-h-96 overflow-y-auto space-y-4">
                <div x-show="!searchQuery.trim()">
                    <h5 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Popular Searches</h5>
                    <div class="flex flex-wrap gap-2">
                        <button type="button" @click="searchQuery = 'Gynecology'" class="px-3 py-1.5 rounded-full bg-slate-100 hover:bg-rose-50 hover:text-[#e12454] text-xs font-medium text-slate-700 transition">Gynecology & Maternity</button>
                        <button type="button" @click="searchQuery = 'Ultrasound'" class="px-3 py-1.5 rounded-full bg-slate-100 hover:bg-rose-50 hover:text-[#e12454] text-xs font-medium text-slate-700 transition">Color Ultrasound USG</button>
                        <button type="button" @click="searchQuery = 'Pediatric'" class="px-3 py-1.5 rounded-full bg-slate-100 hover:bg-rose-50 hover:text-[#e12454] text-xs font-medium text-slate-700 transition">Pediatric Vaccines</button>
                        <button type="button" @click="searchQuery = 'Emergency'" class="px-3 py-1.5 rounded-full bg-slate-100 hover:bg-rose-50 hover:text-[#e12454] text-xs font-medium text-slate-700 transition">24/7 Pharmacy & First Aid</button>
                    </div>
                </div>

                <div x-show="searchQuery.trim()">
                    <h5 class="text-xs font-bold uppercase tracking-wider text-slate-400 mb-3">Matching Results</h5>
                    <div class="space-y-2">
                        <!-- Filtered Services -->
                        <template x-for="service in services.filter(s => s.title.toLowerCase().includes(searchQuery.toLowerCase()) || s.short_description.toLowerCase().includes(searchQuery.toLowerCase()))" :key="service.id">
                            <div class="p-3 rounded-xl border border-slate-100 hover:border-rose-200 hover:bg-rose-50/40 transition flex items-center justify-between cursor-pointer"
                                 @click="searchOpen = false; activeService = service;">
                                <div>
                                    <h6 class="font-bold text-sm text-[#223645]" x-text="service.title"></h6>
                                    <p class="text-xs text-slate-500 line-clamp-1" x-text="service.short_description"></p>
                                </div>
                                <span class="text-xs font-bold text-[#e12454]">View Service &rarr;</span>
                            </div>
                        </template>

                        <!-- Filtered Doctors -->
                        <template x-for="doctor in doctors.filter(d => d.name.toLowerCase().includes(searchQuery.toLowerCase()) || d.specialty.toLowerCase().includes(searchQuery.toLowerCase()))" :key="doctor.id">
                            <div class="p-3 rounded-xl border border-slate-100 hover:border-rose-200 hover:bg-rose-50/40 transition flex items-center justify-between cursor-pointer"
                                 @click="searchOpen = false; activeDoctor = doctor;">
                                <div class="flex items-center gap-3">
                                    <img :src="doctor.image_url" :alt="doctor.name" class="w-10 h-10 rounded-full object-cover">
                                    <div>
                                        <h6 class="font-bold text-sm text-[#223645]" x-text="doctor.name"></h6>
                                        <p class="text-xs text-[#e12454]" x-text="doctor.specialty"></p>
                                    </div>
                                </div>
                                <span class="text-xs font-bold text-[#223645]">Doctor Profile &rarr;</span>
                            </div>
                        </template>
                    </div>
                </div>
            </div>

            <div class="p-3 bg-slate-50 border-t border-slate-100 text-center text-xs text-slate-500">
                Press <kbd class="px-1.5 py-0.5 rounded bg-white border border-slate-200 text-[10px] font-mono">ESC</kbd> to close search
            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- INTERACTIVE CONSULTATION BAG / QUICK INFO DRAWER             -->
    <!-- ============================================================ -->
    <div x-show="bagOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-hidden" 
         style="display: none;" 
         @keydown.escape.window="bagOpen = false">
        
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm" @click="bagOpen = false"></div>

        <div class="fixed inset-y-0 right-0 max-w-full flex pl-10">
            <div x-show="bagOpen"
                 x-transition:enter="transform transition ease-in-out duration-300"
                 x-transition:enter-start="translate-x-full"
                 x-transition:enter-end="translate-x-0"
                 x-transition:leave="transform transition ease-in-out duration-300"
                 x-transition:leave-start="translate-x-0"
                 x-transition:leave-end="translate-x-full"
                 class="w-screen max-w-sm bg-white shadow-2xl p-6 flex flex-col justify-between overflow-y-auto">
                
                <div>
                    <div class="flex items-center justify-between pb-5 border-b border-slate-100">
                        <div class="flex items-center gap-2.5">
                            <div class="w-8 h-8 rounded-lg bg-white p-0.5 border border-slate-200 flex items-center justify-center overflow-hidden shadow-sm">
                                <img src="{{ asset('images/logo.jpg') }}" alt="LHC Logo" class="w-full h-full object-contain">
                            </div>
                            <h4 class="font-['Prata',serif] font-bold text-lg text-[#223645]">Clinic Services Tray</h4>
                        </div>
                        <button type="button" @click="bagOpen = false" class="p-1.5 text-slate-400 hover:text-slate-700 rounded-lg">
                            <i class="fa-solid fa-xmark text-lg"></i>
                        </button>
                    </div>

                    <div class="py-6 space-y-4">
                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1">
                            <div class="flex items-center justify-between text-xs font-bold text-[#223645]">
                                <span>Gynecology & Maternity OPD</span>
                                <span class="text-[#e12454]">Active</span>
                            </div>
                            <p class="text-xs text-slate-500">Prenatal consultations, Doppler USG & Maternal Health.</p>
                        </div>

                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1">
                            <div class="flex items-center justify-between text-xs font-bold text-[#223645]">
                                <span>General Medicine Consultation</span>
                                <span class="text-[#e12454]">Active</span>
                            </div>
                            <p class="text-xs text-slate-500">Blood pressure, diabetes checkup & routine pathology.</p>
                        </div>

                        <div class="p-4 rounded-xl bg-slate-50 border border-slate-200/80 space-y-1">
                            <div class="flex items-center justify-between text-xs font-bold text-[#223645]">
                                <span>Emergency & Ambulance Desk</span>
                                <span class="text-emerald-600 font-bold">24/7 Ready</span>
                            </div>
                            <p class="text-xs text-slate-500">Direct hospital line: 071-591486 for urgent assistance.</p>
                        </div>
                    </div>
                </div>

                <div class="pt-6 border-t border-slate-100 space-y-3">
                    <a href="#appointment" @click="bagOpen = false" class="w-full py-3.5 px-6 rounded-full bg-[#e12454] hover:bg-[#c91845] text-white text-xs font-bold uppercase tracking-wider text-center block shadow-md">
                        Proceed to Book Appointment
                    </a>
                    <button type="button" @click="bagOpen = false" class="w-full py-2.5 text-xs font-bold text-slate-500 hover:text-slate-800 uppercase tracking-wider">
                        Continue Browsing
                    </button>
                </div>

            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- INTERACTIVE CLINIC VIDEO MODAL                               -->
    <!-- ============================================================ -->
    <div x-show="videoOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto p-4 flex items-center justify-center"
         style="display: none;"
         @keydown.escape.window="videoOpen = false">
        
        <div class="fixed inset-0 bg-slate-900/80 backdrop-blur-md" @click="videoOpen = false"></div>

        <div class="relative w-full max-w-3xl bg-slate-950 rounded-3xl overflow-hidden shadow-2xl z-10 border border-white/10" @click.away="videoOpen = false">
            <div class="p-4 flex items-center justify-between border-b border-white/10 text-white">
                <div class="flex items-center gap-2">
                    <i class="fa-solid fa-play text-[#e12454] text-xs"></i>
                    <h5 class="text-sm font-bold font-['Prata',serif]">Lumbini Health Care Center - Virtual Clinic Tour</h5>
                </div>
                <button type="button" @click="videoOpen = false" class="text-slate-400 hover:text-white p-1">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            
            <div class="aspect-video bg-slate-900 relative flex items-center justify-center p-6 text-center text-white">
                <div class="space-y-4 max-w-md">
                    <div class="w-20 h-20 mx-auto rounded-2xl bg-white p-2 border border-white/20 flex items-center justify-center shadow-xl shadow-black/40">
                        <img src="{{ asset('images/logo.jpg') }}" alt="LHC Logo" class="w-full h-full object-contain">
                    </div>
                    <h4 class="text-xl font-['Prata',serif] font-bold">Lumbini Health Care Clinic & Hospital</h4>
                    <p class="text-xs text-slate-300 leading-relaxed">
                        Located at Siddharthanagar-8, Bhairahawa, Nepal. Featuring modern gynecology suites, color Doppler USG imaging, computerized pathology lab, and 24/7 emergency response triage.
                    </p>
                    <a href="#appointment" @click="videoOpen = false" class="inline-block px-7 py-3 rounded-full bg-[#e12454] hover:bg-[#c91845] text-xs font-bold uppercase tracking-wider transition">
                        Schedule An On-Site Consultation &rarr;
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- INTERACTIVE DOCTOR PROFILE DETAIL MODAL                      -->
    <!-- ============================================================ -->
    <div x-show="activeDoctor"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto p-4 flex items-center justify-center"
         style="display: none;"
         @keydown.escape.window="activeDoctor = null">
        
        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" @click="activeDoctor = null"></div>

        <div class="relative w-full max-w-xl bg-white rounded-3xl overflow-hidden shadow-2xl z-10 border border-slate-200" @click.away="activeDoctor = null" x-show="activeDoctor">
            <template x-if="activeDoctor">
                <div>
                    <div class="relative h-48 bg-gradient-to-r from-slate-900 to-[#172431] overflow-hidden">
                        <img :src="activeDoctor.image_url" :alt="activeDoctor.name" class="w-full h-full object-cover opacity-30">
                        <button type="button" @click="activeDoctor = null" class="absolute top-4 right-4 w-9 h-9 rounded-full bg-black/40 text-white flex items-center justify-center hover:bg-[#e12454] transition">
                            <i class="fa-solid fa-xmark"></i>
                        </button>
                    </div>

                    <div class="p-8 pt-0 relative">
                        <div class="flex items-end justify-between -mt-16 mb-4">
                            <img :src="activeDoctor.image_url" :alt="activeDoctor.name" class="w-28 h-28 rounded-2xl object-cover object-top border-4 border-white shadow-xl bg-slate-100">
                            <span class="px-3 py-1.5 rounded-full bg-rose-50 text-[#e12454] text-xs font-bold uppercase tracking-wider" x-text="activeDoctor.qualification || 'Consultant Specialist'"></span>
                        </div>

                        <div class="space-y-3">
                            <h3 class="text-2xl font-['Prata',serif] font-bold text-[#223645]" x-text="activeDoctor.name"></h3>
                            <p class="text-xs font-bold text-[#e12454] uppercase tracking-wider" x-text="activeDoctor.specialty"></p>
                            
                            <p class="text-xs text-[#647589] leading-relaxed pt-1" x-text="activeDoctor.bio"></p>

                            <!-- OPD Hours Table -->
                            <div class="pt-3 border-t border-slate-100 space-y-2">
                                <h6 class="text-xs font-bold uppercase tracking-wider text-[#223645]">OPD Consultation Schedule</h6>
                                <div class="grid grid-cols-2 gap-2 text-xs">
                                    <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-200/80">
                                        <span class="text-slate-400 block text-[10px] uppercase font-bold">Days</span>
                                        <span class="font-bold text-slate-800">Sunday – Friday</span>
                                    </div>
                                    <div class="p-2.5 rounded-lg bg-slate-50 border border-slate-200/80">
                                        <span class="text-slate-400 block text-[10px] uppercase font-bold">Visiting Hours</span>
                                        <span class="font-bold text-[#e12454]">10:00 AM – 4:00 PM</span>
                                    </div>
                                </div>
                            </div>

                            <div class="pt-4 flex items-center justify-between gap-4">
                                <a :href="'tel:' + (activeDoctor.phone || '071591486')" class="py-3 px-5 rounded-full border border-slate-200 text-xs font-bold text-slate-700 hover:border-[#e12454] hover:text-[#e12454] transition flex items-center gap-2">
                                    <i class="fa-solid fa-phone"></i>
                                    <span>Direct Line</span>
                                </a>
                                <button type="button" 
                                        @click="$dispatch('select-doctor', { doctorId: activeDoctor.id }); activeDoctor = null; document.getElementById('appointment').scrollIntoView({ behavior: 'smooth' });"
                                        class="flex-1 py-3 px-6 rounded-full bg-[#e12454] hover:bg-[#c91845] text-white text-xs font-bold uppercase tracking-wider transition text-center shadow-md">
                                    Book With This Doctor &rarr;
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- INTERACTIVE SERVICE DETAIL MODAL                             -->
    <!-- ============================================================ -->
    <div x-show="activeService"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto p-4 flex items-center justify-center"
         style="display: none;"
         @keydown.escape.window="activeService = null">
        
        <div class="fixed inset-0 bg-slate-900/60 backdrop-blur-sm" @click="activeService = null"></div>

        <div class="relative w-full max-w-lg bg-white rounded-3xl overflow-hidden shadow-2xl z-10 border border-slate-200 p-8 space-y-5" @click.away="activeService = null" x-show="activeService">
            <template x-if="activeService">
                <div class="space-y-4">
                    <div class="flex items-center justify-between pb-3 border-b border-slate-100">
                        <div class="flex items-center gap-3">
                            <div class="w-12 h-12 rounded-2xl bg-rose-50 text-[#e12454] flex items-center justify-center text-xl font-bold">
                                <i class="fa-solid fa-stethoscope"></i>
                            </div>
                            <div>
                                <h3 class="text-xl font-['Prata',serif] font-bold text-[#223645]" x-text="activeService.title"></h3>
                                <span class="text-[11px] font-bold text-[#e12454] uppercase tracking-wider">Clinical Department</span>
                            </div>
                        </div>
                        <button type="button" @click="activeService = null" class="p-2 text-slate-400 hover:text-slate-700">
                            <i class="fa-solid fa-xmark text-lg"></i>
                        </button>
                    </div>

                    <div class="space-y-3">
                        <p class="text-xs text-[#223645] font-semibold leading-relaxed" x-text="activeService.short_description"></p>
                        <p class="text-xs text-[#647589] leading-relaxed" x-text="activeService.full_description || 'High precision clinical assessment, state-of-the-art diagnostic instruments, and certified medical professionals ensuring prompt treatment.'"></p>
                    </div>

                    <!-- Highlight Features -->
                    <div class="p-4 rounded-2xl bg-slate-50 border border-slate-200/80 space-y-2 text-xs">
                        <div class="flex items-center gap-2 text-slate-700">
                            <i class="fa-solid fa-check text-emerald-500"></i>
                            <span>Board-certified medical specialists</span>
                        </div>
                        <div class="flex items-center gap-2 text-slate-700">
                            <i class="fa-solid fa-check text-emerald-500"></i>
                            <span>Digital reports accessible via hospital desk</span>
                        </div>
                        <div class="flex items-center gap-2 text-slate-700">
                            <i class="fa-solid fa-check text-emerald-500"></i>
                            <span>Prioritized appointments for maternal care & emergencies</span>
                        </div>
                    </div>

                    <div class="pt-2 flex items-center gap-4">
                        <button type="button" 
                                @click="$dispatch('select-service', { serviceId: activeService.id }); activeService = null; document.getElementById('appointment').scrollIntoView({ behavior: 'smooth' });"
                                class="w-full py-3.5 px-6 rounded-full bg-[#e12454] hover:bg-[#c91845] text-white text-xs font-bold uppercase tracking-wider transition text-center shadow-md">
                            Book This Medical Service &rarr;
                        </button>
                    </div>
                </div>
            </template>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- 3. HERO SECTION (100% Matching Brivona Demo 3)               -->
    <!-- ============================================================ -->
    <section id="home" class="relative bg-[#f0f5f8] pt-8 pb-32 overflow-hidden border-b border-slate-100">
        
        <!-- Right side floating pink discount / emergency badge -->
        <div class="hidden xl:flex absolute top-12 right-0 bg-[#e12454] text-white py-4 px-3 rounded-l-2xl shadow-xl flex-col items-center gap-1 z-20">
            <i class="fa-solid fa-shield-heart text-lg"></i>
            <span class="text-[10px] font-extrabold uppercase tracking-widest writing-vertical rotate-180">{{ $homepageHero?->badge_top_text ?? '24/7 OPEN' }}</span>
            <span class="text-xs font-black">{{ $homepageHero?->badge_bottom_text ?? 'CARE' }}</span>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                
                <!-- Left: Full Doctor Portrait with Arms Crossed -->
                <div class="lg:col-span-5 relative order-2 lg:order-1 flex justify-center">
                    <div class="relative w-full max-w-md">
                        <!-- Soft decorative back glow -->
                        <div class="absolute inset-0 bg-[#e12454]/10 rounded-full filter blur-3xl transform -translate-x-4"></div>
                        <img src="{{ $homepageHero?->image_url ?? 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=800&q=85' }}"
                             alt="{{ $homepageHero?->image_alt ?? 'Smiling Specialist Doctor' }}"
                             class="relative z-10 w-full h-[520px] object-cover object-top rounded-3xl drop-shadow-2xl">
                    </div>
                </div>

                <!-- Right: Hero Typography & CTAs (Playfair / Prata serif style) -->
                <div class="lg:col-span-7 order-1 lg:order-2 space-y-6 lg:pl-6">
                    <h1 class="text-4xl sm:text-5xl lg:text-6xl font-['Prata',serif] text-[#223645] leading-[1.15]">
                        {{ $homepageHero?->title_prefix ?? 'Best' }} <span class="text-[#e12454]">{{ $homepageHero?->title_highlight ?? 'Health Care' }}</span><br>
                        {{ $homepageHero?->title_suffix ?? 'Clinic' }}
                    </h1>

                    <p class="text-base sm:text-lg text-[#647589] leading-relaxed max-w-xl">
                        {{ $homepageHero?->description ?? 'A specialised health center for your complete medical care and wellness. Dedicated maternal, diagnostic, and clinical specialist doctors serving Bhairahawa & Lumbini.' }}
                    </p>

                    <!-- Two Action Buttons (Our Services + Watch Video / Meet Doctors) -->
                    <div class="flex flex-wrap items-center gap-6 pt-3">
                        <a href="{{ $homepageHero?->primary_button_link ?? route('services.index') }}" class="px-8 py-3.5 rounded-full bg-white border-2 border-slate-200 text-[#223645] text-xs sm:text-sm font-bold uppercase tracking-wider hover:border-[#e12454] hover:text-[#e12454] transition shadow-sm">
                            {{ $homepageHero?->primary_button_text ?? 'Our Services' }}
                        </a>
                        <a href="{{ $homepageHero?->secondary_button_link ?? route('doctors.index') }}" class="flex items-center gap-3 group cursor-pointer focus:outline-none">
                            <span class="w-12 h-12 rounded-full bg-[#e12454] text-white flex items-center justify-center text-sm shadow-lg shadow-[#e12454]/30 group-hover:scale-110 transition duration-300">
                                <i class="fa-solid fa-play ml-0.5"></i>
                            </span>
                            <span class="text-xs sm:text-sm font-bold uppercase tracking-wider text-[#223645] group-hover:text-[#e12454] transition">
                                {{ $homepageHero?->secondary_button_text ?? 'Meet Doctors' }}
                            </span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 4. THREE OVERLAPPING FLOATING QUICK-SERVICE CARDS            -->
    <!-- ============================================================ -->
    <section class="relative -mt-20 z-30 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Card 1 -->
                <div class="bg-white rounded-xl p-8 border border-slate-200 shadow-xl hover:shadow-2xl hover:-translate-y-1 transition duration-300 text-center flex flex-col justify-between group">
                    <div>
                        <div class="w-16 h-16 mx-auto mb-5 rounded-full border-2 border-dashed border-[#e12454]/40 flex items-center justify-center text-[#e12454] text-2xl group-hover:bg-[#e12454] group-hover:text-white transition duration-300">
                            <i class="fa-solid fa-tooth"></i>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-['Prata',serif] font-bold text-[#223645] mb-3 group-hover:text-[#e12454] transition">Dental / OPD Care</h3>
                        <p class="text-sm sm:text-base text-[#647589] leading-relaxed mb-6">
                            Routine health screening, dental procedures, and general outpatient doctor consultations.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('services.show', 'general-medicine-opd') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-bold text-[#223645] hover:text-[#e12454] uppercase tracking-wider transition">
                            <span>Read More</span>
                            <i class="fa-solid fa-angles-right text-[10px] text-[#e12454]"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white rounded-xl p-8 border border-slate-200 shadow-xl hover:shadow-2xl hover:-translate-y-1 transition duration-300 text-center flex flex-col justify-between group">
                    <div>
                        <div class="w-16 h-16 mx-auto mb-5 rounded-full border-2 border-dashed border-[#e12454]/40 flex items-center justify-center text-[#e12454] text-2xl group-hover:bg-[#e12454] group-hover:text-white transition duration-300">
                            <i class="fa-solid fa-person-breastfeeding"></i>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-['Prata',serif] font-bold text-[#223645] mb-3 group-hover:text-[#e12454] transition">Gynecology Care</h3>
                        <p class="text-sm sm:text-base text-[#647589] leading-relaxed mb-6">
                            Dedicated maternal health, prenatal care, safe delivery assistance, and women wellness.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('services.show', 'gynecology-obstetrics') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-bold text-[#223645] hover:text-[#e12454] uppercase tracking-wider transition">
                            <span>Read More</span>
                            <i class="fa-solid fa-angles-right text-[10px] text-[#e12454]"></i>
                        </a>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white rounded-xl p-8 border border-slate-200 shadow-xl hover:shadow-2xl hover:-translate-y-1 transition duration-300 text-center flex flex-col justify-between group">
                    <div>
                        <div class="w-16 h-16 mx-auto mb-5 rounded-full border-2 border-dashed border-[#e12454]/40 flex items-center justify-center text-[#e12454] text-2xl group-hover:bg-[#e12454] group-hover:text-white transition duration-300">
                            <i class="fa-solid fa-microscope"></i>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-['Prata',serif] font-bold text-[#223645] mb-3 group-hover:text-[#e12454] transition">Modern Diagnostics</h3>
                        <p class="text-sm sm:text-base text-[#647589] leading-relaxed mb-6">
                            Color Doppler ultrasound, 12-lead digital ECG, and fast automated pathology lab testing.
                        </p>
                    </div>
                    <div>
                        <a href="{{ route('services.show', 'digital-usg-diagnostic-lab') }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-bold text-[#223645] hover:text-[#e12454] uppercase tracking-wider transition">
                            <span>Read More</span>
                            <i class="fa-solid fa-angles-right text-[10px] text-[#e12454]"></i>
                        </a>
                    </div>
                </div>

            </div>

            <!-- Banner Text Strip below cards -->
            <div class="mt-8 text-center text-xs sm:text-sm font-bold uppercase tracking-widest text-[#647589]">
                <span>We Are Here For Your Health &bull; Contact Reception: </span>
                <a href="tel:+977071591486" class="text-[#e12454] hover:underline font-extrabold">+977-071-591486</a>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 5. ABOUT US SECTION (Exact Brivona 2-Column Layout)         -->
    <!-- ============================================================ -->
    <section id="about" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                
                <!-- Left: Content, Doctor Quote & Button -->
                <div class="lg:col-span-6 space-y-6">
                    <div class="text-[#e12454] text-xs sm:text-sm font-bold uppercase tracking-widest">
                        {{ $homepageHero?->about_eyebrow ?? '- ABOUT US -' }}
                    </div>

                    <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-['Prata',serif] text-[#223645] leading-snug">
                        {{ $homepageHero?->about_title ?? 'We Give You The Perfect Care You Deserve' }}
                    </h2>

                    <p class="text-base sm:text-lg text-[#647589] leading-relaxed">
                        {{ $homepageHero?->about_description ?? 'Lumbini Health Care Center in Bhairahawa is built upon clinical precision, state-of-the-art diagnostic infrastructure, and deep patient compassion. We combine specialist doctors with responsive nursing staff to deliver health outcomes you can rely on.' }}
                    </p>

                    <!-- Doctor Profile Card (Square Doctor Photo + Title) -->
                    <div class="p-5 rounded-xl bg-slate-50 border border-slate-200/80 flex items-center gap-4">
                        <img src="{{ $homepageHero?->about_doctor_image_url ?? 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=200&q=80' }}"
                             alt="{{ $homepageHero?->about_doctor_name ?? 'Dr. Suresh Sharma' }}"
                             class="w-16 h-16 rounded-lg object-cover border border-slate-300">
                        <div>
                            <h4 class="font-['Prata',serif] font-bold text-base sm:text-lg text-[#223645]">{{ $homepageHero?->about_doctor_name ?? 'Dr. Suresh Sharma' }}</h4>
                            <p class="text-sm font-bold text-[#e12454]">{{ $homepageHero?->about_doctor_designation ?? 'Medical Director & Senior Consultant' }}</p>
                            <p class="text-xs sm:text-sm text-[#647589] mt-0.5">{{ $homepageHero?->about_doctor_credentials ?? 'Certified Healthcare Practitioner • 15+ Yrs Experience' }}</p>
                        </div>
                    </div>

                    <!-- Callout & 24/7 Hours -->
                    <div class="flex flex-wrap items-center gap-6 pt-2">
                        <a href="{{ $homepageHero?->about_button_link ?? route('services.index') }}" class="px-7 py-3.5 rounded-full bg-[#e12454] text-white text-xs sm:text-sm font-bold uppercase tracking-wider hover:bg-[#c91845] transition shadow-md shadow-[#e12454]/25">
                            {{ $homepageHero?->about_button_text ?? 'Our Services' }}
                        </a>
                        <div class="flex items-center gap-3">
                            <span class="w-10 h-10 rounded-full bg-rose-50 text-[#e12454] flex items-center justify-center text-sm font-bold">
                                <i class="fa-solid fa-clock-rotate-left"></i>
                            </span>
                            <span class="text-xs sm:text-sm font-bold text-[#223645] uppercase tracking-wider">
                                {{ $homepageHero?->about_emergency_text ?? '24/7 Hours Emergency Support' }}
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Right: High-Res Dental/Clinical Consultation Photo -->
                <div class="lg:col-span-6 relative">
                    <div class="rounded-2xl overflow-hidden shadow-2xl border-4 border-white bg-slate-100">
                        <img src="{{ $homepageHero?->about_image_url ?? 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=900&q=85' }}"
                             alt="{{ $homepageHero?->about_image_alt ?? 'Clinical Care at Lumbini Health Care Center' }}"
                             class="w-full h-[440px] object-cover hover:scale-105 transition duration-700">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 6. SERVICES SECTION (Geometric Background + 6 Cards)        -->
    <!-- ============================================================ -->
    <section id="services" class="py-24 bg-[#f0f5f8] border-t border-slate-200/60">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
                <div class="text-[#e12454] text-xs sm:text-sm font-bold uppercase tracking-widest">
                    - SERVICES -
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-['Prata',serif] text-[#223645] leading-snug">
                    Comprehensive Management Of Your Medical & Health Needs
                </h2>
                <p class="text-base sm:text-lg text-[#647589] leading-relaxed max-w-2xl mx-auto">
                    Dedicated maternal care, modern digital diagnostics, emergency triage, and outpatient specialist consultations in Bhairahawa.
                </p>
            </div>

            <!-- 6 Grid Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($services->take(5) as $service)
                    <div class="bg-white rounded-xl p-8 border border-slate-200 shadow-md hover:shadow-xl hover:-translate-y-1 transition duration-300 flex flex-col justify-between relative overflow-hidden group">
                        <!-- Subtle watermark icon in corner -->
                        <div class="absolute -bottom-4 -right-4 text-slate-100 group-hover:text-rose-50 text-7xl pointer-events-none transition">
                            <i class="fa-solid fa-stethoscope"></i>
                        </div>

                        <div class="relative z-10">
                            <div class="w-14 h-14 rounded-full bg-rose-50 text-[#e12454] flex items-center justify-center text-2xl mb-5 group-hover:bg-[#e12454] group-hover:text-white transition">
                                @if (str_contains($service->icon, 'heart'))
                                    <i class="fa-solid fa-heart-pulse"></i>
                                @elseif (str_contains($service->icon, 'stethoscope'))
                                    <i class="fa-solid fa-stethoscope"></i>
                                @elseif (str_contains($service->icon, 'baby'))
                                    <i class="fa-solid fa-baby"></i>
                                @elseif (str_contains($service->icon, 'bone'))
                                    <i class="fa-solid fa-bone"></i>
                                @else
                                    <i class="fa-solid fa-microscope"></i>
                                @endif
                            </div>

                            <h3 class="text-xl sm:text-2xl font-['Prata',serif] font-bold text-[#223645] mb-2.5 group-hover:text-[#e12454] transition">
                                <a href="{{ route('services.show', $service->slug) }}" class="hover:underline">
                                    {{ $service->title }}
                                </a>
                            </h3>

                            <p class="text-sm sm:text-[15px] text-[#647589] leading-relaxed mb-6">
                                {{ $service->short_description }}
                            </p>
                        </div>

                        <div class="relative z-10 pt-4 border-t border-slate-100 flex items-center justify-between">
                            <a href="{{ route('services.show', $service->slug) }}" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-bold text-[#223645] hover:text-[#e12454] uppercase tracking-wider transition cursor-pointer">
                                <span>Read More</span>
                                <i class="fa-solid fa-angles-right text-[10px] text-[#e12454]"></i>
                            </a>
                            <a href="#appointment" @click="activeService = {{ json_encode($service) }}" class="text-xs sm:text-sm font-bold text-[#e12454] hover:underline">
                                Book Now
                            </a>
                        </div>
                    </div>
                @endforeach

                <!-- 6th Special Action Card with Image & Magnifying Glass -->
                <div class="rounded-xl overflow-hidden relative shadow-md group flex flex-col justify-end p-8 text-white min-h-[300px]">
                    <img src="https://images.unsplash.com/photo-1579154204601-01588f351e67?auto=format&fit=crop&w=600&q=80"
                         alt="Diagnostics" class="absolute inset-0 w-full h-full object-cover group-hover:scale-105 transition duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-[#172431] via-[#172431]/80 to-transparent"></div>

                    <div class="relative z-10 text-center space-y-4">
                        <div class="w-14 h-14 mx-auto rounded-full bg-white/20 backdrop-blur-md flex items-center justify-center text-white text-xl">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <h3 class="text-xl sm:text-2xl font-['Prata',serif] font-bold text-white">
                            Check All Services
                        </h3>
                        <a href="{{ route('services.index') }}" class="inline-block px-6 py-3 rounded-full bg-[#e12454] hover:bg-[#c91845] text-white text-xs sm:text-sm font-bold uppercase tracking-wider transition shadow-md">
                            Explore All Services &rarr;
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 7. FOUR-PHOTO CLINIC GALLERY STRIP                           -->
    <!-- ============================================================ -->
    <section class="bg-white">
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-0">
            <div class="aspect-[4/3] overflow-hidden group">
                <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=600&q=80"
                     alt="Consultation" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
            </div>
            <div class="aspect-[4/3] overflow-hidden group">
                <img src="https://images.unsplash.com/photo-1584515979956-d9f6e5d09982?auto=format&fit=crop&w=600&q=80"
                     alt="Maternity Clinic" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
            </div>
            <div class="aspect-[4/3] overflow-hidden group">
                <img src="https://images.unsplash.com/photo-1581595220892-b0739db3ba8c?auto=format&fit=crop&w=600&q=80"
                     alt="Examination" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
            </div>
            <div class="aspect-[4/3] overflow-hidden group">
                <img src="https://images.unsplash.com/photo-1579154204601-01588f351e67?auto=format&fit=crop&w=600&q=80"
                     alt="Lab Diagnostics" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 8. CRIMSON STATISTICS COUNTER BAR (#e12454)                  -->
    <!-- ============================================================ -->
    <section class="py-12 bg-[#e12454] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center divide-y lg:divide-y-0 lg:divide-x divide-white/20">
                <div class="pt-4 lg:pt-0">
                    <div class="text-3xl sm:text-4xl font-['Prata',serif] font-bold mb-1 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-hospital-user text-2xl opacity-90"></i>
                        <span>25k+</span>
                    </div>
                    <p class="text-xs uppercase tracking-widest font-semibold opacity-90">Happy Patients</p>
                </div>
                <div class="pt-4 lg:pt-0">
                    <div class="text-3xl sm:text-4xl font-['Prata',serif] font-bold mb-1 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-heart text-2xl opacity-90"></i>
                        <span>920+</span>
                    </div>
                    <p class="text-xs uppercase tracking-widest font-semibold opacity-90">Safe Deliveries</p>
                </div>
                <div class="pt-4 lg:pt-0">
                    <div class="text-3xl sm:text-4xl font-['Prata',serif] font-bold mb-1 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-stethoscope text-2xl opacity-90"></i>
                        <span>850+</span>
                    </div>
                    <p class="text-xs uppercase tracking-widest font-semibold opacity-90">Emergency Care</p>
                </div>
                <div class="pt-4 lg:pt-0">
                    <div class="text-3xl sm:text-4xl font-['Prata',serif] font-bold mb-1 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-user-doctor text-2xl opacity-90"></i>
                        <span>620+</span>
                    </div>
                    <p class="text-xs uppercase tracking-widest font-semibold opacity-90">Specialist Staff</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 9. MEET OUR SKILLED TEAM (Doctor Cards with Red + Button)    -->
    <!-- ============================================================ -->
    <section id="doctors" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                <div class="text-[#e12454] text-xs sm:text-sm font-bold uppercase tracking-widest">
                    - EXPERT DOCTORS -
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-['Prata',serif] text-[#223645] leading-snug">
                    Meet Our Skilled Medical Team
                </h2>
                <p class="text-base sm:text-lg text-[#647589] leading-relaxed">
                    Qualified senior consultants providing compassionate, evidence-based healthcare for you and your family.
                </p>
            </div>

            <!-- Doctor Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach ($doctors as $doctor)
                    <div class="bg-white rounded-xl overflow-hidden border border-slate-200 shadow-md hover:shadow-xl transition duration-300 group">
                        <!-- Photo Frame with Red Plus Icon Button at bottom right -->
                        <div class="relative aspect-[4/4] overflow-hidden bg-slate-100">
                            <img src="{{ $doctor->image_url }}" alt="{{ $doctor->name }}"
                                 class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500">
                            
                            <!-- Red Square + Button (Click opens Doctor Modal) -->
                            <button type="button" @click="activeDoctor = {{ json_encode($doctor) }}" class="absolute bottom-0 right-0 w-11 h-11 bg-[#e12454] text-white flex items-center justify-center text-lg hover:bg-[#c91845] transition cursor-pointer" title="View Doctor Profile & Schedule">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                        </div>

                        <!-- Info Box -->
                        <div class="p-6 text-center space-y-2">
                            <h3 class="text-xl sm:text-2xl font-['Prata',serif] font-bold text-[#223645] group-hover:text-[#e12454] transition">
                                <a href="{{ route('doctors.show', $doctor->slug) }}">
                                    {{ $doctor->name }}
                                </a>
                            </h3>
                            <p class="text-sm sm:text-[15px] font-semibold text-[#e12454]">
                                {{ $doctor->specialty }}
                            </p>
                            <p class="text-xs sm:text-sm text-[#647589]">
                                {{ $doctor->qualification }}
                            </p>
                            <div class="pt-2 flex items-center justify-center gap-4 text-xs font-bold uppercase tracking-wider">
                                <a href="{{ route('doctors.show', $doctor->slug) }}" class="text-[#223645] hover:text-[#e12454] transition">
                                    Profile &rarr;
                                </a>
                                <span class="text-slate-300">&bull;</span>
                                <a href="{{ route('doctors.show', $doctor->slug) }}#appointment" class="text-[#e12454] hover:underline transition">
                                    Book Slot
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- View All Doctors Link & Dots -->
            <div class="mt-12 text-center space-y-4">
                <a href="{{ route('doctors.index') }}" class="inline-flex items-center gap-2 px-8 py-3.5 rounded-full bg-[#223645] hover:bg-[#e12454] text-white text-xs sm:text-sm font-bold uppercase tracking-wider transition shadow-md">
                    <span>View All Specialist Doctors</span>
                    <i class="fa-solid fa-arrow-right text-xs"></i>
                </a>

                <!-- Indicator Dots matching Brivona Demo -->
                <div class="flex justify-center items-center gap-2 pt-2">
                    <span class="w-6 h-1.5 rounded-full bg-slate-300"></span>
                    <span class="w-8 h-1.5 rounded-full bg-[#e12454]"></span>
                    <span class="w-6 h-1.5 rounded-full bg-slate-300"></span>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 10. PARTNERSHIP BANNER (Doctor & Floating Card)              -->
    <!-- ============================================================ -->
    <section class="py-20 bg-slate-100 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                
                <!-- Doctor Image Left -->
                <div class="lg:col-span-5 flex justify-center">
                    <img src="https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=700&q=80"
                         alt="Consultant Doctor" class="rounded-2xl shadow-xl w-full max-w-sm object-cover">
                </div>

                <!-- Floating Card Right -->
                <div class="lg:col-span-7 bg-white p-8 sm:p-12 rounded-2xl border border-slate-200 shadow-xl space-y-5">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-xl bg-white p-1 border border-slate-200/80 shadow-sm flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/logo.jpg') }}" alt="LHC Logo" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <span class="text-xl font-['Prata',serif] font-bold text-[#223645] block leading-tight">Lumbini Health Care Clinic</span>
                            <span class="text-[10px] sm:text-xs font-bold uppercase tracking-wider text-[#647589]">Official Medical Facility</span>
                        </div>
                    </div>

                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-['Prata',serif] text-[#223645] leading-snug">
                        We Established Connection With Respected Medical Partners
                    </h2>

                    <p class="text-base sm:text-lg text-[#647589] leading-relaxed">
                        To offer our community continuous, cashless, and comprehensive healthcare coverage, we collaborate with respected diagnostic labs, government health initiatives, and health insurance partners across Nepal.
                    </p>

                    <div>
                        <a href="#appointment" class="inline-block px-7 py-3.5 rounded-full bg-[#e12454] hover:bg-[#c91845] text-white text-xs sm:text-sm font-bold uppercase tracking-wider transition shadow-md">
                            Join With Us
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 11. TESTIMONIALS SECTION ("Words From Our Customers")         -->
    <!-- ============================================================ -->
    <section id="testimonials" class="py-24 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center space-y-6">
            <div class="text-[#e12454] text-xs sm:text-sm font-bold uppercase tracking-widest">
                - TESTIMONIALS -
            </div>

            <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-['Prata',serif] text-[#223645] leading-snug">
                Words From Our Patients
            </h2>

            <p class="text-base sm:text-lg text-[#647589] leading-relaxed max-w-xl mx-auto">
                Real experiences from families and patients treated with care at Lumbini Health Care Center.
            </p>

            <!-- Interactive Arc of 5 Patient Avatars -->
            <div class="flex justify-center items-center gap-3 sm:gap-6 pt-2">
                <template x-for="(item, idx) in testimonials" :key="item.id">
                    <div class="cursor-pointer transition duration-300" @click="activeTestimonial = idx">
                        <img :src="item.avatar_url" :alt="item.patient_name" 
                             :class="activeTestimonial === idx 
                                ? 'w-20 h-20 border-4 border-[#e12454] shadow-xl scale-110' 
                                : 'w-12 h-12 border-2 border-slate-200 opacity-60 hover:opacity-100 hover:scale-105'"
                             class="rounded-full object-cover transition duration-300">
                    </div>
                </template>
            </div>

            <!-- Dynamic Rating Stars -->
            <div class="flex justify-center items-center gap-1 text-amber-400 text-sm pt-2">
                <template x-for="i in (testimonials[activeTestimonial]?.rating || 5)" :key="i">
                    <i class="fa-solid fa-star"></i>
                </template>
            </div>

            <!-- Dynamic Quote Text -->
            <p class="text-base sm:text-lg md:text-xl text-[#223645] italic leading-relaxed max-w-2xl mx-auto min-h-[4.5rem] transition"
               x-text="'“' + testimonials[activeTestimonial]?.review + '”'">
            </p>

            <div>
                <h4 class="font-['Prata',serif] font-bold text-lg sm:text-xl text-[#223645]" x-text="testimonials[activeTestimonial]?.patient_name"></h4>
                <p class="text-sm text-[#647589] mt-0.5" x-text="testimonials[activeTestimonial]?.patient_role"></p>
            </div>

            <!-- Small indicator dots -->
            <div class="flex justify-center items-center gap-2 pt-2">
                <template x-for="(item, idx) in testimonials" :key="'dot-' + item.id">
                    <button type="button" @click="activeTestimonial = idx"
                            :class="activeTestimonial === idx ? 'w-6 bg-[#e12454]' : 'w-2 bg-slate-300'"
                            class="h-1.5 rounded-full transition-all duration-300"></button>
                </template>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- NEW SECTION: FREQUENTLY ASKED QUESTIONS (FAQ ACCORDION)       -->
    <!-- ============================================================ -->
    <section id="faq" class="py-24 brivona-pattern-bg border-t border-slate-200/60">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                <div class="text-[#e12454] text-xs sm:text-sm font-bold uppercase tracking-widest">
                    - FAQ -
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-['Prata',serif] text-[#223645] leading-snug">
                    Frequently Asked Questions
                </h2>
                <p class="text-base sm:text-lg text-[#647589] leading-relaxed">
                    Find answers regarding doctor availability, diagnostic services, emergency admission, and healthcare policies in Bhairahawa.
                </p>
            </div>

            <!-- Accordion Items -->
            <div class="space-y-4">
                
                <!-- FAQ 1 -->
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden transition">
                    <button type="button" @click="activeFaq = (activeFaq === 1 ? null : 1)" 
                            class="w-full p-5 sm:p-6 text-left flex items-center justify-between font-bold text-[#223645] hover:text-[#e12454] transition cursor-pointer">
                        <span class="text-base sm:text-lg font-['Prata',serif]">What are the outpatient (OPD) consultation hours at Lumbini Health Care?</span>
                        <span class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-xs text-[#e12454] transition transform" :class="activeFaq === 1 ? 'rotate-180 bg-rose-50' : ''">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </button>
                    <div x-show="activeFaq === 1" x-collapse class="px-5 sm:px-6 pb-5 sm:pb-6 text-sm sm:text-base text-[#647589] leading-relaxed border-t border-slate-100 pt-3">
                        Our regular Outpatient Department (OPD) is open from Sunday to Friday between <strong>7:00 AM and 8:00 PM</strong>. Special consultant rounds (Gynecology, Cardiology, Pediatrics) typically operate from 10:00 AM to 4:00 PM. Emergency triage and the in-house pharmacy remain open 24 hours a day.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden transition">
                    <button type="button" @click="activeFaq = (activeFaq === 2 ? null : 2)" 
                            class="w-full p-5 sm:p-6 text-left flex items-center justify-between font-bold text-[#223645] hover:text-[#e12454] transition cursor-pointer">
                        <span class="text-base sm:text-lg font-['Prata',serif]">How can I reserve a prioritized doctor appointment?</span>
                        <span class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-xs text-[#e12454] transition transform" :class="activeFaq === 2 ? 'rotate-180 bg-rose-50' : ''">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </button>
                    <div x-show="activeFaq === 2" x-collapse class="px-5 sm:px-6 pb-5 sm:pb-6 text-sm sm:text-base text-[#647589] leading-relaxed border-t border-slate-100 pt-3">
                        You can easily schedule your visit using the online appointment form below on this website, or by calling our direct clinic desk at <strong>+977-071-591486</strong>. Our reception team will assign your time slot and confirm via phone within 15 minutes.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden transition">
                    <button type="button" @click="activeFaq = (activeFaq === 3 ? null : 3)" 
                            class="w-full p-5 sm:p-6 text-left flex items-center justify-between font-bold text-[#223645] hover:text-[#e12454] transition cursor-pointer">
                        <span class="text-base sm:text-lg font-['Prata',serif]">Are Color Doppler Ultrasound (USG) and laboratory reports given same-day?</span>
                        <span class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-xs text-[#e12454] transition transform" :class="activeFaq === 3 ? 'rotate-180 bg-rose-50' : ''">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </button>
                    <div x-show="activeFaq === 3" x-collapse class="px-5 sm:px-6 pb-5 sm:pb-6 text-sm sm:text-base text-[#647589] leading-relaxed border-t border-slate-100 pt-3">
                        Yes. Standard obstetric and abdominal ultrasounds, digital 12-lead ECGs, and routine blood tests (CBC, sugar, lipid profiles, thyroid panels) are processed through automated Japanese analyzers with verified medical reports delivered on the exact same day.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden transition">
                    <button type="button" @click="activeFaq = (activeFaq === 4 ? null : 4)" 
                            class="w-full p-5 sm:p-6 text-left flex items-center justify-between font-bold text-[#223645] hover:text-[#e12454] transition cursor-pointer">
                        <span class="text-base sm:text-lg font-['Prata',serif]">What specialized maternal and women's health services do you offer?</span>
                        <span class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-xs text-[#e12454] transition transform" :class="activeFaq === 4 ? 'rotate-180 bg-rose-50' : ''">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </button>
                    <div x-show="activeFaq === 4" x-collapse class="px-5 sm:px-6 pb-5 sm:pb-6 text-sm sm:text-base text-[#647589] leading-relaxed border-t border-slate-100 pt-3">
                        Headed by senior obstetrician-gynecologists, our maternal unit offers comprehensive prenatal care, fetal anomaly scanning, painless labor guidance, fertility counseling, cervical cancer screening (Pap smear), and adolescent reproductive health checkups.
                    </div>
                </div>

                <!-- FAQ 5 -->
                <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden transition">
                    <button type="button" @click="activeFaq = (activeFaq === 5 ? null : 5)" 
                            class="w-full p-5 sm:p-6 text-left flex items-center justify-between font-bold text-[#223645] hover:text-[#e12454] transition cursor-pointer">
                        <span class="text-base sm:text-lg font-['Prata',serif]">Where is Lumbini Health Care Center located and is parking available?</span>
                        <span class="w-8 h-8 rounded-full bg-slate-50 flex items-center justify-center text-xs text-[#e12454] transition transform" :class="activeFaq === 5 ? 'rotate-180 bg-rose-50' : ''">
                            <i class="fa-solid fa-chevron-down"></i>
                        </span>
                    </button>
                    <div x-show="activeFaq === 5" x-collapse class="px-5 sm:px-6 pb-5 sm:pb-6 text-sm sm:text-base text-[#647589] leading-relaxed border-t border-slate-100 pt-3">
                        We are conveniently situated at <strong>Siddharthanagar-8, Bhairahawa, Rupandehi, Nepal</strong>, easily accessible from the main highway and Lumbini Gate with dedicated ambulance access and patient vehicle parking.
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 12. APPOINTMENT BOOKING SECTION (Form Left, Photo Right)     -->
    <!-- ============================================================ -->
    <section id="appointment" class="py-24 bg-slate-50 border-t border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
                
                <!-- Left: Form Card with Geometric Watermark Background -->
                <div class="lg:col-span-7 bg-white p-8 sm:p-10 rounded-2xl border border-slate-200 shadow-xl watermark-pattern">
                    <div class="mb-6 space-y-2">
                        <div class="text-[#e12454] text-xs sm:text-sm font-bold uppercase tracking-widest">
                            - APPOINTMENT -
                        </div>
                        <h2 class="text-2xl sm:text-3xl lg:text-4xl font-['Prata',serif] text-[#223645]">
                            Send Us Quotation / Book Appointment
                        </h2>
                        <p class="text-sm sm:text-base text-[#647589]">
                            Fill in your consultation requirements below. Our medical front desk will promptly confirm your appointment slot.
                        </p>
                    </div>

                    <!-- Livewire Interactive Component -->
                    <livewire:appointment-booking />
                </div>

                <!-- Right: Patient & Doctor Photo -->
                <div class="lg:col-span-5">
                    <div class="rounded-2xl overflow-hidden shadow-xl border-4 border-white bg-slate-100">
                        <img src="https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=800&q=85"
                             alt="Doctor with patient" class="w-full h-[520px] object-cover">
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 13. FEATURED BLOG ARTICLES ("Featured Blog Articles")        -->
    <!-- ============================================================ -->
    <section id="blog" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Header -->
            <div class="text-center max-w-2xl mx-auto mb-16 space-y-3">
                <div class="text-[#e12454] text-xs sm:text-sm font-bold uppercase tracking-widest">
                    - FROM BLOG -
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-['Prata',serif] text-[#223645] leading-snug">
                    Featured Health Articles & News
                </h2>
                <p class="text-base sm:text-lg text-[#647589] leading-relaxed">
                    Preventive medical insights, wellness guidance, and maternity care tips from our clinical team.
                </p>
            </div>

            <!-- 2 Cards Layout matching Brivona Demo -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-5xl mx-auto">
                @foreach ($blogPosts->take(2) as $post)
                    <article class="bg-white rounded-xl overflow-hidden border border-slate-200 shadow-md hover:shadow-xl transition duration-300 flex flex-col sm:flex-row group">
                        <!-- Left Thumbnail -->
                        <div class="sm:w-1/2 aspect-[4/3] sm:aspect-auto overflow-hidden bg-slate-100">
                            <img src="{{ $post->image_url }}" alt="{{ $post->title }}"
                                 class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        </div>

                        <!-- Right Content Box -->
                        <div class="sm:w-1/2 p-6 flex flex-col justify-between space-y-3">
                            <div class="space-y-2.5">
                                <div class="flex items-center gap-2 text-xs font-bold text-[#e12454] uppercase tracking-wider">
                                    <span>&bull; {{ $post->category }}</span>
                                    <span>&bull; {{ $post->published_at ? $post->published_at->format('d M') : '25 Oct' }}</span>
                                </div>

                                <h3 class="text-lg sm:text-xl font-['Prata',serif] font-bold text-[#223645] group-hover:text-[#e12454] transition leading-snug">
                                    {{ $post->title }}
                                </h3>

                                <p class="text-sm sm:text-[15px] text-[#647589] leading-relaxed line-clamp-3">
                                    {{ $post->excerpt }}
                                </p>
                            </div>

                            <div class="pt-2">
                                <a href="#appointment" class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-bold text-[#223645] hover:text-[#e12454] uppercase tracking-wider transition">
                                    <span>Read More</span>
                                    <i class="fa-solid fa-angles-right text-[10px] text-[#e12454]"></i>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <!-- Indicator Dots -->
            <div class="flex justify-center items-center gap-2 mt-12">
                <span class="w-6 h-1.5 rounded-full bg-slate-300"></span>
                <span class="w-8 h-1.5 rounded-full bg-[#e12454]"></span>
                <span class="w-6 h-1.5 rounded-full bg-slate-300"></span>
            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 14. PRE-FOOTER CONTACT BAR (Solid Crimson #e12454)           -->
    <!-- ============================================================ -->
    <section id="contact" class="py-10 bg-[#e12454] text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center divide-y md:divide-y-0 md:divide-x divide-white/20">
                
                <!-- Col 1: Address -->
                <div class="flex items-center gap-4 pt-4 md:pt-0">
                    <div class="w-12 h-12 rounded-full border border-white/40 flex items-center justify-center text-xl flex-shrink-0">
                        <i class="fa-solid fa-location-dot"></i>
                    </div>
                    <div>
                        <h4 class="text-[11px] uppercase tracking-widest font-extrabold opacity-80">Address:</h4>
                        <p class="font-bold text-sm">Siddharthanagar-8, Bhairahawa, Nepal</p>
                    </div>
                </div>

                <!-- Col 2: Office Hours -->
                <div class="flex items-center gap-4 pt-4 md:pt-0 md:pl-8">
                    <div class="w-12 h-12 rounded-full border border-white/40 flex items-center justify-center text-xl flex-shrink-0">
                        <i class="fa-regular fa-clock"></i>
                    </div>
                    <div>
                        <h4 class="text-[11px] uppercase tracking-widest font-extrabold opacity-80">Office Hours:</h4>
                        <p class="font-bold text-sm">Sun - Fri : 7:00am - 8:00pm</p>
                    </div>
                </div>

                <!-- Col 3: Mail Us -->
                <div class="flex items-center gap-4 pt-4 md:pt-0 md:pl-8">
                    <div class="w-12 h-12 rounded-full border border-white/40 flex items-center justify-center text-xl flex-shrink-0">
                        <i class="fa-regular fa-envelope"></i>
                    </div>
                    <div>
                        <h4 class="text-[11px] uppercase tracking-widest font-extrabold opacity-80">Mail Us:</h4>
                        <p class="font-bold text-sm">info@lumbinihealthcare.com / 071-591486</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- ============================================================ -->
    <!-- 15. MAIN DARK FOOTER (#172431)                              -->
    <!-- ============================================================ -->
    <footer class="bg-[#172431] text-slate-300 pt-16 pb-10 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
                
                <!-- Col 1: About & Logo -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-white p-1.5 flex items-center justify-center shadow-md overflow-hidden">
                            <img src="{{ asset('images/logo.jpg') }}" alt="LHC Logo - Lumbini Health Care Clinic" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <span class="text-xl font-['Prata',serif] font-bold text-white block leading-tight">Lumbini Health</span>
                            <span class="text-[10px] uppercase tracking-wider text-slate-400 font-bold">Care Clinic &bull; Bhairahawa</span>
                        </div>
                    </div>
                    <p class="text-xs text-slate-400 leading-relaxed">
                        Lumbini Health Care Center is a trusted polyclinic and diagnostic facility in Bhairahawa, Nepal. Delivering quality outpatient and maternity care with compassionate clinical leadership.
                    </p>
                    <div class="flex items-center gap-2 pt-1 text-xs text-white">
                        <i class="fa-solid fa-phone text-[#e12454]"></i>
                        <span class="font-bold">+977-071-591486</span>
                    </div>
                    <div class="pt-2 flex items-center gap-2.5">
                        <a href="https://www.facebook.com/profile.php?id=100031414824460" target="_blank" rel="noopener noreferrer"
                           class="w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center hover:bg-[#e12454] transition text-xs">
                            <i class="fa-brands fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center hover:bg-[#e12454] transition text-xs">
                            <i class="fa-brands fa-twitter"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center hover:bg-[#e12454] transition text-xs">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                        <a href="#" class="w-8 h-8 rounded-full bg-slate-800 text-white flex items-center justify-center hover:bg-[#e12454] transition text-xs">
                            <i class="fa-brands fa-youtube"></i>
                        </a>
                    </div>
                </div>

                <!-- Col 2: Quick Links -->
                <div>
                    <h4 class="text-white font-['Prata',serif] font-bold text-sm mb-4 border-l-2 border-[#e12454] pl-3">Quick Links</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="#home" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> Home</a></li>
                        <li><a href="#about" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> About Us</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> All Services</a></li>
                        <li><a href="#doctors" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> Specialist Doctors</a></li>
                        <li><a href="#faq" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> FAQs</a></li>
                        <li><a href="#appointment" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> Book Appointment</a></li>
                        <li><a href="/stnapanel" class="hover:text-[#e12454] transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> Admin Panel</a></li>
                    </ul>
                </div>

                <!-- Col 3: Departments -->
                <div>
                    <h4 class="text-white font-['Prata',serif] font-bold text-sm mb-4 border-l-2 border-[#e12454] pl-3">Our Services</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="{{ route('services.show', 'gynecology-obstetrics') }}" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> Gynecology & Maternity</a></li>
                        <li><a href="{{ route('services.show', 'general-medicine-opd') }}" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> General Medicine OPD</a></li>
                        <li><a href="{{ route('services.show', 'pediatrics-child-care') }}" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> Pediatrics & Immunization</a></li>
                        <li><a href="{{ route('services.show', 'orthopedics-spine-care') }}" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> Orthopedics & Joints</a></li>
                        <li><a href="{{ route('services.show', 'digital-usg-diagnostic-lab') }}" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> Color Ultrasound (USG)</a></li>
                        <li><a href="{{ route('services.show', '24-7-pharmacy-emergency') }}" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> 24/7 Pharmacy</a></li>
                    </ul>
                </div>

                <!-- Col 4: Official Facebook Profile & Updates -->
                <div>
                    <h4 class="text-white font-['Prata',serif] font-bold text-sm mb-4 border-l-2 border-[#e12454] pl-3">Official Page</h4>
                    <div class="bg-slate-800/80 p-4 rounded-xl border border-slate-700/60 space-y-3 text-xs">
                        <div class="flex items-center gap-2.5">
                            <i class="fa-brands fa-facebook text-[#e12454] text-2xl"></i>
                            <div>
                                <h5 class="text-white font-bold">Lumbini Health Care Clinic</h5>
                                <p class="text-[10px] text-slate-400">@lumbinihealthcareclinic</p>
                            </div>
                        </div>
                        <p class="text-[11px] text-slate-300">
                            Check daily OPD schedules, holiday announcements, and free medical camp updates on our official Facebook.
                        </p>
                        <a href="https://www.facebook.com/profile.php?id=100031414824460" target="_blank" rel="noopener noreferrer"
                           class="inline-block w-full text-center py-2 px-3 rounded-lg bg-[#e12454] hover:bg-[#c91845] text-white font-bold text-xs uppercase tracking-wider transition">
                            Visit Facebook Profile &rarr;
                        </a>
                    </div>
                </div>

            </div>

            <!-- Bottom Sub-Footer -->
            <div class="pt-6 border-t border-slate-800 text-center text-xs text-slate-500">
                <p>&copy; {{ date('Y') }} <strong>Lumbini Health Care Center</strong>. All Rights Reserved. Replicating Brivona Demo 3.</p>
            </div>
        </div>
    </footer>

    <!-- ============================================================ -->
    <!-- FLOATING EMERGENCY HOTLINE & BACK TO TOP BUTTON              -->
    <!-- ============================================================ -->
    <div class="fixed bottom-6 right-6 z-40 flex flex-col items-end gap-3">
        <!-- Floating Emergency Call Button -->
        <a href="tel:+977071591486" class="flex items-center gap-2 px-4 py-3 rounded-full bg-[#e12454] text-white text-xs font-bold uppercase tracking-wider shadow-2xl hover:bg-[#c91845] hover:scale-105 active:scale-95 transition">
            <i class="fa-solid fa-phone-volume text-sm animate-bounce"></i>
            <span class="hidden sm:inline">071-591486</span>
        </a>

        <!-- Back to Top Button -->
        <button type="button" 
                x-show="showBackToTop" 
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 translate-y-4"
                x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 translate-y-0"
                x-transition:leave-end="opacity-0 translate-y-4"
                @click="window.scrollTo({ top: 0, behavior: 'smooth' })" 
                class="w-11 h-11 rounded-full bg-[#223645] hover:bg-[#e12454] text-white flex items-center justify-center text-sm shadow-xl transition cursor-pointer" 
                style="display: none;" 
                title="Back to Top">
            <i class="fa-solid fa-arrow-up"></i>
        </button>
    </div>

    @livewireScripts
    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Animate slide elements
            function animateSlide(slide) {
                const subtitle = slide.querySelector('.slide-subtitle');
                const title = slide.querySelector('.slide-title');
                const cta = slide.querySelector('.slide-cta');

                const elements = [subtitle, title, cta].filter(el => el);
                elements.forEach((el, i) => {
                    el.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
                    el.style.transitionDelay = (i * 0.2 + 0.3) + 's';
                    el.style.opacity = '1';
                    el.style.transform = 'translateY(0)';
                });
            }

            function resetSlide(slide) {
                const elements = slide.querySelectorAll('.slide-subtitle, .slide-title, .slide-cta');
                elements.forEach(el => {
                    el.style.transition = 'none';
                    el.style.opacity = '0';
                    el.style.transform = 'translateY(30px)';
                });
            }

            const heroSlider = document.querySelector('.heroSlider');

            if (!heroSlider) return;

            const hasMultipleSlides = Number(heroSlider.dataset.slideCount) > 1;

            const heroSwiper = new Swiper(heroSlider, {
                loop: hasMultipleSlides,
                speed: 800,
                autoplay: hasMultipleSlides ? {
                    delay: 6000,
                    disableOnInteraction: false,
                } : false,
                effect: 'fade',
                fadeEffect: {
                    crossFade: true,
                },
                pagination: hasMultipleSlides ? {
                    el: '.swiper-pagination',
                    clickable: true,
                } : false,
                navigation: hasMultipleSlides ? {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                } : false,
                on: {
                    init: function () {
                        const activeSlide = this.slides[this.activeIndex];
                        if (activeSlide) animateSlide(activeSlide);
                    },
                    slideChangeTransitionStart: function () {
                        this.slides.forEach(slide => resetSlide(slide));
                    },
                    slideChangeTransitionEnd: function () {
                        const activeSlide = this.slides[this.activeIndex];
                        if (activeSlide) animateSlide(activeSlide);
                    },
                },
            });
        });
    </script>
</body>
</html>
