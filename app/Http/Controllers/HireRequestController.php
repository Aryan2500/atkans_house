<?php

namespace App\Http\Controllers;

use App\Models\HireRequest;
use App\Models\ModelProfile;
use Illuminate\Http\Request;

class HireRequestController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $hireRequests  = HireRequest::with('model.user')->get();
        // dd($hireRequests);
        return view('admin.hirerequest.index', compact('hireRequests'));
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
        $request->validate([
            'model_id'   => 'required|exists:models,id',
            'name'       => 'required|string|min:2',
            'shoot'      => 'required|string',
            'phone'      => 'required|digits_between:7,15',
            'email'      => 'required|email',
            'date'       => 'required|date',
            'time'       => 'required',
            'location'   => 'required|string',
            'message'    => 'required|string|min:5',
        ]);

        // Find the model instance
        $model = ModelProfile::findOrFail($request->model_id);

        // Create the hire request through the relationship
        $model->hireRequests()->create([
            'client_name'    => $request->name,
            'client_email'   => $request->email,
            'client_phone'   => $request->phone,
            'shoot_info'     => $request->message,
            'location'       => $request->location,
            'shoot_type'     => $request->shoot,
            'scheduled_date' => $request->date . ' ' . $request->time,
            // 'status' => 'pending',
            // 'payment_status' => 'pending',
        ]);

        return back()->with('success', 'Hire request sent successfully!');
    }

    public function updateStatus($id, $status)
    {
        // Allow only these two statuses
        if (!in_array($status, ['approved', 'rejected'])) {
            return redirect()->back()->with('error', 'Invalid status.');
        }

        $request = HireRequest::findOrFail($id);
        $request->status = $status;
        $request->save();

        return redirect()->back()->with('success', 'Request status updated to ' . ucfirst($status) . '.');
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
