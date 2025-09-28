<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // Validation
        $request->validate([
            'rule_name' => 'required|string|max:255',
            'rule_type' => 'required|string|in:' . implode(',', array_keys(config('constant.rule_types'))),
            'operator'  => 'required|string',

        ]);

        // dd($request->all());
        // Determine value type based on rule_type
        $numberRules = ['min_purchase', 'max_purchase', 'purchase_count', 'min_login_count', 'order_within_days'];
        $dateRules   = ['signup_before_date', 'signup_after_date'];
        $booleanRules = ['profile_completed'];

        if (in_array($request->rule_type, $numberRules)) {
            $value = (float) $request->input('num_value'); // convert to number
        } elseif (in_array($request->rule_type, $dateRules)) {
            $value = \Carbon\Carbon::parse($request->input('date_value'))->format('Y-m-d'); // convert to date
        } elseif (in_array($request->rule_type, $booleanRules)) {
            $value = (bool) $request->input('bool_value'); // convert to boolean
        }

        // dd($value);
        // Save to database
        $criteria = new Milestone(); // assuming your model is Criteria
        $criteria->rule_name = $request->rule_name;
        $criteria->rule_type = $request->rule_type;
        $criteria->operator  = $request->operator;
        $criteria->value     = $value;
        $criteria->save();

        return redirect()->back()->with('success', 'Milestone saved successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(Milestone $milestone)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Milestone $milestone)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Milestone $milestone)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Milestone $milestone)
    {
        // Delete the milestone
        $milestone->delete();
        // Redirect back with success message
        return redirect()->back()->with('success', 'Milestone deleted successfully!');
    }
}
