@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('admin.partials.alerts')

            <div class="card">
                <div class="card-header">
                    <h4>{{ isset($event) ? 'Edit Event' : 'Add New Event' }}</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST" enctype="multipart/form-data"
                        action="{{ isset($event) ? route('event.update', $event->id) : route('event.store') }}">
                        @csrf
                        @if (isset($event))
                            @method('PUT')
                        @endif

                        {{-- Title & Subtitle --}}
                        <div class="form-group">
                            <label for="title">Event Title</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $event->title ?? '') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="subtitle">Subtitle</label>
                            <input type="text" name="subtitle" class="form-control"
                                value="{{ old('subtitle', $event->subtitle ?? '') }}">
                        </div>

                        {{-- Date Range --}}
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" class="form-control"
                                    value="{{ old('start_date', $event->start_date ?? '') }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" class="form-control"
                                    value="{{ old('end_date', $event->end_date ?? '') }}" required>
                            </div>
                        </div>

                        {{-- Location & Venue Note --}}
                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="text" name="location" class="form-control"
                                value="{{ old('location', $event->location ?? '') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="venue_note">Venue Note</label>
                            <input type="text" name="venue_note" class="form-control"
                                value="{{ old('venue_note', $event->venue_note ?? '') }}">
                        </div>

                        {{-- Hero Media --}}
                        <div class="form-group">
                            <label for="hero_media_type">Hero Media Type</label>
                            <select name="hero_media_type" class="form-control" required>
                                <option value="image"
                                    {{ old('hero_media_type', $event->hero_media_type ?? '') == 'image' ? 'selected' : '' }}>
                                    Image</option>
                                <option value="video"
                                    {{ old('hero_media_type', $event->hero_media_type ?? '') == 'video' ? 'selected' : '' }}>
                                    Video</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="hero_media_url">Hero Media File</label>
                            <input type="file" name="hero_media_url" class="form-control-file"
                                {{ isset($event) ? '' : 'required' }}>
                            @if (isset($event) && $event->hero_media_url)
                                <small class="text-muted">Current: {{ $event->hero_media_url }}</small>
                            @endif
                        </div>

                        {{-- CTA --}}
                        <div class="form-group">
                            <label for="cta_text">CTA Button Text</label>
                            <input type="text" name="cta_text" class="form-control"
                                value="{{ old('cta_text', $event->cta_text ?? 'Apply Now') }}">
                        </div>

                        <div class="form-group">
                            <label for="cta_link">CTA Link</label>
                            <input type="text" name="cta_link" class="form-control"
                                value="{{ old('cta_link', $event->cta_link ?? '') }}">
                        </div>

                        {{-- Short Description & Brochure --}}
                        <div class="form-group">
                            <label for="short_description">Short Description</label>
                            <textarea name="short_description" class="form-control" rows="3" required>{{ old('short_description', $event->short_description ?? '') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="brochure_url">Brochure (PDF)</label>
                            <input type="file" name="brochure_url" class="form-control-file">
                            @if (isset($event) && $event->brochure_url)
                                <small class="text-muted">Current: {{ $event->brochure_url }}</small>
                            @endif
                        </div>

                        {{-- Registration Deadline --}}
                        <div class="form-group">
                            <label for="registration_deadline">Registration Deadline</label>
                            <input type="datetime-local" name="registration_deadline" class="form-control"
                                value="{{ old('registration_deadline', isset($event->registration_deadline) ? \Carbon\Carbon::parse($event->registration_deadline)->format('Y-m-d\TH:i') : '') }}">
                        </div>

                        {{-- Stats --}}
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="models_count">Models Expected</label>
                                <input type="text" name="models_count" class="form-control"
                                    value="{{ old('models_count', $event->models_count ?? '2000+') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="brands_count">Brands Onboard</label>
                                <input type="text" name="brands_count" class="form-control"
                                    value="{{ old('brands_count', $event->brands_count ?? '100+') }}">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="total_registered">Total Registered (Public)</label>
                                <input type="number" name="total_registered" class="form-control"
                                    value="{{ old('total_registered', $event->total_registered ?? 0) }}">
                            </div>
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
                        <div class="form-group">
                            <label for="disclaimer">Disclaimer</label>
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
@endsection
