<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DoctorController extends Controller
{
    /**
     * Display all specialist doctors with filtering, search, and SEO.
     */
    public function index(Request $request): View
    {
        $query = Doctor::with('service')->where('is_active', true);

        // Optional department filter
        if ($request->filled('department')) {
            $departmentSlug = $request->query('department');
            $query->whereHas('service', function ($q) use ($departmentSlug) {
                $q->where('slug', $departmentSlug);
            });
        }

        // Optional text search
        if ($request->filled('q')) {
            $search = $request->query('q');
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('specialty', 'like', "%{$search}%")
                  ->orWhere('qualification', 'like', "%{$search}%")
                  ->orWhere('designation', 'like', "%{$search}%");
            });
        }

        $doctors = $query->orderBy('display_order')->get();
        $departments = Service::orderBy('display_order')->get();

        // Schema.org ItemList of MedicalBusiness doctors
        $schemaData = [
            '@context' => 'https://schema.org',
            '@type' => 'MedicalWebPage',
            'name' => 'Specialist Doctors & Medical Consultants | Lumbini Health Care Center',
            'description' => 'Meet our senior gynecologists, pediatricians, consultant physicians, orthopedic surgeons, and radiologists in Bhairahawa, Nepal.',
            'url' => route('doctors.index'),
            'about' => [
                '@type' => 'Hospital',
                'name' => 'Lumbini Health Care Center',
                'telephone' => '+977-071-591486',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => 'Siddharthanagar-8',
                    'addressLocality' => 'Bhairahawa',
                    'addressRegion' => 'Rupandehi',
                    'addressCountry' => 'NP',
                ],
            ],
            'mainEntity' => [
                '@type' => 'ItemList',
                'itemListElement' => $doctors->values()->map(function ($doctor, $index) {
                    return [
                        '@type' => 'ListItem',
                        'position' => $index + 1,
                        'item' => [
                            '@type' => 'Physician',
                            'name' => $doctor->name,
                            'medicalSpecialty' => $doctor->specialty,
                            'url' => route('doctors.show', $doctor->slug),
                            'image' => $doctor->profile_image_url,
                        ],
                    ];
                })->toArray(),
            ],
        ];

        return view('doctors.index', compact('doctors', 'departments', 'schemaData'));
    }

    /**
     * Display a specific doctor profile with clinical expertise, OPD schedule, credentials, and appointment booking.
     */
    public function show(string $slug): View
    {
        $doctor = Doctor::with('service')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $relatedDoctors = Doctor::where('is_active', true)
            ->where('id', '!=', $doctor->id)
            ->when($doctor->service_id, function ($q) use ($doctor) {
                $q->orderByRaw('service_id = ? DESC', [$doctor->service_id]);
            })
            ->orderBy('display_order')
            ->take(3)
            ->get();

        $services = Service::orderBy('display_order')->get();

        // Schema.org Physician Structured Data
        $schemaData = [
            '@context' => 'https://schema.org',
            '@type' => 'Physician',
            'name' => $doctor->name,
            'image' => $doctor->profile_image_url,
            'url' => route('doctors.show', $doctor->slug),
            'telephone' => $doctor->phone ?: '+977-071-591486',
            'email' => $doctor->email ?: 'info@lumbinihealthcare.com',
            'medicalSpecialty' => $doctor->specialty,
            'description' => $doctor->bio,
            'priceRange' => $doctor->consultation_fee ?: 'Rs. 600',
            'hospitalAffiliation' => [
                '@type' => 'Hospital',
                'name' => 'Lumbini Health Care Center',
                'url' => route('home'),
                'telephone' => '+977-071-591486',
                'address' => [
                    '@type' => 'PostalAddress',
                    'streetAddress' => 'Siddharthanagar-8, Near Lumbini Eye Institute Road',
                    'addressLocality' => 'Bhairahawa',
                    'addressRegion' => 'Rupandehi, Lumbini Province',
                    'addressCountry' => 'NP',
                ],
            ],
        ];

        if ($doctor->qualification) {
            $schemaData['hasCredential'] = $doctor->qualification;
        }

        if (!empty($doctor->education_training) && is_array($doctor->education_training)) {
            $schemaData['alumniOf'] = array_map(function ($edu) {
                return [
                    '@type' => 'EducationalOrganization',
                    'name' => $edu['institution'] ?? '',
                ];
            }, $doctor->education_training);
        }

        return view('doctors.show', compact('doctor', 'relatedDoctors', 'services', 'schemaData'));
    }
}
