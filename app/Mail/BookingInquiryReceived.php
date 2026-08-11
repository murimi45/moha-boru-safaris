<?php

namespace App\Mail;

use App\Models\BookingInquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class BookingInquiryReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public BookingInquiry $inquiry)
    {
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New safari enquiry — ' . $this->inquiry->reference,
            replyTo: [$this->inquiry->email],
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.booking-inquiry',
        );
    }
}
