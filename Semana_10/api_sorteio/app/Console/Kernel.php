<?php

namespace App\Console;

use App\Console\Commands\SendAwards;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel {
    /**
     * Define the application's command schedule.
     */
    protected $commands = [
        SendAwards::class
    ];

    protected function schedule(Schedule $schedule): void {
        // $schedule->command('inspire')->hourly();
        $schedule->command('app:send-awards')->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
