<?php

namespace Tests\Feature;

use App\Mail\BookingInquiryReceived;
use App\Models\BookingInquiry;
use App\Models\Destination;
use App\Models\Package;
use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class BookingInquiryTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $destination = Destination::create([
            'name' => 'Maasai Mara',
            'slug' => 'maasai-mara',
            'region' => 'Narok County',
            'location' => 'Narok County',
            'region_key' => 'south',
            'tag' => 'The Great Migration',
            'image' => 'https://example.com/mara.jpg',
        ]);

        Package::create([
            'destination_id' => $destination->id,
            'name' => '5-Day Mara Signature',
            'slug' => 'mara-signature-5-day',
            'duration' => '5 Days / 4 Nights',
            'guests' => '2-6 Guests',
            'price' => 'KES 480,000',
            'image' => 'https://example.com/package.jpg',
            'destination_key' => 'maasai-mara',
            'duration_key' => 'medium',
            'budget_key' => 'premium',
        ]);

        Service::create([
            'name' => 'Car Hire',
            'slug' => 'car-hire',
            'icon' => 'bi-car-front',
        ]);
    }

    private function validPayload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Jane Wanjiru',
            'email' => 'jane@example.com',
            'phone' => '+254712345678',
            'country' => 'Kenya',
            'package' => 'mara-signature-5-day',
            'destination' => 'maasai-mara',
            'service' => 'car-hire',
            'travel_date' => now()->addMonth()->toDateString(),
            'adults' => 2,
            'children' => 1,
            'budget_key' => 'premium',
            'message' => 'Celebrating an anniversary.',
        ], $overrides);
    }

    public function test_booking_page_renders(): void
    {
        $this->get('/booking')
            ->assertOk()
            ->assertSee('Send My Enquiry', false);
    }

    public function test_deep_link_preselects_the_package(): void
    {
        $this->get('/booking?package=mara-signature-5-day')
            ->assertOk()
            ->assertSee('value="mara-signature-5-day" selected', false);
    }

    public function test_unknown_deep_link_is_ignored(): void
    {
        $this->get('/booking?package=does-not-exist')
            ->assertOk()
            ->assertDontSee('value="does-not-exist"', false);
    }

    public function test_valid_enquiry_is_stored_and_notified(): void
    {
        Mail::fake();

        $response = $this->post('/booking', $this->validPayload());

        $inquiry = BookingInquiry::sole();

        $response->assertRedirect(route('booking.create'))
            ->assertSessionHas('booking_reference', $inquiry->reference);

        $this->assertSame('Jane Wanjiru', $inquiry->name);
        $this->assertSame('jane@example.com', $inquiry->email);
        $this->assertSame(2, $inquiry->adults);
        $this->assertSame(1, $inquiry->children);
        $this->assertSame(BookingInquiry::STATUS_NEW, $inquiry->status);
        $this->assertMatchesRegularExpression('/^MB-\d{4}-[A-Z0-9]{5}$/', $inquiry->reference);

        // Slugs are resolved to the related records
        $this->assertNotNull($inquiry->package_id);
        $this->assertNotNull($inquiry->destination_id);
        $this->assertNotNull($inquiry->service_id);

        Mail::assertSent(BookingInquiryReceived::class);
    }

    public function test_enquiry_without_a_package_is_allowed(): void
    {
        Mail::fake();

        $this->post('/booking', $this->validPayload([
            'package' => '',
            'destination' => '',
            'service' => '',
            'travel_date' => '',
            'budget_key' => '',
            'message' => '',
        ]))->assertRedirect();

        $this->assertNull(BookingInquiry::sole()->package_id);
    }

    public function test_name_and_email_are_required(): void
    {
        $this->post('/booking', $this->validPayload(['name' => '', 'email' => '']))
            ->assertSessionHasErrors(['name', 'email']);

        $this->assertSame(0, BookingInquiry::count());
    }

    public function test_email_must_be_valid(): void
    {
        $this->post('/booking', $this->validPayload(['email' => 'not-an-email']))
            ->assertSessionHasErrors('email');

        $this->assertSame(0, BookingInquiry::count());
    }

    public function test_travel_date_cannot_be_in_the_past(): void
    {
        $this->post('/booking', $this->validPayload([
            'travel_date' => now()->subWeek()->toDateString(),
        ]))->assertSessionHasErrors('travel_date');

        $this->assertSame(0, BookingInquiry::count());
    }

    public function test_unknown_package_slug_is_rejected(): void
    {
        $this->post('/booking', $this->validPayload(['package' => 'ghost-package']))
            ->assertSessionHasErrors('package');

        $this->assertSame(0, BookingInquiry::count());
    }

    public function test_honeypot_blocks_bot_submissions(): void
    {
        Mail::fake();

        $this->post('/booking', $this->validPayload(['website' => 'http://spam.example']))
            ->assertSessionHasErrors('website');

        $this->assertSame(0, BookingInquiry::count());
        Mail::assertNothingSent();
    }

    public function test_references_are_unique_across_enquiries(): void
    {
        Mail::fake();

        $this->post('/booking', $this->validPayload());
        $this->post('/booking', $this->validPayload(['email' => 'second@example.com']));

        $this->assertSame(2, BookingInquiry::distinct()->count('reference'));
    }
}
