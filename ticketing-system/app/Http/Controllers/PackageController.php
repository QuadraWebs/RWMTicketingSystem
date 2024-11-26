<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Package;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::orderBy('title', 'desc')->paginate(10);
        return view('admin.package.adminPackage', ['packages' => $packages]);
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

        Package::create($validated);

        return redirect()->route('admin.package')->with('success', 'Package created successfully');
    }

}
