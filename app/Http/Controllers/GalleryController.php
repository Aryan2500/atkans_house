<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;

class GalleryController extends Controller
{

    public function public_index()
    {
        $galleries = Gallery::where('is_active', true)->latest()->get();
        // dd($galleries);
        return view('public.gallery', compact('galleries'));
    }

    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('admin.gallery.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.gallery.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/gallery'), $filename);

            $validated['image_path'] = 'uploads/gallery/' . $filename;
        }

        Gallery::create($validated);

        return redirect()->route('gallery.index')->with('success', 'Gallery item added successfully!');
    }

    public function edit(Gallery $gallery)
    {
        return view('admin.gallery.form', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'description' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();

            $file->move(public_path('uploads/gallery'), $filename);

            $validated['image_path'] = 'uploads/gallery/' . $filename;
        }

        $gallery->update($validated);

        return redirect()->route('gallery.index')->with('success', 'Gallery item updated!');
    }

    public function destroy(Gallery $gallery)
    {
        // Delete image file if it exists
        if ($gallery->image_path && file_exists(public_path($gallery->image_path))) {
            unlink(public_path($gallery->image_path));
        }

        // Delete database record
        $gallery->delete();

        return back()->with('success', 'Gallery item and image deleted.');
    }
}
