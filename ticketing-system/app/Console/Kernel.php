<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\UpdateExpiredTickets::class,
        Commands\CheckEndingTickets::class,
        Commands\CheckEndedTickets::class 
    ];

    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('tickets:update-expired')->everyMinute();
        $schedule->command('tickets:update-expired')->daily();
        $schedule->command('tickets:check-ending')->everyMinute();
        $schedule->command('tickets:check-ended')->everyMinute();
    }
    

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
