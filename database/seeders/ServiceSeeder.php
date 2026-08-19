<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $img = fn (string $file) => "/images/destinations/{$file}";

        $services = [
            [
                'name' => 'Wildlife Safaris',
                'slug' => 'wildlife-safaris',
                'icon' => 'bi-compass',
                'tagline' => 'Kenya',
                'excerpt' => 'Authentic wildlife safaris across Kenya\'s renowned parks and reserves.',
                'intro' => 'We specialize in wildlife safaris that showcase Kenya\'s rich wildlife, breathtaking landscapes and world-renowned national parks.',
                'description' => 'From the Maasai Mara and Amboseli to Samburu, Tsavo, Lake Nakuru and beyond, our safaris are led by professional English-speaking guides in 4×4 Land Cruisers with pop-up roofs. Itineraries are customized for luxury, mid-range or budget preferences while keeping wildlife viewing at the centre of every day.',
                'image' => $img('maasai-mara.png'),
                'hero_image' => $img('maasai-mara.png'),
                'highlights' => [
                    'Parks and reserves across Kenya',
                    '4×4 safari Land Cruiser with pop-up roof',
                    'Professional English-speaking safari guides',
                    'Customized luxury, mid-range and budget options',
                ],
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'name' => 'Safari Packages',
                'slug' => 'safari-packages',
                'icon' => 'bi-suitcase-lg',
                'tagline' => 'Luxury, mid-range & budget',
                'excerpt' => 'Tailored safari packages at luxury, mid-range and budget levels.',
                'intro' => 'Every journey is carefully planned to provide comfort, adventure and lasting memories — at the accommodation and budget level that suits you.',
                'description' => 'Choose from signature itineraries such as The Ultimate Kenya Safari Experience, or ask us to design a fully custom route. We arrange lodges and camps, park fees, guiding and logistics with transparent pricing.',
                'image' => $img('amboseli.png'),
                'hero_image' => $img('amboseli.png'),
                'highlights' => [
                    'Luxury, mid-range and budget options',
                    'Signature and fully custom itineraries',
                    'Competitive and transparent pricing',
                    'Full-board safari options available',
                ],
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'name' => 'Beach Holidays',
                'slug' => 'beach-holidays',
                'icon' => 'bi-water',
                'tagline' => 'Diani, Watamu & Lamu',
                'excerpt' => 'White sand beaches, water sports and Swahili coastal culture.',
                'intro' => 'Pair your safari with Diani Beach, Watamu Marine National Park or Lamu Old Town for relaxation, adventure and marine life.',
                'description' => 'Diani offers powdery white sand and turquoise water; Watamu is ideal for coral reefs, snorkeling and dolphin tours; Lamu Old Town is a UNESCO World Heritage Site with rich Swahili culture. We arrange beach stays as standalones or safari finales.',
                'image' => $img('diani-beach.png'),
                'hero_image' => $img('diani-beach.png'),
                'highlights' => [
                    'Diani Beach resorts and activities',
                    'Watamu snorkeling and dolphin tours',
                    'Lamu cultural experiences',
                    'Easy add-on to any safari itinerary',
                ],
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'name' => 'Cultural & Community Tours',
                'slug' => 'cultural-community-tours',
                'icon' => 'bi-people',
                'tagline' => 'Local life & heritage',
                'excerpt' => 'Cultural visits and community experiences that respect local traditions.',
                'intro' => 'Discover vibrant cultures across Kenya — from Maasai villages to Nairobi markets and Swahili heritage on the coast.',
                'description' => 'We arrange respectful cultural visits, city tours and community experiences that deepen your understanding of Kenya beyond the parks. Respect for culture and nature is one of our core values.',
                'image' => $img('nairobi-city-tour.png'),
                'hero_image' => $img('nairobi-city-tour.png'),
                'highlights' => [
                    'Maasai and other community visits',
                    'Nairobi culture and heritage tours',
                    'Coastal Swahili experiences',
                    'Guided with respect for local communities',
                ],
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'name' => 'Mountain Climbing Expeditions',
                'slug' => 'mountain-climbing',
                'icon' => 'bi-triangle',
                'tagline' => 'Mount Kenya & highlands',
                'excerpt' => 'Hiking and climbing on Mount Kenya and highland adventures.',
                'intro' => 'Mount Kenya National Park — Africa\'s second-highest mountain — is ideal for hiking and climbing expeditions.',
                'description' => 'We organize mountain climbing and highland trips including Mount Kenya, with options to combine Aberdare\'s forests and waterfalls for a cooler, forested contrast to classic savannah safaris.',
                'image' => $img('aberdare.png'),
                'hero_image' => $img('aberdare.png'),
                'highlights' => [
                    'Mount Kenya hiking and climbing',
                    'Aberdare forest experiences',
                    'Experienced mountain support',
                    'Custom expedition lengths',
                ],
                'is_featured' => false,
                'sort_order' => 5,
            ],
            [
                'name' => 'Hotel & Lodge Reservations',
                'slug' => 'hotel-lodge-reservations',
                'icon' => 'bi-building',
                'tagline' => 'Stays that fit your safari',
                'excerpt' => 'Hotel and lodge reservations matched to your route and budget.',
                'intro' => 'From Nairobi hotels to safari lodges and beach resorts, we reserve accommodation that fits your itinerary.',
                'description' => 'We book lodges, camps and hotels across Kenya at luxury, mid-range and budget levels, coordinating rooming, meals and special requests as part of your full travel package.',
                'image' => $img('lake-nakuru.png'),
                'hero_image' => $img('lake-nakuru.png'),
                'highlights' => [
                    'Safari lodges and tented camps',
                    'Nairobi and coastal hotels',
                    'Luxury to budget options',
                    'Dietary and special requests handled',
                ],
                'is_featured' => true,
                'sort_order' => 6,
            ],
            [
                'name' => 'Airport Transfers',
                'slug' => 'airport-transfers',
                'icon' => 'bi-airplane',
                'tagline' => 'Met on arrival',
                'excerpt' => 'Reliable airport pick-up and drop-off for every journey.',
                'intro' => 'Airport pick-up and drop-off at Jomo Kenyatta International Airport and other key points of arrival.',
                'description' => 'We arrange meet-and-greet services, Nairobi transfers and connections to your safari departure — so your trip starts and ends smoothly.',
                'image' => $img('nairobi-national-park.png'),
                'hero_image' => $img('nairobi-national-park.png'),
                'highlights' => [
                    'JKIA meet and greet',
                    'Hotel and lodge transfers',
                    'Departure drop-offs',
                    'Included on many safari packages',
                ],
                'is_featured' => true,
                'sort_order' => 7,
            ],
            [
                'name' => 'Corporate Travel Management',
                'slug' => 'corporate-travel',
                'icon' => 'bi-briefcase',
                'tagline' => 'Teams & executives',
                'excerpt' => 'Corporate travel management for organisations and incentive groups.',
                'intro' => 'We support corporate organisations with retreats, incentive travel and managed group logistics.',
                'description' => 'From executive getaways to team safaris, we handle itineraries, accommodation, transfers and invoicing so your organisation can focus on the purpose of the trip.',
                'image' => $img('samburu.png'),
                'hero_image' => $img('samburu.png'),
                'highlights' => [
                    'Corporate and incentive groups',
                    'Coordinated logistics and invoicing',
                    'Flexible group sizes',
                    'Dedicated planning support',
                ],
                'is_featured' => false,
                'sort_order' => 8,
            ],
            [
                'name' => 'Family & Honeymoon Packages',
                'slug' => 'family-honeymoon',
                'icon' => 'bi-heart',
                'tagline' => 'Paced for togetherness',
                'excerpt' => 'Family and honeymoon packages designed for comfort, romance and shared adventure.',
                'intro' => 'Whether you are travelling with children or celebrating a honeymoon, we tailor pace, rooms and experiences to your party.',
                'description' => 'Family itineraries favour flexible drives and suitable lodges; honeymoon packages emphasise privacy, scenic stays and memorable extras — always with safety and comfort in mind.',
                'image' => $img('lake-naivasha.png'),
                'hero_image' => $img('lake-naivasha.png'),
                'highlights' => [
                    'Family-friendly pacing and rooms',
                    'Romantic honeymoon stays',
                    'Child policy guidance',
                    'Custom experiences on request',
                ],
                'is_featured' => true,
                'sort_order' => 9,
            ],
            [
                'name' => 'Educational & Group Tours',
                'slug' => 'educational-group-tours',
                'icon' => 'bi-mortarboard',
                'tagline' => 'Schools, universities & groups',
                'excerpt' => 'Educational and group tours for schools, universities and organised parties.',
                'intro' => 'We design educational and group tours that balance learning, wildlife and logistics for schools, universities and clubs.',
                'description' => 'Group travel is planned with clear rooming, safety briefing and itineraries that work for larger parties — including conservation-focused and cultural learning stops where appropriate.',
                'image' => $img('tsavo.png'),
                'hero_image' => $img('tsavo.png'),
                'highlights' => [
                    'Schools and university groups',
                    'Organised clubs and associations',
                    'Educational wildlife focus',
                    'Clear group logistics and support',
                ],
                'is_featured' => false,
                'sort_order' => 10,
            ],
        ];

        foreach ($services as $service) {
            $service['is_published'] = true;

            Service::updateOrCreate(
                ['slug' => $service['slug']],
                $service
            );
        }

        Service::whereNotIn('slug', collect($services)->pluck('slug'))->delete();
    }
}
