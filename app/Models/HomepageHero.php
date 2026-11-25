<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageHero extends Model
{
    protected $fillable = [
        'image_path',
        'image_alt',
        'title_prefix',
        'title_highlight',
        'title_suffix',
        'description',
        'primary_button_text',
        'primary_button_link',
        'secondary_button_text',
        'secondary_button_link',
        'badge_top_text',
        'badge_bottom_text',
        'about_eyebrow',
        'about_title',
        'about_description',
        'about_image_path',
        'about_image_alt',
        'about_doctor_image_path',
        'about_doctor_name',
        'about_doctor_designation',
        'about_doctor_credentials',
        'about_button_text',
        'about_button_link',
        'about_emergency_text',
    ];

    public function getImageUrlAttribute(): string
    {
        if (blank($this->image_path)) {
            return 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=800&q=85';
        }

        if (str_starts_with($this->image_path, 'http')) {
            return $this->image_path;
        }

        return asset('storage/' . $this->image_path);
    }

    public function getAboutImageUrlAttribute(): string
    {
        if (blank($this->about_image_path)) {
            return 'https://images.unsplash.com/photo-1629909613654-28e377c37b09?auto=format&fit=crop&w=900&q=85';
        }

        return str_starts_with($this->about_image_path, 'http')
            ? $this->about_image_path
            : asset('storage/' . $this->about_image_path);
    }

    public function getAboutDoctorImageUrlAttribute(): string
    {
        if (blank($this->about_doctor_image_path)) {
            return 'https://images.unsplash.com/photo-1622253692010-333f2da6031d?auto=format&fit=crop&w=200&q=80';
        }

        return str_starts_with($this->about_doctor_image_path, 'http')
            ? $this->about_doctor_image_path
            : asset('storage/' . $this->about_doctor_image_path);
    }
}
