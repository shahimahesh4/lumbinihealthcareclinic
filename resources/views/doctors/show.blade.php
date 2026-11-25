@extends('layouts.app')

@section('title', $doctor->seo_title)
@section('meta_description', $doctor->seo_description)
@section('meta_keywords', $doctor->meta_keywords ?: "{$doctor->name}, {$doctor->specialty}, doctor in bhairahawa, lumbini health care, appointment doctor bhairahawa")
@section('canonical_url', $doctor->canonical_url ?: route('doctors.show', $doctor->slug))
@section('og_type', 'profile')
@section('og_title', $doctor->seo_title)
@section('og_description', $doctor->seo_description)
@section('og_image', $doctor->og_image_url)

@section('schema_json')
<script type="application/ld+json">
{!! json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE) !!}
</script>
@endsection

@section('content')
<!-- ============================================================ -->
<!-- 1. HERO BREADCRUMB & PAGE HEADER (Clean Slate Dark Navy)      -->
<!-- ============================================================ -->
<section class="relative bg-gradient-to-r from-[#172431] via-[#223645] to-[#172431] py-12 sm:py-16 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-10 pointer-events-none bg-[radial-gradient(#e12454_1px,transparent_1px)] [background-size:16px_16px]"></div>
    
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <!-- Breadcrumb Nav -->
        <nav class="flex items-center gap-2 text-xs font-medium text-slate-400 mb-3" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-white transition flex items-center gap-1.5">
                <i class="fa-solid fa-house text-[10px]"></i>
                <span>Home</span>
            </a>
            <i class="fa-solid fa-chevron-right text-[9px] text-slate-600"></i>
            <a href="{{ route('doctors.index') }}" class="hover:text-white transition">Specialist Doctors</a>
            <i class="fa-solid fa-chevron-right text-[9px] text-slate-600"></i>
            <span class="text-[#e12454] truncate max-w-xs">{{ $doctor->name }}</span>
        </nav>

        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div class="space-y-1.5">
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-1 px-3 py-0.5 rounded-full bg-[#e12454]/20 border border-[#e12454]/40 text-[#e12454] text-xs font-bold uppercase tracking-wider">
                        <i class="fa-solid fa-user-doctor text-[10px]"></i> {{ $doctor->specialty }}
                    </span>
                    @if ($doctor->service)
                        <span class="text-xs text-slate-400 hidden sm:inline">
                            &bull; Department of {{ $doctor->service->title }}
                        </span>
                    @endif
                </div>
                <h1 class="text-2xl sm:text-3xl md:text-4xl font-['Prata',serif] text-white">
                    {{ $doctor->name }}
                </h1>
            </div>

            <!-- Quick Jump to Booking CTA in Header -->
            <div class="flex items-center gap-3 shrink-0">
                <a href="#appointment" class="px-5 py-2.5 rounded-full bg-[#e12454] hover:bg-[#c91845] text-white text-xs font-bold uppercase tracking-wider transition shadow-md flex items-center gap-2">
                    <i class="fa-regular fa-calendar-check text-xs"></i>
                    <span>Book Appointment</span>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- ============================================================ -->
<!-- 2. MAIN 2-COLUMN DOCTOR PROFILE LAYOUT                       -->
<!-- ============================================================ -->
<section class="py-12 sm:py-16 bg-[#f8fafc]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 lg:gap-10 items-start">
            
            <!-- LEFT COLUMN: Main Profile Content (8 Cols) -->
            <div class="lg:col-span-8 space-y-8">
                
                <!-- 1. DOCTOR MASTER PROFILE CARD (Modern Clean Card) -->
                <div class="bg-white rounded-3xl p-6 sm:p-8 border border-slate-200/80 shadow-sm hover:shadow-md transition">
                    <div class="flex flex-col sm:flex-row gap-6 sm:gap-8 items-center sm:items-start">
                        
                        <!-- Portrait Image Column -->
                        <div class="w-full sm:w-56 shrink-0 flex flex-col items-center">
                            <div class="relative w-48 h-56 sm:w-56 sm:h-64 rounded-2xl overflow-hidden shadow-sm border border-slate-200 bg-slate-100 group">
                                <img src="{{ $doctor->profile_image_url }}" 
                                     alt="{{ $doctor->name }}" 
                                     class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500">
                                
                                <div class="absolute bottom-2.5 left-2.5 right-2.5 bg-slate-900/85 backdrop-blur-md px-3 py-1 rounded-lg text-center text-[10px] text-white font-bold uppercase tracking-wider flex items-center justify-center gap-1.5 shadow-xs">
                                    <i class="fa-solid fa-circle-check text-emerald-400 text-xs"></i>
                                    <span>Verified Specialist</span>
                                </div>
                            </div>

                            <!-- Social / Contact Media Icons -->
                            <div class="flex items-center justify-center gap-2 pt-3">
                                @if ($doctor->facebook_url)
                                    <a href="{{ $doctor->facebook_url }}" target="_blank" rel="noopener noreferrer" 
                                       title="Facebook" class="w-8 h-8 rounded-full bg-slate-100 hover:bg-[#e12454] hover:text-white transition text-slate-600 flex items-center justify-center text-xs">
                                        <i class="fa-brands fa-facebook-f"></i>
                                    </a>
                                @endif
                                @if ($doctor->linkedin_url)
                                    <a href="{{ $doctor->linkedin_url }}" target="_blank" rel="noopener noreferrer" 
                                       title="LinkedIn" class="w-8 h-8 rounded-full bg-slate-100 hover:bg-[#e12454] hover:text-white transition text-slate-600 flex items-center justify-center text-xs">
                                        <i class="fa-brands fa-linkedin-in"></i>
                                    </a>
                                @endif
                                @if ($doctor->twitter_url)
                                    <a href="{{ $doctor->twitter_url }}" target="_blank" rel="noopener noreferrer" 
                                       title="Twitter / X" class="w-8 h-8 rounded-full bg-slate-100 hover:bg-[#e12454] hover:text-white transition text-slate-600 flex items-center justify-center text-xs">
                                        <i class="fa-brands fa-twitter"></i>
                                    </a>
                                @endif
                                @if ($doctor->instagram_url)
                                    <a href="{{ $doctor->instagram_url }}" target="_blank" rel="noopener noreferrer" 
                                       title="Instagram" class="w-8 h-8 rounded-full bg-slate-100 hover:bg-[#e12454] hover:text-white transition text-slate-600 flex items-center justify-center text-xs">
                                        <i class="fa-brands fa-instagram"></i>
                                    </a>
                                @endif
                                @if ($doctor->email)
                                    <a href="mailto:{{ $doctor->email }}" title="Email Doctor" class="w-8 h-8 rounded-full bg-slate-100 hover:bg-[#e12454] hover:text-white transition text-slate-600 flex items-center justify-center text-xs">
                                        <i class="fa-solid fa-envelope"></i>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <!-- Doctor Info Column -->
                        <div class="flex-1 space-y-4 text-center sm:text-left">
                            <div class="space-y-1">
                                <span class="text-xs font-bold uppercase tracking-wider text-[#e12454] block">
                                    {{ $doctor->title_prefix ?? 'Consultant Specialist' }}
                                </span>
                                <h2 class="text-2xl sm:text-3xl font-['Prata',serif] text-[#223645] font-bold">
                                    {{ $doctor->name }}
                                </h2>
                                <p class="text-sm sm:text-base font-semibold text-[#e12454]">
                                    {{ $doctor->specialty }}
                                </p>
                            </div>

                            <!-- Credentials & Council Registration -->
                            <div class="flex flex-wrap items-center justify-center sm:justify-start gap-2 pt-1 text-xs">
                                @if ($doctor->qualification)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-slate-100 text-slate-700 font-medium">
                                        <i class="fa-solid fa-graduation-cap text-[#e12454]"></i>
                                        <span>{{ $doctor->qualification }}</span>
                                    </span>
                                @endif

                                @if ($doctor->nmc_number)
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-lg bg-emerald-50 text-emerald-800 border border-emerald-200 font-semibold">
                                        <i class="fa-solid fa-shield-halved text-emerald-600"></i>
                                        <span>{{ $doctor->nmc_number }}</span>
                                    </span>
                                @endif
                            </div>

                            @if ($doctor->designation)
                                <p class="text-xs sm:text-sm text-slate-500 font-medium">
                                    <i class="fa-solid fa-hospital-user text-slate-400 mr-1"></i>
                                    <span>{{ $doctor->designation }}</span>
                                    @if ($doctor->service)
                                        &bull; <a href="{{ route('services.show', $doctor->service->slug) }}" class="text-[#e12454] hover:underline font-semibold">{{ $doctor->service->title }}</a>
                                    @endif
                                </p>
                            @endif

                            <p class="text-xs sm:text-sm text-[#647589] leading-relaxed pt-1">
                                {{ $doctor->bio }}
                            </p>

                            <!-- 3 Quick Highlight Cards -->
                            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 pt-2 text-xs">
                                <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100 text-left space-y-0.5">
                                    <span class="text-slate-400 text-[10px] uppercase font-bold flex items-center gap-1">
                                        <i class="fa-solid fa-award text-amber-500"></i> Experience
                                    </span>
                                    <strong class="text-[#223645] text-sm block">{{ $doctor->experience_years ?? '10+ Years' }}</strong>
                                </div>

                                <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100 text-left space-y-0.5">
                                    <span class="text-slate-400 text-[10px] uppercase font-bold flex items-center gap-1">
                                        <i class="fa-solid fa-money-bill-wave text-emerald-600"></i> OPD Fee
                                    </span>
                                    <strong class="text-emerald-700 text-sm block">{{ $doctor->consultation_fee ?? 'Rs. 600' }}</strong>
                                </div>

                                <div class="p-3 rounded-2xl bg-slate-50 border border-slate-100 text-left col-span-2 sm:col-span-1 space-y-0.5">
                                    <span class="text-slate-400 text-[10px] uppercase font-bold flex items-center gap-1">
                                        <i class="fa-solid fa-door-open text-[#e12454]"></i> Cabin / Room
                                    </span>
                                    <strong class="text-[#223645] text-xs truncate block">{{ $doctor->room_number ?? 'OPD Room 101' }}</strong>
                                </div>
                            </div>

                            <!-- Master Card Action Buttons -->
                            <div class="pt-3 border-t border-slate-100 flex flex-wrap items-center justify-center sm:justify-start gap-3">
                                <a href="#appointment" class="px-6 py-2.5 rounded-full bg-[#e12454] hover:bg-[#c91845] text-white font-bold text-xs uppercase tracking-wider transition shadow-sm flex items-center gap-2">
                                    <i class="fa-regular fa-calendar-check"></i>
                                    <span>Book Slot Online</span>
                                </a>

                                @if ($doctor->phone)
                                    <a href="tel:{{ $doctor->phone }}" class="px-5 py-2.5 rounded-full border border-slate-300 hover:border-[#e12454] hover:text-[#e12454] text-[#223645] font-bold text-xs uppercase tracking-wider transition flex items-center gap-2">
                                        <i class="fa-solid fa-phone text-xs text-[#e12454]"></i>
                                        <span>Call: {{ $doctor->phone }}</span>
                                    </a>
                                @endif
                            </div>

                        </div>

                    </div>
                </div>

                <!-- 2. IN-DEPTH BIOGRAPHY & CLINICAL APPROACH -->
                <div class="bg-white rounded-3xl p-6 sm:p-9 border border-slate-200/80 shadow-sm space-y-4">
                    <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                        <div>
                            <span class="text-[#e12454] text-xs font-bold uppercase tracking-widest block mb-0.5">
                                - ABOUT THE DOCTOR -
                            </span>
                            <h2 class="text-xl sm:text-2xl font-['Prata',serif] text-[#223645]">
                                Professional Background & Clinical Excellence
                            </h2>
                        </div>
                        <div class="w-10 h-10 rounded-xl bg-rose-50 text-[#e12454] flex items-center justify-center text-base shrink-0">
                            <i class="fa-solid fa-user-tie"></i>
                        </div>
                    </div>

                    <div class="text-base sm:text-[17px] text-[#4b5563] leading-relaxed space-y-4 pt-1">
                        @if ($doctor->biography)
                            @foreach (explode("\n", $doctor->biography) as $paragraph)
                                @if (trim($paragraph))
                                    <p>{{ trim($paragraph) }}</p>
                                @endif
                            @endforeach
                        @else
                            <p>{{ $doctor->bio }}</p>
                        @endif
                    </div>
                </div>

                <!-- 3. AREAS OF CLINICAL EXPERTISE & KEY PROCEDURES -->
                @if (!empty($doctor->expertise_areas) && is_array($doctor->expertise_areas))
                    <div class="bg-white rounded-3xl p-6 sm:p-9 border border-slate-200/80 shadow-sm space-y-5">
                        <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                            <div>
                                <span class="text-[#e12454] text-xs font-bold uppercase tracking-widest block mb-0.5">
                                    - MEDICAL SCOPE -
                                </span>
                                <h2 class="text-xl sm:text-2xl font-['Prata',serif] text-[#223645]">
                                    Areas of Clinical Expertise & Procedures
                                </h2>
                            </div>
                            <div class="w-10 h-10 rounded-xl bg-rose-50 text-[#e12454] flex items-center justify-center text-base shrink-0">
                                <i class="fa-solid fa-stethoscope"></i>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5 pt-1">
                            @foreach ($doctor->expertise_areas as $expertise)
                                <div class="flex items-start gap-3 p-3.5 rounded-2xl bg-slate-50/80 border border-slate-100 hover:border-rose-200 hover:bg-rose-50/30 transition">
                                    <div class="w-6 h-6 rounded-full bg-rose-50 text-[#e12454] flex items-center justify-center text-xs shrink-0 mt-0.5 shadow-2xs">
                                        <i class="fa-solid fa-check"></i>
                                    </div>
                                    <span class="text-sm sm:text-[15px] font-semibold text-[#223645]">
                                        {{ $expertise }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 4. ACADEMIC QUALIFICATIONS & MEDICAL TRAINING -->
                @if (!empty($doctor->education_training) && is_array($doctor->education_training))
                    <div class="bg-white rounded-3xl p-6 sm:p-9 border border-slate-200/80 shadow-sm space-y-5">
                        <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                            <div>
                                <span class="text-[#e12454] text-xs font-bold uppercase tracking-widest block mb-0.5">
                                    - CREDENTIALS -
                                </span>
                                <h2 class="text-xl sm:text-2xl font-['Prata',serif] text-[#223645]">
                                    Academic Qualifications & Medical Training
                                </h2>
                            </div>
                            <div class="w-10 h-10 rounded-xl bg-rose-50 text-[#e12454] flex items-center justify-center text-base shrink-0">
                                <i class="fa-solid fa-graduation-cap"></i>
                            </div>
                        </div>

                        <div class="space-y-3.5 pt-1">
                            @foreach ($doctor->education_training as $edu)
                                <div class="p-4 sm:p-5 rounded-2xl bg-slate-50/80 border border-slate-100 hover:border-slate-200 hover:bg-white transition flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                                    <div class="space-y-1">
                                        <div class="flex items-center gap-2">
                                            <i class="fa-solid fa-certificate text-[#e12454] text-xs"></i>
                                            <h3 class="font-bold text-sm sm:text-base text-[#223645]">{{ $edu['degree'] ?? '' }}</h3>
                                        </div>
                                        <p class="text-xs sm:text-sm text-slate-600 pl-5 font-medium">{{ $edu['institution'] ?? '' }}</p>
                                        @if (!empty($edu['notes']))
                                            <p class="text-xs text-slate-400 pl-5 italic">{{ $edu['notes'] }}</p>
                                        @endif
                                    </div>
                                    @if (!empty($edu['year']))
                                        <span class="px-3 py-1 rounded-full bg-white border border-slate-200 text-xs font-bold text-slate-700 shrink-0 self-start sm:self-center shadow-2xs">
                                            {{ $edu['year'] }}
                                        </span>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 5. PROFESSIONAL MEMBERSHIPS & ACCREDITATIONS -->
                @if (!empty($doctor->awards_recognitions) && is_array($doctor->awards_recognitions))
                    <div class="bg-white rounded-3xl p-6 sm:p-9 border border-slate-200/80 shadow-sm space-y-5">
                        <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                            <div>
                                <span class="text-[#e12454] text-xs font-bold uppercase tracking-widest block mb-0.5">
                                    - AFFILIATIONS -
                                </span>
                                <h2 class="text-xl sm:text-2xl font-['Prata',serif] text-[#223645]">
                                    Professional Memberships & Accreditations
                                </h2>
                            </div>
                            <div class="w-10 h-10 rounded-xl bg-rose-50 text-[#e12454] flex items-center justify-center text-base shrink-0">
                                <i class="fa-solid fa-ribbon"></i>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 pt-1">
                            @foreach ($doctor->awards_recognitions as $award)
                                <div class="flex items-start gap-2.5 p-3 rounded-2xl bg-slate-50/70 border border-slate-100 text-xs sm:text-sm text-slate-700 font-medium">
                                    <i class="fa-solid fa-circle-check text-emerald-600 text-sm mt-0.5 shrink-0"></i>
                                    <span>{{ $award }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- 6. WEEKLY OPD VISITING SCHEDULE TABLE -->
                <div class="bg-white rounded-3xl p-6 sm:p-9 border border-slate-200/80 shadow-sm space-y-4">
                    <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                        <div>
                            <span class="text-[#e12454] text-xs font-bold uppercase tracking-widest block mb-0.5">
                                - CONSULTATION TIMINGS -
                            </span>
                            <h2 class="text-xl sm:text-2xl font-['Prata',serif] text-[#223645]">
                                OPD Schedule & Availability
                            </h2>
                        </div>
                        <div class="w-10 h-10 rounded-xl bg-rose-50 text-[#e12454] flex items-center justify-center text-base shrink-0">
                            <i class="fa-regular fa-clock"></i>
                        </div>
                    </div>

                    <div class="p-5 rounded-2xl bg-slate-50 border border-slate-100 space-y-3">
                        <div class="flex items-start gap-3">
                            <i class="fa-solid fa-calendar-days text-[#e12454] text-base mt-0.5"></i>
                            <div class="space-y-1">
                                <h3 class="font-bold text-sm sm:text-base text-[#223645]">Clinic Visiting Hours</h3>
                                <div class="text-xs sm:text-sm text-slate-600 leading-relaxed whitespace-pre-line font-medium">
                                    {{ $doctor->opd_schedule ?? "Monday - Saturday: 8:00 AM - 5:00 PM\nSunday: Special OPD" }}
                                </div>
                            </div>
                        </div>

                        <div class="pt-3 border-t border-slate-200 flex flex-wrap items-center justify-between gap-4 text-xs text-slate-500">
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-door-open text-[#e12454]"></i>
                                <span>{{ $doctor->room_number ?? 'OPD Room 101, 1st Floor' }}</span>
                            </div>
                            <div class="flex items-center gap-2">
                                <i class="fa-solid fa-money-bill-wave text-emerald-600"></i>
                                <span>Consultation: <strong>{{ $doctor->consultation_fee ?? 'Rs. 600' }}</strong></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!-- RIGHT COLUMN: Booking Form & Emergency Sidebar (4 Cols) -->
            <aside class="lg:col-span-4 space-y-6 sticky top-28">
                
                <!-- 1. Direct Doctor Appointment Booking Widget -->
                <div id="appointment" class="bg-white rounded-3xl p-6 sm:p-7 border border-slate-200/90 shadow-sm relative overflow-hidden">
                    <div class="absolute top-0 left-0 right-0 h-1.5 bg-[#e12454]"></div>
                    
                    <div class="border-b border-slate-100 pb-4 mb-5">
                        <span class="text-[#e12454] text-[11px] font-bold uppercase tracking-widest block mb-1">
                            - DIRECT RESERVATION -
                        </span>
                        <h3 class="font-['Prata',serif] font-bold text-xl sm:text-2xl text-[#223645]">
                            Book Consultation
                        </h3>
                        <p class="text-xs text-slate-500 pt-1">
                            Direct slot with <strong>{{ $doctor->name }}</strong>. Reception will confirm by phone.
                        </p>
                    </div>

                    <!-- Livewire Appointment Booking Component with preselected doctor & service -->
                    <livewire:appointment-booking :doctor-id="$doctor->id" :service-id="$doctor->service_id" />
                </div>

                <!-- 2. Direct Emergency Hotline Card -->
                <div class="rounded-3xl p-6 bg-gradient-to-br from-[#e12454] to-[#c91845] text-white shadow-md space-y-3 relative overflow-hidden">
                    <div class="absolute -right-6 -bottom-6 text-white/10 text-8xl pointer-events-none">
                        <i class="fa-solid fa-phone-volume"></i>
                    </div>

                    <div class="relative z-10 space-y-1.5">
                        <span class="text-[10px] font-bold uppercase tracking-widest text-rose-100 bg-white/20 px-2.5 py-0.5 rounded-full inline-block">
                            Immediate Triage Desk
                        </span>
                        <h4 class="font-['Prata',serif] text-xl font-bold">Urgent Medical Inquiry?</h4>
                        <p class="text-xs text-rose-100 leading-relaxed">
                            Need immediate emergency consultation or ambulance assistance in Bhairahawa?
                        </p>
                    </div>

                    <div class="relative z-10 pt-2 space-y-1.5">
                        <a href="tel:{{ $doctor->emergency_contact ?: '+977071591486' }}" class="w-full py-3 px-4 rounded-2xl bg-white text-[#e12454] hover:bg-slate-100 transition font-bold text-xs sm:text-sm flex items-center justify-center gap-2 shadow-xs">
                            <i class="fa-solid fa-phone text-xs"></i>
                            <span>{{ $doctor->emergency_contact ?: '+977-071-591486' }}</span>
                        </a>
                        <p class="text-[10px] text-center text-rose-200">24 Hours / 7 Days On-Call</p>
                    </div>
                </div>

                <!-- 3. Other Specialist Doctors Widget -->
                @if ($relatedDoctors->isNotEmpty())
                    <div class="bg-white rounded-3xl p-6 border border-slate-200/80 shadow-sm space-y-4">
                        <h3 class="font-['Prata',serif] font-bold text-lg text-[#223645] pb-3 border-b border-slate-100 flex items-center justify-between">
                            <span>Other Specialists</span>
                            <i class="fa-solid fa-user-doctor text-xs text-[#e12454]"></i>
                        </h3>

                        <div class="space-y-3">
                            @foreach ($relatedDoctors as $otherDoctor)
                                <a href="{{ route('doctors.show', $otherDoctor->slug) }}" class="flex items-center gap-3 p-3 rounded-2xl bg-slate-50 hover:bg-rose-50/50 border border-slate-100 hover:border-rose-200 transition group">
                                    <div class="w-12 h-12 rounded-xl overflow-hidden shrink-0 border border-slate-200 bg-white">
                                        <img src="{{ $otherDoctor->profile_image_url }}" alt="{{ $otherDoctor->name }}" class="w-full h-full object-cover object-top">
                                    </div>
                                    <div class="flex-1 min-w-0">
                                        <h4 class="font-bold text-xs sm:text-sm text-[#223645] group-hover:text-[#e12454] transition truncate">
                                            {{ $otherDoctor->name }}
                                        </h4>
                                        <p class="text-xs text-[#e12454] truncate font-medium">{{ $otherDoctor->specialty }}</p>
                                        <p class="text-[11px] text-slate-500 truncate">{{ $otherDoctor->qualification }}</p>
                                    </div>
                                    <i class="fa-solid fa-chevron-right text-xs text-slate-400 group-hover:text-[#e12454] transition"></i>
                                </a>
                            @endforeach
                        </div>

                        <div class="pt-2">
                            <a href="{{ route('doctors.index') }}" class="w-full py-2.5 px-3 rounded-xl bg-slate-100 hover:bg-slate-200 text-[#223645] text-xs font-bold uppercase tracking-wider text-center block transition">
                                View All Doctors Directory &rarr;
                            </a>
                        </div>
                    </div>
                @endif

            </aside>

        </div>
    </div>
</section>
@endsection
