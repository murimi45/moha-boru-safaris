<?php

namespace App\Http\Controllers;

use App\Models\Destination;

class DestinationController extends Controller
{
    public function index()
    {
        $destinations = Destination::ordered()->get();

        $regions = [
            'all' => 'All Destinations',
            'south' => 'Southern Circuit',
            'north' => 'Northern Kenya',
            'rift' => 'Rift Valley',
            'highlands' => 'Highlands',
            'coast' => 'Coast',
            'city' => 'Nairobi',
        ];

        return view('destinations.index', compact('destinations', 'regions'));
    }

    public function show(Destination $destination)
    {
        return view('destinations.show', compact('destination'));
    }
}
