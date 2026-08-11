@extends('layouts.app')

@section('title', 'Contact Us | Moha Boru Safaris Limited')
@section('description', 'Reach Moha Boru Safaris Limited in Nairobi — phone, WhatsApp, email and office hours, plus directions to our office.')

{{-- Data from ContactController@index: $contact (config/contact.php) --}}

@section('content')
{{-- ============================== PAGE HERO ============================== --}}
<section class="page-hero">
    <div class="hero-media">
        <img src="{{ asset('images/destinations/samburu.png') }}" alt="Kenyan safari landscape">
    </div>
    <div class="container-mb">
        <div class="breadcrumb-mb" data-reveal>
            <a href="{{ url('/') }}">Home</a> <i class="bi bi-chevron-right" style="font-size:0.65rem;"></i> <span>Contact</span>
        </div>
        <p class="mb-eyebrow" data-reveal data-reveal-delay="1">Get In Touch</p>
        <h1 data-reveal data-reveal-delay="2">A small team,<br><em style="font-style:italic; font-weight:300; color: var(--mb-gold-light);">and we answer</em></h1>
    </div>
    <div class="horizon-divider" style="position:absolute; left:0; right:0; bottom:0;"></div>
</section>

{{-- ============================== CONTACT DETAILS ============================== --}}
<section class="section">
    <div class="container-mb">
        <div class="row gy-5">

            <div class="col-lg-7">
                <div class="section-head" data-reveal>
                    <p class="mb-eyebrow">How To Reach Us</p>
                    <h2 class="mb-h2 mb-underline">Talk to the people<br>who plan the trip</h2>
                    <p class="lead-copy mt-3">
                        No call centres and no ticket numbers — the person who answers is
                        the person who will design your safari.
                    </p>
                </div>

                <div class="services-grid contact-cards-grid" style="display:flex;flex-wrap:wrap;margin:-0.875rem;">
                    <a href="tel:{{ $contact['phone_link'] }}" class="service-card service-card-link d-flex flex-column" style="margin:0.875rem;box-sizing:border-box;" data-reveal>
                        <div class="service-icon"><i class="bi bi-telephone"></i></div>
                        <h3 class="font-display">Call Us</h3>
                        <p class="flex-grow-1">{{ $contact['phone_display'] }}</p>
                        <span class="service-card-foot pkg-link">Start a Call <i class="bi bi-arrow-right"></i></span>
                    </a>

                    <a href="https://wa.me/{{ $contact['whatsapp'] }}" class="service-card service-card-link d-flex flex-column" style="margin:0.875rem;box-sizing:border-box;" data-reveal data-reveal-delay="1">
                        <div class="service-icon"><i class="bi bi-whatsapp"></i></div>
                        <h3 class="font-display">WhatsApp</h3>
                        <p class="flex-grow-1">Quick questions, photographs and voice notes — often the fastest reply.</p>
                        <span class="service-card-foot pkg-link">Open WhatsApp <i class="bi bi-arrow-right"></i></span>
                    </a>

                    <a href="mailto:{{ $contact['email'] }}" class="service-card service-card-link d-flex flex-column" style="margin:0.875rem;box-sizing:border-box;" data-reveal data-reveal-delay="2">
                        <div class="service-icon"><i class="bi bi-envelope"></i></div>
                        <h3 class="font-display">Email</h3>
                        <p class="flex-grow-1">{{ $contact['email'] }}</p>
                        <span class="service-card-foot pkg-link">Write to Us <i class="bi bi-arrow-right"></i></span>
                    </a>

                    <div class="service-card d-flex flex-column" style="margin:0.875rem;box-sizing:border-box;" data-reveal data-reveal-delay="3">
                        <div class="service-icon"><i class="bi bi-geo-alt"></i></div>
                        <h3 class="font-display">Our Office</h3>
                        <p class="flex-grow-1">
                            {{ $contact['address']['line1'] }}<br>
                            {{ $contact['address']['line2'] }}, {{ $contact['address']['line3'] }}
                        </p>
                        <span class="service-card-foot pkg-link">Visitors by appointment</span>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="detail-info-panel" data-reveal data-reveal-delay="1">
                    @foreach($contact['hours'] as $slot)
                        <div class="detail-info-row">
                            <i class="bi bi-clock"></i>
                            <div>
                                <div class="k">{{ $slot['days'] }}</div>
                                <div class="v">{{ $slot['time'] }}</div>
                            </div>
                        </div>
                    @endforeach

                    <div class="detail-info-row">
                        <i class="bi bi-translate"></i>
                        <div>
                            <div class="k">Languages</div>
                            <div class="v">English, Kiswahili</div>
                        </div>
                    </div>

                    <div class="tag-row mt-4">
                        @foreach($contact['socials'] as $social)
                            <a href="{{ $social['url'] }}" class="tag-pill" aria-label="{{ $social['label'] }}">
                                <i class="bi {{ $social['icon'] }}"></i>{{ $social['label'] }}
                            </a>
                        @endforeach
                    </div>

                    <a href="{{ url('/packages') }}" class="btn-mb btn-mb-gold w-100 justify-content-center mt-4">
                        Browse Safari Packages <i class="bi bi-arrow-right"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ============================== LOCATION ============================== --}}
<section class="section section-alt">
    <div class="container-mb">
        <div class="section-head center mx-auto" data-reveal>
            <p class="mb-eyebrow justify-content-center">Find Us</p>
            <h2 class="mb-h2 mb-underline">Our Nairobi Office</h2>
            <p class="lead-copy mx-auto mt-3">
                Based in Nairobi, a short drive from Wilson Airport and the light-aircraft
                departures that carry our guests into the bush.
            </p>
        </div>
        <div class="map-frame" data-reveal>
            <iframe
                src="{{ $contact['map_embed'] }}"
                width="100%" height="460" style="border:0; display:block;" allowfullscreen loading="lazy"
                referrerpolicy="no-referrer-when-downgrade" title="Moha Boru Safaris office location">
            </iframe>
        </div>
    </div>
</section>
@endsection
