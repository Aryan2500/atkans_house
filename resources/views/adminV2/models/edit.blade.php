@extends('adminV2.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('admin.partials.alerts')

            <div class="card">
                <div class="card-header">
                    <h4>Edit Model Status</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('models.update', $model->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        {{-- Name --}}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $model->user->name) }}">
                        </div>

                        {{-- Email --}}
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email', $model->user->email) }}">
                        </div>

                        {{-- Date of Birth --}}
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control"
                                value="{{ old('dob', \Carbon\Carbon::parse($model->user->dob)->format('Y-m-d')) }}">
                        </div>

                        {{-- City --}}
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control"
                                value="{{ old('city', $model->city) }}" required>
                        </div>

                        {{-- State --}}
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" class="form-control"
                                value="{{ old('state', $model->state) }}" required>
                        </div>

                        {{-- Phone --}}
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control"
                                value="{{ old('phone', $model->user->phone) }}" required>
                        </div>

                        {{-- Instagram Link --}}
                        <div class="form-group">
                            <label>Instagram Link</label>
                            <input type="url" name="instagram_link" class="form-control"
                                value="{{ old('instagram_link', $model->instagram_link) }}">
                        </div>

                        {{-- Height --}}
                        <div class="form-group">
                            <label>Height (cm)</label>
                            <input type="number" name="height_cm" class="form-control"
                                value="{{ old('height_cm', $model->height_cm) }}" required>
                        </div>

                        {{-- Weight --}}
                        <div class="form-group">
                            <label>Weight (kg)</label>
                            <input type="number" name="weight_kg" class="form-control"
                                value="{{ old('weight_kg', $model->weight_kg) }}" required>
                        </div>

                        {{-- Status --}}
                        <div class="form-group">
                            <label>Current Status</label>
                            <select name="status" class="form-control" required>
                                <option value="pending" {{ old('status', $model->status) == 'pending' ? 'selected' : '' }}>
                                    Pending</option>
                                <option value="approved"
                                    {{ old('status', $model->status) == 'approved' ? 'selected' : '' }}>Approved</option>
                                <option value="rejected"
                                    {{ old('status', $model->status) == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                        </div>

                        {{-- Featured Checkbox --}}
                        <div class="form-group form-check mt-3">
                            <input type="checkbox" name="featured" class="form-check-input" id="featuredCheckbox"
                                {{ old('featured', $model->featured) ? 'checked' : '' }}>
                            <label class="form-check-label" for="featuredCheckbox">Featured</label>
                        </div>

                        {{-- Photo --}}
                        <div class="form-group">
                            <label>Photo</label><br>
                            @if ($model->photo)
                                <img src="{{ asset($model->photo) }}" width="100" height="100" class="rounded mb-2">
                            @else
                                <p class="text-muted">No photo uploaded</p>
                            @endif
                            <input type="file" name="photo" class="form-control-file" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Update Model</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
