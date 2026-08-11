{{--
    Stat Counter
    Usage: <x-stat-counter :value="500" suffix="+" label="Happy Travelers" />
    The number animates up from 0 when it scrolls into view (see app.js, [data-counter]).
--}}
@props(['value', 'suffix' => '', 'label'])

<div class="stat-item">
    <div class="num"><span data-counter="{{ $value }}" data-suffix="{{ $suffix }}">0{{ $suffix }}</span></div>
    <div class="label">{{ $label }}</div>
</div>