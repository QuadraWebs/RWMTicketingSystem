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
        $titles = Package::select('title')->distinct()->get();
        return view('admin.package.add', compact('titles'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'stripe_package_id' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'duration' => 'required|integer|min:1',
            'pass_type' => 'required|integer|min:0',
            'payment_link' => 'nullable|string|url|max:255'
        ]);

        DB::beginTransaction();
        try {
            $validated['is_recurring'] = $request->pass_type == 0;
            Package::create($validated);
            DB::commit();
            return redirect()->route('admin.package.add.successful');
        } catch (\Exception $e) {
            \Log::error('Package creation failed: ' . $e->getMessage());
            DB::rollback();
            return redirect()->route('admin.package.add.failed');
        }
    }
    
    public function edit($id)
    {
        $package = Package::findOrFail($id);
        $packages = Package::latest()->paginate(10);
        $titles = Package::select('title')->distinct()->get();

        return view('admin.package.edit', compact('package', 'packages', 'titles'));
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
                'pass_type' => $request->pass_type,
                'is_recurring' => $request->pass_type == 0 ? true : false,
                'payment_link' => $request->payment_link
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
