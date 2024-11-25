<?php

namespace App\Console\Commands;

use App\Models\Ticket;
use App\Enums\TicketStatus;
use Illuminate\Console\Command;

class UpdateExpiredTickets extends Command
{
    protected $signature = 'tickets:update-expired';
    protected $description = 'Update status of expired tickets to inactive';

    public function handle()
    {
        Ticket::where('valid_until', '<', now())
            ->where('status', TicketStatus::Active->value)
            ->update(['status' => TicketStatus::Inactive->value]);

        $this->info('Expired tickets have been marked as inactive.');
    }
}
