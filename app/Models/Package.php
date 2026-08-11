<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Package extends Model
{
    protected $fillable = [
        'destination_id',
        'name',
        'slug',
        'duration',
        'guests',
        'price',
        'price_note',
        'badge',
        'excerpt',
        'intro',
        'image',
        'hero_image',
        'destination_key',
        'duration_key',
        'budget_key',
        'included',
        'excluded',
        'itinerary',
        'is_featured',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'included' => 'array',
            'excluded' => 'array',
            'itinerary' => 'array',
            'is_featured' => 'boolean',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
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
