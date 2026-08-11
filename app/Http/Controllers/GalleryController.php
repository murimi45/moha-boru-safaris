<?php

namespace App\Http\Controllers;

use App\Models\GalleryImage;

class GalleryController extends Controller
{
    public function index()
    {
        $images = GalleryImage::published()->ordered()->get();

        $categories = [
            'all' => 'All Photographs',
            'wildlife' => 'Wildlife',
            'landscapes' => 'Landscapes',
            'camps' => 'Camps & Lodges',
            'coast' => 'Coast',
            'on-safari' => 'On Safari',
        ];

        // Only offer filters that actually have photographs behind them
        $usedKeys = $images->pluck('category_key')->unique();
        $categories = array_filter(
            $categories,
            fn ($key) => $key === 'all' || $usedKeys->contains($key),
            ARRAY_FILTER_USE_KEY
        );

        return view('gallery.index', compact('images', 'categories'));
    }
}
