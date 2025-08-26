@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('admin.partials.alerts')

            <div class="card">
                <div class="card-header">
                    <h4>Edit Sponsorship Status</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('sponsership.update', $sponsorship->id) }}">
                        @csrf
                        @method('PUT')

                        {{-- Brand & Contact --}}
                        <div class="form-group">
                            <label>Brand Name</label>
                            <input type="text" class="form-control" value="{{ $sponsorship->brand_name }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Industry Category</label>
                            <input type="text" class="form-control" value="{{ $sponsorship->industry_category }}"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label>Social Link</label>
                            <input type="url" class="form-control" value="{{ $sponsorship->social_link }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Contact Name</label>
                            <input type="text" class="form-control" value="{{ $sponsorship->contact_name }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Designation</label>
                            <input type="text" class="form-control" value="{{ $sponsorship->contact_designation }}"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" value="{{ $sponsorship->contact_number }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{ $sponsorship->email }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>City & State</label>
                            <input type="text" class="form-control" value="{{ $sponsorship->city_state }}" disabled>
                        </div>

                        {{-- Sponsorship Interests --}}
                        <div class="form-group">
                            <label>Sponsorship Types</label><br>
                            @foreach ($sponsorship->sponsorshipTypes as $type)
                                <span class="badge badge-info">{{ $type->name }}</span>
                            @endforeach
                        </div>

                        <div class="form-group">
                            <label>Budget Range</label>
                            <input type="text" class="form-control" value="{{ $sponsorship->budget_range }}" disabled>
                        </div>

                        {{-- Product/Service --}}
                        <div class="form-group">
                            <label>Product / Service Details</label>
                            <textarea class="form-control" rows="3" disabled>{{ $sponsorship->product_service_details }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Want to Hire Models?</label>
                            <input type="text" class="form-control" value="{{ $sponsorship->hire_models }}" disabled>
                        </div>

                        @if ($sponsorship->hire_models === 'Yes' || $sponsorship->hire_models === 'Maybe')
                            <div class="form-group">
                                <label>Model Preference</label>
                                <input type="text" class="form-control" value="{{ $sponsorship->model_preference }}"
                                    disabled>
                            </div>
                        @endif

                        {{-- Logistics --}}
                        <div class="form-group">
                            <label>Handle Own Travel & Setup?</label>
                            <input type="text" class="form-control" value="{{ $sponsorship->handle_own_travel }}"
                                disabled>
                        </div>


                        <div class="form-group">
                            <label>Need Booth Setup?</label>
                            <input type="text" class="form-control" value="{{ $sponsorship->booth_setup }}" disabled>
                        </div>

                        {{-- Final Notes --}}
                        <div class="form-group">
                            <label>Special Requests / Notes</label>
                            <textarea class="form-control" rows="2" disabled>{{ $sponsorship->special_requests }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Heard About Us From</label>
                            <input type="text" class="form-control" value="{{ $sponsorship->heard_from }}" disabled>
                        </div>

                        {{-- Status --}}
                        <div class="form-group mt-4">
                            <label>Change Status</label>
                            <select name="status" class="form-control" required>
                                <option value="pending" {{ $sponsorship->status == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="approved" {{ $sponsorship->status == 'approved' ? 'selected' : '' }}>
                                    Approved</option>
                                <option value="rejected" {{ $sponsorship->status == 'rejected' ? 'selected' : '' }}>
                                    Rejected</option>
                            </select>
                        </div>

                        <div class="form-check mb-2">
                            <input type="checkbox" name="show_on_home_page" class="form-check-input" id="show_on_home_page"
                                {{ old('show_on_home_page', $sponsorship->show_on_home_page ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="show_on_home_page">Show on Home Page</label>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Update Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
