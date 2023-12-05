<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendServicePet extends Mailable {
    use Queueable, SerializesModels;

    public function __construct() {
        //
    }


    public function envelope(): Envelope {
        return new Envelope(
            subject: 'Seu pet está sujinho ? Hoje é dia do banho !',
        );
    }

    public function content(): Content {
        return new Content(
            html: 'mails.servicePetTemplate',
        );
    }


    public function attachments(): array {
        return [];
    }
}
