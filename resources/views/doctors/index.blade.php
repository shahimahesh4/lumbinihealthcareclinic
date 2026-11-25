@extends('layouts.app')

@section('title', 'Specialist Doctors & Medical Consultants | Lumbini Health Care Center, Bhairahawa')
@section('meta_description', 'Meet senior gynecologists, pediatricians, consultant physicians, orthopedic surgeons, and radiologists at Lumbini Health Care Center, Bhairahawa. Book appointment online.')
@section('meta_keywords', 'doctors in bhairahawa, specialist doctor butwal, gynecologist rupandehi, pediatrician nepal, orthopedic doctor bhairahawa, physician appointment')
@section('canonical_url', route('doctors.index'))
@section('og_title', 'Specialist Doctors & Medical Consultants | Lumbini Health Care Center')
@section('og_description', 'Certified senior doctors & clinicians in Bhairahawa. Compassionate outpatient consultations with 24/7 emergency support.')
@section('og_image', asset('images/logo.jpg'))

@section('schema_json')
<script type="application/ld+json">
{!! json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection

@section('content')
<!-- ============================================================ -->
<!-- 1. HERO BANNER SECTION (Brivona Dark Navy Charcoal Theme)     -->
<!-- ============================================================ -->
<section class="relative bg-gradient-to-r from-[#172431] via-[#223645] to-[#172431] py-16 sm:py-24 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-10 pointer-events-none bg-[radial-gradient(#e12454_1px,transparent_1px)] [background-size:16px_16px]"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumb Nav -->
        <nav class="flex items-center gap-2 text-xs font-medium text-slate-400 mb-4" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-white transition flex items-center gap-1.5">
                <i class="fa-solid fa-house text-[10px]"></i>
                <span>Home</span>
            </a>
            <i class="fa-solid fa-chevron-right text-[9px] text-slate-600"></i>
            <span class="text-[#e12454]">Specialist Doctors</span>
        </nav>

        <div class="max-w-3xl space-y-4">
            <span class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-[#e12454]/20 border border-[#e12454]/40 text-[#e12454] text-xs font-bold uppercase tracking-wider">
                <i class="fa-solid fa-user-doctor text-[11px]"></i> Dedicated Clinical Leadership
            </span>
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-['Prata',serif] text-white leading-tight">
                Our Specialist Doctors & Medical Consultants
            </h1>
            <p class="text-slate-300 text-base sm:text-lg leading-relaxed">
                Connect with NMC-registered senior consultants committed to clinical excellence, accurate diagnoses, and compassionate outpatient healthcare in Bhairahawa.
            </p>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- 2. SPECIALTY FILTERS & SEARCH BAR                            -->
<!-- ============================================================ -->
<section class="bg-white border-b border-slate-200/90 py-6 sticky top-20 z-30 shadow-xs backdrop-blur-md bg-white/95">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col lg:flex-row items-center justify-between gap-4">
            
            <!-- Category Filter Chips -->
            <div class="flex items-center gap-2 overflow-x-auto w-full lg:w-auto pb-2 lg:pb-0 text-xs sm:text-sm font-semibold">
                <a href="{{ route('doctors.index') }}" 
                   class="px-4 py-2 rounded-full whitespace-nowrap transition {{ !request('department') ? 'bg-[#e12454] text-white shadow-sm' : 'bg-slate-100 text-[#223645] hover:bg-slate-200' }}">
                    All Specialists ({{ $doctors->count() }})
                </a>
                @foreach ($departments as $dept)
                    <a href="{{ route('doctors.index', ['department' => $dept->slug]) }}" 
                       class="px-4 py-2 rounded-full whitespace-nowrap transition {{ request('department') === $dept->slug ? 'bg-[#e12454] text-white shadow-sm' : 'bg-slate-100 text-[#223645] hover:bg-slate-200' }}">
                        {{ $dept->title }}
                    </a>
                @endforeach
            </div>

            <!-- Doctor Search Input -->
            <form action="{{ route('doctors.index') }}" method="GET" class="w-full lg:w-72 shrink-0">
                @if (request('department'))
                    <input type="hidden" name="department" value="{{ request('department') }}">
                @endif
                <div class="relative">
                    <input type="text" 
                           name="q" 
                           value="{{ request('q') }}" 
                           placeholder="Search doctor or specialty..." 
                           class="w-full pl-9 pr-4 py-2 rounded-full border border-slate-300 text-xs sm:text-sm text-[#223645] focus:outline-none focus:border-[#e12454] focus:ring-1 focus:ring-[#e12454] transition">
                    <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-slate-400 text-xs"></i>
                </div>
            </form>

        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- 3. DOCTORS DIRECTORY GRID                                    -->
<!-- ============================================================ -->
<section class="py-16 sm:py-20 bg-slate-50/70">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        @if ($doctors->isEmpty())
            <div class="text-center py-16 bg-white rounded-3xl border border-slate-200 p-8 max-w-xl mx-auto space-y-4 shadow-sm">
                <div class="w-16 h-16 rounded-full bg-rose-50 text-[#e12454] flex items-center justify-center text-2xl mx-auto">
                    <i class="fa-solid fa-user-doctor"></i>
                </div>
                <h3 class="font-['Prata',serif] text-2xl font-bold text-[#223645]">No Doctors Found</h3>
                <p class="text-slate-500 text-sm">We couldn't find any doctors matching your selected criteria. Please try resetting your search or filter.</p>
                <a href="{{ route('doctors.index') }}" class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-[#e12454] text-white text-xs font-bold uppercase tracking-wider hover:bg-[#c91845] transition shadow-sm">
                    View All Doctors
                </a>
            </div>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($doctors as $doctor)
                    <div class="bg-white rounded-3xl overflow-hidden border border-slate-200/90 hover:border-[#e12454]/40 hover:shadow-xl transition-all duration-300 flex flex-col group">
                        
                        <!-- Top Image Banner -->
                        <div class="relative h-72 overflow-hidden bg-slate-100">
                            <img src="{{ $doctor->profile_image_url }}" 
                                 alt="{{ $doctor->name }}" 
                                 class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500">
                            
                            <!-- Badges on Image -->
                            <div class="absolute top-4 left-4 flex flex-col gap-1.5 items-start">
                                @if ($doctor->experience_years)
                                    <span class="px-3 py-1 rounded-full bg-slate-900/80 backdrop-blur-md text-white text-[11px] font-bold tracking-wide">
                                        <i class="fa-solid fa-award text-amber-400 mr-1"></i> {{ $doctor->experience_years }}
                                    </span>
                                @endif
                                @if ($doctor->service)
                                    <span class="px-3 py-1 rounded-full bg-[#e12454] text-white text-[10px] font-bold uppercase tracking-wider shadow-sm">
                                        {{ $doctor->service->title }}
                                    </span>
                                @endif
                            </div>

                            <!-- NMC Registration Number Badge -->
                            @if ($doctor->nmc_number)
                                <div class="absolute bottom-3 right-3 bg-white/95 backdrop-blur-md px-2.5 py-1 rounded-lg text-[11px] font-semibold text-slate-700 shadow-sm border border-slate-200">
                                    <i class="fa-solid fa-shield-halved text-[#e12454] mr-1"></i> {{ $doctor->nmc_number }}
                                </div>
                            @endif
                        </div>

                        <!-- Card Body Content -->
                        <div class="p-6 sm:p-7 flex-1 flex flex-col justify-between space-y-4">
                            <div class="space-y-2">
                                <div class="flex items-center justify-between text-xs text-slate-500">
                                    <span>{{ $doctor->title_prefix ?? 'Consultant' }}</span>
                                    @if ($doctor->consultation_fee)
                                        <span class="text-emerald-700 font-bold bg-emerald-50 px-2 py-0.5 rounded-md border border-emerald-200">
                                            Fee: {{ $doctor->consultation_fee }}
                                        </span>
                                    @endif
                                </div>

                                <h2 class="text-xl sm:text-2xl font-['Prata',serif] text-[#223645] group-hover:text-[#e12454] transition font-bold leading-snug">
                                    <a href="{{ route('doctors.show', $doctor->slug) }}">
                                        {{ $doctor->name }}
                                    </a>
                                </h2>

                                <p class="text-sm sm:text-[15px] font-semibold text-[#e12454]">
                                    {{ $doctor->specialty }}
                                </p>

                                @if ($doctor->qualification)
                                    <p class="text-xs text-slate-500 font-medium line-clamp-1">
                                        <i class="fa-solid fa-graduation-cap text-slate-400 mr-1"></i> {{ $doctor->qualification }}
                                    </p>
                                @endif

                                <p class="text-xs sm:text-sm text-[#647589] leading-relaxed line-clamp-2 pt-1">
                                    {{ $doctor->bio }}
                                </p>
                            </div>

                            <!-- OPD Schedule Info -->
                            <div class="pt-3 border-t border-slate-100 space-y-2 text-xs text-slate-600">
                                @if ($doctor->opd_schedule)
                                    <div class="flex items-start gap-2">
                                        <i class="fa-regular fa-clock text-[#e12454] mt-0.5 shrink-0"></i>
                                        <span class="line-clamp-1">{{ explode("\n", $doctor->opd_schedule)[0] }}</span>
                                    </div>
                                @endif
                                @if ($doctor->room_number)
                                    <div class="flex items-center gap-2 text-slate-500">
                                        <i class="fa-solid fa-door-open text-slate-400 shrink-0"></i>
                                        <span>{{ $doctor->room_number }}</span>
                                    </div>
                                @endif
                            </div>

                            <!-- Action Buttons -->
                            <div class="pt-3 border-t border-slate-100 grid grid-cols-2 gap-3">
                                <a href="{{ route('doctors.show', $doctor->slug) }}" 
                                   class="py-2.5 px-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-[#223645] font-bold text-xs uppercase tracking-wider text-center transition flex items-center justify-center gap-1.5">
                                    <span>Profile</span>
                                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                                </a>

                                <a href="{{ route('doctors.show', $doctor->slug) }}#appointment" 
                                   class="py-2.5 px-3 rounded-xl bg-[#e12454] hover:bg-[#c91845] text-white font-bold text-xs uppercase tracking-wider text-center transition shadow-xs flex items-center justify-center gap-1.5">
                                    <i class="fa-regular fa-calendar-check text-[11px]"></i>
                                    <span>Book Slot</span>
                                </a>
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>
        @endif

    </div>
</section>

<!-- ============================================================ -->
<!-- 4. WHY CONSULT OUR SPECIALISTS                               -->
<!-- ============================================================ -->
<section class="py-16 bg-white border-t border-slate-200/80">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12 space-y-2">
            <span class="text-xs sm:text-sm font-bold uppercase tracking-widest text-[#e12454] block">
                - CLINICAL QUALITY -
            </span>
            <h2 class="text-3xl sm:text-4xl font-['Prata',serif] text-[#223645]">
                Why Patients Trust Our Medical Team
            </h2>
            <p class="text-base sm:text-lg text-[#647589]">
                High standards of clinical ethics, verified NMC medical credentials, and integrated diagnostic backing.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:border-rose-200 transition space-y-3">
                <div class="w-12 h-12 rounded-xl bg-rose-50 text-[#e12454] flex items-center justify-center text-xl">
                    <i class="fa-solid fa-user-doctor"></i>
                </div>
                <h3 class="font-['Prata',serif] font-bold text-lg text-[#223645]">Senior Consultants</h3>
                <p class="text-xs sm:text-sm text-[#647589] leading-relaxed">
                    All physicians hold recognized MD/MS post-graduate degrees with verified registration in Nepal Medical Council.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:border-rose-200 transition space-y-3">
                <div class="w-12 h-12 rounded-xl bg-rose-50 text-[#e12454] flex items-center justify-center text-xl">
                    <i class="fa-solid fa-clock-rotate-left"></i>
                </div>
                <h3 class="font-['Prata',serif] font-bold text-lg text-[#223645]">Minimal Waiting Time</h3>
                <p class="text-xs sm:text-sm text-[#647589] leading-relaxed">
                    Our digital appointment system reserves your doctor consultation slot in advance to avoid long OPD queues.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:border-rose-200 transition space-y-3">
                <div class="w-12 h-12 rounded-xl bg-rose-50 text-[#e12454] flex items-center justify-center text-xl">
                    <i class="fa-solid fa-microscope"></i>
                </div>
                <h3 class="font-['Prata',serif] font-bold text-lg text-[#223645]">Integrated Diagnostic Wing</h3>
                <p class="text-xs sm:text-sm text-[#647589] leading-relaxed">
                    Ultrasound (USG), automated pathology testing, and digital ECG available under the same roof for instant reporting.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-slate-50 border border-slate-100 hover:border-rose-200 transition space-y-3">
                <div class="w-12 h-12 rounded-xl bg-rose-50 text-[#e12454] flex items-center justify-center text-xl">
                    <i class="fa-solid fa-truck-medical"></i>
                </div>
                <h3 class="font-['Prata',serif] font-bold text-lg text-[#223645]">24/7 Emergency Support</h3>
                <p class="text-xs sm:text-sm text-[#647589] leading-relaxed">
                    Our emergency triage desk and in-house round-the-clock pharmacy are ready 365 days a year for sudden medical needs.
                </p>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- 5. URGENT CONSULTATION CALLOUT BANNER                        -->
<!-- ============================================================ -->
<section class="py-14 bg-gradient-to-r from-[#223645] to-[#172431] text-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">
            <div class="space-y-2 text-center md:text-left">
                <span class="text-[#e12454] text-xs font-bold uppercase tracking-widest">Immediate Assistance</span>
                <h2 class="text-2xl sm:text-3xl font-['Prata',serif]">Need Urgent Medical Advice or Bed Admission?</h2>
                <p class="text-slate-300 text-sm sm:text-base">Our helpline connects you directly to our clinical triage station in Bhairahawa.</p>
            </div>
            <div class="flex items-center gap-4 shrink-0">
                <a href="tel:+977071591486" class="px-6 py-3.5 rounded-full bg-[#e12454] hover:bg-[#c91845] text-white text-xs sm:text-sm font-bold uppercase tracking-wider transition shadow-md flex items-center gap-2">
                    <i class="fa-solid fa-phone text-xs"></i>
                    <span>+977-071-591486</span>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
