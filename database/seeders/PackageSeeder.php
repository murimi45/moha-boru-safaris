<?php

namespace Database\Seeders;

use App\Models\Destination;
use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $destinationIds = Destination::pluck('id', 'slug');
        $img = fn (string $file) => "/images/destinations/{$file}";

        $packages = [
            [
                'destination_slug' => 'maasai-mara',
                'name' => 'The Ultimate Kenya Safari Experience',
                'slug' => 'ultimate-kenya-safari-experience',
                'duration' => '10 Days / 9 Nights',
                'guests' => '2–6 Guests',
                'price' => 'On Request',
                'price_note' => 'Quoted per person based on dates, season and accommodation level',
                'badge' => 'Signature Tour',
                'excerpt' => 'Amboseli, Lake Naivasha, Lake Nakuru and the Maasai Mara — Kenya\'s classic wildlife circuit in 10 days.',
                'intro' => '10-Day Kenya Wildlife Safari & Adventure — The Ultimate Kenya Safari Experience. A carefully paced journey from Nairobi through Amboseli, the Rift Valley lakes and the Maasai Mara.',
                'image' => $img('maasai-mara.png'),
                'hero_image' => $img('maasai-mara.png'),
                'destination_key' => 'maasai-mara',
                'duration_key' => 'long',
                'budget_key' => 'premium',
                'included' => [
                    'Airport pick-up and drop-off',
                    'Transport in a 4×4 safari Land Cruiser with pop-up roof',
                    'Professional English-speaking safari guide',
                    'Accommodation for 9 nights',
                    'Full-board meals during the safari',
                    'Bottled drinking water during game drives',
                    'All scheduled game drives',
                    'Boat ride on Lake Naivasha',
                    'Government taxes and levies',
                ],
                'excluded' => [
                    'International flights',
                    'Visa fees',
                    'Travel insurance',
                    'Alcoholic and soft drinks',
                    'Hot air balloon safari',
                    'Maasai village visit',
                    'Personal expenses and tips',
                ],
                'itinerary' => [
                    [
                        'title' => 'Arrival in Nairobi',
                        'body' => 'Meet and greet at Jomo Kenyatta International Airport. Transfer to your hotel. Safari briefing and leisure time. Overnight in Nairobi.',
                    ],
                    [
                        'title' => 'Nairobi – Amboseli National Park',
                        'body' => 'Early breakfast and drive to Amboseli National Park. Afternoon game drive. Enjoy spectacular views of Mount Kilimanjaro and large elephant herds. Dinner and overnight at the lodge.',
                    ],
                    [
                        'title' => 'Full Day in Amboseli',
                        'body' => 'Morning and afternoon game drives. Search for elephants, lions, cheetahs, buffaloes, giraffes, zebras, and numerous bird species. Dinner and overnight at the lodge.',
                    ],
                    [
                        'title' => 'Amboseli – Lake Naivasha',
                        'body' => 'Breakfast and drive through the Great Rift Valley. Afternoon boat ride on Lake Naivasha. Optional guided walking safari at Crescent Island. Dinner and overnight at the lodge.',
                    ],
                    [
                        'title' => 'Lake Naivasha – Lake Nakuru National Park',
                        'body' => 'Morning drive to Lake Nakuru National Park. Afternoon game drive. Spot black and white rhinos, Rothschild\'s giraffes, lions, leopards, and flamingos (seasonal). Dinner and overnight at the lodge.',
                    ],
                    [
                        'title' => 'Lake Nakuru – Maasai Mara National Reserve',
                        'body' => 'Scenic drive to the Maasai Mara. Afternoon game drive. Excellent opportunities to see the Big Five. Dinner and overnight at the safari camp.',
                    ],
                    [
                        'title' => 'Full Day in Maasai Mara',
                        'body' => 'Full-day game drive with picnic lunch. Search for lions, leopards, elephants, cheetahs, buffaloes, and other wildlife. During July–October, witness the Great Wildebeest Migration. Dinner and overnight at the camp.',
                    ],
                    [
                        'title' => 'Another Full Day in Maasai Mara',
                        'body' => 'Early morning and afternoon game drives. Optional hot air balloon safari (extra cost). Optional visit to a Maasai village. Dinner and overnight at the camp.',
                    ],
                    [
                        'title' => 'Maasai Mara – Nairobi',
                        'body' => 'Morning game drive. Return to Nairobi. Optional visit to local markets for souvenir shopping. Farewell dinner and overnight in Nairobi.',
                    ],
                    [
                        'title' => 'Departure',
                        'body' => 'Breakfast at the hotel. Transfer to Jomo Kenyatta International Airport for your departure flight.',
                    ],
                ],
                'is_featured' => true,
                'sort_order' => 1,
            ],
            [
                'destination_slug' => 'maasai-mara',
                'name' => '5-Day Mara Signature',
                'slug' => 'mara-signature-5-day',
                'duration' => '5 Days / 4 Nights',
                'guests' => '2–6 Guests',
                'price' => 'On Request',
                'price_note' => 'Quoted per person based on dates, season and accommodation level',
                'badge' => 'Most Booked',
                'excerpt' => 'Private game drives across the Maasai Mara with a dedicated safari guide.',
                'intro' => 'Five unhurried days in the Maasai Mara — Kenya\'s most famous reserve for the Big Five and, in season, the Great Migration.',
                'image' => $img('maasai-mara.png'),
                'hero_image' => $img('maasai-mara.png'),
                'destination_key' => 'maasai-mara',
                'duration_key' => 'medium',
                'budget_key' => 'premium',
                'included' => [
                    'Transport in a 4×4 safari Land Cruiser with pop-up roof',
                    'Professional English-speaking safari guide',
                    'Park fees as per itinerary',
                    'Accommodation on full board',
                    'Scheduled game drives',
                    'Bottled drinking water during game drives',
                ],
                'excluded' => [
                    'International flights',
                    'Visa fees',
                    'Travel insurance',
                    'Alcoholic and soft drinks',
                    'Hot air balloon safari',
                    'Personal expenses and tips',
                ],
                'itinerary' => [
                    ['title' => 'Arrival & Transfer to the Mara', 'body' => 'Meet in Nairobi and travel to the Maasai Mara. Afternoon game drive. Dinner and overnight at camp.'],
                    ['title' => 'Full Day Game Drives', 'body' => 'Morning and afternoon drives searching for the Big Five and plains game.'],
                    ['title' => 'Mara Exploration', 'body' => 'Continued game drives; optional balloon safari or Maasai village visit (extra cost).'],
                    ['title' => 'Wildlife & Scenery', 'body' => 'Further exploration of the reserve\'s diverse habitats and river systems.'],
                    ['title' => 'Return to Nairobi', 'body' => 'Morning game drive and return to Nairobi.'],
                ],
                'is_featured' => true,
                'sort_order' => 2,
            ],
            [
                'destination_slug' => 'amboseli',
                'name' => 'Amboseli & Tsavo Explorer',
                'slug' => 'amboseli-tsavo-explorer',
                'duration' => '7 Days / 6 Nights',
                'guests' => '2–8 Guests',
                'price' => 'On Request',
                'price_note' => 'Quoted per person based on dates, season and accommodation level',
                'badge' => 'Family Favourite',
                'excerpt' => 'Elephant herds against Kilimanjaro, then Tsavo\'s red-earth wilderness.',
                'intro' => 'A week bridging Amboseli\'s iconic elephant plains with Tsavo East and West — Kenya\'s largest protected wilderness.',
                'image' => $img('amboseli.png'),
                'hero_image' => $img('amboseli.png'),
                'destination_key' => 'amboseli',
                'duration_key' => 'medium',
                'budget_key' => 'premium',
                'included' => [
                    'Transport in a 4×4 safari Land Cruiser with pop-up roof',
                    'Professional English-speaking safari guide',
                    'All park fees as scheduled',
                    'Lodge accommodation, full board',
                    'Daily game drives',
                    'Bottled drinking water during game drives',
                ],
                'excluded' => [
                    'International flights',
                    'Visa fees',
                    'Travel insurance',
                    'Alcoholic and soft drinks',
                    'Personal expenses and tips',
                ],
                'itinerary' => [
                    ['title' => 'Nairobi to Amboseli', 'body' => 'Drive to Amboseli. Afternoon game drive with views of Mount Kilimanjaro.'],
                    ['title' => 'Amboseli Full Day', 'body' => 'Morning and afternoon drives among elephant herds and open plains.'],
                    ['title' => 'Amboseli to Tsavo', 'body' => 'Transfer into Tsavo\'s red-earth wilderness; evening game drive.'],
                    ['title' => 'Tsavo East Exploration', 'body' => 'Full day exploring vast landscapes and red elephants.'],
                    ['title' => 'Tsavo West & Springs', 'body' => 'Visit highlights such as Mzima Springs and diverse habitats.'],
                    ['title' => 'Further Tsavo Wildlife', 'body' => 'Continued game drives across volcanic and savannah landscapes.'],
                    ['title' => 'Return to Nairobi', 'body' => 'Final morning drive and transfer back to Nairobi.'],
                ],
                'is_featured' => true,
                'sort_order' => 3,
            ],
            [
                'destination_slug' => 'diani-beach',
                'name' => 'Safari & Diani Beach Escape',
                'slug' => 'safari-diani-beach-escape',
                'duration' => '8 Days / 7 Nights',
                'guests' => '2–6 Guests',
                'price' => 'On Request',
                'price_note' => 'Quoted per person based on dates, season and accommodation level',
                'badge' => 'Beach Finale',
                'excerpt' => 'Wildlife in the parks, then powdery white sand and turquoise water at Diani.',
                'intro' => 'Combine a classic Kenya safari with time on Diani Beach — white sand, water sports and marine life after the bush.',
                'image' => $img('diani-beach.png'),
                'hero_image' => $img('diani-beach.png'),
                'destination_key' => 'diani-beach',
                'duration_key' => 'medium',
                'budget_key' => 'premium',
                'included' => [
                    'Safari transport and guiding as scheduled',
                    'Beach accommodation as listed',
                    'Park fees on safari days',
                    'Airport transfers as arranged',
                ],
                'excluded' => [
                    'International flights',
                    'Visa fees',
                    'Travel insurance',
                    'Optional water sports beyond listed activities',
                    'Personal expenses and tips',
                ],
                'itinerary' => [
                    ['title' => 'Arrive Nairobi', 'body' => 'Meet and greet; overnight in Nairobi.'],
                    ['title' => 'Safari Days', 'body' => 'Game drives in selected parks such as Amboseli or Tsavo.'],
                    ['title' => 'Transfer to the Coast', 'body' => 'Travel to Diani Beach; settle into your beach stay.'],
                    ['title' => 'Diani Leisure', 'body' => 'Beach time, optional snorkelling and water sports.'],
                    ['title' => 'Departure', 'body' => 'Transfer for your departure flight.'],
                ],
                'is_featured' => false,
                'sort_order' => 4,
            ],
            [
                'destination_slug' => 'lake-nakuru',
                'name' => 'Weekend Nakuru Escape',
                'slug' => 'weekend-nakuru-escape',
                'duration' => '3 Days / 2 Nights',
                'guests' => '2–6 Guests',
                'price' => 'On Request',
                'price_note' => 'Quoted per person based on dates, season and accommodation level',
                'badge' => 'Short Break',
                'excerpt' => 'Rhinos, flamingos and scenic viewpoints — an easy Rift Valley break from Nairobi.',
                'intro' => 'Three days in Lake Nakuru National Park — ideal for spotting rhinos, birdlife and Rift Valley scenery.',
                'image' => $img('lake-nakuru.png'),
                'hero_image' => $img('lake-nakuru.png'),
                'destination_key' => 'lake-nakuru',
                'duration_key' => 'short',
                'budget_key' => 'value',
                'included' => [
                    'Road transfer from Nairobi',
                    'Park fees',
                    'Lodge accommodation, full board',
                    'Game drives with professional guide',
                ],
                'excluded' => [
                    'Alcoholic and soft drinks',
                    'Personal expenses and tips',
                    'Travel insurance',
                ],
                'itinerary' => [
                    ['title' => 'Nairobi to Nakuru', 'body' => 'Morning departure, afternoon game drive on arrival.'],
                    ['title' => 'Full Day Rhino & Birdlife', 'body' => 'Morning and afternoon drives focused on rhinos and lakeshore birdlife.'],
                    ['title' => 'Viewpoint & Return', 'body' => 'Final morning drive and return to Nairobi.'],
                ],
                'is_featured' => false,
                'sort_order' => 5,
            ],
            [
                'destination_slug' => 'nairobi-national-park',
                'name' => 'Nairobi City & Park Day Tour',
                'slug' => 'nairobi-city-park-day-tour',
                'duration' => '1 Day',
                'guests' => '2–8 Guests',
                'price' => 'On Request',
                'price_note' => 'Quoted per person or private vehicle',
                'badge' => 'City Experience',
                'excerpt' => 'Wildlife next to the capital, plus a fascinating mix of history, culture and local life.',
                'intro' => 'A Nairobi City Tour offers a fascinating mix of history, culture, architecture, and local life — with Nairobi National Park\'s unique city-skyline safari.',
                'image' => $img('nairobi-national-park.png'),
                'hero_image' => $img('nairobi-city-tour.png'),
                'destination_key' => 'nairobi-national-park',
                'duration_key' => 'short',
                'budget_key' => 'value',
                'included' => [
                    'Professional guide',
                    'Park or attraction fees as listed',
                    'Transport in Nairobi',
                ],
                'excluded' => [
                    'Meals unless stated',
                    'Personal shopping',
                    'Optional attractions beyond the agreed plan',
                ],
                'itinerary' => [
                    ['title' => 'Nairobi National Park', 'body' => 'Morning game drive with the city skyline as backdrop.'],
                    ['title' => 'City Highlights', 'body' => 'Visit selected attractions such as the Giraffe Centre, David Sheldrick Wildlife Trust, Karen Blixen Museum, markets or museums — tailored to your half-day or full-day plan.'],
                ],
                'is_featured' => false,
                'sort_order' => 6,
            ],
        ];

        foreach ($packages as $package) {
            $destinationSlug = $package['destination_slug'];
            unset($package['destination_slug']);

            $package['destination_id'] = $destinationIds[$destinationSlug] ?? null;

            Package::updateOrCreate(
                ['slug' => $package['slug']],
                $package
            );
        }

        Package::whereNotIn('slug', collect($packages)->pluck('slug'))->delete();
    }
}
