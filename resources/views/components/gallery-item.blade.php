{{--
    Gallery Tile
    Usage: <x-gallery-item :full="$url" :thumb="$thumb" :caption="$caption" :tall="true" group="gallery" />

    Renders one tile in a .gallery-grid and registers it with the lightbox.
    Tiles sharing a `group` are browsable with the prev/next controls.
    The anchor is the direct grid child, so extra attributes (e.g. data-category)
    passed by the caller land on the element the grid and filters act upon.
--}}
@props([
    'full',
    'thumb' => null,
    'caption' => null,
    'tall' => false,
    'wide' => false,
    'group' => 'gallery',
])

<a href="{{ $full }}"
   {{ $attributes->class(['gallery-item', 'tall' => $tall, 'wide' => $wide]) }}
   style="background-image: url('{{ $thumb ?? $full }}');"
   data-lightbox="{{ $group }}"
   @if($caption) data-caption="{{ $caption }}" @endif
   aria-label="{{ $caption ? 'Open image: ' . $caption : 'Open image' }}">
    <span class="zoom-icon"><i class="bi bi-arrows-angle-expand"></i></span>
</a>
