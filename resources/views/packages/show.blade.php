@extends('layouts.app')

@section('title', ($package['name'] ?? 'Safari Package') . ' | Moha Boru Safaris Limited')
@section('description', $package['excerpt'] ?? 'A signature safari package from Moha Boru Safaris Limited.')

{{-- Data from PackageController@show: $package --}}

@section('content')
{{-- ============================== HERO ============================== --}}
<section class="page-hero">
    <div class="hero-media">
        <img src="{{ media_url($package['hero_image'] ?? $package['image']) }}" alt="{{ $package['name'] }}">
    </div>
    <div class="container-mb">
        <div class="breadcrumb-mb" data-reveal>
            <a href="{{ url('/') }}">Home</a> <i class="bi bi-chevron-right" style="font-size:0.65rem;"></i>
            <a href="{{ url('/packages') }}">Safari Packages</a> <i class="bi bi-chevron-right" style="font-size:0.65rem;"></i>
            <span>{{ $package['name'] }}</span>
        </div>
        <p class="mb-eyebrow" data-reveal data-reveal-delay="1">Signature Package</p>
        <h1 data-reveal data-reveal-delay="2">{{ $package['name'] }}</h1>
    </div>
    <div class="horizon-divider" style="position:absolute; left:0; right:0; bottom:0;"></div>
</section>

{{-- ============================== INTRO + BOOKING PANEL ============================== --}}
<section class="section">
    <div class="container-mb">
        <div class="row gy-5">
            <div class="col-lg-8">
                <p class="lead-copy" style="max-width: 62ch;" data-reveal>{{ $package['intro'] }}</p>

                <div class="pkg-meta mt-4" style="font-size: 0.92rem;" data-reveal data-reveal-delay="1">
                    <span><i class="bi bi-calendar3"></i> {{ $package['duration'] }}</span>
                    <span><i class="bi bi-people"></i> {{ $package['guests'] }}</span>
                </div>

                {{-- Included / Excluded --}}
                <div class="row gy-4 mt-4">
                    <div class="col-sm-6">
                        <h3 class="mb-underline" data-reveal>What's Included</h3>
                        <ul class="incl-list included mt-3" data-reveal data-reveal-delay="1">
                            @foreach($package['included'] ?? [] as $item)
                                <li><i class="bi bi-check-circle"></i> {{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <h3 class="mb-underline" data-reveal data-reveal-delay="1">What's Excluded</h3>
                        <ul class="incl-list excluded mt-3" data-reveal data-reveal-delay="2">
                            @foreach($package['excluded'] ?? [] as $item)
                                <li><i class="bi bi-x-circle"></i> {{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- Itinerary --}}
                <h3 class="mb-underline mt-5" data-reveal>Day-by-Day Itinerary</h3>
                <div class="itinerary mt-3" data-reveal data-reveal-delay="1">
                    @foreach($package['itinerary'] ?? [] as $i => $day)
                        <div class="itinerary-day">
                            <button class="itinerary-day-toggle" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#itinerary-day-{{ $i }}"
                                    aria-expanded="{{ $i === 0 ? 'true' : 'false' }}"
                                    aria-controls="itinerary-day-{{ $i }}">
                                <span class="itinerary-day-num">Day {{ $i + 1 }}</span>
                                <span class="itinerary-day-title">{{ $day['title'] }}</span>
                                <i class="bi bi-chevron-down"></i>
                            </button>
                            <div class="collapse {{ $i === 0 ? 'show' : '' }}" id="itinerary-day-{{ $i }}">
                                <div class="itinerary-day-body">{{ $day['body'] }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-4">
                <div class="detail-info-panel" data-reveal data-reveal-delay="1">
                    <div class="detail-info-row">
                        <i class="bi bi-cash-stack"></i>
                        <div><div class="k">From</div><div class="v" style="font-family: var(--font-display); font-size: 1.4rem;">{{ $package['price'] }}</div></div>
                    </div>
                    <p style="font-size: 0.78rem; color: var(--mb-charcoal); margin: -0.25rem 0 0;">{{ $package['price_note'] }}</p>
                    <div class="detail-info-row">
                        <i class="bi bi-calendar3"></i>
                        <div><div class="k">Duration</div><div class="v">{{ $package['duration'] }}</div></div>
                    </div>
                    <div class="detail-info-row">
                        <i class="bi bi-people"></i>
                        <div><div class="k">Group Size</div><div class="v">{{ $package['guests'] }}</div></div>
                    </div>
                    <a href="{{ url('/booking') }}?package={{ $package['slug'] ?? '' }}" class="btn-mb btn-mb-gold w-100 justify-content-center mt-4">
                        Book Now <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="https://wa.me/{{ config('contact.whatsapp') }}" class="btn-mb btn-mb-outline w-100 justify-content-center mt-3" style="color: var(--mb-black); border-color: var(--mb-line);">
                        <i class="bi bi-whatsapp"></i> Ask a Question
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================== BACK LINK ============================== --}}
<section class="section pt-0">
    <div class="container-mb text-center" data-reveal>
        <a href="{{ url('/packages') }}" class="btn-mb btn-mb-dark">
            <i class="bi bi-arrow-left"></i> Back to All Packages
        </a>
    </div>
</section>
@endsection