<?php

namespace App\Mail;

use App\Models\Award;
use App\Models\Client;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendAwardToClient extends Mailable {
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $client;
    public $award;

    public function __construct(Client $client, Award $award) {
        $this->client = $client;
        $this->award = $award;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        return new Envelope(
            subject: 'Parabéns! Você acaba de receber um prêmio! :)',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
            html: 'emails.SendAward',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array {
        return [];
    }
}
