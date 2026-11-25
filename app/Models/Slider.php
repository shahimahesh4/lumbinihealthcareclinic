<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'image_path',
        'mobile_image_path',
        'tablet_image_path',
        'mobile_title',
        'mobile_subtitle',
        'desktop_height',
        'mobile_height',
        'tablet_height',
        'button_text',
        'button_link',
        'order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'order' => 'integer',
        'desktop_height' => 'integer',
        'mobile_height' => 'integer',
        'tablet_height' => 'integer',
    ];

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    public function getImageUrlAttribute(): string
    {
        if (str_starts_with($this->image_path, 'http')) {
            return $this->image_path;
        }

        return asset('storage/' . $this->image_path);
    }

    /**
     * The mobile creative falls back to the desktop image when a dedicated
     * portrait asset has not been supplied.
     */
    public function getMobileImageUrlAttribute(): string
    {
        $path = $this->mobile_image_path ?: $this->image_path;

        if (str_starts_with($path, 'http')) {
            return $path;
        }

        return asset('storage/' . $path);
    }

    /**
     * Tablets fall back to the desktop creative when no tablet-specific image
     * is provided.
     */
    public function getTabletImageUrlAttribute(): string
    {
        $path = $this->tablet_image_path ?: $this->image_path;

        if (str_starts_with($path, 'http')) {
            return $path;
        }

        return asset('storage/' . $path);
    }
}
