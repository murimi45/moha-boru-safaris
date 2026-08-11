{{--
    Destination Feature Card — used on the Destinations index page.
    Usage: <x-destination-feature-card :destination="$destination" :index="$loop->index" />
    Expects $destination as an array/object with:
      name, region, tag, image, excerpt, best_time, activities (array), slug
--}}
@props(['destination', 'index' => 0])

<div class="dest-feature-card" data-reveal @if($index) data-reveal-delay="{{ min($index % 4, 4) }}" @endif>
    <div class="dest-feature-media">
        <span class="dest-feature-tag">{{ $destination['tag'] }}</span>
        <img src="{{ media_url($destination['image']) }}" alt="{{ $destination['name'] }}" loading="lazy">
    </div>
    <div class="dest-feature-body">
        <div>
            <h3 class="font-display">{{ $destination['name'] }}</h3>
            <div class="dest-feature-meta mt-2">
                <span><i class="bi bi-geo-alt"></i> {{ $destination['region'] }}</span>
                <span><i class="bi bi-sun"></i> {{ $destination['best_time'] }}</span>
            </div>
        </div>
        <p class="mb-0" style="font-size: 0.92rem;">{{ $destination['excerpt'] }}</p>
        <div class="tag-row">
            @foreach(array_slice($destination['activities'] ?? [], 0, 3) as $activity)
                <span class="tag-pill"><i class="bi bi-dot"></i>{{ $activity }}</span>
            @endforeach
        </div>
        <div class="dest-feature-foot">
            <a href="{{ url('/destinations/' . $destination['slug']) }}" class="pkg-link">
                Explore {{ $destination['name'] }} <i class="bi bi-arrow-right"></i>
            </a>
        </div>
    </div>
</div>