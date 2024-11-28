<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Artisan;
class Kernel extends ConsoleKernel
{
    protected $commands = [
        Commands\UpdateExpiredTickets::class,
        Commands\CheckEndingTickets::class,
        Commands\CheckEndedTickets::class
    ];
    protected function schedule(Schedule $schedule)
    {
        // Single scheduled task to run all commands
        $schedule->call(function () {
            Artisan::call('tickets:update-expired');
            Artisan::call('tickets:check-ending');
            Artisan::call('tickets:check-ended');
        })
        ->everyMinute()
        ->thenPing(config('app.url') . '/schedule/run-all');
    }
    
    
    
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');
    }
    
}
