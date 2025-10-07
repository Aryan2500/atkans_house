<?php

namespace App\Http\Controllers;

use App\Models\ModelProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ModelController
{
    public function public_index(Request $request)
    {
        $models = ModelProfile::with('user')
            ->where('status', 'approved')
            ->when($request->city, fn($q) => $q->where('city', 'LIKE', '%' . $request->city . '%'))
            ->when($request->category, fn($q) => $q->where('category', $request->category))
            ->when($request->budget, function ($q) use ($request) {
                if ($request->budget === 'low') {
                    $q->where('expected_budget', '<', 5000);
                } elseif ($request->budget === 'mid') {
                    $q->whereBetween('expected_budget', [5000, 10000]);
                } elseif ($request->budget === 'high') {
                    $q->where('expected_budget', '>', 10000);
                }
            })
            ->when($request->age, function ($q) use ($request) {
                $ageRange = explode('-', $request->age);
                if (count($ageRange) === 2) {
                    $from = Carbon::now()->subYears($ageRange[1])->format('Y-m-d');
                    $to = Carbon::now()->subYears($ageRange[0])->format('Y-m-d');
                    $q->whereBetween('dob', [$from, $to]);
                }
            })
            ->when($request->gender, function ($q) use ($request) {
                // Filter through related user's gender
                $q->whereHas('user', fn($userQ) => $userQ->where('gender', $request->gender));
            })->get();

        return view('public.models', compact('models'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $models = ModelProfile::with('user')->get();
        return view('adminV2.models.list', compact('models'));
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


    public function public_show(string $id)
    {
        $model = ModelProfile::with('user')->where('status', 'approved')->find($id);
        return view('public.profile', compact('model'));
    }

    public function show(string $id)
    {
        $model = ModelProfile::with('user')->find($id);
        return view('adminV2.models.show', compact('model'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $model = ModelProfile::with('user')->find($id);
        return view('adminV2.models.edit', compact('model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|in:pending,approved,rejected',
            'photo' => 'nullable|image|max:2048',
        ]);

        $model = ModelProfile::findOrFail($id);

        if ($request->hasFile('photo')) {
            // Optional: delete old photo
            if ($model->photo && file_exists(public_path($model->photo))) {
                unlink(public_path($model->photo));
            }

            $modelImage = $request->file('photo');
            $modelImageName = time() . '_model_profile_' . uniqid() . '.' . $modelImage->getClientOriginalExtension();
            $modelImage->move(public_path('uploads/models/media'), $modelImageName);

            $model->photo = 'uploads/models/media/' . $modelImageName;
        }

        $model->status = $request->status;
        $model->is_featured = $request->has('featured');
        $model->save();

        return redirect()->route('models.index')->with('success', 'Model updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model = ModelProfile::findOrFail($id);

        // Delete photo file from storage if exists
        if ($model->photo && file_exists(storage_path('app/public/' . $model->photo))) {
            unlink(storage_path('app/public/' . $model->photo));
        }

        $model->delete();

        return redirect()->route('models.index')->with('success', 'Model deleted successfully.');
    }
}
