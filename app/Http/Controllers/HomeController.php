<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\HomepageHero;
use App\Models\Service;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $doctors = Doctor::where('is_active', true)->orderBy('display_order')->get();
        $services = Service::where('is_featured', true)->orderBy('display_order')->get();
        $testimonials = Testimonial::where('is_active', true)->get();
        $blogPosts = BlogPost::where('is_published', true)->orderByDesc('published_at')->take(3)->get();
        $sliders = Slider::active()->ordered()->get();
        $homepageHero = HomepageHero::query()->first();

        return view('welcome', compact('doctors', 'services', 'testimonials', 'blogPosts', 'sliders', 'homepageHero'));
    }
}
