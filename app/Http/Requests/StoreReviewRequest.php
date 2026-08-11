<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReviewRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['nullable', 'email:rfc', 'max:190'],
            'role' => ['required', 'string', 'max:120'],
            'quote' => ['required', 'string', 'min:20', 'max:1200'],
            'rating' => ['nullable', 'integer', 'min:1', 'max:5'],

            // Hidden field kept empty by real users; bots tend to fill everything.
            'website' => ['prohibited'],
        ];
    }

    public function messages(): array
    {
        return [
            'quote.min' => 'Please share a little more — at least a couple of sentences.',
            'website.prohibited' => 'Your review could not be submitted. Please try again.',
        ];
    }

    public function attributes(): array
    {
        return [
            'role' => 'trip or destination',
            'quote' => 'review',
        ];
    }
}
