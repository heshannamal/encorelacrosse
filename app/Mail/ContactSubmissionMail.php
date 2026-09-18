<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

class ContactSubmissionMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public array $submission)
    {
    }

    public function envelope(): Envelope
    {
        $source = Str::limit(
            (string) ($this->submission['source'] ?? 'Website inquiry'),
            80,
            ''
        );

        return new Envelope(
            from: new Address(
                (string) config('mail.contact_from.address'),
                (string) config('mail.contact_from.name')
            ),
            replyTo: [
                new Address(
                    (string) $this->submission['email'],
                    (string) $this->submission['name']
                ),
            ],
            subject: 'Encore Lacrosse Website Inquiry - ' . $source,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.contact-submission',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
