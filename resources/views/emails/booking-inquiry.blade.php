@php($inquiry = $inquiry->loadMissing(['package', 'destination', 'service']))
<h2>New safari enquiry</h2>

<p><strong>Reference:</strong> {{ $inquiry->reference }}<br>
<strong>Received:</strong> {{ $inquiry->created_at->format('j F Y, g:ia') }}</p>

<h3>Traveller</h3>
<ul>
    <li><strong>Name:</strong> {{ $inquiry->name }}</li>
    <li><strong>Email:</strong> {{ $inquiry->email }}</li>
    <li><strong>Phone:</strong> {{ $inquiry->phone ?: 'Not provided' }}</li>
    <li><strong>Country:</strong> {{ $inquiry->country ?: 'Not provided' }}</li>
</ul>

<h3>Journey</h3>
<ul>
    <li><strong>Package:</strong> {{ $inquiry->package?->name ?: 'Custom itinerary' }}</li>
    <li><strong>Destination:</strong> {{ $inquiry->destination?->name ?: 'Not specified' }}</li>
    <li><strong>Service:</strong> {{ $inquiry->service?->name ?: 'Not specified' }}</li>
    <li><strong>Travel date:</strong> {{ $inquiry->travel_date?->format('j F Y') ?: 'Flexible' }}</li>
    <li><strong>Travellers:</strong> {{ $inquiry->travellers_label }}</li>
    <li><strong>Budget:</strong> {{ $inquiry->budget_key ? ucfirst($inquiry->budget_key) : 'Not stated' }}</li>
</ul>

@if($inquiry->message)
    <h3>Message</h3>
    <p>{!! nl2br(e($inquiry->message)) !!}</p>
@endif

<p>Reply directly to this email to reach {{ $inquiry->name }}.</p>
