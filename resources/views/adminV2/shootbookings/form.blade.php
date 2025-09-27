@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('admin.partials.alerts')

            <div class="card">
                <div class="card-header">
                    <h4>{{ isset($package) ? 'Edit Package' : 'Add New Package' }}</h4>
                </div>
                <div class="card-body">
                    <form class="needs-validation" novalidate method="POST"
                        action="{{ isset($package) ? route('packages.update', $package->id) : route('packages.store') }}">
                        @csrf
                        @if (isset($package))
                            @method('PUT')
                        @endif

                        <!-- Package Name -->
                        <div class="form-group">
                            <label for="name">Package Name</label>
                            <input type="text" name="name" class="form-control"
                                value="{{ old('name', $package->name ?? '') }}" required>
                        </div>

                        <!-- Price -->
                        <div class="form-group">
                            <label for="price">Price (₹)</label>
                            <input type="number" name="price" class="form-control"
                                value="{{ old('price', $package->price ?? '') }}" required>
                        </div>

                        <!-- Features -->
                        <div class="form-group">
                            <label for="features">Package Features (comma separated)</label>
                            <textarea name="features" class="form-control" rows="3" placeholder="e.g. 10 Edited Photos, 1-Hour Studio Shoot">
    {{ old('features', is_array($package->features ?? null) ? implode(",\n", $package->features) : '') }}

                            </textarea>
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="1" {{ old('status', $package->status ?? '') == 1 ? 'selected' : '' }}>
                                    Active</option>
                                <option value="0" {{ old('status', $package->status ?? '') == 0 ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                        </div>

                        <!-- Submit -->
                        <button class="btn btn-success btn-block" type="submit">
                            {{ isset($package) ? '📝 Update Package' : '📥 Save Package' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
