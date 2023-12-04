<?php

namespace App\Console;

use App\Console\Commands\SendServicePetEmail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {
    /**
     * Define the application's command schedule.
     */

    protected $commands = [
        SendServicePetEmail::class
    ];

    protected function schedule(Schedule $schedule): void {
        // $schedule->command('inspire')->hourly();

        $schedule->command('app:send-service-pet-email')
            ->timezone('America/Sao_Paulo')
            ->everyMinute(); // Envia o email a cada minuto
        // ->at('18:36'); Envia o email todos os dias às 18:36
        //->cron('0 0 1 * *');  Envia o email todo dia 1 de cada mês

    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
