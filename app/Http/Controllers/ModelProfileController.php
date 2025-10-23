<?php

namespace App\Http\Controllers;

use App\Models\ModelProfile;
use App\Service\ModelProfileService;
use Illuminate\Http\Request;

class ModelProfileController extends Controller
{
    protected $service;

    public function __construct(ModelProfileService $service)
    {
        $this->service = $service;
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->service->create($request);
        return redirect()->back()->with('success', 'Profile created successfully!');
    }

    public function update(Request $request,  $id)
    {
        // dd($id);
        $profile = ModelProfile::find($id);

        $this->service->update($request, $profile);
        $profile->update(['is_profile_completed' => 1]);
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function uploadImage(Request $request)
    {
        $this->service->handlePhotos($request, auth()->user()->modelProfile);
        return redirect()->back()->with('success', 'Photos uploaded successfully!');
    }
}
