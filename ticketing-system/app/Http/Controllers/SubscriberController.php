<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        $subscriber = User::where('uuid', $uuid)->firstOrFail();
        $tickets = $subscriber->tickets()->latest()->get();

        return view('admin.subscriber.view', compact('subscriber', 'tickets'));
    }

    public function create()
    {
        return view('admin.subscriber.add');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
            'uuid' => Str::uuid(),
            'is_admin' => false,
        ]);

        return redirect()->route('admin.subscribers')
            ->with('success', 'Subscriber created successfully');
    }


    public function edit(User $user)
    {
        return view('admin/subscriber/edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:255',
            'status' => 'required|in:active,inactive',
        ]);

        $user->update($validated);

        return redirect()->route('admin.subscribers')
            ->with('success', 'Subscriber updated successfully');
    }
    public function destroy(User $user)
    {
        $user->update(['deleted_at' => now()]);

        return redirect()->route('admin.subscribers')
            ->with('success', 'Subscriber has been archived successfully');
    }
}
