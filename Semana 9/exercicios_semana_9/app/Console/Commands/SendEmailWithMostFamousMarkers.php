<?php

namespace App\Console\Commands;

use App\Mail\SendEmailWithTopMarkers;
use App\Models\Marker;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailWithMostFamousMarkers extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-with-most-famous-markers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia um email com os 20 marcadores mais famosos em formato de tabela, todos os dias as meia noite fuso horário de São Paulo';

    /**
     * Execute the console command.
     */
    public function handle() {
        $topMarkers = Marker::withCount('products')->orderByDesc('products_count')->take(20)->get();

        Mail::to('caroline_sampaio@estudante.sesisenai.org.br', 'Caroline Sampaio')
            ->send(new SendEmailWithTopMarkers($topMarkers));
    }
}
