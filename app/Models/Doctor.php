<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
        'is_featured' => 'boolean',
        'is_available_for_booking' => 'boolean',
        'expertise_areas' => 'array',
        'education_training' => 'array',
        'awards_recognitions' => 'array',
        'opd_days' => 'array',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class, 'service_id');
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class);
    }

    /**
     * Full Display Name with Prefix
     */
    public function getDisplayNameAttribute(): string
    {
        if ($this->title_prefix && !str_starts_with($this->name, $this->title_prefix)) {
            return "{$this->title_prefix} {$this->name}";
        }

        return $this->name;
    }

    /**
     * SEO Title fallback
     */
    public function getSeoTitleAttribute(): string
    {
        return $this->meta_title ?: "{$this->name} - {$this->specialty} | Lumbini Health Care Center, Bhairahawa";
    }

    /**
     * SEO Description fallback
     */
    public function getSeoDescriptionAttribute(): string
    {
        if ($this->meta_description) {
            return $this->meta_description;
        }

        $bio = $this->bio ? strip_tags($this->bio) : '';
        return "Book appointment with {$this->name}, {$this->specialty} at Lumbini Health Care Center, Bhairahawa. {$bio}";
    }

    /**
     * Featured Profile Image URL fallback
     */
    public function getProfileImageUrlAttribute(): string
    {
        if (!empty($this->image_url)) {
            return str_starts_with($this->image_url, 'http') ? $this->image_url : asset('storage/' . $this->image_url);
        }

        return 'https://images.unsplash.com/photo-1559839734-2b71ea197ec2?auto=format&fit=crop&w=600&q=80';
    }

    /**
     * Social OG Image URL fallback
     */
    public function getOgImageUrlAttribute(): string
    {
        if (!empty($this->og_image)) {
            return str_starts_with($this->og_image, 'http') ? $this->og_image : asset('storage/' . $this->og_image);
        }

        return $this->profile_image_url;
    }
}
