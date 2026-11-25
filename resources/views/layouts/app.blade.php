<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Lumbini Health Care Center - Specialist Hospital & Polyclinic in Bhairahawa')</title>
    
    <!-- Meta SEO -->
    <meta name="description" content="@yield('meta_description', 'Lumbini Health Care Center in Bhairahawa, Nepal provides premier gynecology, obstetrics, pediatrics, general medicine, 24/7 emergency & pharmacy, digital ultrasound, and laboratory diagnostics.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Lumbini Health Care Center, Bhairahawa Hospital, Gynecology Clinic Nepal, Doctor Bhairahawa, Ultrasound Bhairahawa, Rupandehi Health')">
    <link rel="canonical" href="@yield('canonical_url', url()->current())">
    <meta name="robots" content="index, follow">

    <!-- Open Graph / Facebook / WhatsApp -->
    <meta property="og:type" content="@yield('og_type', 'website')">
    <meta property="og:site_name" content="Lumbini Health Care Center">
    <meta property="og:title" content="@yield('og_title', 'Lumbini Health Care Center - Specialist Hospital & Polyclinic in Bhairahawa')">
    <meta property="og:description" content="@yield('og_description', 'Lumbini Health Care Center in Bhairahawa, Nepal provides premier gynecology, obstetrics, pediatrics, general medicine, 24/7 emergency & pharmacy, digital ultrasound, and laboratory diagnostics.')">
    <meta property="og:url" content="@yield('og_url', url()->current())">
    <meta property="og:image" content="@yield('og_image', asset('images/logo.jpg'))">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('twitter_title', 'Lumbini Health Care Center - Specialist Hospital & Polyclinic in Bhairahawa')">
    <meta name="twitter:description" content="@yield('twitter_description', 'Lumbini Health Care Center in Bhairahawa, Nepal provides premier gynecology, obstetrics, pediatrics, general medicine, 24/7 emergency & pharmacy, digital ultrasound, and laboratory diagnostics.')">
    <meta name="twitter:image" content="@yield('twitter_image', asset('images/logo.jpg'))">

    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="{{ asset('images/logo.jpg') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/logo.jpg') }}">

    <!-- Google Fonts: Prata (Headings) & Karla (Body) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,400&family=Prata&display=swap" rel="stylesheet">

    <!-- Font Awesome 6 Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Schema.org JSON-LD structured data -->
    @yield('schema_json')

    <!-- Vite Assets -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body x-data="{
        mobileMenuOpen: false,
        searchOpen: false,
        searchQuery: '',
        bagOpen: false,
        showBackToTop: false
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
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'text-[#e12454] relative after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#e12454]' : 'hover:text-[#e12454]' }} transition py-2">Home</a>
                <a href="{{ route('home') }}#about" class="hover:text-[#e12454] transition py-2">About</a>
                <a href="{{ route('services.index') }}" class="{{ request()->routeIs('services.*') ? 'text-[#e12454] relative after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#e12454]' : 'hover:text-[#e12454]' }} transition py-2">Services</a>
                <a href="{{ route('doctors.index') }}" class="{{ request()->routeIs('doctors.*') ? 'text-[#e12454] relative after:content-[\'\'] after:absolute after:bottom-0 after:left-0 after:w-full after:h-0.5 after:bg-[#e12454]' : 'hover:text-[#e12454]' }} transition py-2">Doctors</a>
                <a href="{{ route('home') }}#testimonials" class="hover:text-[#e12454] transition py-2">Testimonials</a>
                <a href="{{ route('home') }}#faq" class="hover:text-[#e12454] transition py-2">FAQ</a>
                <a href="{{ route('home') }}#blog" class="hover:text-[#e12454] transition py-2">Blog</a>
                <a href="{{ route('home') }}#contact" class="hover:text-[#e12454] transition py-2">Contact Us</a>
            </nav>

            <!-- Action Controls: Bag, Search, Appointment CTA, Hamburger -->
            <div class="flex items-center gap-3 sm:gap-4">
                <button type="button" @click="bagOpen = true" class="relative text-slate-700 hover:text-[#e12454] transition p-2 cursor-pointer" title="Quick Clinic Overview">
                    <i class="fa-solid fa-bag-shopping text-base"></i>
                    <span class="absolute top-0 right-0 w-4 h-4 bg-[#e12454] text-white text-[10px] font-bold rounded-full flex items-center justify-center">6</span>
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
                        <a href="{{ route('home') }}" @click="mobileMenuOpen = false" class="block text-sm font-bold {{ request()->routeIs('home') ? 'text-[#e12454]' : 'text-[#223645]' }} hover:text-[#e12454] transition py-1">Home</a>
                        <a href="{{ route('home') }}#about" @click="mobileMenuOpen = false" class="block text-sm font-semibold text-[#223645] hover:text-[#e12454] transition py-1">About Us</a>
                        <a href="{{ route('services.index') }}" @click="mobileMenuOpen = false" class="block text-sm font-semibold {{ request()->routeIs('services.*') ? 'text-[#e12454]' : 'text-[#223645]' }} hover:text-[#e12454] transition py-1">Our Services</a>
                        <a href="{{ route('doctors.index') }}" @click="mobileMenuOpen = false" class="block text-sm font-semibold {{ request()->routeIs('doctors.*') ? 'text-[#e12454]' : 'text-[#223645]' }} hover:text-[#e12454] transition py-1">Specialist Doctors</a>
                        <a href="{{ route('home') }}#testimonials" @click="mobileMenuOpen = false" class="block text-sm font-semibold text-[#223645] hover:text-[#e12454] transition py-1">Patient Testimonials</a>
                        <a href="{{ route('home') }}#faq" @click="mobileMenuOpen = false" class="block text-sm font-semibold text-[#223645] hover:text-[#e12454] transition py-1">Frequently Asked Questions</a>
                        <a href="{{ route('home') }}#blog" @click="mobileMenuOpen = false" class="block text-sm font-semibold text-[#223645] hover:text-[#e12454] transition py-1">Health Articles / Blog</a>
                        <a href="{{ route('home') }}#contact" @click="mobileMenuOpen = false" class="block text-sm font-semibold text-[#223645] hover:text-[#e12454] transition py-1">Contact & Emergency</a>
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
                    <div class="text-xs text-slate-500 space-y-2">
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-phone text-[#e12454]"></i>
                            <span>+977-071-591486 (24/7)</span>
                        </div>
                        <div class="flex items-center gap-2">
                            <i class="fa-solid fa-location-dot text-[#e12454]"></i>
                            <span>Siddharthanagar-8, Bhairahawa</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- QUICK SEARCH MODAL                                           -->
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
                       class="w-full py-2 px-2 text-slate-800 placeholder-slate-400 focus:outline-none text-base font-medium">
                <button type="button" @click="searchOpen = false" class="p-2 text-slate-400 hover:text-slate-600 rounded-lg">
                    <i class="fa-solid fa-xmark text-lg"></i>
                </button>
            </div>
            <div class="p-6 bg-slate-50/70 text-xs">
                <p class="font-bold uppercase tracking-wider text-slate-400 mb-3">Quick Navigation</p>
                <div class="grid grid-cols-2 gap-2">
                    <a href="{{ route('services.index') }}" class="p-2.5 rounded-lg bg-white border border-slate-200 hover:border-[#e12454] hover:text-[#e12454] transition flex items-center gap-2">
                        <i class="fa-solid fa-sparkles text-[#e12454]"></i>
                        <span>All Medical Services</span>
                    </a>
                    <a href="{{ route('home') }}#appointment" @click="searchOpen = false" class="p-2.5 rounded-lg bg-white border border-slate-200 hover:border-[#e12454] hover:text-[#e12454] transition flex items-center gap-2">
                        <i class="fa-solid fa-calendar-check text-[#e12454]"></i>
                        <span>Book Appointment</span>
                    </a>
                    <a href="{{ route('home') }}#doctors" class="p-2.5 rounded-lg bg-white border border-slate-200 hover:border-[#e12454] hover:text-[#e12454] transition flex items-center gap-2">
                        <i class="fa-solid fa-user-doctor text-[#e12454]"></i>
                        <span>Specialist Doctors</span>
                    </a>
                    <a href="tel:+977071591486" class="p-2.5 rounded-lg bg-white border border-slate-200 hover:border-[#e12454] hover:text-[#e12454] transition flex items-center gap-2">
                        <i class="fa-solid fa-phone text-[#e12454]"></i>
                        <span>Emergency Hotline</span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- CLINIC SERVICES TRAY (Bag Modal)                             -->
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

                    <div class="py-5 space-y-4 text-sm">
                        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100 space-y-1">
                            <div class="flex justify-between font-bold text-[#223645]">
                                <span>Gynecology & Maternity</span>
                                <span class="text-[#e12454]">Active OPD</span>
                            </div>
                            <p class="text-slate-500 text-xs sm:text-[13px] leading-relaxed">Daily 7:00 AM - 8:00 PM with Dr. Sushmita Adhikari</p>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100 space-y-1">
                            <div class="flex justify-between font-bold text-[#223645]">
                                <span>Digital Ultrasound & Lab</span>
                                <span class="text-emerald-600">Open Now</span>
                            </div>
                            <p class="text-slate-500 text-xs sm:text-[13px] leading-relaxed">High-resolution 4D scan & automated biochemistry reports.</p>
                        </div>
                        <div class="p-3.5 rounded-xl bg-slate-50 border border-slate-100 space-y-1">
                            <div class="flex justify-between font-bold text-[#223645]">
                                <span>24/7 Emergency & Pharmacy</span>
                                <span class="text-rose-600">Always Open</span>
                            </div>
                            <p class="text-slate-500 text-xs sm:text-[13px] leading-relaxed">Round-the-clock emergency triage, oxygen & dispensary.</p>
                        </div>
                    </div>
                </div>

                <div class="pt-5 border-t border-slate-100 space-y-3">
                    <a href="{{ route('services.index') }}" @click="bagOpen = false" class="w-full py-3 px-4 rounded-xl bg-[#223645] hover:bg-[#e12454] text-white text-xs font-bold uppercase tracking-wider text-center block transition">
                        Explore All Departments &rarr;
                    </a>
                    <a href="#appointment" @click="bagOpen = false" class="w-full py-3 px-4 rounded-xl bg-[#e12454] hover:bg-[#c91845] text-white text-xs font-bold uppercase tracking-wider text-center block transition">
                        Book Doctor Appointment
                    </a>
                </div>

            </div>
        </div>
    </div>

    <!-- ============================================================ -->
    <!-- MAIN CONTENT SLOT                                            -->
    <!-- ============================================================ -->
    <main>
        @yield('content')
    </main>

    <!-- ============================================================ -->
    <!-- FOOTER (Deep Charcoal #172431 matching Brivona)             -->
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
                    <p class="text-sm text-slate-400 leading-relaxed">
                        Lumbini Health Care Center is a trusted polyclinic and diagnostic facility in Bhairahawa, Nepal. Delivering quality outpatient and maternity care with compassionate clinical leadership.
                    </p>
                    <div class="flex items-center gap-2 pt-1 text-sm text-white">
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
                    <h4 class="text-white font-['Prata',serif] font-bold text-base mb-4 border-l-2 border-[#e12454] pl-3">Quick Links</h4>
                    <ul class="space-y-2.5 text-sm">
                        <li><a href="{{ route('home') }}" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> Home</a></li>
                        <li><a href="{{ route('home') }}#about" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> About Us</a></li>
                        <li><a href="{{ route('services.index') }}" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> All Services</a></li>
                        <li><a href="{{ route('doctors.index') }}" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> Specialist Doctors</a></li>
                        <li><a href="{{ route('home') }}#faq" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> FAQs</a></li>
                        <li><a href="#appointment" class="hover:text-white transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> Book Appointment</a></li>
                        <li><a href="/stnapanel" class="hover:text-[#e12454] transition flex items-center gap-1.5"><span class="text-[#e12454]">&bull;</span> Admin Panel</a></li>
                    </ul>
                </div>

                <!-- Col 3: Departments -->
                <div>
                    <h4 class="text-white font-['Prata',serif] font-bold text-base mb-4 border-l-2 border-[#e12454] pl-3">Our Services</h4>
                    <ul class="space-y-2.5 text-sm">
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
                    <h4 class="text-white font-['Prata',serif] font-bold text-base mb-4 border-l-2 border-[#e12454] pl-3">Official Page</h4>
                    <div class="bg-slate-800/80 p-4 rounded-xl border border-slate-700/60 space-y-3 text-xs">
                        <div class="flex items-center gap-2.5">
                            <i class="fa-brands fa-facebook text-[#e12454] text-2xl"></i>
                            <div>
                                <h5 class="text-white font-bold text-sm">Lumbini Health Care Clinic</h5>
                                <p class="text-[11px] text-slate-400">@lumbinihealthcareclinic</p>
                            </div>
                        </div>
                        <p class="text-xs text-slate-300 leading-relaxed">
                            Check daily OPD schedules, holiday announcements, and free medical camp updates on our official Facebook.
                        </p>
                        <a href="https://www.facebook.com/profile.php?id=100031414824460" target="_blank" rel="noopener noreferrer"
                           class="inline-block w-full text-center py-2.5 px-3 rounded-lg bg-[#e12454] hover:bg-[#c91845] text-white font-bold text-xs uppercase tracking-wider transition">
                            Visit Facebook Profile &rarr;
                        </a>
                    </div>
                </div>

            </div>

            <!-- Bottom Sub-Footer -->
            <div class="border-t border-slate-800/80 pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs sm:text-sm text-slate-400">
                <p>&copy; {{ date('Y') }} Lumbini Health Care Clinic, Bhairahawa, Nepal. All Rights Reserved.</p>
                <div class="flex items-center gap-6">
                    <a href="{{ route('home') }}" class="hover:text-slate-200 transition">Privacy Policy</a>
                    <a href="{{ route('home') }}" class="hover:text-slate-200 transition">Terms of Service</a>
                    <a href="/stnapanel" class="hover:text-[#e12454] transition font-semibold">Staff Login</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <button type="button" 
            x-show="showBackToTop" 
            @click="window.scrollTo({top: 0, behavior: 'smooth'})"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-4"
            style="display: none;"
            class="fixed bottom-6 right-6 z-40 w-12 h-12 rounded-full bg-[#e12454] text-white shadow-xl flex items-center justify-center hover:bg-[#c91845] hover:scale-110 active:scale-95 transition duration-300 cursor-pointer">
        <i class="fa-solid fa-arrow-up text-sm"></i>
    </button>

    @livewireScripts
</body>
</html>
