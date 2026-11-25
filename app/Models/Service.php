<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_featured' => 'boolean',
        'features' => 'array',
        'faqs' => 'array',
    ];

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Helper to get SEO Title fallback
     */
    public function getSeoTitleAttribute(): string
    {
        return $this->meta_title ?: "{$this->title} - Lumbini Health Care Center, Bhairahawa";
    }

    /**
     * Helper to get SEO Description fallback
     */
    public function getSeoDescriptionAttribute(): string
    {
        return $this->meta_description ?: $this->short_description;
    }

    /**
     * Helper to get OpenGraph Image URL fallback
     */
    public function getOgImageUrlAttribute(): string
    {
        if (!empty($this->og_image)) {
            return str_starts_with($this->og_image, 'http') ? $this->og_image : asset('storage/' . $this->og_image);
        }

        if (!empty($this->image_url)) {
            return str_starts_with($this->image_url, 'http') ? $this->image_url : asset('storage/' . $this->image_url);
        }

        return asset('images/logo.jpg');
    }

    /**
     * Helper to get Featured Image URL fallback
     */
    public function getFeaturedImageUrlAttribute(): string
    {
        if (!empty($this->image_url)) {
            return str_starts_with($this->image_url, 'http') ? $this->image_url : asset('storage/' . $this->image_url);
        }

        return 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?auto=format&fit=crop&w=800&q=80';
    }
}
