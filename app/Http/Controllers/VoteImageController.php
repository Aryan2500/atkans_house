<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\OnboardImages;
use App\Models\Participation;
use App\Models\User;
use App\Models\Vote;
use App\Models\VoteImage;
use App\Models\Win;
use Illuminate\Http\Request;

class VoteImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function onboardParticipantsImage(Request $request)
    {

        $event_id = $request->input('event_id');

        $user_id = $request->input('user_id');

        try {
            $user = User::find($user_id);
            $model = $user->modelProfile;
            $event = Event::find($event_id);
            // dd($model);
            return view('adminV2.events.onboard-participants-images', compact('user', 'model', 'event'));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function doOnboardParticipantsImage(Request $request)
    {

        // dd($request->all());
        OnboardImages::create([
            'user_id' => $request->user_id,
            'event_id' => $request->event_id,
            'model_photo_id' => $request->image_id
        ]);

        Participation::where('event_id', $request->event_id)->where('user_id', $request->user_id)->update([
            'is_approved' => 1
        ]);
        return redirect()->route('event.show',  $request->event_id)->with('success', 'Candidate onboarded successfully!');
    }


    public function removeOnboardParticipants(Request $request)
    {
        // dd($request->all());
        OnboardImages::where([
            'user_id' => $request->user_id,
            'event_id' => $request->event_id,
        ])->delete();

        $participation = Participation::where('event_id', $request->event_id)->where('user_id', $request->user_id)->first();

        $participation->update([
            'is_approved' => 0
        ]);

        Vote::where([
            'event_id' => $request->event_id,
            'participation_id' => $participation->id,
        ])->delete();

        Win::where([
            'event_id' => $request->event_id,
            'user_id' =>  $request->user_id
        ])->delete();
        return redirect()->route('event.show',  $request->event_id)->with('success', 'Candidate removed successfully!');
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
        dd($request->all());
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
