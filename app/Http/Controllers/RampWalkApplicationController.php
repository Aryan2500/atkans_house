<?php

namespace App\Http\Controllers;


use App\Mail\RampWalkRegistered;
use App\Mail\WelcomeUser;
use App\Models\Event;
use App\Models\RampWalkApplication;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class RampWalkApplicationController
{
    /**
     * Display a listing of the resource.
     */

    public function public_index()
    {

        $rampwalkEvent = Event::visibleOnRampwalk()->whereDate('end_date', '>=', Carbon::today())->latest()->orderBy('end_date')->first();
        // dd($rampwalkEvent);
        return view('public.rampwalk', compact('rampwalkEvent'));
    }

    public function index()
    {
        $applications = RampWalkApplication::with(['modelProfile.user', 'event'])->latest()->get();

        // dd($applications);
        return view('admin.applications.list', compact('applications'));
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
            'name'       => 'required|string|min:2',
            'email'      => 'required|email|unique:users,email',
            'gender'     => 'required|in:Male,Female,Other',
            'height'     => 'required|numeric',
            'weight'     => 'required|numeric',
            'category'   => 'required|string',
            'instagram'  => 'required|url',
            'phone'      => 'required|string',
            'portfolio'  => 'required|file|mimes:jpeg,png,pdf|max:2048',
        ]);

        // dd($request->all());
        try {
            DB::transaction(function () use ($request) {
                // Upload portfolio
                $filePath = null;
                if ($request->hasFile('portfolio')) {
                    $file = $request->file('portfolio');
                    $fileName = time() . '_' . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
                    $filePath = 'uploads/portfolios/' . $fileName;
                    $file->move(public_path('uploads/portfolios'), $fileName);
                }

                // Create user
                $user = User::create([
                    'name'     => $request->name,
                    'email'    => $request->email,
                    'gender'   => $request->gender,
                    'role'     => 'model',
                    'password' => Hash::make(Str::random(10)),
                ]);

                // Create related profile
                $profile = $user->modelProfile()->create([
                    'portfolio_path'  => $filePath,
                    'phone'           => $request->phone,
                    'instagram_link'  => $request->instagram,
                    'category'        => $request->category,
                    'height_cm'       => $request->height,
                    'weight_kg'       => $request->weight,
                    'status'          => 'pending',
                ]);

                // Optional: create rampwalk application if event_id is present
                if ($request->filled('event_id')) {
                    RampWalkApplication::create([
                        'model_profile_id'  => $profile->id,
                        'event_id'  => $request->event_id,
                    ]);

                    $event = Event::find($request->event_id);
                    Mail::to($user->email)->queue(new RampWalkRegistered($user, $event));
                } else {
                    Mail::to($user->email)->queue(new WelcomeUser($user));
                }
            });


            return back()->with('success', 'Thank you! Your registration has been received.');
        } catch (\Throwable $e) {
            return back()->with('error', 'Something went wrong. Please try again.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $application = RampWalkApplication::with(['modelProfile.user', 'event'])->findOrFail($id);

        return view('admin.applications.show', compact('application'));
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

    public function approve($id)
    {
        $application = RampWalkApplication::findOrFail($id);
        $application->status = 'approved';
        $application->save();

        return redirect()->back()->with('success', 'Application approved successfully.');
    }

    public function reject($id)
    {
        $application = RampWalkApplication::findOrFail($id);
        $application->status = 'rejected';
        $application->save();

        return redirect()->back()->with('error', 'Application rejected.');
    }
}
