@extends('layouts.app')

@section('title', 'Moha Boru Safaris Limited | Authentic Kenya Safaris & Travel')
@section('description', 'Moha-Boru-Safaris Limited — authentic, memorable and sustainable safari experiences across Kenya. Customized wildlife safaris, beach holidays and cultural tours.')

{{-- Data from HomeController: $destinations, $packages, $testimonials, $services, $gallery --}}

@section('content')
{{-- ============================== HERO ============================== --}}
<section class="hero">
    <div class="hero-media">
        {{-- Replace with full-bleed hero image or <video> from admin-managed Hero settings --}}
        <img src="{{ asset('images/destinations/maasai-mara.png') }}" alt="Wildlife safari in the Maasai Mara">
    </div>

    <div class="container-mb hero-content">
        <p class="mb-eyebrow" data-reveal>Moha Boru Safaris Limited</p>
        <h1 class="hero-title" data-reveal data-reveal-delay="1">
            Where Africa Meets<br><em>Its Finest Hour</em>
        </h1>
        <p class="hero-sub" data-reveal data-reveal-delay="2">
            Authentic, memorable and sustainable safari experiences across Kenya —
            customized packages that showcase wildlife, landscapes, cultures and
            world-renowned national parks.
        </p>
        <div class="hero-actions" data-reveal data-reveal-delay="3">
            <a href="{{ url('/booking') }}" class="btn-mb btn-mb-gold">Book Now <i class="bi bi-arrow-right"></i></a>
            <a href="{{ url('/destinations') }}" class="btn-mb btn-mb-outline">Explore Destinations</a>
        </div>

        <div class="hero-stats" data-reveal data-reveal-delay="4">
            <div class="hero-stat"><div class="num">13+</div><div class="label">Destinations Across Kenya</div></div>
            <div class="hero-stat"><div class="num">10</div><div class="label">Core Travel Services</div></div>
            <div class="hero-stat"><div class="num">4.9/5</div><div class="label">Traveller Focus</div></div>
        </div>
    </div>

    <div class="hero-horizon horizon-divider"></div>

    <div class="scroll-cue" aria-hidden="true">Scroll<span class="line"></span></div>
</section>

{{-- ============================== ABOUT PREVIEW ============================== --}}
<section class="section" id="about">
    <div class="container-mb">
        <div class="row align-items-center gy-5">
            <div class="col-lg-5">
                <div class="position-relative" style="max-width: 440px;" data-reveal="scale">
                    <div class="about-signature-frame" aria-hidden="true"></div>
                    <div class="about-media">
                        <img src="{{ asset('images/destinations/amboseli.png') }}" alt="Elephants in Amboseli National Park" loading="lazy">
                    </div>
                    <div class="about-media-badge">
                        <div class="num">KE</div>
                        <div class="cap">Safaris across Kenya</div>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="section-head" data-reveal>
                    <p class="mb-eyebrow">Our Story</p>
                    <h2 class="mb-h2 mb-underline">A Kenyan tours &amp; travel<br>company you can trust</h2>
                </div>
                <p class="lead-copy" data-reveal data-reveal-delay="1">
                    Moha-Boru-Safaris Limited is a Kenyan tours and travel company dedicated to
                    providing authentic, memorable, and sustainable safari experiences across
                    Kenya. We specialize in designing customized travel packages that
                    showcase the country’s rich wildlife, breathtaking landscapes, vibrant cultures,
                    and world-renowned national parks.
                </p>
                <p style="max-width: 52ch; margin-top: 1rem;" data-reveal data-reveal-delay="2">
                    Every journey is carefully planned to provide comfort, adventure, and lasting
                    memories — while promoting wildlife conservation and supporting local communities.
                </p>
                <a href="{{ url('/about') }}" class="btn-mb btn-mb-dark mt-4" data-reveal data-reveal-delay="3">
                    Discover Our Story <i class="bi bi-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<div class="container-mb"><div class="horizon-divider" data-reveal></div></div>

{{-- ============================== WHY CHOOSE US ============================== --}}
<section class="section">
    <div class="container-mb">
        <div class="row gy-5">
            <div class="col-lg-4">
                <div class="section-head" data-reveal>
                    <p class="mb-eyebrow">Why Choose Us</p>
                    <h2 class="mb-h2 mb-underline">The details that<br>make a journey exceptional</h2>
                    <p class="lead-copy mt-3">
                        Professional service, personalized itineraries, and responsible tourism
                        that benefits our clients, local communities, and the environment.
                    </p>
                </div>
            </div>
            <div class="col-lg-8">
                @php
                    $pillars = [
                        ['icon' => '01', 'title' => 'Experienced Consultants', 'desc' => 'Experienced and knowledgeable safari consultants for every journey.'],
                        ['icon' => '02', 'title' => 'Customized Itineraries', 'desc' => 'Travel plans shaped around your pace, interests and budget.'],
                        ['icon' => '03', 'title' => 'Transparent Pricing', 'desc' => 'Competitive pricing with clear inclusions and professional support.'],
                        ['icon' => '04', 'title' => 'Safe Safari Vehicles', 'desc' => 'Professional driver-guides and well-maintained safari vehicles.'],
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

{{-- ============================== FEATURED DESTINATIONS ============================== --}}
<section class="section section-alt">
    <div class="container-mb">
        <div class="d-flex flex-wrap justify-content-between align-items-end section-head" style="max-width: none;" data-reveal>
            <div>
                <p class="mb-eyebrow">Featured Destinations</p>
                <h2 class="mb-h2 mb-underline">Kenya's wild heart,<br>featured parks</h2>
            </div>
            <a href="{{ url('/destinations') }}" class="btn-mb btn-mb-dark d-none d-md-inline-flex">
                View All Destinations <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="row g-4">
            @foreach($destinations as $i => $destination)
                <div class="col-6 col-lg-3">
                    <x-destination-card :destination="$destination" :index="$i" />
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================== FEATURED PACKAGES ============================== --}}
<section class="section">
    <div class="container-mb">
        <div class="section-head center mx-auto" data-reveal>
            <p class="mb-eyebrow justify-content-center">Signature Packages</p>
            <h2 class="mb-h2 mb-underline">Journeys, ready to<br>make your own</h2>
            <p class="lead-copy mx-auto mt-3">
                A starting point, never a fixed menu — every package below can be
                reshaped around your dates, party size and interests.
            </p>
        </div>

        <div class="row g-4">
            @foreach($packages as $i => $package)
                <div class="col-md-6 col-lg-4">
                    <x-package-card :package="$package" :index="$i" />
                </div>
            @endforeach
        </div>

        <div class="text-center mt-5" data-reveal>
            <a href="{{ url('/packages') }}" class="btn-mb btn-mb-dark">
                View All Packages <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

{{-- ============================== SERVICES ============================== --}}
<section class="section section-alt">
    <div class="container-mb">
        <div class="d-flex flex-wrap justify-content-between align-items-end section-head" style="max-width: none;" data-reveal>
            <div>
                <p class="mb-eyebrow">What We Offer</p>
                <h2 class="mb-h2 mb-underline">Everything, arranged<br>before you ask</h2>
            </div>
            <a href="{{ url('/services') }}" class="btn-mb btn-mb-dark d-none d-md-inline-flex">
                View All Services <i class="bi bi-arrow-right"></i>
            </a>
        </div>
        <div class="services-grid" style="display:flex;flex-wrap:wrap;margin:-0.875rem;">
            @foreach($services as $i => $service)
                <x-service-card :service="$service" :index="$i" />
            @endforeach
        </div>
    </div>
</section>

{{-- ============================== GALLERY PREVIEW ============================== --}}
<section class="section">
    <div class="container-mb">
        <div class="d-flex flex-wrap justify-content-between align-items-end section-head" style="max-width: none;" data-reveal>
            <div>
                <p class="mb-eyebrow">Moments in the Field</p>
                <h2 class="mb-h2 mb-underline">A glimpse of<br>the wild</h2>
            </div>
            <a href="{{ url('/gallery') }}" class="btn-mb btn-mb-dark d-none d-md-inline-flex">
                Open Full Gallery <i class="bi bi-arrow-right"></i>
            </a>
        </div>

        <div class="gallery-grid" data-reveal>
            @foreach($gallery as $item)
                <x-gallery-item
                    :full="media_url($item->image)"
                    :thumb="media_url($item->thumbnail ?: $item->image)"
                    :caption="$item->caption ?? $item->title"
                    :tall="$item->is_tall"
                    group="home-gallery" />
            @endforeach
        </div>
    </div>
</section>

{{-- ============================== TESTIMONIALS ============================== --}}
<section class="section section-alt">
    <div class="container-mb">
        <div class="row align-items-center gy-4">
            <div class="col-lg-4">
                <div data-reveal>
                    <p class="mb-eyebrow">Traveller Stories</p>
                    <h2 class="mb-h2 mb-underline">What it feels like<br>to travel with us</h2>
                    <p class="lead-copy mt-3" style="max-width: 34ch;">
                        Real words from guests — and space for yours.
                    </p>
                    <a href="{{ route('reviews.index') }}#share" class="btn-mb btn-mb-dark mt-3">
                        Leave a Review <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="testimonial-panel" data-testimonial-slider data-reveal>
                    @forelse($testimonials as $t)
                        <div class="testimonial-slide" data-t-slide style="{{ !$loop->first ? 'display:none;' : '' }}">
                            @if($t->rating)
                                <div class="review-stars review-stars-on-dark" aria-label="{{ $t->rating }} out of 5 stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="bi {{ $i <= $t->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                    @endfor
                                </div>
                            @endif
                            <p class="testimonial-quote">&ldquo;{{ $t->quote }}&rdquo;</p>
                            <div class="testimonial-author">
                                <div class="testimonial-avatar">{{ $t->initials }}</div>
                                <div>
                                    <div class="name">{{ $t->name }}</div>
                                    <div class="role">{{ $t->role }}</div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="testimonial-slide" data-t-slide>
                            <p class="testimonial-quote">Be the first to share what your safari felt like.</p>
                            <div class="testimonial-author">
                                <div class="testimonial-avatar">MB</div>
                                <div>
                                    <div class="name">Moha Boru</div>
                                    <div class="role">Waiting for the first guest story</div>
                                </div>
                            </div>
                        </div>
                    @endforelse
                    <div class="testimonial-nav" data-t-dots></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================== STATS ============================== --}}
<section class="stats-strip section" style="padding-block: clamp(3.5rem, 6vw, 5.5rem);">
    <div class="container-mb">
        <div class="row">
            <div class="col-6 col-lg-3"><x-stat-counter :value="13" suffix="+" label="Safari Destinations" /></div>
            <div class="col-6 col-lg-3"><x-stat-counter :value="10" label="Travel Services" /></div>
            <div class="col-6 col-lg-3"><x-stat-counter :value="10" label="Day Signature Safari" /></div>
            <div class="col-6 col-lg-3"><x-stat-counter :value="100" suffix="%" label="Custom Itineraries" /></div>
        </div>
    </div>
</section>

{{-- ============================== NEWSLETTER ============================== --}}
<section class="section">
    <div class="container-mb">
        <div class="newsletter-panel" data-reveal>
            <div class="row align-items-center gy-4">
                <div class="col-lg-6">
                    <p class="mb-eyebrow" style="color: var(--mb-gold-light);">Stay Inspired</p>
                    <h2 class="mb-h2" style="color: var(--mb-white); font-size: clamp(1.8rem, 3vw, 2.4rem);">
                        Join the journal — <em style="font-style: italic; font-weight: 300; color: var(--mb-gold-light);">safari notes, seasonally.</em>
                    </h2>
                    <p style="color: rgba(255,255,255,0.65); max-width: 44ch; margin-top: 0.75rem;">
                        Migration timings, new camps, and the occasional invitation. No noise — a handful of emails a year.
                    </p>
                </div>
                <div class="col-lg-6">
                    <form action="{{ url('/newsletter') }}" method="POST" class="newsletter-form" data-newsletter-form>
                        @csrf
                        <input type="email" name="email" placeholder="Your email address" required aria-label="Email address">
                        <button type="submit" class="btn-mb btn-mb-gold">Subscribe</button>
                    </form>
                    <p class="mt-2 mb-0" data-newsletter-feedback style="font-size: 0.8rem; color: rgba(255,255,255,0.55);"></p>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================== MAP ============================== --}}
<section class="section pt-0">
    <div class="container-mb">
        <div class="section-head center mx-auto" data-reveal>
            <p class="mb-eyebrow justify-content-center">Find Us</p>
            <h2 class="mb-h2 mb-underline">Our Nairobi Office</h2>
        </div>
        <div class="map-frame" data-reveal>
            <iframe
                src="{{ config('contact.map_embed') }}"
                width="100%" height="420" style="border:0; display:block;" allowfullscreen loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" title="Moha Boru Safaris office location">
            </iframe>
        </div>
    </div>
</section>
@endsection