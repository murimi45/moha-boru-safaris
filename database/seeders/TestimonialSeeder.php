<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'quote' => 'Every detail was considered before we even thought to ask. Moha Boru turned a milestone birthday into the trip of a lifetime.',
                'name' => 'Amara & James Whitfield',
                'role' => 'Maasai Mara, June 2026',
                'initials' => 'AW',
                'sort_order' => 1,
            ],
            [
                'quote' => 'Our guide seemed to know where every animal would be before it arrived. Ten days felt like ten unforgettable chapters.',
                'name' => 'Priya Nathan',
                'role' => 'Amboseli & Tsavo, March 2026',
                'initials' => 'PN',
                'sort_order' => 2,
            ],
            [
                'quote' => 'From the first email to the final sundowner, this was the most seamless luxury travel experience we have ever had.',
                'name' => 'The Odhiambo Family',
                'role' => 'Northern Frontier, January 2026',
                'initials' => 'OF',
                'sort_order' => 3,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                [
                    'name' => $testimonial['name'],
                    'role' => $testimonial['role'],
                ],
                $testimonial + ['is_published' => true]
            );
        }
    }
}
