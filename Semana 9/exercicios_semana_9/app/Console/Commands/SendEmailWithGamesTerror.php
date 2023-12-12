<?php

namespace App\Console\Commands;

use App\Mail\SendEmailGamesTerror;
use App\Models\Product;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmailWithGamesTerror extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-with-games-terror';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Os três jogos de terror mais procurados nesse Halloween!';

    /**
     * Execute the console command.
     */
    public function handle() {
        $products = Product::query()
            ->inRandomOrder()
            ->take(3)
            ->whereBetween('price',  [30, 300])
            ->whereHas('markers', function ($query) {
                $query->where('marker_id', 3);
            })
            ->whereHas('avaliations', function ($query) {
                $query->select('product_id')
                    ->groupBy('product_id')

                    ->havingRaw('COUNT(product_id) >= 5');
            })
            ->get();


        Mail::to('caroline_sampaio@estudante.sesisenai.org.br', 'Caroline Sampaio')
            ->send(new SendEmailGamesTerror($products));

        /*debug com laravel log
        foreach($products as $product) {
        Log::info($product->name);
     }
     */
    }
}
