<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class UserMail extends Mailable
{
    use Queueable, SerializesModels;

    public $body;

    public function __construct($body)
    {

        $this->body = $body;
    }


    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Registration Confermatione',

        );
    }


    public function content(): Content
    {
        return new Content(
            view: 'mail.usermail',
        );
    }


    public function attachments(): array
    {
        return [];
    }
}
