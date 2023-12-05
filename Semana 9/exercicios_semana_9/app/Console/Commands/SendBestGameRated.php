<?php

namespace App\Console\Commands;

use App\Mail\SendBestGameEmail;
use App\Models\Avaliation;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendBestGameRated extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-best-game-rated';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia um email com o jogo mais avaliado do momento';

    /**
     * Execute the console command.
     */
    public function handle() {
        $result = Avaliation::selectRaw('
            count(product_id) as count_avaliation,
            product_id,
            products.name as game,
            products.price as price,
            products.description as description,
            products.cover as cover
        ')
            ->join('products', 'products.id', '=', 'avaliations.product_id')
            ->where('avaliations.recommended', true)
            ->groupBy('avaliations.product_id', 'products.name', 'products.price', 'products.description', 'products.cover')
            ->orderByDesc('count_avaliation')
            ->limit(1)
            ->get();

        if (count($result) > 0) {
            Mail::to('caroline_sampaio@estudante.sesisenai.org.br', 'Caroline Sampaio')
                ->send(new SendBestGameEmail($result[0]));
        }
    }
}
