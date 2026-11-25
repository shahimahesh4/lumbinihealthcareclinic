<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ServiceController extends Controller
{
    /**
     * Display all medical services with SEO meta tags & category listings.
     */
    public function index(): View
    {
        $services = Service::orderBy('display_order')->get();
        $doctors = Doctor::where('is_active', true)->orderBy('display_order')->get();

        return view('services.index', compact('services', 'doctors'));
    }

    /**
     * Display a specific medical service with clinical procedures, SEO tags, FAQs, and appointment CTA.
     */
    public function show(string $slug): View
    {
        $service = Service::where('slug', $slug)->firstOrFail();
        $relatedServices = Service::where('id', '!=', $service->id)
            ->orderBy('display_order')
            ->take(5)
            ->get();
        $doctors = Doctor::where('is_active', true)
            ->orderBy('display_order')
            ->take(3)
            ->get();

        return view('services.show', compact('service', 'relatedServices', 'doctors'));
    }
}
