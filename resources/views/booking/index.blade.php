@extends('layouts.app')

@section('title', 'Plan Your Safari | Moha Boru Safaris Limited')
@section('description', 'Tell us how you like to travel and we will design a Kenyan safari around you — dates, pace, party size and budget.')

{{-- Data from BookingController@create: $packages, $destinations, $services, $selected, $budgetOptions --}}

@section('content')
{{-- ============================== PAGE HERO ============================== --}}
<section class="page-hero">
    <div class="hero-media">
        <img src="{{ asset('images/destinations/diani-beach.png') }}" alt="Plan your Kenya safari with Moha Boru">
    </div>
    <div class="container-mb">
        <div class="breadcrumb-mb" data-reveal>
            <a href="{{ url('/') }}">Home</a> <i class="bi bi-chevron-right" style="font-size:0.65rem;"></i> <span>Plan Your Safari</span>
        </div>
        <p class="mb-eyebrow" data-reveal data-reveal-delay="1">Start Planning</p>
        <h1 data-reveal data-reveal-delay="2">Tell us how you travel,<br><em style="font-style:italic; font-weight:300; color: var(--mb-gold-light);">we'll draw the route</em></h1>
    </div>
    <div class="horizon-divider" style="position:absolute; left:0; right:0; bottom:0;"></div>
</section>

{{-- ============================== FORM ============================== --}}
<section class="section">
    <div class="container-mb">
        <div class="row gy-5">

            <div class="col-lg-8">
                @if(session('booking_reference'))
                    <div class="alert-mb alert-mb-success" data-reveal role="status">
                        <i class="bi bi-check-circle"></i>
                        <div>
                            <h3 class="font-display">Thank you, {{ session('booking_name') }} — your enquiry is with us.</h3>
                            <p>
                                Your reference is <strong>{{ session('booking_reference') }}</strong>. A planner will reply
                                within one working day, usually sooner. If it's urgent, call us on
                                <a href="tel:{{ config('contact.phone_link') }}" class="text-gold">{{ config('contact.phone_display') }}</a>.
                            </p>
                        </div>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert-mb alert-mb-error" data-reveal role="alert">
                        <i class="bi bi-exclamation-circle"></i>
                        <div>
                            <h3 class="font-display">We couldn't send that just yet</h3>
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
                    <p class="mb-eyebrow">Your Enquiry</p>
                    <h2 class="mb-h2 mb-underline">No templates,<br>no obligation</h2>
                    <p class="lead-copy mt-3">
                        Share as much or as little as you like — even a rough idea is enough for us
                        to come back with a considered first draft.
                    </p>
                </div>

                <form action="{{ route('booking.store') }}" method="POST" class="form-panel" data-reveal data-reveal-delay="1" novalidate>
                    @csrf

                    {{-- Honeypot: real travellers never see or fill this --}}
                    <div class="form-honeypot" aria-hidden="true">
                        <label for="website">Leave this field empty</label>
                        <input type="text" id="website" name="website" tabindex="-1" autocomplete="off" value="{{ old('website') }}">
                    </div>

                    {{-- ---------------- Journey ---------------- --}}
                    <p class="form-section-title">The Journey</p>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-field">
                                <label class="form-label" for="package">Safari Package</label>
                                <div class="filter-select-wrap">
                                    <select id="package" name="package" class="filter-select">
                                        <option value="">Not sure yet — design one for me</option>
                                        @foreach($packages as $slug => $name)
                                            <option value="{{ $slug }}" @selected(old('package', $selected['package']) === $slug)>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-field">
                                <label class="form-label" for="destination">Destination</label>
                                <div class="filter-select-wrap">
                                    <select id="destination" name="destination" class="filter-select">
                                        <option value="">Open to suggestions</option>
                                        @foreach($destinations as $slug => $name)
                                            <option value="{{ $slug }}" @selected(old('destination', $selected['destination']) === $slug)>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-field">
                                <label class="form-label" for="service">Service Needed</label>
                                <div class="filter-select-wrap">
                                    <select id="service" name="service" class="filter-select">
                                        <option value="">A full safari, everything included</option>
                                        @foreach($services as $slug => $name)
                                            <option value="{{ $slug }}" @selected(old('service', $selected['service']) === $slug)>{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-field">
                                <label class="form-label" for="travel_date">Preferred Departure</label>
                                <input type="date" id="travel_date" name="travel_date"
                                       class="form-input @error('travel_date') has-error @enderror"
                                       value="{{ old('travel_date') }}" min="{{ now()->addDay()->toDateString() }}">
                                @error('travel_date') <span class="form-error">{{ $message }}</span> @enderror
                                <span class="form-hint">Leave blank if your dates are still flexible.</span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-field">
                                <label class="form-label" for="adults">Adults <span class="req">*</span></label>
                                <input type="number" id="adults" name="adults" min="1" max="30" required
                                       class="form-input @error('adults') has-error @enderror"
                                       value="{{ old('adults', 2) }}">
                                @error('adults') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-field">
                                <label class="form-label" for="children">Children</label>
                                <input type="number" id="children" name="children" min="0" max="20"
                                       class="form-input @error('children') has-error @enderror"
                                       value="{{ old('children', 0) }}">
                                @error('children') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-field">
                                <label class="form-label" for="budget_key">Budget</label>
                                <div class="filter-select-wrap">
                                    <select id="budget_key" name="budget_key" class="filter-select">
                                        @foreach($budgetOptions as $key => $label)
                                            <option value="{{ $key }}" @selected(old('budget_key') === $key)>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ---------------- Contact ---------------- --}}
                    <p class="form-section-title mt-5">Where To Reach You</p>

                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="form-field">
                                <label class="form-label" for="name">Full Name <span class="req">*</span></label>
                                <input type="text" id="name" name="name" required maxlength="120"
                                       class="form-input @error('name') has-error @enderror"
                                       value="{{ old('name') }}" placeholder="Jane Wanjiru">
                                @error('name') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-field">
                                <label class="form-label" for="email">Email Address <span class="req">*</span></label>
                                <input type="email" id="email" name="email" required maxlength="190"
                                       class="form-input @error('email') has-error @enderror"
                                       value="{{ old('email') }}" placeholder="you@example.com">
                                @error('email') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-field">
                                <label class="form-label" for="phone">Phone / WhatsApp</label>
                                <input type="tel" id="phone" name="phone" maxlength="40"
                                       class="form-input @error('phone') has-error @enderror"
                                       value="{{ old('phone') }}" placeholder="{{ config('contact.phone_display') }}">
                                @error('phone') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-field">
                                <label class="form-label" for="country">Country of Residence</label>
                                <input type="text" id="country" name="country" maxlength="80"
                                       class="form-input @error('country') has-error @enderror"
                                       value="{{ old('country') }}" placeholder="Kenya">
                                @error('country') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-field">
                                <label class="form-label" for="message">Anything Else We Should Know</label>
                                <textarea id="message" name="message" maxlength="3000"
                                          class="form-textarea @error('message') has-error @enderror"
                                          placeholder="Celebrating something? Travelling with young children? Photography a priority? Tell us what matters and we'll build around it.">{{ old('message') }}</textarea>
                                @error('message') <span class="form-error">{{ $message }}</span> @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn-mb btn-mb-gold mt-4">
                        Send My Enquiry <i class="bi bi-arrow-right"></i>
                    </button>

                    <p class="form-hint mt-3 mb-0">
                        No deposit and no obligation — we'll reply with a draft itinerary and a clear price.
                    </p>
                </form>
            </div>

            {{-- ---------------- Side panel ---------------- --}}
            <div class="col-lg-4">
                <div class="detail-info-panel" data-reveal data-reveal-delay="1">
                    <div class="detail-info-row">
                        <i class="bi bi-1-circle"></i>
                        <div><div class="k">Step One</div><div class="v">We read your enquiry and come back with questions, not a template.</div></div>
                    </div>
                    <div class="detail-info-row">
                        <i class="bi bi-2-circle"></i>
                        <div><div class="k">Step Two</div><div class="v">A day-by-day draft itinerary with camps, guides and a transparent price.</div></div>
                    </div>
                    <div class="detail-info-row">
                        <i class="bi bi-3-circle"></i>
                        <div><div class="k">Step Three</div><div class="v">Refine it as many times as you like before anything is confirmed.</div></div>
                    </div>
                    <div class="detail-info-row">
                        <i class="bi bi-clock-history"></i>
                        <div><div class="k">Response Time</div><div class="v">Within one working day, usually sooner.</div></div>
                    </div>

                    <a href="https://wa.me/{{ config('contact.whatsapp') }}" class="btn-mb btn-mb-outline w-100 justify-content-center mt-4" style="color: var(--mb-black); border-color: var(--mb-line);">
                        <i class="bi bi-whatsapp"></i> Rather Just Chat?
                    </a>
                    <a href="tel:{{ config('contact.phone_link') }}" class="btn-mb btn-mb-dark w-100 justify-content-center mt-3">
                        <i class="bi bi-telephone"></i> {{ config('contact.phone_display') }}
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
