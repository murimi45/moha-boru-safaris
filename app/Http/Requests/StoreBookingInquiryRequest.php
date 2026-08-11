<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBookingInquiryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:120'],
            'email' => ['required', 'email:rfc', 'max:190'],
            'phone' => ['nullable', 'string', 'max:40'],
            'country' => ['nullable', 'string', 'max:80'],

            'package' => ['nullable', 'string', Rule::exists('packages', 'slug')],
            'destination' => ['nullable', 'string', Rule::exists('destinations', 'slug')],
            'service' => ['nullable', 'string', Rule::exists('services', 'slug')],

            'travel_date' => ['nullable', 'date', 'after_or_equal:today'],
            'adults' => ['required', 'integer', 'min:1', 'max:30'],
            'children' => ['required', 'integer', 'min:0', 'max:20'],
            'budget_key' => ['nullable', Rule::in(['value', 'premium', 'ultra'])],
            'message' => ['nullable', 'string', 'max:3000'],

            // Hidden field kept empty by real users; bots tend to fill everything.
            'website' => ['prohibited'],
        ];
    }

    public function messages(): array
    {
        return [
            'package.exists' => 'That safari package is no longer available.',
            'destination.exists' => 'That destination is no longer available.',
            'service.exists' => 'That service is no longer available.',
            'travel_date.after_or_equal' => 'Please choose a departure date in the future.',
            'adults.min' => 'At least one adult traveller is required.',
            'website.prohibited' => 'Your enquiry could not be submitted. Please try again.',
        ];
    }

    public function attributes(): array
    {
        return [
            'travel_date' => 'travel date',
            'budget_key' => 'budget',
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'adults' => $this->input('adults', 2),
            'children' => $this->input('children', 0),
        ]);
    }
}
