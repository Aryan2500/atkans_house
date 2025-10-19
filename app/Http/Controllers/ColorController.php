<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Colors;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $colors = Color::all();

        // Return only the HTML partial (Blade snippet)
        return view('adminV2.partials.color-list', compact('colors'))->render();
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
        try {
            $exists = Color::where('name', $request->name)->exists();

            if ($exists) {
                return response()->json(['error' => 'You have already  this size  name !'], 400);
                return redirect()->back()->withErrors('You have already  this size  name !');
            }
            Color::create([
                'name' => $request->name,
                'hex_code' => $request->hex_code
            ]);
            return redirect()->back()->with('success', 'Size added successfully!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->validator);
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
