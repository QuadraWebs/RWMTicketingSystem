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
use Illuminate\Support\Facades\Mail;
use App\Mail\CheckedIn;
use App\Enums\TicketStatus;


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
            ->where('status', "active")
            ->get()
            ->map(function ($ticket) {
                return [
                    'id' => $ticket->id,
                    'user_uuid' => $ticket->user_uuid,
                    'package_id' => $ticket->package_id,
                    'package_name' => $ticket->package->name,
                    'package_title' => $ticket->package->title,
                    'package_description' => $ticket->package->description,
                    'stripe_subscription_id' => $ticket->stripe_subscription_id,
                    'is_unlimited' => $ticket->is_unlimited,
                    'available_pass' => $ticket->available_pass,
                    'is_in_used' => $ticket->is_in_used,
                    'start_time' => $ticket->start_time,
                    'end_time' => $ticket->end_time,
                    'status' => $ticket->status,
                    'valid_until' => $ticket->valid_until,
                    'created_at' => $ticket->created_at
                ];
            });
        return view('welcome', compact('tickets', 'userName'));
    }
    
    public function checkin(Request $request, $uuid)
    {
        // Check if ticket is in use
        $ticket = Ticket::find($request->ticket_id);
        if ($ticket->is_in_used) {
            return redirect()->route('ticket.view', ['uuid' => $uuid])->with('error', 'This ticket is currently in use. Please wait until the current session ends.');
        }

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
        // Check if ticket is in use
        $ticket = Ticket::find($request->ticket_id);
        if ($ticket->is_in_used) {
            return redirect()->route('ticket.view', ['uuid' => $request->uuid])->with('error', 'This ticket is currently in use. Please wait until the current session ends.');
        }


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
        $cafes = Cafe::whereNull('deleted_at')
            ->select('id', 'name', 'address')
            ->get()
            ->toArray();

        $selectedCafe = Cafe::find($validated['cafe_id']);

        $ticket = Ticket::find($ticketId);
        $ticket->verification_timestamp = now()->addMinutes(2);
        $ticket->save();

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

    private function formatDescription($description)
    {
        $lines = explode("\n", $description);
        $formattedDescription = '';
        $counter = 1;
        
        foreach ($lines as $line) {
            $trimmedLine = trim($line);
            if ($trimmedLine && 
                !str_starts_with(strtolower($trimmedLine), '- privileged') && 
                !str_starts_with(strtolower($trimmedLine), '- valid')) {
                
                $line = trim(str_replace('- ', '', $trimmedLine));
                $formattedDescription .= $counter . '. ' . $line . "\n";
                $counter++;
            }
        }
        
        return $formattedDescription;
    }


    public function verifyTicket(Request $request, $uuid)
    {
        try {
            $cafeId = $request->query('cafe_id');
            $ticketId = $request->query('ticket_id');

            $ticket = Ticket::where('id', $request->query('ticket_id'))->firstOrFail();

            if (now()->isAfter($ticket->verification_timestamp)) {
                return view('expired-ticket', [
                    'message' => 'This QR code has expired',
                    'action' => 'Please return to the check-in page to generate a new QR code'
                ]);
            }

            $package = Package::findOrFail($ticket->package_id);
            // Format package description
            $formattedPackage = clone $package;
            $formattedPackage->description = $this->formatDescription($package->description);

            $endTime = now()->addMinutes($package->duration);
            $cafe = Cafe::findOrFail($cafeId);
            $user = User::where('uuid', $uuid)->first();
            $customerName = $user ? $user->name : 'Guest';

            return view('verify-ticket', [
                'ticket_id' => $ticketId,
                'ticket' => $ticket,
                'package' => $formattedPackage,  // Pass formatted package
                'selected_cafe' => $cafe->name,
                'customer_name' => $customerName,
                'end_time' => $endTime
            ]);

        } catch (HttpException $e) {
            return view('expired-ticket', [
                'message' => 'This QR code has expired',
                'action' => 'Please return to the check-in page to generate a new QR code'
            ]);
        }
    }
    

    public function workSpacePracticeVerifyTicket()
    {
        try {
            $ticket = Ticket::where('id', 4)->firstOrFail();
            //$ticket = Ticket::where('id', 28)->firstOrFail();
            $package = Package::findOrFail($ticket->package_id);
            // Format package description
            $formattedPackage = clone $package;
            $formattedPackage->description = $this->formatDescription($package->description);

            $endTime = now()->addMinutes($package->duration);
            $cafe = Cafe::first();
            $user = User::where('uuid', '8db84656-5adc-4432-a0c3-f41abbdc5f2d')->first();

            return view('practice-verify-ticket', [
                'ticket_id' => $ticket->id,
                'ticket' => $ticket,
                'package' => $formattedPackage,  // Pass formatted package
                'selected_cafe' => 'Practice WorkSpace',
                'customer_name' => 'Practice Users',
                'end_time' => $endTime
            ]);

        } catch (HttpException $e) {
            return view('expired-ticket', [
                'message' => 'This QR code has expired',
                'action' => 'Please return to the check-in page to generate a new QR code'
            ]);
        }
    }

    public function workSpacePracticeAllInVerifyTicket()
    {
        try {
            $ticket = Ticket::where('id', 5)->firstOrFail();
            //$ticket = Ticket::where('id', 30)->firstOrFail();
            $package = Package::findOrFail($ticket->package_id);
            $endTime = now()->addMinutes($package->duration);
            $cafe = Cafe::first();
            $user = User::where('uuid', '8db84656-5adc-4432-a0c3-f41abbdc5f2d')->first();

            $formattedPackage = clone $package;
            $formattedPackage->description = $this->formatDescription($package->description);
            

            return view('practice-verify-ticket', [
                'ticket_id' => $ticket->id,
                'ticket' => $ticket,
                'package' => $formattedPackage,  
                'selected_cafe' => 'Practice WorkSpace',
                'customer_name' => 'Practice Users',
                'end_time' => $endTime
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
                ->where('status', TicketStatus::Active)
                ->first();

                
            if ($ticket->is_in_used) {
                return view('accept-ticket', [
                    'message' => 'Already Checked In',
                    'action' => 'This ticket has already been used for check-in.'
                ]);
            }

            $package = Package::where('id', $ticket->package_id)
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

            $retrieveTicket = Ticket::find($ticket_id);
            $users = User::where('uuid', $ticket->user_uuid)->first();
            $cafe = Cafe::find($cafe_id); 

            Mail::to($user->email)->send(new CheckedIn($retrieveTicket, $users, $cafe));


            return view('accept-ticket', [
                'message' => 'Check in successful',
                'action' => 'Please show this screen to the customer and let them enjoy your WorkSpace!'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', $e->getMessage());
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
            return view('reject-ticket', [
                'message' => 'Check in unsuccessful',
                'action' => 'Please show this screen to the customer and inform them that their pass is still valid for the next use.'
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Failed to process ticket');
        }
    }

    public function workSpacePracticeAcceptTicket() {
        try {
            return view('accept-ticket', [
                'message' => 'Check in successful',
                'action' => 'Please show this screen to the customer and let them enjoy your WorkSpace!'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    public function workSpacePracticeRejectTicket() {
        try {
            return view('reject-ticket', [
                'message' => 'Check in unsuccessful',
                'action' => 'Please show this screen to the customer and inform them that their pass is still valid for the next use.'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to process ticket');
        }
    }

    public function workSpacePracticeAllInAcceptTicket() {
        try {
            return view('accept-ticket', [
                'message' => 'Check in successful',
                'action' => 'Please show this screen to the customer and let them enjoy your WorkSpace!'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    
    public function workSpacePracticeAllInRejectTicket() {
        try {
            return view('reject-ticket', [
                'message' => 'Check in unsuccessful',
                'action' => 'Please show this screen to the customer and inform them that their pass is still valid for the next use.'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to process ticket');
        }
    }
}
