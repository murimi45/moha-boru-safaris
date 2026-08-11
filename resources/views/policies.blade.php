@extends('layouts.app')

@section('title', 'Booking Terms & Policies | Moha Boru Safaris Limited')
@section('description', 'Booking, payment, cancellation, safety and privacy policies for Moha Boru Safaris Limited.')

@section('content')
<section class="page-hero">
    <div class="hero-media">
        <img src="{{ asset('images/destinations/maasai-mara.png') }}" alt="Safari landscape in Kenya">
    </div>
    <div class="container-mb">
        <div class="breadcrumb-mb" data-reveal>
            <a href="{{ url('/') }}">Home</a> <i class="bi bi-chevron-right" style="font-size:0.65rem;"></i> <span>Policies</span>
        </div>
        <p class="mb-eyebrow" data-reveal data-reveal-delay="1">Company Policies</p>
        <h1 data-reveal data-reveal-delay="2">Booking Terms<br><em style="font-style:italic; font-weight:300; color: var(--mb-gold-light);">&amp; Policies</em></h1>
    </div>
    <div class="horizon-divider" style="position:absolute; left:0; right:0; bottom:0;"></div>
</section>

<section class="section">
    <div class="container-mb">
        <p class="lead-copy" style="max-width: 68ch;" data-reveal>
            Moha Boru Safaris Limited – Booking Terms &amp; Company Policies. Please read these carefully before confirming your safari.
        </p>

        @php
            $policies = [
                [
                    'title' => '1. Booking Policy',
                    'items' => [
                        'A booking is confirmed upon receipt of the required deposit.',
                        'The balance must be paid before the safari begins unless otherwise agreed in writing.',
                        'All bookings are subject to availability.',
                    ],
                ],
                [
                    'title' => '2. Payment Policy',
                    'items' => [
                        'Payments may be made via bank transfer, M-Pesa, or other approved payment methods.',
                        'Prices are quoted in the agreed currency and include only the services listed in the itinerary.',
                        'Any bank transfer or transaction charges are the responsibility of the client unless stated otherwise.',
                    ],
                ],
                [
                    'title' => '3. Cancellation Policy',
                    'items' => [
                        'Cancellations must be submitted in writing.',
                        'Refunds are subject to the cancellation terms of hotels, lodges, airlines, and other service providers.',
                        'Any non-refundable costs already incurred will be deducted from the refund.',
                        'Date changes are subject to availability and may attract additional charges.',
                    ],
                ],
                [
                    'title' => '4. Child Policy',
                    'items' => [
                        'Children under 18 years must travel with a parent, guardian, or another authorized adult.',
                        'Child rates apply only where specified by accommodation providers.',
                        'Parents or guardians are responsible for supervising children throughout the safari.',
                    ],
                ],
                [
                    'title' => '5. Health & Travel Documents',
                    'items' => [
                        'Clients are responsible for ensuring they have valid passports, visas, vaccination certificates, and any other required travel documents.',
                        'Guests should inform Moha Boru Safaris Limited of any medical conditions, allergies, dietary requirements, or mobility needs before travel.',
                    ],
                ],
                [
                    'title' => '6. Safari Conduct',
                    'items' => [
                        'Guests must follow all instructions given by the safari guide.',
                        'Do not feed, disturb, or approach wildlife.',
                        'Remain inside the vehicle unless the guide confirms it is safe to exit.',
                        'Respect local communities, cultures, and conservation regulations.',
                    ],
                ],
                [
                    'title' => '7. Safety Policy',
                    'items' => [
                        'Guest safety is our highest priority.',
                        'All safari vehicles are maintained to high safety standards.',
                        'Seat belts should be worn whenever available.',
                        'The company reserves the right to modify an itinerary due to weather, road conditions, wildlife movements, or safety concerns.',
                    ],
                ],
                [
                    'title' => '8. Luggage Policy',
                    'items' => [
                        'Soft-sided bags are recommended.',
                        'Standard luggage allowance is subject to the vehicle or domestic flight requirements.',
                    ],
                ],
                [
                    'title' => '9. Liability',
                    'items' => [
                        'Moha Boru Safaris Limited acts as an agent for hotels, airlines, transport providers, and other independent suppliers.',
                        'While every effort is made to provide a safe and enjoyable safari, the company is not liable for delays, injuries, loss, damage, or expenses resulting from circumstances beyond its reasonable control, including severe weather, natural disasters, government actions, or supplier failures.',
                    ],
                ],
                [
                    'title' => '10. Travel Insurance',
                    'items' => [
                        'Comprehensive travel insurance covering medical expenses, emergency evacuation, cancellations, and loss of personal belongings is strongly recommended for all guests.',
                    ],
                ],
                [
                    'title' => '11. Photography',
                    'items' => [
                        'Guests are welcome to take photographs for personal use.',
                        'Photographs taken by the company during the safari may be used for promotional purposes unless the guest requests otherwise in writing.',
                    ],
                ],
                [
                    'title' => '12. Complaints',
                    'items' => [
                        'Any concerns should be reported to your safari guide or our office as soon as possible so they can be addressed promptly.',
                        'Formal complaints should be submitted in writing within 14 days after the safari.',
                    ],
                ],
                [
                    'title' => '13. Privacy Policy',
                    'items' => [
                        'Personal information collected during booking will be used only to arrange travel services, comply with legal obligations, and communicate with guests.',
                        'Client information will not be sold or shared with third parties except where necessary to deliver the booked services or where required by law.',
                    ],
                ],
                [
                    'title' => '14. Force Majeure',
                    'items' => [
                        'Moha Boru Safaris Limited shall not be held responsible for delays, itinerary changes, or cancellations caused by events beyond its reasonable control, including natural disasters, epidemics, strikes, civil unrest, or government restrictions.',
                    ],
                ],
            ];
        @endphp

        <div class="itinerary mt-4" data-reveal>
            @foreach($policies as $i => $policy)
                <div class="itinerary-day">
                    <button class="itinerary-day-toggle" type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#policy-{{ $i }}"
                            aria-expanded="{{ $i === 0 ? 'true' : 'false' }}"
                            aria-controls="policy-{{ $i }}">
                        <span class="itinerary-day-num">{{ sprintf('%02d', $i + 1) }}</span>
                        <span class="itinerary-day-title">{{ $policy['title'] }}</span>
                        <i class="bi bi-chevron-down"></i>
                    </button>
                    <div class="collapse {{ $i === 0 ? 'show' : '' }}" id="policy-{{ $i }}">
                        <div class="itinerary-day-body">
                            <ul class="incl-list included mb-0" style="gap: 0.35rem;">
                                @foreach($policy['items'] as $item)
                                    <li><i class="bi bi-check-circle"></i> {{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5" data-reveal>
            <a href="{{ url('/contact') }}" class="btn-mb btn-mb-dark">Questions? Contact Us <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</section>
@endsection
