@extends('adminV2.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('adminV2.partials.alerts')

            <div class="card">
                <div class="card-header">
                    <h4>Edit Story Contest Status</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('stories.update', $storyContest->id) }}">
                        @csrf
                        @method('PUT')

                        {{-- Contest Entry Details (readonly) --}}
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" value="{{ $storyContest->username }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Instagram Link</label>
                            <input type="text" class="form-control" value="{{ $storyContest->instagram_link }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Photo</label><br>
                            @if ($storyContest->photo)
                                <img src="{{ asset($storyContest->photo) }}" alt="Photo" width="120"
                                    class="img-thumbnail">
                            @else
                                <span class="text-muted">No Photo Uploaded</span>
                            @endif
                        </div>

                        {{-- Status --}}
                        <div class="form-group mt-4">
                            <label>Change Status</label>
                            <select name="is_active" class="form-control" required>
                                <option value="1" {{ $storyContest->is_active ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$storyContest->is_active ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Update Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
