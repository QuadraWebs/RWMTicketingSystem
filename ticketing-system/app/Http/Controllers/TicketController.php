<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use App\Models\Cafe;
use App\Models\TicketAudit;
use App\Models\Package;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\HttpException;


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
    
    public function checkin(Request $request, $uuid)
    {
        $cafes = Cafe::whereNull('deleted_at')
            ->select('id', 'name', 'address')
            ->get()
            ->toArray();

        return view('checkin', [
            'ticket_id' => $request->ticket_id,
            'uuid' => $uuid,
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
        ], now()->addMinutes(2));

        // Get cafes data again for the view
        $cafes = Cafe::whereNull('deleted_at')
            ->select('id', 'name', 'address')
            ->get()
            ->toArray();

        $selectedCafe = Cafe::find($validated['cafe_id']);

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
        try {
            if (!URL::hasValidSignature($request)) {
                return view('expired-ticket', [
                    'message' => 'This QR code has expired',
                    'action' => 'Please return to the check-in page to generate a new QR code'
                ]);
            }

            $cafeId = $request->query('cafe_id');
            $ticketId = $request->query('ticket_id');

            $cafe = Cafe::findOrFail($cafeId);
            $user = User::where('uuid', $uuid)->first();
            $customerName = $user ? $user->name : 'Guest';

            return view('verify-ticket', [
                'ticket_id' => $ticketId,
                'selected_cafe' => $cafe->name,
                'customer_name' => $customerName
            ]);

        } catch (HttpException $e) {
            return view('expired-ticket', [
                'message' => 'This QR code has expired',
                'action' => 'Please return to the check-in page to generate a new QR code'
            ]);
        }
    }

    public function acceptTicket($ticket_id, $uuid, Request $request) {
        $cafe_id = $request->input('cafe_id');
    
        DB::beginTransaction();
        try {
            $user = User::where('uuid', $uuid)->first();
            
            $ticket = Ticket::where('id', $ticket_id)
                ->where('user_uuid', $uuid)
                ->where('status', 'active')
                ->first();

            $package = Package::where('id', $ticket_id)
                ->first();
            

            if (!$ticket->is_unlimited && $ticket->available_pass > 0) {
                $ticket->available_pass -= 1;
                $ticket->is_in_used = true;
                $ticket->start_time = now();
                $ticket->end_time = now()->addMinutes($package->duration);
                $ticket->save();
            }
            else{
                $ticket->is_in_used = true;
                $ticket->start_time = now();
                $ticket->end_time = now()->addMinutes($package->duration);
                $ticket->save();
            }

            TicketAudit::create([
                'tickets_id' => $ticket_id,
                'cafes_id' => $cafe_id,
                'status' => 'accepted',
                'user_id' => $user->id
            ]);

            
            DB::commit();
            return redirect()->back()->with('success', 'Ticket accepted successfully');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to process ticket');
        }
    }

    public function rejectTicket($ticket_id, $uuid, Request $request) {
        $cafe_id = $request->input('cafe_id');
        DB::beginTransaction();
        try {
            $user = User::where('uuid', $uuid)->first();
            TicketAudit::create([
                'tickets_id' => $ticket_id,
                'cafes_id' => $cafe_id,
                'status' => 'rejected',
                'user_id' => $user->id
            ]);
            
            DB::commit();
            return redirect()->back()->with('error', 'Ticket rejected');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to process ticket');
        }
    }
}
