<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Seed the sliders table with demo slides.
     */
    public function run(): void
    {
        Slider::truncate();

        Slider::create([
            'title' => "Welcome to\nLumbini Health Care",
            'subtitle' => 'Quality Healthcare in Bhairahawa',
            'image_path' => 'sliders/slide-1.jpg',
            'button_text' => 'Book Appointment',
            'button_link' => '#appointment',
            'order' => 1,
            'is_active' => true,
        ]);

        Slider::create([
            'title' => "Expert Specialist\nDoctors Team",
            'subtitle' => 'Gynecology • Pediatrics • Orthopedics • General Medicine',
            'image_path' => 'sliders/slide-2.jpg',
            'button_text' => 'Meet Our Doctors',
            'button_link' => '#doctors',
            'order' => 2,
            'is_active' => true,
        ]);
    }
}
