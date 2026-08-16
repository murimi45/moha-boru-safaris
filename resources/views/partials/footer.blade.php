<footer class="mb-footer">
    <div class="container-mb section" style="padding-block: clamp(4rem, 7vw, 6rem) 2rem;">
        <div class="row gy-5">

            <div class="col-lg-4">
                <a href="{{ url('/') }}" class="footer-brand d-inline-block mb-3">Moha <span>Boru</span></a>
                <p style="max-width: 34ch; color: rgba(255,255,255,0.6); font-size: 0.92rem;">
                    Authentic, memorable and sustainable safari experiences across Kenya —
                    customized for wildlife, culture, coast and adventure.
                </p>
                <div class="social-row">
                    @foreach(config('contact.socials') as $social)
                        <a href="{{ $social['url'] }}" aria-label="{{ $social['label'] }}" target="_blank" rel="noopener noreferrer"><i class="bi {{ $social['icon'] }}"></i></a>
                    @endforeach
                </div>
            </div>

            <div class="col-6 col-lg-2">
                <h4>Explore</h4>
                <ul class="list-unstyled footer-links">
                    <li><a href="{{ url('/destinations') }}">Destinations</a></li>
                    <li><a href="{{ url('/packages') }}">Safari Packages</a></li>
                    <li><a href="{{ url('/services') }}">Services</a></li>
                    <li><a href="{{ url('/gallery') }}">Gallery</a></li>
                    <li><a href="{{ url('/reviews') }}">Reviews</a></li>
                </ul>
            </div>

            <div class="col-6 col-lg-2">
                <h4>Company</h4>
                <ul class="list-unstyled footer-links">
                    <li><a href="{{ url('/about') }}">About Us</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                    <li><a href="{{ url('/booking') }}">Book a Safari</a></li>
                    <li><a href="{{ url('/policies') }}">Policies</a></li>
                </ul>
            </div>

            <div class="col-lg-4">
                <h4>Get In Touch</h4>
                <ul class="list-unstyled footer-links">
                    <li><a href="tel:{{ config('contact.phone_link') }}"><i class="bi bi-telephone me-2"></i>{{ config('contact.phone_display') }}</a></li>
                    <li><a href="https://wa.me/{{ config('contact.whatsapp') }}"><i class="bi bi-whatsapp me-2"></i>WhatsApp Us</a></li>
                    <li><a href="mailto:{{ config('contact.email') }}"><i class="bi bi-envelope me-2"></i>{{ config('contact.email') }}</a></li>
                    <li><span style="color: rgba(255,255,255,0.6);"><i class="bi bi-geo-alt me-2"></i>{{ config('contact.address.line2') }}, {{ config('contact.address.line3') }}</span></li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom d-flex flex-wrap justify-content-between align-items-center gap-3">
            <span>&copy; {{ date('Y') }} Moha Boru Safaris Limited. All rights reserved.</span>
            <div class="d-flex gap-4">
                <a href="{{ url('/policies') }}">Privacy Policy</a>
                <a href="{{ url('/policies') }}">Booking Terms</a>
            </div>
        </div>
    </div>
</footer>