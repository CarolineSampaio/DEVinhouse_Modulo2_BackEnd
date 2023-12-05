<?php

namespace App\Console;

use App\Console\Commands\SendBestGameRated;
use App\Console\Commands\SendEmailWithGamesToUsers;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {
    /**
     * Define the application's command schedule.
     */
    protected $commands = [
        SendEmailWithGamesToUsers::class,
        SendBestGameRated::class
    ];
    protected function schedule(Schedule $schedule): void {
        // $schedule->command('inspire')->hourly();
        $schedule->command('app:send-email-with-games-to-users')
            ->timezone('America/Sao_Paulo')
            ->dailyAt('08:00');

        $schedule->command('app:send-best-game-rated')
            ->timezone('America/Guayaquil')
            ->dailyAt('20:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
