<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subscribers = Subscriber::all();
        return view('admin.subscriber.index', compact('subscribers'));
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
        // dd($request->all());
        $validator = $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);

        Subscriber::create([
            'email' => $request->email,
        ]);

        return redirect()->back()->with('success', 'Subscribed Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subscriber $subscribe)
    {
        //


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscriber $subscribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subscriber $subscribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscriber $subscribe)
    {
        //
    }
}
