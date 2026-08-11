<?php

namespace App\Support;

use Illuminate\Support\Facades\Storage;

class Media
{
    /**
     * Turn a DB-stored media value into a browser-ready absolute URL.
     *
     * Handles:
     * - Absolute URLs (http/https)
     * - Legacy public paths (/images/...)
     * - Filament uploads on the public disk (destinations/foo.jpg)
     */
    public static function url(?string $path): ?string
    {
        if (blank($path)) {
            return null;
        }

        if (str_starts_with($path, 'http://')
            || str_starts_with($path, 'https://')
            || str_starts_with($path, '//')) {
            return $path;
        }

        // Already a public web path (legacy /images/... or /storage/...)
        if (str_starts_with($path, '/')) {
            return url($path);
        }

        return Storage::disk('public')->url($path);
    }
}
