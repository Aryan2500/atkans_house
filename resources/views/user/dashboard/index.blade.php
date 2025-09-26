@extends('user.master')

@section('content')
    <div class="container-fluid py-4">

        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">Welcome, {{ Auth::user()->name }}!</h3>
            <small class="text-muted">{{ \Carbon\Carbon::now()->format('l, d M Y') }}</small>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-3">
                <div class="card text-white bg-primary h-100">
                    <div class="card-body">
                        <h5 class="card-title">Upcoming Events</h5>
                        <p class="card-text fs-3">{{ $upcomingEventsCount ?? 0 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success h-100">
                    <div class="card-body">
                        <h5 class="card-title">My Bookings</h5>
                        <p class="card-text fs-3">{{ $myBookingsCount ?? 0 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning h-100">
                    <div class="card-body">
                        <h5 class="card-title">Notifications</h5>
                        <p class="card-text fs-3">{{ $notificationsCount ?? 0 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-info h-100">
                    <div class="card-body">
                        <h5 class="card-title">Profile Completion</h5>
                        <p class="card-text fs-3">{{ $profileCompletion ?? 0 }}%</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body d-flex justify-content-around">
                        <a href="{{ route('user.events') }}" class="btn btn-outline-primary">
                            <i class="fa-solid fa-calendar-check me-2"></i> View Events
                        </a>
                        <a href="{{ route('user.bookings') }}" class="btn btn-outline-success">
                            <i class="fa-solid fa-clipboard-list me-2"></i> My Bookings
                        </a>
                        <a href="{{ route('user.profile') }}" class="btn btn-outline-warning">
                            <i class="fa-solid fa-user me-2"></i> Edit Profile
                        </a>
                        <a href="{{ route('user.notifications') }}" class="btn btn-outline-info">
                            <i class="fa-solid fa-bell me-2"></i> Notifications
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity / Events -->
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Recent Activities</h5>
                    </div>
                    <div class="card-body">
                        @if ($recentActivities->isEmpty())
                            <p class="text-muted">No recent activity found.</p>
                        @else
                            <ul class="list-group list-group-flush">
                                @foreach ($recentActivities as $activity)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $activity->description }}
                                        <span class="text-muted small">{{ $activity->created_at->diffForHumans() }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Notifications Sidebar -->
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <h5 class="mb-0">Latest Notifications</h5>
                    </div>
                    <div class="card-body">
                        @if ($notifications->isEmpty())
                            <p class="text-muted">You have no notifications.</p>
                        @else
                            <ul class="list-group list-group-flush">
                                @foreach ($notifications as $notification)
                                    <li class="list-group-item">
                                        <strong>{{ $notification->title }}</strong>
                                        <br>
                                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
