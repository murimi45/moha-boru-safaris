<?php

namespace Tests\Feature;

use App\Models\BookingInquiry;
use App\Models\Destination;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminPanelTest extends TestCase
{
    use RefreshDatabase;

    public function test_guests_are_redirected_to_admin_login(): void
    {
        $this->get('/admin')
            ->assertRedirect('/admin/login');
    }

    public function test_admin_login_page_renders(): void
    {
        $this->get('/admin/login')
            ->assertOk();
    }

    public function test_authenticated_admin_can_open_catalogue_and_enquiries(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
        ]);

        Destination::create([
            'name' => 'Maasai Mara',
            'slug' => 'maasai-mara',
            'region' => 'Narok County',
            'location' => 'Narok County',
            'region_key' => 'south',
            'tag' => 'The Great Migration',
            'image' => 'https://example.com/mara.jpg',
        ]);

        BookingInquiry::create([
            'name' => 'Jane Wanjiru',
            'email' => 'jane@example.com',
            'adults' => 2,
            'children' => 0,
            'status' => BookingInquiry::STATUS_NEW,
        ]);

        $this->actingAs($admin);

        $this->get('/admin')->assertOk();
        $this->get('/admin/booking-inquiries')->assertOk();
        $this->get('/admin/destinations')->assertOk();
        $this->get('/admin/packages')->assertOk();
        $this->get('/admin/services')->assertOk();
        $this->get('/admin/gallery-images')->assertOk();
        $this->get('/admin/testimonials')->assertOk();
    }

    public function test_booking_inquiries_cannot_be_created_in_admin(): void
    {
        $admin = User::factory()->create();

        $this->actingAs($admin)
            ->get('/admin/booking-inquiries/create')
            ->assertNotFound();
    }
}
