<?php

namespace App\Mail;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendEmailWithGameOfDay extends Mailable {
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $game;
    public function __construct($game) {
        $this->game = $game;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope {
        return new Envelope(
            subject: 'O jogo do dia!',
            tags: ['games', 'jogo do dia'],
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content {
        return new Content(
            html: 'emails.GameOfDayTemplate',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array {
        $pdf = Pdf::loadView('pdfs.GameOfDayPdf', ['game' => $this->game]);

        return [
            Attachment::fromData(fn () => $pdf->output())
                ->as('jogo_do_dia.pdf')
                ->withMime('application/pdf')
        ];
    }
}
