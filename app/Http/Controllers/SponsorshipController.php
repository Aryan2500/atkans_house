<?php

namespace App\Http\Controllers;

use App\Mail\SponsorshipStatusChanged;
use App\Mail\SponsorshipSubmitted;
use App\Models\Package;
use App\Models\Sponsership;
use App\Models\Sponsorship;
use App\Models\SponsorshipType;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class SponsorshipController
{
    /**
     * Display a listing of the resource.
     */
    public function public_index(): View
    {
        $tiers = Package::where(['type' => 'st', 'status' => true])->get();
        return view('public.sponsorship', compact('tiers'));
    }
    public function index()
    {
        //
        $sponsorships = Sponsorship::all();
        return view('adminV2.sponsorships.list', compact('sponsorships'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request->all());
        $package = Package::findOrFail($request->package_id);

        $validated = $request->validate([
            'brand_name'       => 'required|string|min:2|max:255',
            'contact_name'     => 'required|string|min:2|max:255',
            'contact_number'   => 'required|digits:10',
            'email'            => 'required|email|max:255',
            // 'file'             => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',

            // Optional:
            'social_link'         => 'nullable|url',
            'industry_category'   => 'nullable|string|max:255',
            'contact_designation' => 'nullable|string|max:255',
            'city_state'          => 'nullable|string|max:255',
            'budget_range'        => 'nullable|string|max:255',
            'product_service_details' => 'nullable|string',
            'hire_models'         => 'nullable|in:Yes,No,Maybe',
            'model_preference'    => 'nullable|in:Male,Female,Both',
            'handle_own_travel'   => 'nullable|in:Yes,No',
            'booth_setup'         => 'nullable|in:Yes,No',
            'special_requests'    => 'nullable|string',
            'heard_from'          => 'nullable|string|max:255',
        ]);

        // try {
        DB::transaction(function () use ($request, $validated, $package) {

            // Handle file upload
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $filename = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/sponsorships'), $filename);
                $validated['file_path'] = 'uploads/sponsorships/' . $filename;
            }

            $sponsor = $package->sponsorship()->create($validated);
            Mail::to(auth()->user()->email)->queue(new SponsorshipSubmitted($sponsor));
        });


        return back()->with('success', 'Thanks! We’ve received your sponsorship request.');
        // } catch (\Exception $e) {
        report($e);
        return back()->with('error', 'Something went wrong. Please try again.')->withInput();
        // }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $sponsorship = Sponsorship::with('sponsorshipTypes')->findOrFail($id);
        return view('adminV2.sponsorships.show', compact('sponsorship'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $sponsorship = Sponsorship::find($id);
        return view('adminV2.sponsorships.edit', compact('sponsorship'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($id);
        $sponsorship = Sponsorship::find($id);
        // dd($sponsorship->status);
        $sponsorship->update([
            'status' => $request->status,
            'show_on_home_page' => $request->has('show_on_home_page') ? true : false
        ]);

        // dd($sponsorship);

        Mail::to($sponsorship->email)->queue(new SponsorshipStatusChanged($sponsorship));

        return redirect()->route('sponsership.index')->with('success', 'Sponsorship status updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $sponsorship = Sponsorship::findOrFail($id);

        // If there's a pivot table, detach related types first (optional but clean)
        $sponsorship->sponsorshipTypes()->detach();

        $sponsorship->delete();

        return redirect()->route('sponsership.index')->with('success', 'Sponsorship deleted successfully.');
    }
}
