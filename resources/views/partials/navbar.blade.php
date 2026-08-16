{{--
    Navbar
    - Transparent + white text over the hero
    - Turns solid/white with a blur once the user scrolls (see app.css .is-scrolled)
    - Mobile menu is a sibling panel (NOT inside the header) so backdrop-filter on
      .is-scrolled cannot trap position:fixed and leak menu labels into the bar
--}}
<header class="mb-navbar" role="banner">
    <div class="container-mb mb-navbar-inner">

        <a href="{{ url('/') }}" class="brand-mark">Moha <span>Boru</span></a>

        <nav class="mb-nav-desktop" aria-label="Primary">
            <a href="{{ url('/') }}" class="mb-nav-link {{ request()->is('/') ? 'active' : '' }}">Home</a>
            <a href="{{ url('/destinations') }}" class="mb-nav-link {{ request()->is('destinations*') ? 'active' : '' }}">Destinations</a>
            <a href="{{ url('/packages') }}" class="mb-nav-link {{ request()->is('packages*') ? 'active' : '' }}">Safari Packages</a>
            <a href="{{ url('/services') }}" class="mb-nav-link {{ request()->is('services*') ? 'active' : '' }}">Services</a>
            <a href="{{ url('/gallery') }}" class="mb-nav-link {{ request()->is('gallery*') ? 'active' : '' }}">Gallery</a>
            <a href="{{ url('/reviews') }}" class="mb-nav-link {{ request()->is('reviews*') ? 'active' : '' }}">Reviews</a>
            <a href="{{ url('/contact') }}" class="mb-nav-link {{ request()->is('contact*') ? 'active' : '' }}">Contact</a>
        </nav>

        <div class="mb-navbar-actions">
            <a href="{{ url('/booking') }}" class="btn-mb btn-mb-gold mb-nav-cta">
                Plan Your Safari <i class="bi bi-arrow-right"></i>
            </a>
            <button type="button" class="nav-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="mb-mobile-menu">
                <span></span><span></span><span></span>
            </button>
        </div>
    </div>
</header>

{{-- Mobile menu panel — sibling of header, not a child (avoids fixed-position leak on scroll) --}}
<div class="mb-mobile-menu" id="mb-mobile-menu" hidden>
    <nav aria-label="Mobile">
        <a href="{{ url('/') }}">Home</a>
        <a href="{{ url('/destinations') }}">Destinations</a>
        <a href="{{ url('/packages') }}">Safari Packages</a>
        <a href="{{ url('/services') }}">Services</a>
        <a href="{{ url('/gallery') }}">Gallery</a>
        <a href="{{ url('/reviews') }}">Reviews</a>
        <a href="{{ url('/contact') }}">Contact</a>
        <a href="{{ url('/booking') }}" class="btn-mb btn-mb-gold mt-3">Plan Your Safari</a>
    </nav>
</div>
