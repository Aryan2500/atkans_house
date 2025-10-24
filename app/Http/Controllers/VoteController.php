<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Vote;
use App\Models\Win;
use Illuminate\Http\Request;

class VoteController extends Controller
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

        try {
            $event = Event::find($request->event_id);
            if ($event->event_stage == 'running') {
                Vote::create([
                    'participation_id' => $request->participation_id,
                    'event_id' => $request->event_id,
                    'voter_id' => $request->voter_id
                ]);
                return redirect()->back()->with('success', 'Your Vote saved successfully!');
            } else {
                return redirect()->back()->with('error', 'Sorry ! You are not allowed to vote now !');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong !');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Vote $vote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vote $vote)
    {
        //
    }

    public function declareWinner(Request $request)
    {
        // dd($request->user_id);
        $oldWinnerRecord = Win::where('event_id', $request->event_id);
        if ($oldWinnerRecord->count() > 0) {
            $oldWinnerRecord->delete();
        }
        Win::create([
            'event_id' => $request->event_id,
            'user_id' => $request->user_id,
        ]);
        return redirect()->back()->with('success', 'Winner Declared successfully!');

        // dd($winnerRecord);
    }
}
