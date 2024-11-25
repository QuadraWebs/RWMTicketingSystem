<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use App\Models\User;
use App\Mail\SessionEnded;
use Illuminate\Support\Facades\Mail;

class CheckEndedTickets extends Command
{
    protected $signature = 'tickets:check-ended';
    protected $description = 'Check for ended sessions and update status';

    public function handle()
    {
        $endedTickets = Ticket::where('status', 'active')
            ->where('is_in_used', true)
            ->where('end_time', '<=', now())
            ->where('ending_notification_sent', true)
            ->get();

        foreach ($endedTickets as $ticket) {
            $user = User::where('uuid', $ticket->user_uuid)->first();
            Mail::to($ticket->user->email)->send(new SessionEnded($ticket, $user));

            DB::table('tickets')
                ->where('id', $ticket->id)
                ->update([
                    'is_in_used' => false,
                    'ending_notification_sent' => false
                ]);
        }
    }
}
