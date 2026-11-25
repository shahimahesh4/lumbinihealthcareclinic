<?php

namespace Tests\Feature;

use App\Livewire\AppointmentBooking;
use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class HospitalWebsiteTest extends TestCase
{
    public function test_homepage_loads_successfully_with_data(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Lumbini Health');
        $response->assertSee('Make Your');
        $response->assertSee('Health');
        $response->assertSee('Dr. Sushmita Adhikari');
        $response->assertSee('Gynecology & Obstetrics');
        $response->assertSee('25k+');
    }

    public function test_filament_admin_login_is_accessible(): void
    {
        $response = $this->get('/stnapanel/login');

        $response->assertStatus(200);
        $response->assertSee('Lumbini Health Care');
    }

    public function test_authenticated_admin_can_visit_dashboard(): void
    {
        $user = User::first();
        $response = $this->actingAs($user)->get('/stnapanel');

        $response->assertStatus(200);
        $response->assertSee('Dashboard');
    }

    public function test_admin_can_access_all_resources(): void
    {
        $user = User::first();

        $this->actingAs($user)->get('/stnapanel/appointments')->assertStatus(200);
        $this->actingAs($user)->get('/stnapanel/doctors')->assertStatus(200);
        $this->actingAs($user)->get('/stnapanel/services')->assertStatus(200)->assertSee('Services');
        $this->actingAs($user)->get('/stnapanel/testimonials')->assertStatus(200);
        $this->actingAs($user)->get('/stnapanel/blog-posts')->assertStatus(200);
    }

    public function test_livewire_appointment_booking_can_submit_successfully(): void
    {
        $doctor = Doctor::first();
        $service = Service::first();

        Livewire::test(AppointmentBooking::class)
            ->set('patient_name', 'Manoj Sharma')
            ->set('patient_phone', '9847123456')
            ->set('patient_email', 'manoj@example.com')
            ->set('doctor_id', $doctor?->id)
            ->set('service_id', $service?->id)
            ->set('appointment_date', date('Y-m-d', strtotime('+3 days')))
            ->set('appointment_time', '11:00 AM')
            ->set('message', 'Need general health consultation.')
            ->call('submit')
            ->assertHasNoErrors()
            ->assertSee('Appointment Request Received');

        $this->assertDatabaseHas('appointments', [
            'patient_name' => 'Manoj Sharma',
            'patient_phone' => '9847123456',
        ]);
    }

    public function test_services_index_page_loads_with_seo_meta_and_schema(): void
    {
        $response = $this->get('/services');

        $response->assertStatus(200);
        $response->assertSee('Medical Services & Specialized Clinical Departments');
        $response->assertSee('Gynecology & Obstetrics');
        $response->assertSee('General Medicine & OPD');
        $response->assertSee('Digital USG & Diagnostic Lab');
        $response->assertSee('Specialized Healthcare Tailored To Every Family Member');
        // SEO checks
        $response->assertSee('meta name="description"', false);
        $response->assertSee('meta name="keywords"', false);
        $response->assertSee('link rel="canonical"', false);
        $response->assertSee('schema.org', false);
        $response->assertSee('MedicalWebPage', false);
    }

    public function test_single_service_page_loads_with_dynamic_seo_and_content(): void
    {
        $service = Service::where('slug', 'gynecology-obstetrics')->first();
        $this->assertNotNull($service);

        $response = $this->get('/services/gynecology-obstetrics');

        $response->assertStatus(200);
        $response->assertSee('Gynecology & Obstetrics', false);
        $response->assertSee('Patient Preparation & Test Guidelines', false);
        $response->assertSee('Frequently Asked Questions');
        $response->assertSee('High-Risk Pregnancy');
        // Dynamic SEO tag assertions
        $response->assertSee($service->seo_title);
        $response->assertSee('og:title', false);
        $response->assertSee('twitter:card', false);
        $response->assertSee('FAQPage', false);
        $response->assertSee('When should I schedule my first prenatal appointment?');
    }

    public function test_single_service_returns_404_for_invalid_slug(): void
    {
        $response = $this->get('/services/non-existent-service');

        $response->assertStatus(404);
    }

    public function test_doctors_index_page_loads_with_seo_meta_and_schema(): void
    {
        $response = $this->get('/doctors');

        $response->assertStatus(200);
        $response->assertSee('Our Specialist Doctors');
        $response->assertSee('Medical Consultants');
        $response->assertSee('Dr. Sushmita Adhikari');
        $response->assertSee('Dr. Ramesh P. Chaudhary');
        $response->assertSee('Dr. Bikash Sharma');
        $response->assertSee('NMC Reg. No. 12845');
        // SEO checks
        $response->assertSee('meta name="description"', false);
        $response->assertSee('meta name="keywords"', false);
        $response->assertSee('link rel="canonical"', false);
        $response->assertSee('schema.org', false);
        $response->assertSee('MedicalWebPage', false);
        $response->assertSee('Physician', false);

        // Filter test
        $filteredResponse = $this->get('/doctors?department=gynecology-obstetrics');
        $filteredResponse->assertStatus(200);
        $filteredResponse->assertSee('Dr. Sushmita Adhikari');
    }

    public function test_single_doctor_page_loads_with_dynamic_seo_and_appointment_booking(): void
    {
        $doctor = Doctor::where('slug', 'dr-sushmita-adhikari')->first();
        $this->assertNotNull($doctor);

        $response = $this->get('/doctors/dr-sushmita-adhikari');

        $response->assertStatus(200);
        $response->assertSee('Dr. Sushmita Adhikari');
        $response->assertSee('Gynecologist &amp; Obstetrician', false);
        $response->assertSee('NMC Reg. No. 12845');
        $response->assertSee('Professional Background');
        $response->assertSee('Areas of Clinical Expertise');
        $response->assertSee('High-Risk Pregnancy &amp; Antenatal Care', false);
        $response->assertSee('Academic Qualifications');
        $response->assertSee('Tribhuvan University Teaching Hospital');
        $response->assertSee('OPD Schedule');
        $response->assertSee('Book Consultation');

        // Dynamic SEO and Schema checks
        $response->assertSee($doctor->seo_title);
        $response->assertSee('og:title', false);
        $response->assertSee('twitter:card', false);
        $response->assertSee('schema.org', false);
        $response->assertSee('Physician', false);
    }

    public function test_single_doctor_returns_404_for_invalid_slug(): void
    {
        $response = $this->get('/doctors/non-existent-doctor-slug');

        $response->assertStatus(404);
    }

    public function test_doctor_appointment_booking_with_preselected_doctor(): void
    {
        $doctor = Doctor::where('slug', 'dr-sushmita-adhikari')->first();
        $this->assertNotNull($doctor);

        Livewire::test(AppointmentBooking::class, ['doctorId' => $doctor->id, 'serviceId' => $doctor->service_id])
            ->set('patient_name', 'Rita Thapa')
            ->set('patient_phone', '9801234888')
            ->set('patient_email', 'rita.thapa@example.com')
            ->set('appointment_date', date('Y-m-d', strtotime('+2 days')))
            ->set('appointment_time', '09:30 AM')
            ->set('message', 'Antenatal consultation with Dr. Sushmita.')
            ->call('submit')
            ->assertHasNoErrors()
            ->assertSee('Appointment Request Received');

        $this->assertDatabaseHas('appointments', [
            'patient_name' => 'Rita Thapa',
            'patient_phone' => '9801234888',
            'doctor_id' => $doctor->id,
        ]);
    }
}
