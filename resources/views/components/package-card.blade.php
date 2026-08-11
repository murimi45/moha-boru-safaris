{{--
    Safari Package Card
    Usage: <x-package-card :package="$package" :index="$loop->index" />
    Expects $package to be an object/array with:
      name, image, duration, guests, price, badge, slug
--}}
@props(['package', 'index' => 0])

<div class="pkg-card" data-reveal @if($index) data-reveal-delay="{{ min($index, 4) }}" @endif>
    <div class="pkg-media">
        <img src="{{ media_url($package['image']) }}" alt="{{ $package['name'] }}" loading="lazy">
        @if(!empty($package['badge']))
            <span class="pkg-badge">{{ $package['badge'] }}</span>
        @endif
    </div>
    <div class="pkg-body">
        <h3 class="pkg-title font-display">{{ $package['name'] }}</h3>
        <div class="pkg-meta">
            <span><i class="bi bi-calendar3"></i> {{ $package['duration'] }}</span>
            <span><i class="bi bi-people"></i> {{ $package['guests'] }}</span>
        </div>
        <p class="mb-0" style="font-size: 0.92rem;">{{ $package['excerpt'] }}</p>
        <div class="pkg-foot">
            <div class="pkg-price">
                <span class="from">From</span>
                <span class="amt">{{ $package['price'] }}</span>
            </div>
            <a href="{{ url('/packages/' . $package['slug']) }}" class="pkg-link">
                View Itinerary <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</div>