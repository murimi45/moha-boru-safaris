<?php

namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::published()->ordered()->get();

        return view('services.index', compact('services'));
    }

    public function show(Service $service)
    {
        abort_unless($service->is_published, 404);

        $relatedServices = Service::published()
            ->ordered()
            ->whereKeyNot($service->getKey())
            ->take(3)
            ->get();

        return view('services.show', compact('service', 'relatedServices'));
    }
}
