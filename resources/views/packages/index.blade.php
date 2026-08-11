@extends('layouts.app')

@section('title', 'Safari Packages | Moha Boru Safaris Limited')
@section('description', 'Browse Moha Boru Safaris\' signature safari packages — filter by destination, duration and budget to find your perfect Kenyan journey.')

{{-- Data from PackageController@index: $packages, $destinationOptions, $durationOptions, $budgetOptions --}}

@section('content')
{{-- ============================== PAGE HERO ============================== --}}
<section class="page-hero">
    <div class="hero-media">
        <img src="{{ asset('images/destinations/lake-nakuru.png') }}" alt="Kenya wildlife safari package">
    </div>
    <div class="container-mb">
        <div class="breadcrumb-mb" data-reveal>
            <a href="{{ url('/') }}">Home</a> <i class="bi bi-chevron-right" style="font-size:0.65rem;"></i> <span>Safari Packages</span>
        </div>
        <p class="mb-eyebrow" data-reveal data-reveal-delay="1">Curated Journeys</p>
        <h1 data-reveal data-reveal-delay="2">A package to begin from,<br><em style="font-style:italic; font-weight:300; color: var(--mb-gold-light);">never one to be confined by</em></h1>
    </div>
    <div class="horizon-divider" style="position:absolute; left:0; right:0; bottom:0;"></div>
</section>

{{-- ============================== FILTER BAR ============================== --}}
<section class="section pb-0">
    <div class="container-mb">
        <div class="pkg-filter-bar" data-reveal data-pkg-filter-bar>
            <div class="filter-group">
                <label for="filter-destination">Destination</label>
                <div class="filter-select-wrap">
                    <select id="filter-destination" class="filter-select" data-pkg-filter="destination">
                        @foreach($destinationOptions as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </div>
            <div class="filter-group">
                <label for="filter-duration">Duration</label>
                <div class="filter-select-wrap">
                    <select id="filter-duration" class="filter-select" data-pkg-filter="duration">
                        @foreach($durationOptions as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </div>
            <div class="filter-group">
                <label for="filter-budget">Budget</label>
                <div class="filter-select-wrap">
                    <select id="filter-budget" class="filter-select" data-pkg-filter="budget">
                        @foreach($budgetOptions as $key => $label)
                            <option value="{{ $key }}">{{ $label }}</option>
                        @endforeach
                    </select>
                    <i class="bi bi-chevron-down"></i>
                </div>
            </div>
            <button type="button" class="filter-reset" data-pkg-filter-reset>
                <i class="bi bi-arrow-counterclockwise"></i> Reset Filters
            </button>
        </div>
    </div>
</section>

{{-- ============================== PACKAGE GRID ============================== --}}
<section class="section">
    <div class="container-mb">
        <div class="row g-4">
            @foreach($packages as $i => $package)
                <div class="col-md-6 col-lg-4"
                     data-pkg-card
                     data-destination="{{ $package['destination_key'] }}"
                     data-duration="{{ $package['duration_key'] }}"
                     data-budget="{{ $package['budget_key'] }}">
                    <x-package-card :package="$package" :index="$i" />
                </div>
            @endforeach
        </div>

        <div class="filter-empty-state" data-pkg-empty-state>
            <i class="bi bi-compass" style="font-size: 2rem; color: var(--mb-gold);"></i>
            <p class="lead-copy mx-auto mt-3">No packages match those filters just yet — try widening your search, or let us build one from scratch.</p>
            <a href="{{ url('/booking') }}" class="btn-mb btn-mb-dark mt-2">Request a Custom Itinerary <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</section>

{{-- ============================== CTA STRIP ============================== --}}
<section class="section section-alt pt-0">
    <div class="container-mb">
        <div class="newsletter-panel d-flex flex-wrap align-items-center justify-content-between gap-4" data-reveal>
            <div style="max-width: 46ch;">
                <p class="mb-eyebrow" style="color: var(--mb-gold-light);">Don't See a Perfect Fit?</p>
                <h2 class="mb-h2" style="color: var(--mb-white); font-size: clamp(1.7rem, 3vw, 2.2rem);">
                    Every itinerary here can be rebuilt entirely around you.
                </h2>
            </div>
            <a href="{{ url('/booking') }}" class="btn-mb btn-mb-gold">Design My Safari <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</section>
@endsection