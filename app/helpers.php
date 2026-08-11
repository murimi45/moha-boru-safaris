<?php

use App\Support\Media;

if (! function_exists('media_url')) {
    /**
     * Resolve a stored media path to a browser-ready URL.
     * Supports uploaded storage paths, legacy /images/... paths, and absolute URLs.
     */
    function media_url(?string $path): ?string
    {
        return Media::url($path);
    }
}
