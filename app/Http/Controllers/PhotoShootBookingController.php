<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Models\PhotoShootBooking;
use Illuminate\Http\Request;

class PhotoShootBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function public_index()
    {
        $packages = Package::where(['status' => true, 'type' => 'pp'])->get();
        return view('public.photoshoot', compact('packages'));
    }

    public function index()
    {
        //
        $bookings = PhotoShootBooking::all();
        foreach ($bookings as $booking) {
            $booking->add_ons = json_decode($booking->add_ons, true);
        }
        // dd($bookings);
        return view('adminV2.shootbookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $packages = Package::all();
        return view('booking.create', compact('packages'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $package = Package::findOrFail($request->package_id);
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
            'package_id' => 'required|exists:packages,id',
            'shoot_date' => 'required|date',
            'notes' => 'nullable|string',
            'add_ons' => 'nullable|array',
        ]);

        $validated['add_ons'] = json_encode($request->add_ons ?? []);

        $booking = $package->bookings()->create($validated);

        return back()->with('success', 'Booking received! We will contact you shortly.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PhotoShootBooking $booking)
    {
        try {
            $booking->delete();

            return redirect()->route('bookings.index')
                ->with('success', 'Booking deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->route('bookings.index')
                ->with('error', 'Failed to delete the booking. Please try again.');
        }
    }
}
