<?php

namespace App\Mail;

use App\Models\Newsletter;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewsletterCreateMail extends Mailable
{
    use Queueable, SerializesModels;

    public Newsletter $newsletter;

    public function __construct(Newsletter $newsletter)
    {
        $this->newsletter = $newsletter;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            from: new Address(config('constants.email_noreply'), config('constants.name')),
            subject: "Email {$this->newsletter->email} has subscribed a newsletter at {$this->newsletter->outlet->name}",
        );
    }

    public function content(): Content
    {
        return new Content(
            markdown: 'emails.newsletter.create',
            with: [
                'newsletter' => $this->newsletter,
            ],
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
