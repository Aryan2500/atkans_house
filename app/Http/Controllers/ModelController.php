<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreModelRequest;
use App\Models\ModelProfile;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ModelController
{
    public function public_index(Request $request)
    {
        // $models = ModelProfile::with('user')
        //     ->where('status', 'approved')
        //     ->when($request->city, fn($q) => $q->where('city', 'LIKE', '%' . $request->city . '%'))
        //     ->when($request->category, fn($q) => $q->where('category', $request->category))
        //     ->when($request->budget, function ($q) use ($request) {
        //         if ($request->budget === 'low') {
        //             $q->where('expected_budget', '<', 5000);
        //         } elseif ($request->budget === 'mid') {
        //             $q->whereBetween('expected_budget', [5000, 10000]);
        //         } elseif ($request->budget === 'high') {
        //             $q->where('expected_budget', '>', 10000);
        //         }
        //     })
        //     ->when($request->age, function ($q) use ($request) {
        //         $ageRange = explode('-', $request->age);
        //         if (count($ageRange) === 2) {
        //             $from = Carbon::now()->subYears($ageRange[1])->format('Y-m-d');
        //             $to = Carbon::now()->subYears($ageRange[0])->format('Y-m-d');
        //             $q->whereBetween('dob', [$from, $to]);
        //         }
        //     })
        //     ->when($request->gender, function ($q) use ($request) {
        //         // Filter through related user's gender
        //         $q->whereHas('user', fn($userQ) => $userQ->where('gender', $request->gender));
        //     })->get();


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
                    $from = \Carbon\Carbon::now()->subYears($ageRange[1])->format('Y-m-d');
                    $to = \Carbon\Carbon::now()->subYears($ageRange[0])->format('Y-m-d');

                    // 👇 Now filter through the related `user` table instead of ModelProfile
                    $q->whereHas('user', function ($userQ) use ($from, $to) {
                        $userQ->whereBetween('dob', [$from, $to]);
                    });
                }
            })
            ->when($request->gender, function ($q) use ($request) {
                // Filter through related user's gender
                $q->whereHas('user', fn($userQ) => $userQ->where('gender', $request->gender));
            })
            ->get();


        return view('public.models', compact('models'));
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $models = ModelProfile::with('user')->latest()->get();
        return view('adminV2.models.list', compact('models'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('adminV2.models.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreModelRequest $request)
    {
        // dd($request->all());
        DB::beginTransaction();

        try {
            // ✅ Try to find existing user
            $user = User::where('email', $request->email)->first();

            if ($user) {
                // 🧩 Update user details if found
                $user->update([
                    'name' => $request->name,
                    'dob' => $request->dob,
                    'phone' => $request->phone,
                ]);
            } else {
                // 🆕 Create new user if not found
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'dob' => $request->dob,
                    'phone' => $request->phone,
                    'password' => bcrypt(Str::random(8)),
                ]);
            }

            // ✅ Check if this user already has a ModelProfile
            if ($user->modelProfile) {
                return back()->with('error', 'This user already has a model profile.')->withInput();
            }

            // ✅ Handle photo upload
            $photoPath = null;
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $filename = time() . '_model_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/models/media'), $filename);
                $photoPath = 'uploads/models/media/' . $filename;
            }

            // ✅ Create ModelProfile using relation
            $user->modelProfile()->create([
                'city' => $request->city,
                'state' => $request->state,
                'instagram_link' => $request->instagram_link,
                'height_cm' => $request->height_cm,
                'weight_kg' => $request->weight_kg,
                'status' => $request->status,
                'experience' => $request->experience,
                'biography' => $request->biography,
                'availability' => $request->availability,
                'featured' => $request->has('featured'),
                'photo' => $photoPath,
            ]);

            DB::commit();

            return redirect()->route('models.index')->with('success', 'Model created successfully.');
        } catch (\Exception $e) {
            DB::rollBack();

            if (Str::contains($e->getMessage(), 'Duplicate entry')) {
                return back()->with('error', 'Email already exists. Please try again.')->withInput();
            }

            return back()->with('error', 'Failed to create model: ' . $e->getMessage())->withInput();
        }
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
        // dd($request->all());

        try {
            $request->validate([
                'status' => 'required|in:pending,approved,rejected',
                'photo' => 'nullable|image|max:15048',
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

            $model->user->name = $request->name;
            $model->user->email = $request->email;
            $model->user->dob = $request->dob;
            $model->user->phone = $request->phone;
            $model->state = $request->state;
            $model->city = $request->city;
            $model->user->save();
            $model->status = $request->status;
            $model->experience = $request->experience;
            $model->biography = $request->biography;
            $model->availability = $request->availability;
            $model->is_featured = $request->has('featured');
            $model->save();

            return redirect()->route('models.index')->with('success', 'Model updated successfully.');
        } catch (\Exception $e) {
            if (Str::contains($e->getMessage(), 'Duplicate entry')) {
                return back()->with('error', 'Email already exists. Please try again.')->withInput();
            }
            // return redirect()->back()->with('error', 'Failed to update the model. Please try again.'. $e->getMessage());
        }
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
