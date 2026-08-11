<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookingInquiryRequest;
use App\Mail\BookingInquiryReceived;
use App\Models\BookingInquiry;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{
    public function create(Request $request)
    {
        $packages = Package::ordered()->pluck('name', 'slug');
        $destinations = Destination::ordered()->pluck('name', 'slug');
        $services = Service::published()->ordered()->pluck('name', 'slug');

        // Deep links from package, destination and service pages arrive as
        // ?package= / ?destination= / ?service= and preselect the form.
        $selected = [
            'package' => $packages->has($request->query('package')) ? $request->query('package') : null,
            'destination' => $destinations->has($request->query('destination')) ? $request->query('destination') : null,
            'service' => $services->has($request->query('service')) ? $request->query('service') : null,
        ];

        $budgetOptions = [
            '' => 'Prefer not to say',
            'value' => 'Value',
            'premium' => 'Premium',
            'ultra' => 'Ultra Luxury',
        ];

        return view('booking.index', compact(
            'packages',
            'destinations',
            'services',
            'selected',
            'budgetOptions',
        ));
    }

    public function store(StoreBookingInquiryRequest $request)
    {
        $data = $request->validated();

        $inquiry = BookingInquiry::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'country' => $data['country'] ?? null,
            'package_id' => $this->idForSlug(Package::class, $data['package'] ?? null),
            'destination_id' => $this->idForSlug(Destination::class, $data['destination'] ?? null),
            'service_id' => $this->idForSlug(Service::class, $data['service'] ?? null),
            'travel_date' => $data['travel_date'] ?? null,
            'adults' => $data['adults'],
            'children' => $data['children'],
            'budget_key' => $data['budget_key'] ?? null,
            'message' => $data['message'] ?? null,
        ]);

        // A failed notification must never cost us the enquiry itself.
        try {
            Mail::to(config('contact.email'))->send(new BookingInquiryReceived($inquiry));
        } catch (\Throwable $e) {
            report($e);
        }

        return redirect()
            ->route('booking.create')
            ->with('booking_reference', $inquiry->reference)
            ->with('booking_name', $inquiry->name);
    }

    private function idForSlug(string $model, ?string $slug): ?int
    {
        if (! $slug) {
            return null;
        }

        return $model::where('slug', $slug)->value('id');
    }
}
