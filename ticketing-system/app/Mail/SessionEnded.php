<?php

namespace App\Mail;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Cafe;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SessionEnded extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $user;
    public $endTime;
    public $cafe;

    public function __construct(Ticket $ticket, User $user)
    {
        $this->ticket = $ticket;
        $this->user = $user;
        $this->endTime = $ticket->end_time;
        $this->cafe = Cafe::find($ticket->cafe_id);
    }

    public function build()
    {
        return $this->view('emails.tickets.session-ended')
                    ->subject('Your Session has Ended');
    }
}
