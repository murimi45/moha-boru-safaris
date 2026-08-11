<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Destination extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'region',
        'location',
        'region_key',
        'tag',
        'best_time',
        'image',
        'hero_image',
        'excerpt',
        'intro',
        'description',
        'activities',
        'gallery',
        'is_featured',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'activities' => 'array',
            'gallery' => 'array',
            'is_featured' => 'boolean',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function packages(): HasMany
    {
        return $this->hasMany(Package::class);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('name');
    }
}
