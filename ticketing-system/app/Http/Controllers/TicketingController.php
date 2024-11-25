<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketingController extends Controller
{
    public function index()
    {
        // $tickets = Ticket::latest()->paginate(10);
        return view('adminTickets', compact('tickets'));
    }
}
