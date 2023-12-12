<?php

namespace App\Mail;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmailWithGames extends Mailable {
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $games;

    public function __construct($products) {
        $this->games = $products;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        return new Envelope(
            subject: '10 jogos para você se inspirar',
            tags: ['games', 'inspiração'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
            html: 'emails.ListWithTenGamesTemplate',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array {
        $pdf = Pdf::loadView('pdfs.ListWithTenGamesPdf', ['games' => $this->games]);

        return [
            Attachment::fromData(fn () => $pdf->output())
                ->as('sugestoes_jogos.pdf')
                ->withMime('application/pdf')
        ];
    }
}
