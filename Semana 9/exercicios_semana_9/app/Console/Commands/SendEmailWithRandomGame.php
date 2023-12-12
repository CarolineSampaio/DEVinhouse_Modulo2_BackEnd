<?php

namespace App\Console\Commands;

use App\Mail\SendEmailWithGameOfDay;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendEmailWithRandomGame extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-with-random-game';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia um email com um pdf contendo um jogo aleátorio, que é o jogo do dia. Todos os dias as 12h';

    /**
     * Execute the console command.
     */
    public function handle() {
        $products = Product::query()
            ->inRandomOrder()
            ->take(1)
            ->get();

        Mail::to('caroline_sampaio@estudante.sesisenai.org.br', 'Caroline Sampaio')
            ->send(new SendEmailWithGameOfDay($products[0]));
    }
}
