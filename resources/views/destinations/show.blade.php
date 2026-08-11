@extends('layouts.app')

@section('title', ($destination['name'] ?? 'Destination') . ' | Moha Boru Safaris Limited')
@section('description', $destination['excerpt'] ?? 'Discover this destination with Moha Boru Safaris Limited.')

{{-- Data from DestinationController@show: $destination --}}

@section('content')
{{-- ============================== HERO ============================== --}}
<section class="page-hero">
    <div class="hero-media">
        <img src="{{ media_url($destination['hero_image'] ?? $destination['image']) }}" alt="{{ $destination['name'] }}">
    </div>
    <div class="container-mb">
        <div class="breadcrumb-mb" data-reveal>
            <a href="{{ url('/') }}">Home</a> <i class="bi bi-chevron-right" style="font-size:0.65rem;"></i>
            <a href="{{ url('/destinations') }}">Destinations</a> <i class="bi bi-chevron-right" style="font-size:0.65rem;"></i>
            <span>{{ $destination['name'] }}</span>
        </div>
        <p class="mb-eyebrow" data-reveal data-reveal-delay="1">{{ $destination['tag'] }}</p>
        <h1 data-reveal data-reveal-delay="2">{{ $destination['name'] }}</h1>
    </div>
    <div class="horizon-divider" style="position:absolute; left:0; right:0; bottom:0;"></div>
</section>

{{-- ============================== INTRO + INFO PANEL ============================== --}}
<section class="section">
    <div class="container-mb">
        <div class="row gy-5">
            <div class="col-lg-8">
                <p class="lead-copy" style="max-width: 62ch;" data-reveal>{{ $destination['intro'] }}</p>
                <p class="mt-3" style="max-width: 68ch;" data-reveal data-reveal-delay="1">{{ $destination['description'] }}</p>

                <h3 class="mb-underline mt-5" data-reveal data-reveal-delay="2">Activities &amp; Experiences</h3>
                <div class="tag-row mt-3" data-reveal data-reveal-delay="2">
                    @foreach($destination['activities'] ?? [] as $activity)
                        <span class="tag-pill"><i class="bi bi-check2"></i>{{ $activity }}</span>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-4">
                <div class="detail-info-panel" data-reveal data-reveal-delay="1">
                    <div class="detail-info-row">
                        <i class="bi bi-geo-alt"></i>
                        <div><div class="k">Location</div><div class="v">{{ $destination['location'] }}</div></div>
                    </div>
                    <div class="detail-info-row">
                        <i class="bi bi-sun"></i>
                        <div><div class="k">Best Time to Visit</div><div class="v">{{ $destination['best_time'] }}</div></div>
                    </div>
                    <div class="detail-info-row">
                        <i class="bi bi-signpost-split"></i>
                        <div><div class="k">Getting There</div><div class="v">Scheduled light-aircraft flight or private road transfer — we arrange both.</div></div>
                    </div>
                    <a href="{{ url('/booking') }}?destination={{ $destination['slug'] ?? '' }}" class="btn-mb btn-mb-gold w-100 justify-content-center mt-4">
                        Plan a Trip Here <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="{{ url('/packages') }}" class="btn-mb btn-mb-outline w-100 justify-content-center mt-3" style="color: var(--mb-black); border-color: var(--mb-line);">
                        View Related Packages
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================== GALLERY ============================== --}}
<section class="section section-alt">
    <div class="container-mb">
        <div class="section-head" data-reveal>
            <p class="mb-eyebrow">In Pictures</p>
            <h2 class="mb-h2 mb-underline">{{ $destination['name'] }} in Focus</h2>
        </div>
        <div class="detail-gallery" data-reveal>
            @foreach($destination['gallery'] ?? [] as $i => $image)
                <x-gallery-item
                    :full="media_url($image)"
                    :caption="$destination['name']"
                    :wide="$i === 0"
                    group="destination-gallery" />
            @endforeach
        </div>
    </div>
</section>

{{-- ============================== OTHER DESTINATIONS ============================== --}}
<section class="section pt-0">
    <div class="container-mb text-center" data-reveal>
        <a href="{{ url('/destinations') }}" class="btn-mb btn-mb-dark">
            <i class="bi bi-arrow-left"></i> Back to All Destinations
        </a>
    </div>
</section>
@endsection