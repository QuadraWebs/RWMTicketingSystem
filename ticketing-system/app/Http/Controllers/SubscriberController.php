<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = User::latest()->paginate(10);
        return view('admin/subscriber/adminSubscriber', compact('subscribers'));
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

}
