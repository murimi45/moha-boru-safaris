<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::ordered()->get();

        $destinationOptions = ['all' => 'All Destinations']
            + Destination::ordered()
                ->pluck('name', 'slug')
                ->all();

        $durationOptions = [
            'all' => 'Any Duration',
            'short' => 'Short — 1 to 4 Days',
            'medium' => 'Medium — 5 to 7 Days',
            'long' => 'Extended — 8+ Days',
        ];

        $budgetOptions = [
            'all' => 'Any Budget',
            'value' => 'Value',
            'premium' => 'Premium',
            'ultra' => 'Ultra Luxury',
        ];

        return view('packages.index', compact(
            'packages',
            'destinationOptions',
            'durationOptions',
            'budgetOptions',
        ));
    }

    public function show(Package $package)
    {
        return view('packages.show', compact('package'));
    }
}
