@extends('layouts.app')

@section('title', 'About Us | Moha Boru Safaris Limited')
@section('description', 'Moha-Boru-Safaris Limited is a Kenyan tours and travel company dedicated to authentic, memorable and sustainable safari experiences across Kenya.')

@section('content')
<section class="page-hero">
    <div class="hero-media">
        <img src="{{ asset('images/destinations/amboseli.png') }}" alt="Elephants in Amboseli with Mount Kilimanjaro">
    </div>
    <div class="container-mb">
        <div class="breadcrumb-mb" data-reveal>
            <a href="{{ url('/') }}">Home</a> <i class="bi bi-chevron-right" style="font-size:0.65rem;"></i> <span>About Us</span>
        </div>
        <p class="mb-eyebrow" data-reveal data-reveal-delay="1">Company Profile</p>
        <h1 data-reveal data-reveal-delay="2">Moha-Boru-Safaris<br><em style="font-style:italic; font-weight:300; color: var(--mb-gold-light);">Limited</em></h1>
    </div>
    <div class="horizon-divider" style="position:absolute; left:0; right:0; bottom:0;"></div>
</section>

<section class="section">
    <div class="container-mb">
        <div class="row gy-5">
            <div class="col-lg-7">
                <div class="section-head" data-reveal>
                    <p class="mb-eyebrow">About Us</p>
                    <h2 class="mb-h2 mb-underline">Authentic. Memorable.<br>Sustainable.</h2>
                </div>
                <p class="lead-copy" data-reveal data-reveal-delay="1">
                    Moha-Boru-Safaris Limited is a Kenyan tours and travel company dedicated to providing authentic, memorable, and sustainable safari experiences across Kenya. We specialize in designing customized travel packages that showcase the country’s rich wildlife, breathtaking landscapes, vibrant cultures, and world-renowned national parks.
                </p>
                <p class="mt-3" style="max-width: 62ch;" data-reveal data-reveal-delay="2">
                    At Moha-Boru-Safaris Limited, we are committed to creating unforgettable travel experiences while promoting wildlife conservation and supporting local communities. Every journey is carefully planned to provide comfort, adventure, and lasting memories.
                </p>
            </div>
            <div class="col-lg-5">
                <div class="detail-info-panel" data-reveal data-reveal-delay="1">
                    <div class="detail-info-row">
                        <i class="bi bi-bullseye"></i>
                        <div>
                            <div class="k">Our Mission</div>
                            <div class="v" style="font-size: 0.92rem; font-weight: 400; line-height: 1.55;">To deliver exceptional travel experiences through professional service, personalized itineraries, and responsible tourism that benefits our clients, local communities, and the environment.</div>
                        </div>
                    </div>
                    <div class="detail-info-row">
                        <i class="bi bi-eye"></i>
                        <div>
                            <div class="k">Our Vision</div>
                            <div class="v" style="font-size: 0.92rem; font-weight: 400; line-height: 1.55;">To become one of Kenya’s leading safari and travel companies, recognized for excellence, innovation, customer satisfaction, and sustainable tourism practices.</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container-mb">
        <div class="row gy-5">
            <div class="col-lg-4">
                <div class="section-head" data-reveal>
                    <p class="mb-eyebrow">Why Choose Us</p>
                    <h2 class="mb-h2 mb-underline">What sets us<br>apart</h2>
                </div>
            </div>
            <div class="col-lg-8">
                @php
                    $pillars = [
                        ['icon' => '01', 'title' => 'Experienced Consultants', 'desc' => 'Experienced and knowledgeable safari consultants guiding every trip.'],
                        ['icon' => '02', 'title' => 'Customized Itineraries', 'desc' => 'Travel plans shaped around your pace, interests and budget.'],
                        ['icon' => '03', 'title' => 'Transparent Pricing', 'desc' => 'Competitive and transparent pricing with clear inclusions.'],
                        ['icon' => '04', 'title' => 'Professional Guides', 'desc' => 'Professional driver-guides and reliable customer support.'],
                        ['icon' => '05', 'title' => 'Responsible Tourism', 'desc' => 'Commitment to responsible and sustainable tourism.'],
                        ['icon' => '06', 'title' => 'Safe Safari Vehicles', 'desc' => 'Safe, comfortable, and well-maintained safari vehicles.'],
                    ];
                @endphp
                @foreach($pillars as $i => $pillar)
                    <div class="pillar" data-reveal data-reveal-delay="{{ min($i, 4) }}">
                        <span class="pillar-index">{{ $pillar['icon'] }}</span>
                        <div>
                            <h3>{{ $pillar['title'] }}</h3>
                            <p>{{ $pillar['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container-mb">
        <div class="section-head center mx-auto" data-reveal>
            <p class="mb-eyebrow justify-content-center">Our Core Values</p>
            <h2 class="mb-h2 mb-underline">How we work</h2>
        </div>
        <div class="row g-4 mt-2">
            @foreach(['Integrity', 'Professionalism', 'Customer Satisfaction', 'Sustainability', 'Innovation', 'Respect for Culture and Nature'] as $i => $value)
                <div class="col-sm-6 col-lg-4" data-reveal data-reveal-delay="{{ min($i, 4) }}">
                    <div class="service-card h-100">
                        <div class="service-icon"><i class="bi bi-check2"></i></div>
                        <h3 class="font-display" style="font-size: 1.25rem;">{{ $value }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="section section-alt">
    <div class="container-mb">
        <div class="row gy-5 align-items-start">
            <div class="col-lg-6">
                <div class="section-head" data-reveal>
                    <p class="mb-eyebrow">Our Services</p>
                    <h2 class="mb-h2 mb-underline">What we arrange</h2>
                </div>
                <ul class="incl-list included mt-3" data-reveal>
                    <li><i class="bi bi-check-circle"></i> Wildlife safaris across Kenya</li>
                    <li><i class="bi bi-check-circle"></i> Luxury, mid-range, and budget safari packages</li>
                    <li><i class="bi bi-check-circle"></i> Beach holidays</li>
                    <li><i class="bi bi-check-circle"></i> Cultural and community tours</li>
                    <li><i class="bi bi-check-circle"></i> Mountain climbing expeditions</li>
                    <li><i class="bi bi-check-circle"></i> Hotel and lodge reservations</li>
                    <li><i class="bi bi-check-circle"></i> Airport transfers</li>
                    <li><i class="bi bi-check-circle"></i> Corporate travel management</li>
                    <li><i class="bi bi-check-circle"></i> Family and honeymoon packages</li>
                    <li><i class="bi bi-check-circle"></i> Educational and group tours</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <div class="section-head" data-reveal>
                    <p class="mb-eyebrow">Who We Serve</p>
                    <h2 class="mb-h2 mb-underline">Target markets</h2>
                </div>
                <ul class="incl-list included mt-3" data-reveal>
                    <li><i class="bi bi-check-circle"></i> International tourists</li>
                    <li><i class="bi bi-check-circle"></i> Domestic travelers</li>
                    <li><i class="bi bi-check-circle"></i> Corporate organizations</li>
                    <li><i class="bi bi-check-circle"></i> Schools and universities</li>
                    <li><i class="bi bi-check-circle"></i> Families and groups</li>
                    <li><i class="bi bi-check-circle"></i> Adventure travelers</li>
                    <li><i class="bi bi-check-circle"></i> Honeymooners</li>
                </ul>
                <a href="{{ url('/booking') }}" class="btn-mb btn-mb-gold mt-4" data-reveal>Plan Your Safari <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection
