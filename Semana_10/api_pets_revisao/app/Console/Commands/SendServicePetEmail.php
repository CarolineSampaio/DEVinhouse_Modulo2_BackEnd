<?php

namespace App\Console\Commands;

use App\Mail\SendServicePet;
use App\Models\Pet;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendServicePetEmail extends Command {

    protected $signature = 'app:send-service-pet-email'; // nome do comando

    protected $description = 'Envia um email oferecendo serviço para os pets cadastrados';

    public function handle() {
        //$pets = Pet::all();
        $pets = Pet::query()->where('age', '>', 10)->get();

        foreach ($pets as $pet) {
            Mail::to('caroline_sampaio@estudante.sesisenai.org.br', $pet->name)
                ->send(new SendServicePet());
        }
    }
}
