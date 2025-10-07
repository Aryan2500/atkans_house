<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function index()
    {
        $packages = Package::all();
        return view('adminV2.packages.index', compact('packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('adminV2.packages.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'features' => 'required|string', // ✔️ Accept string input
            'features.*' => 'string'
        ]);

        $featuresArray = array_map('trim', preg_split('/[\r\n,]+/', $request->features));

        // dd($validated);

        // Store as JSON (if your column is json)
        $package = new Package([
            'name' => $request->name,
            'price' => $request->price,
            'features' => $featuresArray, // stored as array
            'status' => (int) $request->status,
            'type' => $request->type
        ]);
        // dd($package);
        $package->save();

        return back()->with('success', 'Package created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $package = Package::findOrFail($id);
        return view('adminV2.packages.form', compact('package'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Package $package)
    {
        // Validate incoming data
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'features' => 'required|string', // Accept textarea input
            'status' => 'required|in:0,1',
        ]);

        // Normalize the features string into an array
        $featuresArray = array_map('trim', preg_split('/[\r\n,]+/', $request->features));

        // Update the package
        $package->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'features' => $featuresArray,
            'status' => (int) $validated['status'],
            'type' => $request->type

        ]);
        // dd($package);

        return redirect()->route('packages.index')->with('success', 'Package updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        try {
            $package->delete();
            return redirect()->route('packages.index')
                ->with('success', 'Package deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('packages.index')
                ->with('error', 'Failed to delete the package. Please try again.');
        }
    }
}
