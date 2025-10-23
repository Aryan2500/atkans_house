@extends('user.master')

@section('styles')
@endsection

@section('content')
    <div class="container-fluid py-5">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-white">Change Password</h3>
            <small class="text-muted">{{ \Carbon\Carbon::now()->format('l, d M Y') }}</small>
        </div>

        <div class="card-container">
            <div class="change-pass-card">
                <h4>Update Your Password</h4>

                @include('public.partials.alert')

                <form action="{{ route('user.change-password') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="current_password">Current Password</label>


                        <input type="password" name="current_password" id="current_password" placeholder="Current Password"
                            value="{{ old('current_password') }}">

                        @error('current_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new_password">New Password</label>
                        <input type="password" name="new_password" id="new_password" placeholder="Enter new password"
                            required>
                        @error('new_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="new_password_confirmation">Confirm New Password</label>
                        <input type="password" name="new_password_confirmation" id="new_password_confirmation"
                            placeholder="Re-enter new password" required>
                    </div>

                    <input type="submit" value=   'Change Password' style="width: 100%;">

                    <div class="note mt-3">
                        <small>Make sure your new password is strong and different from your old one.</small>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
