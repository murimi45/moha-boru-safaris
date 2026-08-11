<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\GalleryImage;
use App\Models\Package;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $destinations = Destination::featured()->ordered()->take(4)->get();
        $packages = Package::featured()->ordered()->take(3)->get();
        $testimonials = Testimonial::published()->ordered()->get();
        $services = Service::published()->ordered()->take(8)->get();
        $gallery = GalleryImage::published()->featured()->ordered()->take(6)->get();

        return view('home', compact('destinations', 'packages', 'testimonials', 'services', 'gallery'));
    }
}
