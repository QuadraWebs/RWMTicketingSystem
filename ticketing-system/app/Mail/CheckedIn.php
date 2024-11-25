<?php

namespace App\Mail;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Cafe;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CheckedIn extends Mailable
{
    use Queueable, SerializesModels;

    public $ticket;
    public $user;
    public $endTime;
    public $cafe;

    public function __construct(Ticket $ticket, User $user, Cafe $cafe)
    {
        $this->ticket = $ticket;
        $this->user = $user;
        $this->endTime = $ticket->end_time;
        $this->cafe = $cafe;
    }

    public function build()
    {
        return $this->view('emails.tickets.checkedin')
                    ->subject('Ticket Check-In Confirmed');
    }
}
