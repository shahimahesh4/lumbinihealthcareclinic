@extends('layouts.app')

@section('title', $service->seo_title)

@section('meta_description', $service->seo_description)

@section('meta_keywords', $service->meta_keywords ?: ($service->title . ', lumbini health care, bhairahawa clinic, rupandehi hospital, doctor appointment nepal'))

@section('canonical_url', $service->canonical_url ?: route('services.show', $service->slug))

@section('og_type', 'article')
@section('og_title', $service->seo_title)
@section('og_description', $service->seo_description)
@section('og_url', route('services.show', $service->slug))
@section('og_image', $service->og_image_url)

@section('twitter_title', $service->seo_title)
@section('twitter_description', $service->seo_description)
@section('twitter_image', $service->og_image_url)

@section('schema_json')
@php
    $schemaGraph = [
        [
            '@type' => 'MedicalWebPage',
            '@id' => route('services.show', $service->slug) . '#webpage',
            'url' => route('services.show', $service->slug),
            'name' => $service->seo_title,
            'description' => $service->seo_description,
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
            'specialty' => $service->title,
        ]
    ];

    if (!empty($service->faqs) && is_array($service->faqs)) {
        $faqEntities = [];
        foreach ($service->faqs as $faq) {
            if (!empty($faq['question']) && !empty($faq['answer'])) {
                $faqEntities[] = [
                    '@type' => 'Question',
                    'name' => $faq['question'],
                    'acceptedAnswer' => [
                        '@type' => 'Answer',
                        'text' => $faq['answer'],
                    ],
                ];
            }
        }

        if (count($faqEntities) > 0) {
            $schemaGraph[] = [
                '@type' => 'FAQPage',
                '@id' => route('services.show', $service->slug) . '#faq',
                'mainEntity' => $faqEntities,
            ];
        }
    }

    $schemaData = [
        '@context' => 'https://schema.org',
        '@graph' => $schemaGraph,
    ];
@endphp
<script type="application/ld+json">
{!! json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection

@section('content')
<!-- ============================================================ -->
<!-- 1. BREADCRUMB / HERO BANNER (Deep Slate #172431)             -->
<!-- ============================================================ -->
<section class="relative bg-[#172431] text-white py-16 sm:py-20 overflow-hidden border-b border-slate-800">
    <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-[#e12454]/10 blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-rose-500/10 blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumb Nav -->
        <nav class="flex items-center gap-2 text-xs font-semibold text-slate-400 mb-4" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-white transition flex items-center gap-1.5">
                <i class="fa-solid fa-house text-[10px]"></i>
                <span>Home</span>
            </a>
            <i class="fa-solid fa-chevron-right text-[9px] text-slate-600"></i>
            <a href="{{ route('services.index') }}" class="hover:text-white transition">Clinical Services</a>
            <i class="fa-solid fa-chevron-right text-[9px] text-slate-600"></i>
            <span class="text-[#e12454] truncate max-w-xs">{{ $service->title }}</span>
        </nav>

        <div class="max-w-3xl space-y-3">
            <span class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-[#e12454]/20 border border-[#e12454]/40 text-[#e12454] text-xs font-bold uppercase tracking-wider">
                <i class="fa-solid fa-stethoscope text-[10px]"></i> Department Overview
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-['Prata',serif] text-white leading-tight">
                {{ $service->title }}
            </h1>
            <p class="text-slate-300 text-base sm:text-lg leading-relaxed">
                {{ $service->short_description }}
            </p>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- 2. MAIN 2-COLUMN SERVICE DETAIL LAYOUT                       -->
<!-- ============================================================ -->
<section class="py-16 sm:py-20 bg-slate-50/60">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-start">
            
            <!-- LEFT COLUMN: Main Clinical Content (8 Cols) -->
            <div class="lg:col-span-8 space-y-10">
                
                <!-- 1. Featured Image with Badge -->
                <div class="relative rounded-2xl overflow-hidden shadow-lg border border-slate-200 bg-white">
                    <img src="{{ $service->featured_image_url }}" 
                         alt="{{ $service->title }}" 
                         class="w-full h-80 sm:h-96 md:h-[450px] object-cover">
                    
                    <div class="absolute bottom-4 left-5 bg-white/95 backdrop-blur-md px-4 py-2 rounded-xl shadow-md flex items-center gap-3">
                        <div class="w-10 h-10 rounded-lg bg-[#e12454] text-white flex items-center justify-center text-lg">
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
                        <div>
                            <span class="text-xs font-bold text-[#223645] block">{{ $service->title }}</span>
                            <span class="text-[10px] text-slate-500 uppercase tracking-wider font-semibold">Specialized Care</span>
                        </div>
                    </div>
                </div>

                <!-- 2. In-Depth Clinical Description -->
                <div class="bg-white rounded-2xl p-6 sm:p-10 border border-slate-200/90 shadow-sm space-y-5">
                    <div class="border-b border-slate-100 pb-4">
                        <span class="text-[#e12454] text-xs font-bold uppercase tracking-widest block mb-1">
                            - DEPARTMENT OVERVIEW -
                        </span>
                        <h2 class="text-2xl sm:text-3xl font-['Prata',serif] text-[#223645]">
                            Comprehensive Clinical Scope & Excellence
                        </h2>
                    </div>

                    <div class="text-base sm:text-[17px] text-[#4b5563] leading-relaxed space-y-4">
                        @if ($service->full_description)
                            @foreach (explode("\n", $service->full_description) as $paragraph)
                                @if (trim($paragraph))
                                    <p>{{ trim($paragraph) }}</p>
                                @endif
                            @endforeach
                        @else
                            <p>{{ $service->short_description }}</p>
                        @endif
                    </div>
                </div>

                <!-- 3. Key Clinical Procedures & Highlights -->
                @if (!empty($service->features) && is_array($service->features))
                    <div class="bg-white rounded-2xl p-6 sm:p-10 border border-slate-200/90 shadow-sm space-y-6">
                        <div class="border-b border-slate-100 pb-4">
                            <span class="text-[#e12454] text-xs font-bold uppercase tracking-widest block mb-1">
                                - MEDICAL SCOPE -
                            </span>
                            <h2 class="text-2xl sm:text-3xl font-['Prata',serif] text-[#223645]">
                                Key Clinical Procedures & Diagnostics Covered
                            </h2>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @foreach ($service->features as $feature)
                                <div class="flex items-start gap-3 p-3.5 rounded-xl bg-slate-50 border border-slate-100 hover:border-rose-200 transition">
                                    <div class="w-6 h-6 rounded-full bg-rose-50 text-[#e12454] flex items-center justify-center text-xs shrink-0 mt-0.5">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                    <span class="text-sm sm:text-base font-semibold text-[#223645]">
                                        {{ $feature }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 4. Patient Preparation Guidelines (Callout Box) -->
                @if ($service->preparation_guidelines)
                    <div class="rounded-2xl p-6 sm:p-8 bg-gradient-to-br from-amber-50 to-orange-50 border border-amber-200/80 shadow-sm space-y-3">
                        <div class="flex items-center gap-3 text-amber-800">
                            <div class="w-9 h-9 rounded-xl bg-amber-100 flex items-center justify-center text-amber-700 text-lg shrink-0">
                                <i class="fa-solid fa-clipboard-check"></i>
                            </div>
                            <h3 class="font-['Prata',serif] font-bold text-lg sm:text-xl text-amber-950">
                                Patient Preparation & Test Guidelines
                            </h3>
                        </div>
                        <div class="text-sm sm:text-base text-amber-950 leading-relaxed pl-12 space-y-2">
                            @foreach (explode("\n", $service->preparation_guidelines) as $line)
                                @if (trim($line))
                                    <p class="flex items-start gap-2">
                                        <span class="text-amber-600 font-bold">&bull;</span>
                                        <span>{{ ltrim(trim($line), '-*• ') }}</span>
                                    </p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 5. Service Frequently Asked Questions (Accordion) -->
                @if (!empty($service->faqs) && is_array($service->faqs))
                    <div class="bg-white rounded-2xl p-6 sm:p-10 border border-slate-200/90 shadow-sm space-y-6" x-data="{ openFaq: null }">
                        <div class="border-b border-slate-100 pb-4">
                            <span class="text-[#e12454] text-xs font-bold uppercase tracking-widest block mb-1">
                                - QUESTIONS & ANSWERS -
                            </span>
                            <h2 class="text-2xl sm:text-3xl font-['Prata',serif] text-[#223645]">
                                Frequently Asked Questions
                            </h2>
                        </div>

                        <div class="space-y-3">
                            @foreach ($service->faqs as $index => $faq)
                                <div class="border border-slate-200 rounded-xl overflow-hidden transition">
                                    <button type="button" 
                                            @click="openFaq = (openFaq === {{ $index }} ? null : {{ $index }})"
                                            class="w-full text-left p-4.5 bg-slate-50/70 hover:bg-slate-100/70 flex items-center justify-between gap-4 transition font-bold text-base sm:text-lg font-['Prata',serif] text-[#223645] cursor-pointer">
                                        <span>{{ $faq['question'] ?? '' }}</span>
                                        <i class="fa-solid text-xs text-[#e12454] transition-transform duration-200"
                                           :class="openFaq === {{ $index }} ? 'fa-chevron-up' : 'fa-chevron-down'"></i>
                                    </button>
                                    
                                    <div x-show="openFaq === {{ $index }}" 
                                         x-collapse
                                         class="p-4.5 bg-white border-t border-slate-100 text-sm sm:text-base text-[#647589] leading-relaxed">
                                        {{ $faq['answer'] ?? '' }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 6. Bottom Direct Doctors Callout -->
                <div class="bg-gradient-to-r from-[#223645] to-[#172431] rounded-2xl p-6 sm:p-8 text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-md">
                    <div class="space-y-1.5 text-center sm:text-left">
                        <span class="text-[#e12454] text-xs font-bold uppercase tracking-widest">Consult A Specialist</span>
                        <h3 class="text-xl sm:text-2xl font-['Prata',serif]">Need Personal Medical Advice?</h3>
                        <p class="text-sm sm:text-base text-slate-300">Our senior physicians and gynecologists are available for daily consultations.</p>
                    </div>
                    <a href="#appointment" class="px-6 py-3 rounded-full bg-[#e12454] hover:bg-[#c91845] text-white text-xs sm:text-sm font-bold uppercase tracking-wider transition shrink-0 shadow-md">
                        Book Slot Now &rarr;
                    </a>
                </div>

            </div>

            <!-- RIGHT COLUMN: Sidebar (4 Cols) -->
            <aside class="lg:col-span-4 space-y-8 sticky top-28">
                
                <!-- 1. All Medical Departments Nav Widget -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-sm space-y-4">
                    <h3 class="font-['Prata',serif] font-bold text-lg sm:text-xl text-[#223645] pb-3 border-b border-slate-100 flex items-center justify-between">
                        <span>Clinical Departments</span>
                        <i class="fa-solid fa-hospital text-xs text-[#e12454]"></i>
                    </h3>

                    <ul class="space-y-1.5 text-sm font-semibold">
                        @foreach ($relatedServices->prepend($service)->unique('id')->sortBy('display_order') as $otherService)
                            @php
                                $isActive = ($otherService->id === $service->id);
                            @endphp
                            <li>
                                <a href="{{ route('services.show', $otherService->slug) }}" 
                                   class="flex items-center justify-between p-3 rounded-xl transition {{ $isActive ? 'bg-[#e12454] text-white shadow-md' : 'bg-slate-50 text-slate-700 hover:bg-rose-50 hover:text-[#e12454]' }}">
                                    <span class="flex items-center gap-2.5 truncate">
                                        <i class="fa-solid {{ $isActive ? 'fa-circle-check text-white' : 'fa-circle-chevron-right text-slate-400' }} text-[11px]"></i>
                                        <span class="truncate">{{ $otherService->title }}</span>
                                    </span>
                                    <i class="fa-solid fa-arrow-right text-[10px] {{ $isActive ? 'text-white' : 'text-slate-400' }}"></i>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <!-- 2. Emergency Hotline Card -->
                <div class="rounded-2xl p-6 bg-gradient-to-br from-[#e12454] to-[#c91845] text-white shadow-lg space-y-4 relative overflow-hidden">
                    <div class="absolute -right-6 -bottom-6 text-white/10 text-8xl pointer-events-none">
                        <i class="fa-solid fa-truck-medical"></i>
                    </div>

                    <div class="relative z-10 space-y-2">
                        <span class="text-xs font-bold uppercase tracking-widest text-rose-100 bg-white/20 px-2.5 py-0.5 rounded-full inline-block">
                            24/7 Emergency Support
                        </span>
                        <h4 class="font-['Prata',serif] text-2xl font-bold">Immediate Medical Assistance</h4>
                        <p class="text-sm text-rose-100 leading-relaxed">
                            Need urgent hospitalization or consultation? Call our emergency triage desk in Bhairahawa.
                        </p>
                    </div>

                    <div class="relative z-10 pt-2">
                        <a href="tel:+977071591486" class="w-full py-3 px-4 rounded-xl bg-white text-[#e12454] hover:bg-slate-100 transition font-bold text-sm flex items-center justify-center gap-2 shadow-sm">
                            <i class="fa-solid fa-phone text-xs"></i>
                            <span>+977-071-591486</span>
                        </a>
                    </div>
                </div>

                <!-- 3. Working Hours & Location Widget -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-sm space-y-4 text-sm">
                    <h3 class="font-['Prata',serif] font-bold text-lg text-[#223645] pb-3 border-b border-slate-100 flex items-center justify-between">
                        <span>Clinic Hours</span>
                        <i class="fa-regular fa-clock text-xs text-[#e12454]"></i>
                    </h3>

                    <div class="space-y-2.5 text-slate-600">
                        <div class="flex justify-between pb-2 border-b border-slate-100">
                            <span>Monday - Saturday:</span>
                            <strong class="text-[#223645]">7:00 AM - 8:00 PM</strong>
                        </div>
                        <div class="flex justify-between pb-2 border-b border-slate-100">
                            <span>Sunday OPD:</span>
                            <strong class="text-[#223645]">8:00 AM - 5:00 PM</strong>
                        </div>
                        <div class="flex justify-between text-rose-600 font-bold">
                            <span>Emergency & Pharmacy:</span>
                            <span>24 Hours / 7 Days</span>
                        </div>
                    </div>

                    <div class="pt-3 border-t border-slate-100 flex items-start gap-2.5 text-slate-500 text-xs sm:text-sm">
                        <i class="fa-solid fa-location-dot text-[#e12454] mt-0.5"></i>
                        <span>Siddharthanagar-8, Bhairahawa (Near Lumbini Eye Institute Road), Rupandehi, Nepal</span>
                    </div>
                </div>

                <!-- 4. Quick Appointment Widget in Sidebar -->
                <div id="appointment" class="bg-white rounded-2xl p-6 border border-slate-200/90 shadow-sm space-y-4">
                    <div class="border-b border-slate-100 pb-3">
                        <span class="text-[#e12454] text-xs font-bold uppercase tracking-widest block">Direct Slot</span>
                        <h3 class="font-['Prata',serif] font-bold text-lg sm:text-xl text-[#223645]">
                            Book For {{ $service->title }}
                        </h3>
                    </div>

                    <!-- Embedded Livewire Appointment Booking with preselected service -->
                    <livewire:appointment-booking :service-id="$service->id" />
                </div>

            </aside>

        </div>
    </div>
</section>
@endsection
