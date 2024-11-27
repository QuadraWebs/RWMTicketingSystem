<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $packages = Package::when($search, function ($query) use ($search) {
            return $query->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('name', 'like', '%' . $search . '%');
        })
            ->latest()
            ->paginate(10);

        return view('admin.package.adminPackage', compact('packages'));
    }

    public function create()
    {
        return view('admin.package.add');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'is_recurring' => 'required|boolean',
            'pass_type' => 'required|string|max:255'
        ]);

        try {
            Package::create($validated);
            return redirect()->route('admin.package.add.successful');
        } catch (\Exception $e) {
            return redirect()->route('admin.package.add.failed');
        }
    }
    
    public function edit($id)
    {
        $package = Package::findOrFail($id);
        $packages = Package::latest()->paginate(10);

        return view('admin.package.edit', compact('package', 'packages'));
    }
    public function update(Request $request, $id)
    {
        try {
            $package = Package::findOrFail($id);

            $package->update([
                'title' => $request->title,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'duration' => $request->duration,
                'pass_type' => $request->pass_type
            ]);


            return redirect()->route('admin.package.update.successful');

        } catch (\Exception $e) {
            return redirect()->route('admin.package.update.failed')->with('package', $package);
        }
    }

    public function destroy($id)
    {
        $package = Package::findOrFail($id);
        $package->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Package deleted successfully'
        ]);
    }
}
