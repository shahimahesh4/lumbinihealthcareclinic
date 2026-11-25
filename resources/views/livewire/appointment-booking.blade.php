<div>
    @if ($successMessage)
        <div class="mb-6 rounded-2xl bg-emerald-50 border border-emerald-200 p-6 text-emerald-800 shadow-sm animate-fade-in">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-full bg-emerald-100 text-emerald-600 flex items-center justify-center text-lg flex-shrink-0">
                    <i class="fa-solid fa-check"></i>
                </div>
                <div>
                    <h4 class="font-bold text-lg text-emerald-900 font-['Prata',serif]">Appointment Request Received</h4>
                    <p class="text-xs text-emerald-700 mt-1 leading-relaxed">{{ $successMessage }}</p>
                </div>
            </div>
            <div class="mt-4 pt-4 border-t border-emerald-200/60 flex items-center justify-between">
                <button type="button" wire:click="$set('successMessage', null)" class="inline-flex items-center gap-2 text-xs font-bold text-emerald-800 hover:text-emerald-950 uppercase tracking-wider underline">
                    <i class="fa-solid fa-plus text-[10px]"></i>
                    <span>Book Another Appointment</span>
                </button>
                <span class="text-xs font-semibold text-emerald-700">Ref: LHC-{{ rand(1000, 9999) }}</span>
            </div>
        </div>
    @else
        <form wire:submit="submit" class="space-y-4">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#223645] mb-1.5">
                        Your Full Name <span class="text-[#e12454]">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-regular fa-user text-xs"></i>
                        </span>
                        <input type="text" wire:model="patient_name" placeholder="e.g. Sunita Sharma"
                               class="w-full pl-9 pr-4 py-3 rounded-lg border border-slate-200 bg-slate-50 text-slate-900 text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#e12454] focus:border-transparent transition" />
                    </div>
                    @error('patient_name') <span class="text-xs text-[#e12454] mt-1 block font-semibold">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#223645] mb-1.5">
                        Phone Number <span class="text-[#e12454]">*</span>
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-solid fa-phone text-xs"></i>
                        </span>
                        <input type="tel" wire:model="patient_phone" placeholder="e.g. 9847000000"
                               class="w-full pl-9 pr-4 py-3 rounded-lg border border-slate-200 bg-slate-50 text-slate-900 text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#e12454] focus:border-transparent transition" />
                    </div>
                    @error('patient_phone') <span class="text-xs text-[#e12454] mt-1 block font-semibold">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#223645] mb-1.5">
                        Email Address (Optional)
                    </label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-slate-400">
                            <i class="fa-regular fa-envelope text-xs"></i>
                        </span>
                        <input type="email" wire:model="patient_email" placeholder="e.g. sunita@example.com"
                               class="w-full pl-9 pr-4 py-3 rounded-lg border border-slate-200 bg-slate-50 text-slate-900 text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#e12454] focus:border-transparent transition" />
                    </div>
                    @error('patient_email') <span class="text-xs text-[#e12454] mt-1 block font-semibold">{{ $message }}</span> @enderror
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#223645] mb-1.5">
                        Clinical Department / Service
                    </label>
                    <select wire:model="service_id"
                            class="w-full px-4 py-3 rounded-lg border border-slate-200 bg-slate-50 text-slate-900 text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#e12454] focus:border-transparent transition">
                        <option value="">-- Choose Medical Service --</option>
                        @foreach ($services as $service)
                            <option value="{{ $service->id }}">{{ $service->title }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#223645] mb-1.5">
                        Preferred Doctor (Optional)
                    </label>
                    <select wire:model="doctor_id"
                            class="w-full px-4 py-3 rounded-lg border border-slate-200 bg-slate-50 text-slate-900 text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#e12454] focus:border-transparent transition">
                        <option value="">-- Any Available Specialist --</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->id }}">{{ $doctor->name }} ({{ $doctor->specialty }})</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase tracking-wider text-[#223645] mb-1.5">
                        Appointment Date <span class="text-[#e12454]">*</span>
                    </label>
                    <input type="date" wire:model="appointment_date" min="{{ date('Y-m-d') }}"
                           class="w-full px-4 py-3 rounded-lg border border-slate-200 bg-slate-50 text-slate-900 text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#e12454] focus:border-transparent transition" />
                    @error('appointment_date') <span class="text-xs text-[#e12454] mt-1 block font-semibold">{{ $message }}</span> @enderror
                </div>
            </div>

            <!-- Time slot quick selection buttons -->
            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#223645] mb-1.5">
                    Preferred Time Slot <span class="text-[#e12454]">*</span>
                </label>
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                    @foreach(['09:00 AM', '11:00 AM', '02:30 PM', '05:00 PM'] as $slot)
                        <button type="button" wire:click="$set('appointment_time', '{{ $slot }}')"
                                class="py-2 px-3 text-xs font-bold rounded-lg border text-center transition {{ $appointment_time === $slot ? 'bg-[#e12454] text-white border-[#e12454] shadow-sm' : 'bg-slate-50 text-slate-700 border-slate-200 hover:border-slate-300' }}">
                            {{ $slot }}
                        </button>
                    @endforeach
                </div>
                <div class="mt-2">
                    <input type="text" wire:model="appointment_time" placeholder="Or enter specific time (e.g. 10:30 AM)"
                           class="w-full px-4 py-2 rounded-lg border border-slate-200 bg-slate-50 text-slate-900 text-xs focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#e12454] transition" />
                </div>
                @error('appointment_time') <span class="text-xs text-[#e12454] mt-1 block font-semibold">{{ $message }}</span> @enderror
            </div>

            <div>
                <label class="block text-xs font-bold uppercase tracking-wider text-[#223645] mb-1.5">
                    Chief Complaint / Short Note
                </label>
                <textarea wire:model="message" rows="2" placeholder="Briefly describe your symptoms or reason for visit..."
                          class="w-full px-4 py-3 rounded-lg border border-slate-200 bg-slate-50 text-slate-900 text-sm focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#e12454] focus:border-transparent transition"></textarea>
            </div>

            <div class="pt-2">
                <button type="submit" wire:loading.attr="disabled"
                        class="w-full py-3.5 px-6 rounded-full bg-[#e12454] text-white font-bold text-xs uppercase tracking-wider hover:bg-[#c91845] transition-all duration-300 shadow-md shadow-[#e12454]/25 flex items-center justify-center gap-2 cursor-pointer active:scale-95 disabled:opacity-75">
                    <span wire:loading.remove class="flex items-center gap-2">
                        <span>Confirm Appointment Slot</span>
                        <i class="fa-solid fa-arrow-right text-[10px]"></i>
                    </span>
                    <span wire:loading class="inline-flex items-center gap-2">
                        <svg class="animate-spin h-4 w-4 text-white" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                        </svg>
                        Processing Slot Request...
                    </span>
                </button>
            </div>

            <p class="text-center text-[11px] text-[#647589] pt-1">
                &bull; Confidential &bull; Reception confirms by phone &bull; Call: <strong class="text-[#223645]">+977-071-591486</strong>
            </p>
        </form>
    @endif
</div>
