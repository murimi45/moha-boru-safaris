@extends('layouts.app')

@section('title', 'Destinations | Moha Boru Safaris Limited')
@section('description', 'Explore Kenya safari destinations with Moha Boru Safaris — Maasai Mara, Amboseli, Samburu, Tsavo, Lake Nakuru, Lake Naivasha, Diani, Watamu, Lamu and more.')

{{-- Data from DestinationController@index: $destinations, $regions --}}

@section('content')
{{-- ============================== PAGE HERO ============================== --}}
<section class="page-hero">
    <div class="hero-media">
        <img src="{{ asset('images/destinations/samburu.png') }}" alt="Samburu National Reserve landscape">
    </div>
    <div class="container-mb">
        <div class="breadcrumb-mb" data-reveal>
            <a href="{{ url('/') }}">Home</a> <i class="bi bi-chevron-right" style="font-size:0.65rem;"></i> <span>Destinations</span>
        </div>
        <p class="mb-eyebrow" data-reveal data-reveal-delay="1">Where We Go</p>
        <h1 data-reveal data-reveal-delay="2">Kenya's parks,<br><em style="font-style:italic; font-weight:300; color: var(--mb-gold-light);">reserves &amp; coast</em></h1>
    </div>
    <div class="horizon-divider" style="position:absolute; left:0; right:0; bottom:0;"></div>
</section>

{{-- ============================== FILTER + GRID ============================== --}}
<section class="section">
    <div class="container-mb">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 section-head" style="max-width:none;" data-reveal>
            <p class="lead-copy mb-0">
                From the Maasai Mara and Amboseli to Samburu, Tsavo, the Rift Valley lakes,
                highland forests and the Kenyan coast — destinations we know and guide with care.
            </p>
            <div class="region-filter" data-region-filter-bar>
                @foreach($regions as $key => $label)
                    <button type="button" data-region-filter="{{ $key }}" class="{{ $key === 'all' ? 'active' : '' }}">{{ $label }}</button>
                @endforeach
            </div>
        </div>

        <div class="row g-4">
            @foreach($destinations as $i => $destination)
                <div class="col-md-6 col-lg-4" data-region="{{ $destination['region_key'] }}">
                    <x-destination-feature-card :destination="$destination" :index="$i" />
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================== CTA STRIP ============================== --}}
<section class="section section-alt pt-0">
    <div class="container-mb">
        <div class="newsletter-panel d-flex flex-wrap align-items-center justify-content-between gap-4" data-reveal>
            <div style="max-width: 46ch;">
                <p class="mb-eyebrow" style="color: var(--mb-gold-light);">Not Sure Where to Start?</p>
                <h2 class="mb-h2" style="color: var(--mb-white); font-size: clamp(1.7rem, 3vw, 2.2rem);">
                    Tell us how you like to travel — we'll match the landscape to you.
                </h2>
            </div>
            <a href="{{ url('/booking') }}" class="btn-mb btn-mb-gold">Start Planning <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</section>
@endsection