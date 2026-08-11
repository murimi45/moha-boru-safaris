@extends('layouts.app')

@section('title', 'Gallery | Moha Boru Safaris Limited')
@section('description', 'Photographs from the field — wildlife, landscapes, camps and coastline captured across Kenya on Moha Boru Safaris journeys.')

{{-- Data from GalleryController@index: $images, $categories --}}

@section('content')
{{-- ============================== PAGE HERO ============================== --}}
<section class="page-hero">
    <div class="hero-media">
        <img src="{{ asset('images/destinations/amboseli.png') }}" alt="Elephant herd in Amboseli National Park">
    </div>
    <div class="container-mb">
        <div class="breadcrumb-mb" data-reveal>
            <a href="{{ url('/') }}">Home</a> <i class="bi bi-chevron-right" style="font-size:0.65rem;"></i> <span>Gallery</span>
        </div>
        <p class="mb-eyebrow" data-reveal data-reveal-delay="1">Moments in the Field</p>
        <h1 data-reveal data-reveal-delay="2">A glimpse of<br><em style="font-style:italic; font-weight:300; color: var(--mb-gold-light);">the wild</em></h1>
    </div>
    <div class="horizon-divider" style="position:absolute; left:0; right:0; bottom:0;"></div>
</section>

{{-- ============================== FILTER + GRID ============================== --}}
<section class="section">
    <div class="container-mb">
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 section-head" style="max-width:none;" data-reveal>
            <p class="lead-copy mb-0">
                Every photograph here was taken on one of our own journeys — no stock libraries,
                no borrowed sightings. Select an image to view it full size.
            </p>
            <div class="region-filter" data-gallery-filter-bar>
                @foreach($categories as $key => $label)
                    <button type="button" data-gallery-filter="{{ $key }}" class="{{ $key === 'all' ? 'active' : '' }}">{{ $label }}</button>
                @endforeach
            </div>
        </div>

        <div class="gallery-grid" data-reveal>
            @foreach($images as $image)
                <x-gallery-item
                    data-category="{{ $image->category_key }}"
                    :full="media_url($image->image)"
                    :thumb="media_url($image->thumbnail ?: $image->image)"
                    :caption="$image->caption ?? $image->title"
                    :tall="$image->is_tall"
                    group="gallery" />
            @endforeach
        </div>

        <div class="filter-empty-state" data-gallery-empty-state>
            <i class="bi bi-camera" style="font-size: 2rem; color: var(--mb-gold);"></i>
            <p class="lead-copy mx-auto mt-3">No photographs in that category yet — try another selection.</p>
        </div>
    </div>
</section>

{{-- ============================== CTA STRIP ============================== --}}
<section class="section section-alt pt-0">
    <div class="container-mb">
        <div class="newsletter-panel d-flex flex-wrap align-items-center justify-content-between gap-4" data-reveal>
            <div style="max-width: 46ch;">
                <p class="mb-eyebrow" style="color: var(--mb-gold-light);">Your Turn</p>
                <h2 class="mb-h2" style="color: var(--mb-white); font-size: clamp(1.7rem, 3vw, 2.2rem);">
                    The next photograph here could be yours.
                </h2>
            </div>
            <a href="{{ url('/booking') }}" class="btn-mb btn-mb-gold">Plan Your Safari <i class="bi bi-arrow-right"></i></a>
        </div>
    </div>
</section>
@endsection
