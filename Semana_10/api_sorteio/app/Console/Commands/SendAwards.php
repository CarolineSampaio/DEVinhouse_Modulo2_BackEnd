<?php

namespace App\Console\Commands;

use App\Mail\SendAwardToClient;
use App\Models\Award;
use App\Models\Client;
use DateTime;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SendAwards extends Command {
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-awards';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Envia um email contendo um prêmios para o cliente que foi sorteado.';

    /**
     * Execute the console command.
     */
    public function handle() {

        $date =  (new DateTime('now'))->format('Y-m-d H:i');
        $awards = Award::query()->whereBetween('date', ["$date:00", "$date:59"])->get();

        foreach ($awards as $award) {
            $clients = Client::query()->take($award->amount)->inRandomOrder()->get();

            Log::info($award->amount);

            foreach ($clients as $client) {
                Log::info("Enviando email para $client");
                Mail::to($client->email, $client->name)
                    ->send(new SendAwardToClient($client, $award));
            }
        }
    }
}
