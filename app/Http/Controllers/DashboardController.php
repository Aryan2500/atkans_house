<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\HireRequest;
use App\Models\ModelProfile;
use App\Models\Order;
use App\Models\Permission;
use App\Models\Product;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(session('permissions'));
        // $now = Carbon::today();
        $upcomingEvents = Event::where('event_stage', 'published')
            ->orderBy('end_date')
            ->limit(10)
            ->get();

        // dd($upcomingEvents);
        return view('adminV2.dashboard.index', [
            'totalModels' => ModelProfile::count(),
            'pendingHires' => HireRequest::where('status', 'pending')->count(),
            'totalEvents' => Event::all()->count(),
            'products' => Product::count(),
            'orders' => Order::count(),
            'earnings' => Order::where('payment_status', 'paid')->sum('total'),
            'upcomingEvents' => $upcomingEvents,
            'header' => 'Dashboards'
        ]);
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
        //
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
    public function destroy(string $id)
    {
        //
    }
}
