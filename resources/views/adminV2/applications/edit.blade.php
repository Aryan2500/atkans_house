@extends('adminV2.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('adminV2.partials.alerts')

            <div class="card">
                <div class="card-header">
                    <h4>Edit Model Status</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('models.update', $model->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" value="{{ $model->user->name }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{ $model->user->email }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="text" class="form-control"
                                value="{{ \Carbon\Carbon::parse($model->dob)->format('d M Y') }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control"
                                value="{{ old('city', $model->city) }}" required>
                        </div>

                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" class="form-control"
                                value="{{ old('state', $model->state) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control"
                                value="{{ old('phone', $model->phone) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Instagram Link</label>
                            <input type="url" name="instagram_link" class="form-control"
                                value="{{ old('instagram_link', $model->instagram_link) }}">
                        </div>

                        <div class="form-group">
                            <label>Height (cm)</label>
                            <input type="number" name="height_cm" class="form-control"
                                value="{{ old('height_cm', $model->height_cm) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Weight (kg)</label>
                            <input type="number" name="weight_kg" class="form-control"
                                value="{{ old('weight_kg', $model->weight_kg) }}" required>
                        </div>

                        <div class="form-group">
                            <label>Current Status</label>
                            <select name="status" class="form-control" required>
                                <option value="pending" {{ $model->status == 'pending' ? 'selected' : '' }}>Pending
                                </option>
                                <option value="approved" {{ $model->status == 'approved' ? 'selected' : '' }}>Approved
                                </option>
                                <option value="rejected" {{ $model->status == 'rejected' ? 'selected' : '' }}>Rejected
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Photo</label><br>
                            @if ($model->photo)
                                <img src="{{ asset('storage/' . $model->photo) }}" width="100" height="100"
                                    class="rounded mb-2">
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
