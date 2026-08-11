@extends('layouts.app')

@section('title', 'Guest Reviews | Moha Boru Safaris Limited')
@section('description', 'Read traveller stories from Moha Boru safaris — and share your own experience for other guests to see.')

{{-- Data from ReviewController@index: $testimonials --}}

@section('content')
{{-- ============================== PAGE HERO ============================== --}}
<section class="page-hero">
    <div class="hero-media">
        <img src="{{ asset('images/destinations/maasai-mara.png') }}" alt="Safari travellers in Kenya">
    </div>
    <div class="container-mb">
        <div class="breadcrumb-mb" data-reveal>
            <a href="{{ url('/') }}">Home</a> <i class="bi bi-chevron-right" style="font-size:0.65rem;"></i> <span>Reviews</span>
        </div>
        <p class="mb-eyebrow" data-reveal data-reveal-delay="1">Traveller Stories</p>
        <h1 data-reveal data-reveal-delay="2">Words from the<br><em style="font-style:italic; font-weight:300; color: var(--mb-gold-light);">people who went</em></h1>
    </div>
    <div class="horizon-divider" style="position:absolute; left:0; right:0; bottom:0;"></div>
</section>

{{-- ============================== PUBLISHED REVIEWS ============================== --}}
<section class="section section-alt">
    <div class="container-mb">
        <div class="section-head" data-reveal>
            <p class="mb-eyebrow">From The Field</p>
            <h2 class="mb-h2 mb-underline">Published reviews</h2>
            <p class="lead-copy mt-3">
                Every review below was written by a guest and approved by our team before it appeared here.
            </p>
        </div>

        @if($testimonials->isEmpty())
            <p class="lead-copy" data-reveal>No published reviews yet — be the first to share your story below.</p>
        @else
            <div class="row gy-4">
                @foreach($testimonials as $t)
                    <div class="col-md-6" data-reveal @if($loop->index > 0) data-reveal-delay="{{ min($loop->index, 3) }}" @endif>
                        <article class="review-card">
                            @if($t->rating)
                                <div class="review-stars" aria-label="{{ $t->rating }} out of 5 stars">
                                    @for($i = 1; $i <= 5; $i++)
                                        <i class="bi {{ $i <= $t->rating ? 'bi-star-fill' : 'bi-star' }}"></i>
                                    @endfor
                                </div>
                            @endif
                            <p class="review-quote">&ldquo;{{ $t->quote }}&rdquo;</p>
                            <div class="testimonial-author" style="margin-top: 1.5rem;">
                                <div class="testimonial-avatar" style="background: var(--mb-gold-10); color: var(--mb-gold-deep);">{{ $t->initials }}</div>
                                <div>
                                    <div class="name" style="color: var(--mb-black);">{{ $t->name }}</div>
                                    <div class="role" style="color: var(--mb-text-muted);">{{ $t->role }}</div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</section>

{{-- ============================== SUBMIT FORM ============================== --}}
<section class="section" id="share">
    <div class="container-mb">
        <div class="row gy-5">

            <div class="col-lg-8">
                @if(session('review_submitted'))
                    <div class="alert-mb alert-mb-success" data-reveal role="status">
                        <i class="bi bi-check-circle"></i>
                        <div>
                            <h3 class="font-display">Thank you, {{ session('review_name') }} — we have your review.</h3>
                            <p>
                                It will appear on the site after a quick check by our team.
                                We never auto-publish guest reviews.
                            </p>
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert-mb alert-mb-error" data-reveal role="alert">
                        <i class="bi bi-exclamation-circle"></i>
                        <div>
                            <h3 class="font-display">We couldn't save that just yet</h3>
                            <p>Please check the highlighted fields and try again.</p>
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif

                <div class="section-head" data-reveal>
                    <p class="mb-eyebrow">Share Yours</p>
                    <h2 class="mb-h2 mb-underline">Leave a review</h2>
                    <p class="lead-copy mt-3">
                        Tell future travellers what the trip felt like. Your name and story
                        go public after we approve them; your email stays private.
                    </p>
                </div>

                <form action="{{ route('reviews.store') }}" method="POST" class="form-panel" data-reveal data-reveal-delay="1" novalidate>
                    @csrf

                    <div class="form-honeypot" aria-hidden="true">
                        <label for="website">Leave this field empty</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off" value="{{ old('website') }}">
                    </div>

                    <p class="form-section-title">Your Experience</p>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-field">
                                <label class="form-label" for="name">Your Name <span class="req">*</span></label>
                                <input type="text" id="name" name="name" required maxlength="120"
                                       class="form-input @error('name') has-error @enderror"
                                       value="{{ old('name') }}" placeholder="Jane Wanjiru">
                                @error('name') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-field">
                                <label class="form-label" for="email">Email <span class="form-hint-inline">(private)</span></label>
                                <input type="email" id="email" name="email" maxlength="190"
                                       class="form-input @error('email') has-error @enderror"
                                       value="{{ old('email') }}" placeholder="you@example.com">
                                @error('email') <span class="form-error">{{ $message }}</span> @enderror
                                <span class="form-hint">Only used if we need to follow up — never shown on the site.</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-field">
                                <label class="form-label" for="role">Trip / Destination <span class="req">*</span></label>
                                <input type="text" id="role" name="role" required maxlength="120"
                                       class="form-input @error('role') has-error @enderror"
                                       value="{{ old('role') }}" placeholder="Maasai Mara, June 2026">
                                @error('role') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-field">
                                <span class="form-label" id="rating-label">Rating</span>
                                <div class="rating-input" role="radiogroup" aria-labelledby="rating-label">
                                    @for($star = 5; $star >= 1; $star--)
                                        <input type="radio" id="rating-{{ $star }}" name="rating" value="{{ $star }}"
                                               @checked((string) old('rating') === (string) $star)>
                                        <label for="rating-{{ $star }}" title="{{ $star }} star{{ $star > 1 ? 's' : '' }}">
                                            <i class="bi bi-star-fill" aria-hidden="true"></i>
                                            <span class="visually-hidden">{{ $star }} stars</span>
                                        </label>
                                    @endfor
                                </div>
                                @error('rating') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-field">
                                <label class="form-label" for="quote">Your Review <span class="req">*</span></label>
                                <textarea id="quote" name="quote" required minlength="20" maxlength="1200"
                                          class="form-textarea @error('quote') has-error @enderror"
                                          placeholder="What stood out — the guide, the camps, a moment on the plains?">{{ old('quote') }}</textarea>
                                @error('quote') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-mb btn-mb-gold mt-4">
                        Submit Review <i class="bi bi-arrow-right"></i>
                    </button>

                    <p class="form-hint mt-3 mb-0">
                        Reviews are moderated before they appear. Spam and abusive posts are removed.
                    </p>
                </form>
            </div>

            <div class="col-lg-4">
                <div class="detail-info-panel" data-reveal data-reveal-delay="1">
                    <div class="detail-info-row">
                        <i class="bi bi-1-circle"></i>
                        <div><div class="k">You Write</div><div class="v">Share what the safari felt like in your own words.</div></div>
                    </div>
                    <div class="detail-info-row">
                        <i class="bi bi-2-circle"></i>
                        <div><div class="k">We Check</div><div class="v">Our team reviews each submission before it goes live.</div></div>
                    </div>
                    <div class="detail-info-row">
                        <i class="bi bi-3-circle"></i>
                        <div><div class="k">It Appears</div><div class="v">Approved reviews show here and on the homepage.</div></div>
                    </div>
                    <div class="detail-info-row">
                        <i class="bi bi-shield-check"></i>
                        <div><div class="k">Your Privacy</div><div class="v">Email stays in the admin panel only — never on the public site.</div></div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
