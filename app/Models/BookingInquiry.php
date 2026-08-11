<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class BookingInquiry extends Model
{
    public const STATUS_NEW = 'new';
    public const STATUS_CONTACTED = 'contacted';
    public const STATUS_CLOSED = 'closed';

    protected $fillable = [
        'reference',
        'name',
        'email',
        'phone',
        'country',
        'package_id',
        'destination_id',
        'service_id',
        'travel_date',
        'adults',
        'children',
        'budget_key',
        'message',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'travel_date' => 'date',
            'adults' => 'integer',
            'children' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (self $inquiry) {
            $inquiry->reference ??= static::generateReference();
        });
    }

    /**
     * Short, human-quotable reference the traveller can use over the phone.
     */
    public static function generateReference(): string
    {
        do {
            $reference = 'MB-' . now()->format('Y') . '-' . Str::upper(Str::random(5));
        } while (static::where('reference', $reference)->exists());

        return $reference;
    }

    public function package(): BelongsTo
    {
        return $this->belongsTo(Package::class);
    }

    public function destination(): BelongsTo
    {
        return $this->belongsTo(Destination::class);
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }

    public function scopePending($query)
    {
        return $query->where('status', self::STATUS_NEW);
    }

    public function getTravellersLabelAttribute(): string
    {
        $parts = [$this->adults . ' ' . Str::plural('adult', $this->adults)];

        if ($this->children > 0) {
            $parts[] = $this->children . ' ' . Str::plural('child', $this->children);
        }

        return implode(', ', $parts);
    }
}
