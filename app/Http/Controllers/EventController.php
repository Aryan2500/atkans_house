<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Milestone;
use App\Models\Participation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EventController
{

    public function public_index()
    {
        $upcomingEvents = Event::whereDate('end_date', '>=', Carbon::today())
            ->orderBy('end_date')
            ->limit(10)
            ->get();
        return view('public.events', compact('upcomingEvents'));
    }
    /**
     * Display a listing of the resource.
     * 
     */
    public function index()
    {
        //
        $events = Event::all();
        $header = 'Events';
        return view('adminV2.events.index', compact('events', 'header'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd(config('constant.rule_types'));
        $milestones = Milestone::orderBy('created_at', 'desc')->get();
        // dd($milestones);
        return view('adminV2.events.form', compact('milestones'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required|string|max:255',
            'venue_note' => 'nullable|string|max:255',

            'hero_media_type' => 'required|in:image,video',
            'hero_media_url' => 'required|file|mimes:jpg,jpeg,png,mp4,mov,webm|max:20480',

            'cta_text' => 'nullable|string|max:255',
            'cta_link' => 'nullable|string|max:255',

            'short_description' => 'required|string|max:500',
            'brochure_url' => 'nullable|file|mimes:pdf|max:10240',

            'registration_deadline' => 'nullable|date|before_or_equal:start_date',
            'total_registered' => 'nullable|integer|min:0',
            'disclaimer' => 'nullable|string',
            // Stats
            'models_count' => 'nullable|string|max:50',
            'brands_count' => 'nullable|string|max:50',
            'event_stage' => 'required',
            'number_of_rounds' => 'nullable',
            'type' => 'required',

            // 'is_free_entry' => 'nullable|boolean',
            // 'has_media_coverage' => 'nullable|boolean',
            // 'has_on_site_hiring' => 'nullable|boolean',
        ]);

        // // Handle hero media upload
        // if ($request->hasFile('hero_media_url')) {
        //     $validated['hero_media_url'] = $request->file('hero_media_url')->store('events/media', 'public');
        // }

        // // Handle brochure upload
        // if ($request->hasFile('brochure_url')) {
        //     $validated['brochure_url'] = $request->file('brochure_url')->store('events/brochures', 'public');
        // }

        // Handle hero media upload
        if ($request->hasFile('hero_media_url')) {
            $heroFile = $request->file('hero_media_url');
            $heroFilename = time() . '_hero_' . uniqid() . '.' . $heroFile->getClientOriginalExtension();
            $heroFile->move(public_path('uploads/events/media'), $heroFilename);

            $validated['hero_media_url'] = 'uploads/events/media/' . $heroFilename;
        }

        // Handle brochure upload
        if ($request->hasFile('brochure_url')) {
            $brochureFile = $request->file('brochure_url');
            $brochureFilename = time() . '_brochure_' . uniqid() . '.' . $brochureFile->getClientOriginalExtension();
            $brochureFile->move(public_path('uploads/events/brochures'), $brochureFilename);

            $validated['brochure_url'] = 'uploads/events/brochures/' . $brochureFilename;
        }

        // Convert checkbox values (boolean) if not checked
        $validated['is_free_entry'] = $request->has('is_free_entry');
        $validated['show_on_rampwalk_registration'] = $request->has('show_on_rampwalk_registration');

        $validated['has_media_coverage'] = $request->has('has_media_coverage');
        $validated['has_on_site_hiring'] = $request->has('has_on_site_hiring');
        $validated['show_on_home_page'] = $request->has('show_on_home_page');
        $validated['milestone_id'] = $request->input('milestone');
        // Create the event
        Event::create($validated);

        return redirect()->route('event.index')->with('success', 'Event created successfully!');
    }


    /**
     * Display the specified resource.
     */

    public function public_show(string $id)
    {
        $event = Event::findOrFail($id);
        return view('public.event-details', compact('event'));
    }
    public function show(string $id)
    {
        //
        $event = Event::findOrFail($id);
        // $participations = Participation::where('event_id', $event->id)->get();
        return view('adminV2.events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $event = Event::findOrFail($id);
        // dd($event->milestone);
        $milestones = Milestone::orderBy('created_at', 'desc')->get();
        //  dd($milestones);
        return view('adminV2.events.form', compact('event', 'milestones'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {  
        //  dd($request->all());
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'location' => 'required|string|max:255',
            'venue_note' => 'nullable|string|max:255',

            'hero_media_type' => 'required|in:image,video',
            'hero_media_url' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,webm|max:50000',

            'short_description' => 'required|string|max:500',
            'brochure_url' => 'nullable|file|mimes:pdf|max:30240',
            'type' => 'required',
            'registration_deadline' => 'nullable|date|before_or_equal:start_date',
            'total_registered' => 'nullable|integer|min:0',
            'disclaimer' => 'nullable|string',
            // Stats
            'models_count' => 'nullable|string|max:50',
            'brands_count' => 'nullable|string|max:50',
            'event_stage' => 'required',
            'number_of_rounds' => 'nullable'

            // 'is_free_entry' => 'nullable|boolean',
            // 'has_media_coverage' => 'nullable|boolean',
            // 'has_on_site_hiring' => 'nullable|boolean',
        ]);

        // Handle file uploads (replace old only if new file uploaded)
        // if ($request->hasFile('hero_media_url')) {
        //     $validated['hero_media_url'] = $request->file('hero_media_url')->store('events/media', 'public');
        // } else {
        //     // Prevent overriding with null if no new file uploaded
        //     unset($validated['hero_media_url']);
        // }

        // if ($request->hasFile('brochure_url')) {
        //     $validated['brochure_url'] = $request->file('brochure_url')->store('events/brochures', 'public');
        // } else {
        //     unset($validated['brochure_url']);
        // }

        // Handle hero media upload
        if ($request->hasFile('hero_media_url')) {
            $heroFile = $request->file('hero_media_url');
            $heroFilename = time() . '_hero_' . uniqid() . '.' . $heroFile->getClientOriginalExtension();
            $heroFile->move(public_path('uploads/events/media'), $heroFilename);

            $validated['hero_media_url'] = 'uploads/events/media/' . $heroFilename;
        } else {
            // Prevent overriding with null if no new file uploaded
            unset($validated['hero_media_url']);
        }

        // Handle brochure upload
        if ($request->hasFile('brochure_url')) {
            $brochureFile = $request->file('brochure_url');
            $brochureFilename = time() . '_brochure_' . uniqid() . '.' . $brochureFile->getClientOriginalExtension();
            $brochureFile->move(public_path('uploads/events/brochures'), $brochureFilename);

            $validated['brochure_url'] = 'uploads/events/brochures/' . $brochureFilename;
        } else {
            unset($validated['brochure_url']);
        }


        // Convert checkboxes to booleans
        $validated['is_free_entry'] = $request->has('is_free_entry');
        $validated['show_on_rampwalk_registration'] = $request->has('show_on_rampwalk_registration');

        $validated['has_media_coverage'] = $request->has('has_media_coverage');
        $validated['has_on_site_hiring'] = $request->has('has_on_site_hiring');
        $validated['show_on_home_page'] = $request->has('show_on_home_page');
        $validated['milestone_id'] = $request->input('milestone');

        // dd($validated);
        // Update the event
        $event->update($validated);

        return redirect()->route('event.index')->with('success', 'Event updated successfully!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);

        // Delete photo file from storage if exists
        if ($event->hero_media_url && file_exists(storage_path('app/public/' . $event->hero_media_url))) {
            unlink(storage_path('app/public/' . $event->hero_media_url));
        }

        $event->delete();

        return redirect()->route('event.index')->with('success', 'Event deleted successfully.');
    }
}
