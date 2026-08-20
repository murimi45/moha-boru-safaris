<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Moha Boru Safaris Limited | Luxury African Safaris')</title>
    <meta name="description" content="@yield('description', 'Moha Boru Safaris Limited crafts bespoke luxury safaris across Kenya — the Maasai Mara, Amboseli, Samburu and beyond. Exceptional guides, exclusive camps, seamless journeys.')">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('favicon.ico') }}?v={{ filemtime(public_path('favicon.ico')) }}" sizes="any">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}?v={{ filemtime(public_path('favicon-32x32.png')) }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('favicon-192x192.png') }}?v={{ filemtime(public_path('favicon-192x192.png')) }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}?v={{ filemtime(public_path('apple-touch-icon.png')) }}">

    {{-- Open Graph / SEO --}}
    <meta property="og:title" content="Moha Boru Safaris Limited">
    <meta property="og:description" content="Authentic, memorable and sustainable safari experiences across Kenya.">
    <meta property="og:type" content="website">

    {{-- Fonts: Fraunces (display) + Manrope (body) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,400;0,9..144,500;0,9..144,600;1,9..144,300;1,9..144,400&family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 — grid + utilities ONLY. Visual language is entirely custom (app.css). --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap-grid.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap-utilities.min.css" rel="stylesheet">
    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    {{-- Custom design system. Versioned on file mtime so edits are never served from cache. --}}
    <link href="{{ asset('css/app.css') }}?v={{ filemtime(public_path('css/app.css')) }}" rel="stylesheet">

    @stack('styles')
</head>
<body>

    {{-- Brief loading veil, removed by app.js once the page has painted --}}
    <div id="mb-loader" aria-hidden="true">
        <span class="loader-mark">Moha&nbsp;Boru</span>
    </div>

    @include('partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    {{-- Bootstrap 5 bundle — only used for components that genuinely need its JS behaviour
         (e.g. offcanvas/collapse primitives), never for visual styling. --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="{{ asset('js/app.js') }}?v={{ filemtime(public_path('js/app.js')) }}" defer></script>

    @stack('scripts')
</body>
</html>