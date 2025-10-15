<?php

namespace App\Http\Controllers;

use App\Mail\MilestoneMail;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CheckEligiblityController extends Controller
{
    //

    function checkEligiblityView(Request $request)
    {
        $uId = $request->user_id;
        $eId = $request->event_id;

        if ($uId == null || $eId == null) {
            return redirect()->back();
        }
        // dd($uId);
        $user = User::find($uId);
        $event = Event::find($eId);

        if ($user == null || $event == null) {
            return redirect()->back();
        }

        $from_date = $request->from_date;
        $to_date = $request->to_date;

        // Start query on user's orders
        $ordersQuery = $user->orders();

        if ($from_date && $to_date) {
            $from = \Carbon\Carbon::parse($from_date)->startOfDay();
            $to   = \Carbon\Carbon::parse($to_date)->endOfDay();

            $ordersQuery->whereBetween('created_at', [$from, $to]);
        }

        // Get the filtered results
        $filteredOrders = $ordersQuery->get();


        $lfrom_date = $request->lfrom_date;
        $lto_date = $request->lto_date;

        // Start query on user's orders
        $loginLogsQuery = $user->loginLogs();

        if ($lfrom_date && $lto_date) {
            $lfrom = \Carbon\Carbon::parse($lfrom_date)->startOfDay();
            $lto   = \Carbon\Carbon::parse($lto_date)->endOfDay();

            $loginLogsQuery->whereBetween('created_at', [$lfrom, $lto]);
        }

        // Get the filtered results
        $filterLoginCounts = $loginLogsQuery->get();

        return  view('adminV2.events.check-eligiblity', compact('user', 'event', 'filteredOrders', 'filterLoginCounts'));
    }

    function sendMilestoneEmail(Request $request)
    {
        // dd($request->all());
        $user = User::find($request->user_id);
        $event = Event::find($request->event_id);
        Mail::to($request->recipient)->send(new MilestoneMail($event, $user, $request->subject, $request->message));

        return redirect()->back()->with('success', 'Email sent successfully!');
    }
}
