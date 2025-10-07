<?php

namespace App\Http\Controllers;

use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{

    public function index()
    {

        $heros = Hero::latest()->get();
        return view("adminV2.hero.index", compact("heros"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('adminV2.hero.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        // ✅ Store images (flat, not color-based)
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // foreach ($request->file('image') as $image) {
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/hero'), $filename);

            $product = Hero::create([
                'name' => $request->name,
                'is_active' => $request->is_active,
                'image' => 'uploads/hero/' . $filename
            ]);

            // dd($product);

            // }
        }

        return redirect()->route('hero.index')->with('success', 'Product created!');
    }

    /**
     * Display the specified resource.
     */

    public function show(Hero $hero) {}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hero $hero)
    {
        $hero = Hero::find($hero->id);
        return view('adminV2.hero.form', compact('hero'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hero $hero)
    {
        $hero->update($request->only([
            'name',
            'is_active'
        ]));


        // ✅ Replace old images if new uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            // Delete old images
            // foreach ($hero->images as $oldImage) {
            $oldPath = public_path($hero->image);
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
            // $oldImage->delete();
            // }

            // Save new images
            // foreach ($request->file('images') as $image) {
            $image = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/products'), $filename);

            $hero->image = 'uploads/products/' . $filename;
            $hero->save();
            // }
        }

        return redirect()->route('hero.index')->with('success', 'Hero updated!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hero $hero)
    {
        // Delete images from storage
        $oldPath = public_path($hero->image);
        if (file_exists($oldPath)) {
            unlink($oldPath);
        }
        $hero->delete();

        return redirect()->route('hero.index')->with('success', 'Hero deleted!');
    }
}
