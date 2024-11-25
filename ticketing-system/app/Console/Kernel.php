<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\UpdateExpiredTickets::class
    ];

    protected function schedule(Schedule $schedule)
    {
        $schedule->command('tickets:update-expired')->everyMinute();
        $schedule->command('tickets:update-expired')->daily();

        
    }
    

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}
