<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Cafes;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('package')
            ->latest()
            ->get()
            ->map(function ($ticket) {
                return [
                    'user_uuid' => $ticket->user_uuid,
                    'package_id' => $ticket->package_id,
                    'stripe_subscription_id' => $ticket->stripe_subscription_id,
                    'is_unlimited' => $ticket->is_unlimited,
                    'available_pass' => $ticket->available_pass,
                    'is_in_used' => $ticket->is_in_used,
                    'start_time' => $ticket->start_time,
                    'end_time' => $ticket->end_time,
                    'status' => $ticket->status,
                    'valid_until' => $ticket->valid_until
                ];
            });

        return view('welcome', compact('tickets'));
    }

    public function viewByUuid($uuid)
    {
        $user = User::where('uuid', $uuid)->first();
        $userName = $user ? $user->name : 'Guest';

        $tickets = Ticket::with('package')
            ->where('user_uuid', $uuid)
            ->latest()
            ->get()
            ->map(function ($ticket) {
                return [
                    'user_uuid' => $ticket->user_uuid,
                    'package_id' => $ticket->package_id,
                    'stripe_subscription_id' => $ticket->stripe_subscription_id,
                    'is_unlimited' => $ticket->is_unlimited,
                    'available_pass' => $ticket->available_pass,
                    'is_in_used' => $ticket->is_in_used,
                    'start_time' => $ticket->start_time,
                    'end_time' => $ticket->end_time,
                    'status' => $ticket->status,
                    'valid_until' => $ticket->valid_until
                ];
            });

        return view('welcome', compact('tickets', 'userName'));
    }
    
    public function checkin(Request $request)
    {
        $cafes = Cafes::whereNull('deleted_at')
            ->select('id', 'name', 'address')
            ->get()
            ->toArray();

        return view('checkin', [
            'ticket_id' => $request->ticket_id,
            'uuid' => $request->uuid,
            'cafes' => $cafes
        ]);
    }

    public function confirmCheckin(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'selected_cafe' => 'required|string',
            'cafe_id' => 'required',
            'uuid' => 'required|uuid',
            'ticket_id' => 'required|string'
        ]);

        // Generate ticket ID
        $ticketId = $validated['ticket_id'];

        // Generate signed verification URL
        $verificationUrl = URL::signedRoute('ticket.verify', [
            'ticket_id' => $ticketId,
            'uuid' => $validated['uuid'],
            'cafe_id' => $validated['cafe_id'] 
        ]);

        // Get cafes data again for the view
        $cafes = Cafes::whereNull('deleted_at')
            ->select('id', 'name', 'address')
            ->get()
            ->toArray();

        $selectedCafe = Cafes::find($validated['cafe_id']);

        // Return view with verification data and cafes
        return view('checkin', [
            'ticket_id' => $ticketId,
            'uuid' => $validated['uuid'],
            'verificationUrl' => $verificationUrl,
            'cafes' => $cafes,
            'selectedCafe' => $selectedCafe,
            'selected_cafe_name' => $validated['selected_cafe']
        ]);
    }

    public function verifyTicket(Request $request, $uuid)
    {
        if (!$request->hasValidSignature()) {
            abort(401, 'Invalid signature');
        }

        $cafeId = $request->query('cafe_id');
        $ticketId = $request->query('ticket_id');

        // Get cafe details
        $cafe = Cafes::findOrFail($cafeId);
        
        // Get user details
        $user = User::where('uuid', $uuid)->first();
        $customerName = $user ? $user->name : 'Guest';

        return view('verify-ticket', [
            'ticket_id' => $ticketId,
            'selected_cafe' => $cafe->name,
            'customer_name' => $customerName
        ]);
    }

    public function acceptTicket($ticket_id) {
        // Add acceptance logic here later
        return redirect()->back()->with('success', 'Ticket accepted successfully');
    }

    public function rejectTicket($ticket_id) {
        // Add rejection logic here later
        return redirect()->back()->with('error', 'Ticket rejected');
    }
}
