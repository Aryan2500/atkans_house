<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Hero;
use App\Models\ModelProfile;
use App\Models\Product;
use App\Models\Sponsorship;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $featured = ModelProfile::where(['is_featured' => true, 'status' => 'approved'])->orderBy('created_at', 'desc')->get();

        // $upcomingEvents = Event::whereDate('end_date', '>=', Carbon::today())->where('show_on_home_page', true)
        $upcomingEvents = Event::where('show_on_home_page', true)
            ->orderBy('end_date')
            ->limit(10)
            ->get();

        $sponsorships = Sponsorship::where(['show_on_home_page' => true, 'status' => 'approved'])->get();
        $rampwalkEvent = Event::visibleOnRampwalk()->whereDate('end_date', '>=', Carbon::today())->latest()->orderBy('end_date')->first();

        $products = Product::with(['images'])->latest()->take(20)->get();

        $hero = Hero::where('is_active', true)->get();

        // dd($hero);

        return view('public.home', compact('featured', 'upcomingEvents', 'sponsorships', 'rampwalkEvent', 'products', 'hero'));
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
