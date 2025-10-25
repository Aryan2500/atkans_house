@extends('adminV2.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('adminV2.partials.alerts')

            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4 class="card-title mb-0">
                        {{ isset($event) ? 'Edit Event' : 'Add New Event' }}
                    </h4>
                    <div class="ml-auto">
                        <!-- Add New Criteria Button -->
                        <button type="button" class="btn btn-primary btn-sm mr-2" data-toggle="modal"
                            data-target="#addCriteriaModal">
                            <i class="fas fa-plus"></i> Add New Milestone
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data"
                        action="{{ isset($event) ? route('event.update', $event->id) : route('event.store') }}">
                        @csrf
                        @if (isset($event))
                            @method('PUT')
                        @endif

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="type" class="form-label">Event Type</label>
                                <select name="type" class="form-control" required>
                                    <option value="Rampwalk"
                                        {{ old('type', $event->type ?? '') == 'Rampwalk' ? 'selected' : '' }}>
                                        Rampwalk</option>
                                    <option value="Show"
                                        {{ old('type', $event->type ?? '') == 'Show' ? 'selected' : '' }}>
                                        Show</option>
                                </select>
                            </div>
                        </div>
                        {{-- Title & Subtitle --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="title" class="form-label">Event Title</label>
                                <input type="text" name="title" class="form-control"
                                    value="{{ old('title', $event->title ?? '') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="subtitle" class="form-label">Subtitle</label>
                                <input type="text" name="subtitle" class="form-control"
                                    value="{{ old('subtitle', $event->subtitle ?? '') }}">
                            </div>
                        </div>

                        {{-- Date Range --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="datetime-local" name="start_date" class="form-control"
                                    value="{{ old('start_date', isset($event->start_date) ? \Carbon\Carbon::parse($event->start_date)->format('Y-m-d\TH:i') : '') }}"
                                    required>
                            </div>

                            <div class="col-md-6">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="datetime-local" name="end_date" class="form-control"
                                    value="{{ old('end_date', isset($event->end_date) ? \Carbon\Carbon::parse($event->end_date)->format('Y-m-d\TH:i') : '') }}"
                                    required>
                            </div>

                        </div>

                        {{-- Location & Venue Note --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" name="location" class="form-control"
                                    value="{{ old('location', $event->location ?? '') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="venue_note" class="form-label">Venue Note</label>
                                <input type="text" name="venue_note" class="form-control"
                                    value="{{ old('venue_note', $event->venue_note ?? '') }}">
                            </div>
                        </div>

                        {{-- Hero Media --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="hero_media_type" class="form-label">Hero Media Type</label>
                                <select name="hero_media_type" class="form-control" required>
                                    <option value="image"
                                        {{ old('hero_media_type', $event->hero_media_type ?? '') == 'image' ? 'selected' : '' }}>
                                        Image</option>
                                    <option value="video"
                                        {{ old('hero_media_type', $event->hero_media_type ?? '') == 'video' ? 'selected' : '' }}>
                                        Video</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="hero_media_url" class="form-label">Hero Media File</label>
                                <input type="file" name="hero_media_url" class="form-control"
                                    {{ isset($event) ? '' : 'required' }}>

                                @if (isset($event) && $event->hero_media_url)
                                    <small class="text-muted">
                                        Current:
                                        <a href="{{ asset($event->hero_media_url) }}" target="_blank">
                                            View File
                                        </a>
                                    </small>
                                @endif
                            </div>

                        </div>

                        {{-- Brochure & Registration Deadline --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="brochure_url" class="form-label">Brochure (PDF)</label>
                                <input type="file" name="brochure_url" class="form-control" accept=".pdf">

                                @if (isset($event) && $event->brochure_url)
                                    <small class="text-muted">
                                        Current:
                                        <a href="{{ asset($event->brochure_url) }}" target="_blank">
                                            View Brochure
                                        </a>
                                    </small>
                                @endif
                            </div>

                            <div class="col-md-6">
                                <label for="registration_deadline" class="form-label">Registration Deadline</label>
                                <input type="datetime-local" name="registration_deadline" class="form-control"
                                    value="{{ old('registration_deadline', isset($event->registration_deadline) ? \Carbon\Carbon::parse($event->registration_deadline)->format('Y-m-d\TH:i') : '') }}">
                            </div>
                        </div>

                        {{-- Models Expected --}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="models_count" class="form-label">Models Expected</label>
                                <input type="text" name="models_count" class="form-control"
                                    value="{{ old('models_count', $event->models_count ?? '2000+') }}">
                            </div>

                            <div class="col-md-6">
                                <label for="models_count" class="form-label">Select MileStone</label>
                                <select name="milestone" class="form-control" id="">
                                    <option value=""> Select </option>
                                    <option value="0">None</option>
                                    @foreach ($milestones as $milestone)
                                        <option value="{{ $milestone->id }}"
                                            {{ old('milestone', $event->milestone->id ?? '') == $milestone->id ? 'selected' : '' }}>
                                            {{ $milestone->rule_name }} | {{ Str::upper($milestone->rule_type) }}
                                            {{ Str::upper($milestone->operator) }}
                                            {{ $milestone->value }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>


                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="Status" class="form-label">Select Status</label>
                                <select name="event_stage" id="event_stage" class="form-control" required>
                                    <option value="published"
                                        {{ old('event_stage', $event->event_stage ?? 'published') == 'published' ? 'selected' : '' }}>
                                        Published</option>
                                    <option value="closed"
                                        {{ old('event_stage', $event->event_stage ?? '') == 'closed' ? 'selected' : '' }}>
                                        Closed</option>
                                    <option value="upcoming"
                                        {{ old('event_stage', $event->event_stage ?? '') == 'upcoming' ? 'selected' : '' }}>
                                        Upcoming</option>
                                    <option value="cancelled"
                                        {{ old('event_stage', $event->event_stage ?? '') == 'cancelled' ? 'selected' : '' }}>
                                        Cancelled</option>
                                    <option value="running"
                                        {{ old('event_stage', $event->event_stage ?? '') == 'running' ? 'selected' : '' }}>
                                        Running</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                {{-- <label for='number_of_rounds' class="form-label">Number of Rounds</label> --}}
                                <input type="hidden" name="number_of_rounds" class="form-control"
                                    value="{{ old('number_of_rounds', $event->number_of_rounds ?? '0') }}">
                            </div>
                        </div>

                        {{-- Short Description --}}
                        <div class="mb-3">
                            <label for="short_description" class="form-label">Short Description</label>
                            <textarea name="short_description" class="form-control" rows="3" required>{{ old('short_description', $event->short_description ?? '') }}</textarea>
                        </div>

                        {{-- Toggles --}}
                        <div class="form-check mb-2">
                            <input type="checkbox" name="is_free_entry" class="form-check-input" id="is_free_entry"
                                {{ old('is_free_entry', $event->is_free_entry ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_free_entry">Free Ramp Walk Entry</label>
                        </div>

                        <div class="form-check mb-2">
                            <input type="checkbox" name="show_on_home_page" class="form-check-input"
                                id="show_on_home_page"
                                {{ old('show_on_home_page', $event->show_on_home_page ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="show_on_home_page">Show on Home Page</label>
                        </div>

                        <div class="form-check mb-2">
                            <input type="checkbox" name="show_on_rampwalk_registration" class="form-check-input"
                                id="show_on_rampwalk_registration"
                                {{ old('show_on_rampwalk_registration', $event->show_on_rampwalk_registration ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="show_on_rampwalk_registration">Show On Rampwalk
                                Registration Page</label>
                        </div>

                        <div class="form-check mb-2">
                            <input type="checkbox" name="has_media_coverage" class="form-check-input"
                                id="has_media_coverage"
                                {{ old('has_media_coverage', $event->has_media_coverage ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="has_media_coverage">Full Media Coverage</label>
                        </div>

                        <div class="form-check mb-4">
                            <input type="checkbox" name="has_on_site_hiring" class="form-check-input"
                                id="has_on_site_hiring"
                                {{ old('has_on_site_hiring', $event->has_on_site_hiring ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="has_on_site_hiring">On-site Hiring + Brand
                                Collabs</label>
                        </div>

                        {{-- Disclaimer --}}
                        <div class="mb-3">
                            <label for="disclaimer" class="form-label">Disclaimer</label>
                            <textarea name="disclaimer" class="form-control" rows="2">{{ old('disclaimer', $event->disclaimer ?? 'Only shortlisted applicants will be contacted') }}</textarea>
                        </div>

                        <button class="btn btn-success btn-block" type="submit">
                            {{ isset($event) ? '📝 Update Event' : '📥 Save Event' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @include('adminV2.events.milestone-modal')
@endsection
