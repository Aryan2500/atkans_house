<?php

namespace App\Http\Controllers;

use App\Models\StoryContest;
use Illuminate\Http\Request;

class StoryContestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $storyContests = StoryContest::all();
        return view('admin.storycontest.list', compact('storyContests'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('public.story-contest');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'username' => 'required|string|min:2',
            'instagram_link' => 'required|url',
            'photo' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);


        $path = '';


        // ✅ Store images  
        if ($request->hasFile('photo')) {
            $filename = time() . '_' . uniqid() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('uploads/story_contest'), $filename);
            $path = 'uploads/story_contest/' . $filename;
        }

        StoryContest::create([
            'username' => $request->username,
            'instagram_link' => $request->instagram_link,
            'photo' => $path,
        ]);

        return redirect()->back()->with('success', 'Entry submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(StoryContest $storyContest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $storyContest = StoryContest::findOrFail($id);
        return view('admin.storycontest.edit', compact('storyContest'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        try {
            $storyContest = StoryContest::findOrFail($id);
            // dd($request->is_active);
            $storyContest->update([
                'is_active' => $request->is_active
            ]);

            return redirect()->back()->with('success', 'Story Entry updated successfully!');
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
            $storyContest = StoryContest::findOrFail($id);
            $storyContest->delete();

            return redirect()->back()->with('success', 'Story Entry deleted successfully.');
        } catch (\Throwable $th) {
            return redirect()->back()->withErrors('Failed to delete Story Entry: ' . $th->getMessage());
        }
    }
}
