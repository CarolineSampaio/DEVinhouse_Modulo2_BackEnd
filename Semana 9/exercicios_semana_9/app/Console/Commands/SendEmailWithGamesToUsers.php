<?php

namespace App\Console\Commands;

use App\Mail\SendEmailWithGames;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailWithGamesToUsers extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-with-games-to-users';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia um email com um pdf contendo 10 jogos aleatórios as 08:00, horário de São Paulo, todos os dias';

    /**
     * Execute the console command.
     */
    public function handle() {
        $products = Product::query()
            ->inRandomOrder()
            ->take(10)
            ->get();

        Mail::to('caroline_sampaio@estudante.sesisenai.org.br', 'Caroline Sampaio')
            ->send(new SendEmailWithGames($products));

        /*debug com laravel log
        foreach($products as $product) {
        Log::info($product->name);
     }
     */
    }
}
