<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cafe;

class CafeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $cafes = Cafe::withCount(['ticketAudits' => function ($query) {
                $query->where('status', '!=', 'rejected');
            }])
            ->when($search, function ($query) use ($search) {
                return $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%');
            })
            ->latest()
            ->paginate(10);
    
        return view('admin.cafe.adminCafe', compact('cafes'));
    }
    

    public function create()
    {
        return view('admin.cafe.add');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string'
            ]);

            Cafe::create($validated);

            return redirect()->route('admin.cafe.add.successful')->with('success', 'Cafe added successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.cafe.add.failed');
        }
    }

    public function edit($id)
    {
        $cafe = Cafe::findOrFail($id);
        return view('admin.cafe.edit', compact('cafe'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'address' => 'required|string'
            ]);

            $cafe = Cafe::findOrFail($id);
            $cafe->update($validated);


            return redirect()->route('admin.cafe.update.successful')->with('success', 'Cafe updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('admin.cafe.update.failed')->with('cafe', $cafe);
        }
    }

    public function destroy($id)
    {
        $cafe = Cafe::findOrFail($id);
        $cafe->delete();

        return response()->json(['success' => true]);
    }
}
