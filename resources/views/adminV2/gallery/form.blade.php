@extends('admin.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('admin.partials.alerts')

            <div class="card">
                <div class="card-header">
                    <h4>{{ isset($gallery) ? 'Edit Gallery Image' : 'Add New Gallery Image' }}</h4>
                </div>
                <div class="card-body">
                    <form method="POST" enctype="multipart/form-data"
                        action="{{ isset($gallery) ? route('gallery.update', $gallery->id) : route('gallery.store') }}">
                        @csrf
                        @if (isset($gallery))
                            @method('PUT')
                        @endif

                        {{-- Title --}}
                        <div class="form-group">
                            <label for="title">Image Title</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $gallery->title ?? '') }}" required>
                        </div>

                        {{-- Description --}}
                        <div class="form-group">
                            <label for="description">Short Description</label>
                            <textarea name="description" rows="3" class="form-control" placeholder="Optional...">{{ old('description', $gallery->description ?? '') }}</textarea>
                        </div>

                        {{-- Image Upload --}}
                        <div class="form-group">
                            <label for="image">Upload Image</label>
                            <input type="file" name="image" class="form-control-file"
                                {{ isset($gallery) ? '' : 'required' }}>
                            @if (isset($gallery) && $gallery->image_path)
                                <small class="text-muted d-block mt-2">
                                    Current: <a href="{{ asset($gallery->image_path) }}" target="_blank">View Image</a>
                                </small>
                            @endif
                        </div>

                        {{-- Is Active --}}
                        <div class="form-check mb-3">
                            <input type="checkbox" name="is_active" class="form-check-input" id="is_active"
                                {{ old('is_active', $gallery->is_active ?? true) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Visible in Gallery</label>
                        </div>

                        <button type="submit" class="btn btn-success btn-block">
                            {{ isset($gallery) ? '🖼️ Update Image' : '📤 Upload Image' }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
