<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VoteImage;
use Illuminate\Http\Request;

class VoteImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function onboardParticipantsImage($id)
    {

        $user = User::find($id);
        $model = $user->modelProfile;
        // dd($model);
        return view('adminV2.events.onboard-participants-images', compact('user', 'model'));
    }
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(VoteImage $voteImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(VoteImage $voteImage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, VoteImage $voteImage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(VoteImage $voteImage)
    {
        //
    }
}
