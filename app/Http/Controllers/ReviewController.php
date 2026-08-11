<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Models\Testimonial;

class ReviewController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::published()->ordered()->get();

        return view('reviews.index', compact('testimonials'));
    }

    public function store(StoreReviewRequest $request)
    {
        $data = $request->validated();

        Testimonial::create([
            'name' => $data['name'],
            'email' => $data['email'] ?? null,
            'role' => $data['role'],
            'quote' => $data['quote'],
            'rating' => $data['rating'] ?? null,
            'initials' => Testimonial::initialsFromName($data['name']),
            'is_published' => false,
            'sort_order' => 0,
        ]);

        return redirect()
            ->route('reviews.index')
            ->with('review_submitted', true)
            ->with('review_name', $data['name']);
    }
}
