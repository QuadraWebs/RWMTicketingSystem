<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ticket;
use App\Models\Package;
use App\Models\TicketAudit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SubscriberController extends Controller
{
    // public function index()
    // {
    //     $subscribers = User::latest()->paginate(10);
    //     return view('admin/subscriber/adminSubscriber', compact('subscribers'));
    // }
    public function index(Request $request)
    {
        $search = $request->input(key: 'search');

        $subscribers = User::whereNull('deleted_at')
            ->when($search, function ($query) use ($search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10);

        return view('admin/subscriber/adminSubscriber', compact('subscribers'));
    }
    public function show($uuid)
    {
        $subscriber = User::where('uuid', operator: $uuid)->firstOrFail();

        $tickets = Ticket::where('user_uuid', $uuid)
            ->latest()
            ->with('package')
            ->get();

        $activities = TicketAudit::where('user_id', $subscriber->id)
            ->with('cafe')
            ->latest()
            ->get();

        return view('admin.subscriber.view', compact('subscriber', 'tickets', 'activities'));
    }

    public function create()
    {
        return view('admin.subscriber.add');
    }

    public function edit(User $user)
    {
        return view('admin/subscriber/edit', data: compact('user'));
    }

    public function destroy(User $user)
    {
        $user->update(['deleted_at' => now()]);

        return redirect()->route('admin.subscribers')
            ->with('success', 'Subscriber has been archived successfully');
    }



    public function edit_user_ticket($uuid, $ticket)
    {
        $subscriber = User::where('uuid', $uuid)->firstOrFail();
        $ticket = Ticket::findOrFail($ticket);
        $packages = Package::all();

        return view('admin.subscriber.edit_ticket', compact('subscriber', 'ticket', 'packages'));
    }

    public function updateUserTicket(Request $request, $uuid, $ticket)
    {
        try {
            $ticket = Ticket::findOrFail($ticket);

            $validatedData = $request->validate([
                'status' => 'required|in:active,inactive',
                'valid_until' => 'required|date',
                'available_pass' => 'required_if:is_unlimited,false|numeric|min:0',
                'is_unlimited' => 'boolean'
            ]);

            $ticket->status = $validatedData['status'];
            $ticket->valid_until = $validatedData['valid_until'];
            $ticket->is_unlimited = $request->has('is_unlimited');

            if (!$ticket->is_unlimited) {
                $ticket->available_pass = $validatedData['available_pass'];
            }

            $ticket->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Ticket updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Failed to update ticket'
            ]);
        }
    }
    public function store_new(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'phone' => 'required|string|max:20',
                'is_admin' => 'boolean'
            ]);

            $user = User::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'password' => Hash::make(Str::random(12)),
                'uuid' => Str::uuid(),
                'is_admin' => $validated['is_admin'] ?? false,
            ]);

            return redirect()->route('admin.package.add.successful');
        } catch (\Exception $e) {
            return redirect()->route('admin.package.add.failed');
        }
    }


    public function destroyUserTicket($uuid, $ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        $ticket->delete();

        return redirect()->back()->with('success', 'Ticket deleted successfully');
    }
    public function update_user_ticket(Request $request, $uuid, $ticket)
    {
        $subscriber = User::where('uuid', $uuid)->firstOrFail();
        $ticket = Ticket::findOrFail($ticket);

        $validated = $request->validate([
            'package_id' => 'required|exists:packages,id',
            'valid_until' => 'required|date',
            'remaining_passes' => 'nullable|integer',
            'status' => 'required|in:active,inactive'
        ]);

        $ticket->update($validated);

        return redirect()->route('subscriber.view', $uuid)
            ->with('success', 'Ticket updated successfully');
    }

    public function destroy_user_ticket($uuid, $ticket)
    {
        $subscriber = User::where('uuid', $uuid)->firstOrFail();
        $ticket = Ticket::findOrFail($ticket);

        $ticket->delete();

        return redirect()->route('subscriber.view', $uuid)
            ->with('success', 'Ticket deleted successfully');
    }
}
