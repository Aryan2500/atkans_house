<?php

namespace App\Http\Controllers;

use App\Models\Influencer;
use App\Models\Product;
use Illuminate\Http\Request;

class InfluencerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $influencers = Influencer::all();
        // dd($influencers);
        return view('admin.influencersponsors.list', compact('influencers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $products = Product::all();
        return view('public.become-sponser', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|min:2',
            'insta_profile_link' => 'required|string',
            'no_of_followers' => 'required|numeric',
            'other_social_media' => 'nullable',
            'phone_number' => 'required|string|min:10',
            'email' => 'required|email',
            'interested_product' => 'required|not_in:Choose',
        ]);

        // Save to DB
        try {
            $exists = Influencer::where('email', $validated['email'])->exists();

            if ($exists) {
                return redirect()->back()->withErrors('You have already applied using this email.');
            }
            Influencer::create([
                'name' => $validated['name'],
                'instagram_profile' => $validated['insta_profile_link'],
                'followers' => $validated['no_of_followers'],
                'other_social_media' => $validated['other_social_media'],
                'phone' => $validated['phone_number'],
                'email' => $validated['email'],
                'interested_product' => $validated['interested_product'],

            ]);
            return redirect()->back()->with('success', 'Application submitted successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors(['error' => $th->getMessage()])->withInput();
        }
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
        $influencer = Influencer::findOrFail($id);
        return view('admin.influencersponsors.edit', compact('influencer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            $influencer = Influencer::findOrFail($id);

            $influencer->update([
                'status' => $request->status
            ]);

            return redirect()->back()->with('success', 'Influencer updated successfully!');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Update failed: ' . $th->getMessage());
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            $influencer = Influencer::findOrFail($id);
            $influencer->delete();

            return redirect()->back()->with('success', 'Influencer deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Failed to delete influencer: ' . $th->getMessage());
        }
    }
}
