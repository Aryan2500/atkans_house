@extends('adminV2.master')

@section('content')
    <div class="row">
        <div class="col-12 mt-3">
            @include('adminV2.partials.alerts')

            <div class="card">
                <div class="card-header">
                    <h4>Edit Influencer Status</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('influencers.update', $influencer->id) }}">
                        @csrf
                        @method('PUT')

                        {{-- Influencer Details (readonly) --}}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" value="{{ $influencer->name }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Instagram Profile</label>
                            <input type="text" class="form-control" value="{{ $influencer->instagram_profile }}"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label>Followers</label>
                            <input type="text" class="form-control" value="{{ $influencer->followers }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Other Social Media</label>
                            <input type="text" class="form-control" value="{{ $influencer->other_social_media }}"
                                disabled>
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" value="{{ $influencer->phone }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{ $influencer->email }}" disabled>
                        </div>

                        <div class="form-group">
                            <label>Interested Product</label>
                            <input type="text" class="form-control" value="{{ $influencer->interested_product }}"
                                disabled>
                        </div>

                        {{-- Status --}}
                        <div class="form-group mt-4">
                            <label>Change Status</label>
                            <select name="status" class="form-control" required>
                                <option value="1" {{ $influencer->status ? 'selected' : '' }}>Active</option>
                                <option value="0" {{ !$influencer->status ? 'selected' : '' }}>Inactive</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">Update Status</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
