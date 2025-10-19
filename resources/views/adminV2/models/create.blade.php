@extends('adminV2.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('admin.partials.alerts')

            <div class="card">
                <div class="card-header">
                    <h4>Add New Model</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('models.store') }}" enctype="multipart/form-data">
                        @csrf

                        {{-- Name --}}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Date of Birth --}}
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" class="form-control" value="{{ old('dob') }}" required>
                            @error('dob')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- City --}}
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" class="form-control" value="{{ old('city') }}" required>
                            @error('city')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- State --}}
                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" class="form-control" value="{{ old('state') }}" required>
                            @error('state')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Phone --}}
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" required>
                            @error('phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Instagram Link --}}
                        <div class="form-group">
                            <label>Instagram Link</label>
                            <input type="url" name="instagram_link" class="form-control"
                                value="{{ old('instagram_link') }}">
                            @error('instagram_link')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Height --}}
                        <div class="form-group">
                            <label>Height (cm)</label>
                            <input type="number" name="height_cm" class="form-control" value="{{ old('height_cm') }}"
                                required>
                            @error('height_cm')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Weight --}}
                        <div class="form-group">
                            <label>Weight (kg)</label>
                            <input type="number" name="weight_kg" class="form-control" value="{{ old('weight_kg') }}"
                                required>
                            @error('weight_kg')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Status --}}
                        <div class="form-group">
                            <label>Current Status</label>
                            <select name="status" class="form-control" required>
                                <option value="pending" {{ old('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="approved" {{ old('status') == 'approved' ? 'selected' : '' }}>Approved
                                </option>
                                <option value="rejected" {{ old('status') == 'rejected' ? 'selected' : '' }}>Rejected
                                </option>
                            </select>
                            @error('status')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        {{-- Featured Checkbox --}}
                        <div class="form-group form-check mt-3">
                            <input type="checkbox" name="featured" class="form-check-input" id="featuredCheckbox"
                                {{ old('featured') ? 'checked' : '' }}>
                            <label class="form-check-label" for="featuredCheckbox">Featured</label>
                        </div>

                        {{-- Photo --}}
                        <div class="form-group">
                            <label>Photo</label>
                            <input type="file" name="photo" class="form-control-file" accept="image/*" required>
                            @error('photo')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Create Model</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
