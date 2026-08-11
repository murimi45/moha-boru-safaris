@extends('layouts.app')

@section('title', $service['name'] . ' | Moha Boru Safaris Limited')
@section('description', $service['excerpt'] ?? 'A service from Moha Boru Safaris Limited.')

{{-- Data from ServiceController@show: $service, $relatedServices --}}

@section('content')
{{-- ============================== HERO ============================== --}}
<section class="page-hero">
    <div class="hero-media">
        <img src="{{ media_url($service['hero_image'] ?? $service['image']) }}" alt="{{ $service['name'] }}">
    </div>
    <div class="container-mb">
        <div class="breadcrumb-mb" data-reveal>
            <a href="{{ url('/') }}">Home</a> <i class="bi bi-chevron-right" style="font-size:0.65rem;"></i>
            <a href="{{ url('/services') }}">Services</a> <i class="bi bi-chevron-right" style="font-size:0.65rem;"></i>
            <span>{{ $service['name'] }}</span>
        </div>
        <p class="mb-eyebrow" data-reveal data-reveal-delay="1">{{ $service['tagline'] ?? 'What We Offer' }}</p>
        <h1 data-reveal data-reveal-delay="2">{{ $service['name'] }}</h1>
    </div>
    <div class="horizon-divider" style="position:absolute; left:0; right:0; bottom:0;"></div>
</section>

{{-- ============================== INTRO + PANEL ============================== --}}
<section class="section">
    <div class="container-mb">
        <div class="row gy-5">
            <div class="col-lg-8">
                <p class="lead-copy" style="max-width: 62ch;" data-reveal>{{ $service['intro'] }}</p>
                <p class="mt-3" style="max-width: 68ch;" data-reveal data-reveal-delay="1">{{ $service['description'] }}</p>

                @if(!empty($service['highlights']))
                    <h3 class="mb-underline mt-5" data-reveal data-reveal-delay="2">What's Included</h3>
                    <ul class="incl-list included mt-3" data-reveal data-reveal-delay="2">
                        @foreach($service['highlights'] as $highlight)
                            <li><i class="bi bi-check-circle"></i> {{ $highlight }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>

            <div class="col-lg-4">
                <div class="detail-info-panel" data-reveal data-reveal-delay="1">
                    <div class="detail-info-row">
                        <i class="bi {{ $service['icon'] }}"></i>
                        <div><div class="k">Service</div><div class="v">{{ $service['name'] }}</div></div>
                    </div>
                    <div class="detail-info-row">
                        <i class="bi bi-clock-history"></i>
                        <div><div class="k">Response Time</div><div class="v">Within one working day, usually sooner.</div></div>
                    </div>
                    <div class="detail-info-row">
                        <i class="bi bi-person-check"></i>
                        <div><div class="k">Arranged By</div><div class="v">A dedicated planner who stays with your trip throughout.</div></div>
                    </div>
                    <a href="{{ url('/booking') }}?service={{ $service['slug'] }}" class="btn-mb btn-mb-gold w-100 justify-content-center mt-4">
                        Request This Service <i class="bi bi-arrow-right"></i>
                    </a>
                    <a href="https://wa.me/{{ config('contact.whatsapp') }}" class="btn-mb btn-mb-outline w-100 justify-content-center mt-3" style="color: var(--mb-black); border-color: var(--mb-line);">
                        <i class="bi bi-whatsapp"></i> Ask a Question
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================== RELATED SERVICES ============================== --}}
@if($relatedServices->isNotEmpty())
<section class="section section-alt">
    <div class="container-mb">
        <div class="d-flex flex-wrap justify-content-between align-items-end section-head" style="max-width:none;" data-reveal>
            <div>
                <p class="mb-eyebrow">Also Arranged</p>
                <h2 class="mb-h2 mb-underline">Other ways<br>we can help</h2>
            </div>
            <a href="{{ url('/services') }}" class="btn-mb btn-mb-dark d-none d-md-inline-flex">
                View All Services <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">
            @foreach($relatedServices as $i => $related)
                <div class="col-md-6 col-lg-4">
                    <x-service-card :service="$related" :index="$i" />
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ============================== BACK LINK ============================== --}}
<section class="section pt-0 {{ $relatedServices->isNotEmpty() ? 'section-alt' : '' }}">
    <div class="container-mb text-center" data-reveal>
        <a href="{{ url('/services') }}" class="btn-mb btn-mb-dark">
            <i class="bi bi-arrow-left"></i> Back to All Services
        </a>
    </div>
</section>
@endsection
