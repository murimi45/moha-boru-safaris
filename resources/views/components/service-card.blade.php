{{--
    Service Card
    Usage: <x-service-card :service="$service" :index="$loop->index" />
    Expects $service as an array/object with:
      name, slug, icon, excerpt

    Layout classes come from the Bootstrap grid stylesheet rather than app.css so
    the anchor is never left as an inline element if app.css is stale in cache.
--}}
@props(['service', 'index' => 0])

<a href="{{ url('/services/' . $service['slug']) }}"
   class="service-card service-card-link d-flex flex-column"
   style="margin: 0.875rem; box-sizing: border-box;"
   data-reveal
   @if($index) data-reveal-delay="{{ min($index % 4, 4) }}" @endif>
    <div class="service-icon"><i class="bi {{ $service['icon'] }}"></i></div>
    <h3 class="font-display">{{ $service['name'] }}</h3>
    <p class="flex-grow-1">{{ $service['excerpt'] }}</p>
    <span class="service-card-foot pkg-link">
        Learn More <i class="bi bi-arrow-right"></i>
    </span>
</a>
