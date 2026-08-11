@extends('layouts.app')

@section('title', 'Services | Moha Boru Safaris Limited')
@section('description', 'Wildlife safaris, beach holidays, cultural tours, mountain expeditions, hotel bookings, airport transfers and more — arranged by Moha Boru Safaris Limited.')

{{-- Data from ServiceController@index: $services --}}

@section('content')
{{-- ============================== PAGE HERO ============================== --}}
<section class="page-hero">
    <div class="hero-media">
        <img src="{{ asset('images/destinations/maasai-mara.png') }}" alt="Wildlife safari across Kenya">
    </div>
    <div class="container-mb">
        <div class="breadcrumb-mb" data-reveal>
            <a href="{{ url('/') }}">Home</a> <i class="bi bi-chevron-right" style="font-size:0.65rem;"></i> <span>Services</span>
        </div>
        <p class="mb-eyebrow" data-reveal data-reveal-delay="1">What We Offer</p>
        <h1 data-reveal data-reveal-delay="2">Everything, arranged<br><em style="font-style:italic; font-weight:300; color: var(--mb-gold-light);">before you ask</em></h1>
    </div>
    <div class="horizon-divider" style="position:absolute; left:0; right:0; bottom:0;"></div>
</section>

{{-- ============================== SERVICES GRID ============================== --}}
<section class="section">
    <div class="container-mb">
        <div class="section-head" data-reveal>
            <p class="lead-copy mb-0">
                Wildlife safaris, beach holidays, cultural tours, mountain expeditions, lodges,
                transfers and group travel — arranged in-house so you have one team for the whole journey.
            </p>
        </div>

        <div class="services-grid" style="display:flex;flex-wrap:wrap;margin:-0.875rem;">
            @foreach($services as $i => $service)
                <x-service-card :service="$service" :index="$i" />
            @endforeach
        </div>
    </div>
</section>

<div class="container-mb"><div class="horizon-divider" data-reveal></div></div>

{{-- ============================== HOW IT WORKS ============================== --}}
<section class="section">
    <div class="container-mb">
        <div class="row gy-5">
            <div class="col-lg-4">
                <div class="section-head" data-reveal>
                    <p class="mb-eyebrow">How We Work</p>
                    <h2 class="mb-h2 mb-underline">Four steps,<br>one point of contact</h2>
                    <p class="lead-copy mt-3">
                        From the first message to the final transfer home, the same planner
                        stays with your journey.
                    </p>
                </div>
            </div>
            <div class="col-lg-8">
                @php
                    $steps = [
                        ['index' => '01', 'title' => 'Tell Us How You Travel', 'desc' => 'A short conversation about pace, interests, dates and budget — no forms to wrestle with.'],
                        ['index' => '02', 'title' => 'We Draft the Journey', 'desc' => 'A day-by-day itinerary with camps, guides and transfers costed transparently.'],
                        ['index' => '03', 'title' => 'Refine Until It Fits', 'desc' => 'Adjust anything — the route, the pace, the properties — until it reads exactly right.'],
                        ['index' => '04', 'title' => 'We Handle the Rest', 'desc' => 'Bookings, documentation and logistics confirmed, with your planner reachable throughout.'],
                    ];
                @endphp
                @foreach($steps as $i => $step)
                    <div class="pillar" data-reveal data-reveal-delay="{{ min($i, 4) }}">
                        <span class="pillar-index">{{ $step['index'] }}</span>
                        <div>
                            <h3>{{ $step['title'] }}</h3>
                            <p>{{ $step['desc'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

{{-- ============================== CTA STRIP ============================== --}}
<section class="section section-alt pt-0">
    <div class="container-mb">
        <div class="newsletter-panel d-flex flex-wrap align-items-center justify-content-between gap-4" data-reveal>
            <div style="max-width: 46ch;">
                <p class="mb-eyebrow" style="color: var(--mb-gold-light);">Need Something Not Listed?</p>
                <h2 class="mb-h2" style="color: var(--mb-white); font-size: clamp(1.7rem, 3vw, 2.2rem);">
                    If it's part of your journey, we can arrange it.
                </h2>
            </div>
            <a href="{{ url('/contact') }}" class="btn-mb btn-mb-gold">Talk to Our Team <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</section>
@endsection
