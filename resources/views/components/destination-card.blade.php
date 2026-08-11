{{--
    Destination Card
    Usage: <x-destination-card :destination="$destination" :index="$loop->index" />
    Expects $destination to be an object/array with:
      name, location, image, tag, activities_short, slug
--}}
@props(['destination', 'index' => 0])

<a href="{{ url('/destinations/' . $destination['slug']) }}"
   class="dest-card"
   data-reveal
   @if($index) data-reveal-delay="{{ min($index, 4) }}" @endif>
    <span class="dest-card-media" style="background-image: url('{{ media_url($destination['image']) }}');"></span>
    <span class="dest-card-body">
        <span class="dest-card-tag">{{ $destination['tag'] }}</span>
        <h3>{{ $destination['name'] }}</h3>
        <span class="dest-card-meta">
            <i class="bi bi-geo-alt"></i> {{ $destination['location'] }}
        </span>
    </span>
</a>