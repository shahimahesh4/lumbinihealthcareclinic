<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use Livewire\Attributes\On;
use Livewire\Component;

class AppointmentBooking extends Component
{
    public string $patient_name = '';
    public string $patient_phone = '';
    public string $patient_email = '';
    public ?int $doctor_id = null;
    public ?int $service_id = null;
    public string $appointment_date = '';
    public string $appointment_time = '10:00 AM';
    public string $message = '';
    public ?string $successMessage = null;

    public function mount(?int $serviceId = null, ?int $doctorId = null): void
    {
        if ($serviceId) {
            $this->service_id = $serviceId;
        }
        if ($doctorId) {
            $this->doctor_id = $doctorId;
        }
    }

    protected function rules(): array
    {
        return [
            'patient_name' => 'required|min:3|max:100',
            'patient_phone' => 'required|min:7|max:20',
            'patient_email' => 'nullable|email|max:100',
            'doctor_id' => 'nullable|exists:doctors,id',
            'service_id' => 'nullable|exists:services,id',
            'appointment_date' => 'required|date|after_or_equal:today',
            'appointment_time' => 'required|string|max:30',
            'message' => 'nullable|string|max:1000',
        ];
    }

    #[On('select-doctor')]
    public function selectDoctor(int $doctorId): void
    {
        $this->doctor_id = $doctorId;
    }

    #[On('select-service')]
    public function selectService(int $serviceId): void
    {
        $this->service_id = $serviceId;
    }

    public function submit()
    {
        $this->validate();

        Appointment::create([
            'patient_name' => $this->patient_name,
            'patient_phone' => $this->patient_phone,
            'patient_email' => $this->patient_email ?: null,
            'doctor_id' => $this->doctor_id ?: null,
            'service_id' => $this->service_id ?: null,
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
            'message' => $this->message,
            'status' => 'pending',
        ]);

        $this->reset(['patient_name', 'patient_phone', 'patient_email', 'doctor_id', 'service_id', 'appointment_date', 'message']);
        $this->appointment_time = '10:00 AM';

        $this->successMessage = 'Your appointment request has been successfully submitted! Our medical reception at Lumbini Health Care will contact you shortly to confirm your schedule.';
    }

    public function render()
    {
        return view('livewire.appointment-booking', [
            'doctors' => Doctor::where('is_active', true)->orderBy('display_order')->get(),
            'services' => Service::orderBy('display_order')->get(),
        ]);
    }
}
