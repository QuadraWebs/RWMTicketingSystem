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
        $schedule->command('tickets:update-expired')
            ->daily()
            ->thenPing(config('app.url') . '/schedule/run-all');
    
        $schedule->command('tickets:check-ending')
            ->everyMinute()
            ->thenPing(config('app.url') . '/schedule/run-all');
    
        $schedule->command('tickets:check-ended')
            ->everyMinute()
            ->thenPing(config('app.url') . '/schedule/run-all');
    }
    
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');
        require base_path('routes/console.php');
    }
    
}
