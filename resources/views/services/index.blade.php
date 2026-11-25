@extends('layouts.app')

@section('title', 'Medical Services & Specialized Clinical Departments | Lumbini Health Care Center, Bhairahawa')

@section('meta_description', 'Explore comprehensive clinical services at Lumbini Health Care Clinic in Bhairahawa: Gynecology & Maternity, General Medicine OPD, Pediatrics, Orthopedics, Digital 4D USG, and 24/7 Emergency Pharmacy.')

@section('meta_keywords', 'hospital services bhairahawa, clinic services rupandehi, gynecologist clinic nepal, ultrasound lab bhairahawa, 24 hour pharmacy bhairahawa, pediatrics butwal, doctor consultation nepal')

@section('canonical_url', route('services.index'))

@section('og_title', 'Medical Services & Specialized Clinical Departments | Lumbini Health Care Center, Bhairahawa')
@section('og_description', 'Explore comprehensive clinical services at Lumbini Health Care Clinic in Bhairahawa: Gynecology & Maternity, General Medicine OPD, Pediatrics, Orthopedics, Digital 4D USG, and 24/7 Emergency Pharmacy.')
@section('og_url', route('services.index'))
@section('og_image', asset('images/logo.jpg'))

@section('twitter_title', 'Medical Services & Specialized Clinical Departments | Lumbini Health Care Center, Bhairahawa')
@section('twitter_description', 'Explore comprehensive clinical services at Lumbini Health Care Clinic in Bhairahawa: Gynecology & Maternity, General Medicine OPD, Pediatrics, Orthopedics, Digital 4D USG, and 24/7 Emergency Pharmacy.')
@section('twitter_image', asset('images/logo.jpg'))

@section('schema_json')
@php
    $itemList = [];
    foreach ($services as $index => $item) {
        $itemList[] = [
            '@type' => 'ListItem',
            'position' => $index + 1,
            'name' => $item->title,
            'url' => route('services.show', $item->slug),
            'description' => $item->short_description,
        ];
    }

    $indexSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'MedicalWebPage',
        'name' => 'Medical Services & Specialized Clinical Departments - Lumbini Health Care Center',
        'url' => route('services.index'),
        'description' => 'Comprehensive clinical services at Lumbini Health Care Clinic in Bhairahawa, Nepal: Gynecology, General Medicine, Pediatrics, Orthopedics, Digital Ultrasound, and 24/7 Pharmacy.',
        'provider' => [
            '@type' => 'MedicalBusiness',
            'name' => 'Lumbini Health Care Center',
            'url' => route('home'),
            'logo' => asset('images/logo.jpg'),
            'telephone' => '+977-071-591486',
            'address' => [
                '@type' => 'PostalAddress',
                'streetAddress' => 'Siddharthanagar-8',
                'addressLocality' => 'Bhairahawa',
                'addressRegion' => 'Lumbini Province',
                'addressCountry' => 'NP',
            ],
        ],
        'mainEntity' => [
            '@type' => 'ItemList',
            'itemListElement' => $itemList,
        ],
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($indexSchema, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection

@section('content')
<!-- ============================================================ -->
<!-- 1. BREADCRUMB / HERO BANNER (Deep Slate #172431)             -->
<!-- ============================================================ -->
<section class="relative bg-[#172431] text-white py-16 sm:py-20 overflow-hidden border-b border-slate-800">
    <!-- Subtle background accents -->
    <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-[#e12454]/10 blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-blue-500/10 blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumb navigation -->
        <nav class="flex items-center gap-2 text-xs font-semibold text-slate-400 mb-4" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-white transition flex items-center gap-1.5">
                <i class="fa-solid fa-house text-[10px]"></i>
                <span>Home</span>
            </a>
            <i class="fa-solid fa-chevron-right text-[9px] text-slate-600"></i>
            <span class="text-[#e12454]">Clinical Services</span>
        </nav>

        <div class="max-w-3xl space-y-3">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#e12454]/20 border border-[#e12454]/40 text-[#e12454] text-xs font-bold uppercase tracking-wider">
                <i class="fa-solid fa-sparkles text-[10px]"></i> Specialized Departments
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-['Prata',serif] text-white leading-tight">
                Our Medical Services & Specialized Departments
            </h1>
            <p class="text-slate-300 text-sm sm:text-base leading-relaxed pt-1">
                Providing high-precision clinical diagnosis, compassionate maternity care, and round-the-clock emergency support to the community of Bhairahawa and Lumbini Province.
            </p>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- 2. QUICK EMERGENCY & RECEPTION HELPLINE STRIP                -->
<!-- ============================================================ -->
<div class="bg-rose-50/70 border-b border-rose-100 py-3.5 px-4 text-xs font-medium text-[#223645]">
    <div class="max-w-7xl mx-auto flex flex-wrap items-center justify-between gap-3">
        <div class="flex items-center gap-2">
            <span class="inline-flex items-center justify-center w-5 h-5 rounded-full bg-[#e12454] text-white text-[10px]">
                <i class="fa-solid fa-phone"></i>
            </span>
            <span>Emergency & OPD Booking Helpline: <strong class="text-[#e12454]">+977-071-591486</strong></span>
        </div>
        <div class="flex items-center gap-4 text-slate-600">
            <span class="hidden sm:inline flex items-center gap-1.5">
                <i class="fa-solid fa-clock text-slate-400"></i> OPD: Mon-Sat 7:00 AM - 8:00 PM
            </span>
            <span class="flex items-center gap-1.5 font-bold text-emerald-700">
                <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span> 24/7 Emergency & Pharmacy Open
            </span>
        </div>
    </div>
</div>

<!-- ============================================================ -->
<!-- 3. SERVICES GRID SECTION                                     -->
<!-- ============================================================ -->
<section class="py-16 sm:py-24 bg-slate-50/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Section Header -->
        <div class="text-center max-w-3xl mx-auto mb-16 space-y-3">
            <div class="text-[#e12454] text-xs sm:text-sm font-bold uppercase tracking-widest">
                - CLINICAL EXCELLENCE -
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-[42px] font-['Prata',serif] text-[#223645] leading-snug">
                Specialized Healthcare Tailored To Every Family Member
            </h2>
            <p class="text-base sm:text-lg text-[#647589] leading-relaxed">
                From prenatal scans and child immunizations to chronic diabetes management and bone trauma, our clinic combines modern diagnostic infrastructure with dedicated medical practitioners.
            </p>
        </div>

        <!-- 6 Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($services as $service)
                <div class="bg-white rounded-2xl border border-slate-200/90 shadow-sm hover:shadow-xl hover:-translate-y-1.5 transition duration-300 flex flex-col justify-between overflow-hidden group">
                    
                    <!-- Service Image Header -->
                    <div class="relative h-52 overflow-hidden bg-slate-100">
                        <img src="{{ $service->featured_image_url }}" 
                             alt="{{ $service->title }}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/20 to-transparent"></div>
                        
                        <!-- Icon Badge -->
                        <div class="absolute bottom-4 left-5 w-12 h-12 rounded-xl bg-white text-[#e12454] shadow-md flex items-center justify-center text-xl group-hover:bg-[#e12454] group-hover:text-white transition">
                            @if (str_contains($service->icon, 'heart'))
                                <i class="fa-solid fa-heart-pulse"></i>
                            @elseif (str_contains($service->icon, 'stethoscope'))
                                <i class="fa-solid fa-stethoscope"></i>
                            @elseif (str_contains($service->icon, 'baby'))
                                <i class="fa-solid fa-baby"></i>
                            @elseif (str_contains($service->icon, 'bone'))
                                <i class="fa-solid fa-bone"></i>
                            @elseif (str_contains($service->icon, 'truck') || str_contains($service->icon, 'pill'))
                                <i class="fa-solid fa-truck-medical"></i>
                            @else
                                <i class="fa-solid fa-microscope"></i>
                            @endif
                        </div>

                        <!-- Department Tag -->
                        <div class="absolute top-4 right-4">
                            <span class="px-3 py-1 rounded-full bg-white/90 backdrop-blur-sm text-xs font-bold text-[#223645] uppercase tracking-wider shadow-sm">
                                Clinical Dept
                            </span>
                        </div>
                    </div>

                    <!-- Card Body -->
                    <div class="p-6 flex-1 flex flex-col justify-between">
                        <div>
                            <h3 class="text-xl sm:text-2xl font-['Prata',serif] font-bold text-[#223645] mb-2.5 group-hover:text-[#e12454] transition">
                                <a href="{{ route('services.show', $service->slug) }}" class="hover:underline">
                                    {{ $service->title }}
                                </a>
                            </h3>
                            <p class="text-sm sm:text-[15px] text-[#647589] leading-relaxed mb-4">
                                {{ $service->short_description }}
                            </p>

                            <!-- Key Features / Procedures Chips (if available) -->
                            @if (!empty($service->features) && is_array($service->features))
                                <div class="mb-5 space-y-2 pt-2 border-t border-slate-100">
                                    <p class="text-xs font-bold uppercase tracking-wider text-slate-500">Key Procedures:</p>
                                    <div class="flex flex-wrap gap-1.5">
                                        @foreach (array_slice($service->features, 0, 3) as $feature)
                                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-md bg-slate-100 text-xs text-slate-700 font-medium">
                                                <i class="fa-solid fa-check text-[10px] text-[#e12454]"></i>
                                                {{ $feature }}
                                            </span>
                                        @endforeach
                                        @if (count($service->features) > 3)
                                            <span class="text-xs text-slate-500 self-center font-bold">+{{ count($service->features) - 3 }} more</span>
                                        @endif
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Action Buttons -->
                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between gap-3">
                            <a href="{{ route('services.show', $service->slug) }}" 
                               class="inline-flex items-center gap-1.5 text-xs sm:text-sm font-bold text-[#223645] hover:text-[#e12454] uppercase tracking-wider transition">
                                <span>Clinical Details</span>
                                <i class="fa-solid fa-angles-right text-[10px] text-[#e12454]"></i>
                            </a>
                            <a href="{{ route('services.show', $service->slug) }}#appointment" 
                               class="px-4 py-2 rounded-full bg-slate-100 hover:bg-[#e12454] hover:text-white text-[#223645] text-xs sm:text-sm font-bold transition">
                                Book Now
                            </a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

    </div>
</section>

<!-- ============================================================ -->
<!-- 4. WHY CHOOSE OUR CLINICAL SERVICES STRIP                    -->
<!-- ============================================================ -->
<section class="py-16 bg-white border-y border-slate-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            
            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-rose-50 text-[#e12454] flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-user-doctor"></i>
                </div>
                <div>
                    <h4 class="font-['Prata',serif] font-bold text-lg text-[#223645] mb-1.5">Qualified Doctors</h4>
                    <p class="text-sm text-[#647589] leading-relaxed">
                        Consult senior MD gynecologists, pediatricians, and physicians with verified clinical experience.
                    </p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-rose-50 text-[#e12454] flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-laptop-medical"></i>
                </div>
                <div>
                    <h4 class="font-['Prata',serif] font-bold text-lg text-[#223645] mb-1.5">Digital 4D USG & Lab</h4>
                    <p class="text-sm text-[#647589] leading-relaxed">
                        Japanese and German automated analyzers with accurate same-day verified pathology reports.
                    </p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-rose-50 text-[#e12454] flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                </div>
                <div>
                    <h4 class="font-['Prata',serif] font-bold text-lg text-[#223645] mb-1.5">24/7 Emergency Care</h4>
                    <p class="text-sm text-[#647589] leading-relaxed">
                        Continuous oxygenation, nebulization, sterile dressings, and fully stocked authentic dispensary.
                    </p>
                </div>
            </div>

            <div class="flex items-start gap-4">
                <div class="w-12 h-12 rounded-xl bg-rose-50 text-[#e12454] flex items-center justify-center text-xl shrink-0">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                </div>
                <div>
                    <h4 class="font-['Prata',serif] font-bold text-lg text-[#223645] mb-1.5">Compassionate Care</h4>
                    <p class="text-sm text-[#647589] leading-relaxed">
                        Warm patient guidance with transparent fee structures and dedicated follow-up reviews.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- 5. APPOINTMENT BOOKING SECTION                               -->
<!-- ============================================================ -->
<section id="appointment" class="py-20 bg-slate-50 border-b border-slate-200">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10 space-y-2">
            <span class="text-[#e12454] text-xs sm:text-sm font-bold uppercase tracking-widest">- QUICK RESERVATION -</span>
            <h2 class="text-3xl sm:text-4xl font-['Prata',serif] text-[#223645]">
                Schedule Your Consultation or Diagnostic Test
            </h2>
            <p class="text-sm sm:text-base text-[#647589]">
                Choose your desired department below. Our clinic receptionist will confirm your slot via phone.
            </p>
        </div>

        <div class="bg-white rounded-2xl p-6 sm:p-10 shadow-lg border border-slate-200">
            <livewire:appointment-booking />
        </div>
    </div>
</section>
@endsection
