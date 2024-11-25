<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use App\Models\User;
use App\Mail\TicketEndingSoon;
use Illuminate\Support\Facades\Mail;

class CheckEndingTickets extends Command
{
    protected $signature = 'tickets:check-ending';
    protected $description = 'Check for tickets ending in 30 minutes and send notifications';

    public function handle()
    {
        $endingSoonTickets = Ticket::where('status', 'active')
            ->where('is_in_used', true)
            ->where('end_time', '>=', now())
            ->where('end_time', '<=', now()->addMinutes(30))
            ->where('ending_notification_sent', false)
            ->get();

        foreach ($endingSoonTickets as $ticket) {
            $user = User::where('uuid', $ticket->user_uuid)->first();
            Mail::to($ticket->user->email)->send(new TicketEndingSoon($ticket, $user));
            DB::table('tickets')
                ->where('id', $ticket->id)
                ->update(['ending_notification_sent' => true]);
        }
    }
}
