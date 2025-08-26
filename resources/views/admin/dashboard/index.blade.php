@extends('admin.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header   py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Dashboard</h4>
                    <p>Welcome to Event Management</p>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <!-- START: Stats -->
    <div class="row">
        <div class="col-12 col-sm-6 col-xl-3 mt-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="icon-user-following text-primary font-30"></i>
                    <h2 class="mt-2">{{ $totalModels }}</h2>
                    <h6 class="card-subtitle">Total Models</h6>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3 mt-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="icon-briefcase text-warning font-30"></i>
                    <h2 class="mt-2">{{ $pendingHires }}</h2>
                    <h6 class="card-subtitle">Pending Hire Requests</h6>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3 mt-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="icon-calendar text-success font-30"></i>
                    <h2 class="mt-2">{{ $totalEvents }}</h2>
                    <h6 class="card-subtitle">Total Events</h6>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3 mt-3">
            <div class="card">
                <div class="card-body text-center">
                    <i class="icon-people text-info font-30"></i>
                    <h2 class="mt-2">{{ $volunteerCount }}</h2>
                    <h6 class="card-subtitle">Volunteers</h6>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Stats -->

    <div class="row mt-4">
        <div class="col-12 col-md-6">
            <div class="card shadow">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">📅 Upcoming Events</h5>
                </div>
                <div class="card-body p-0">
                    <div class="scroll-wrapper" onmouseover="this.classList.add('paused')"
                        onmouseout="this.classList.remove('paused')">
                        <ul class="event-scroll-list m-0 p-3">
                            @forelse ($upcomingEvents as $event)
                                <li class="py-2 border-bottom">
                                    <strong class="text-danger">{{ $event->title }}</strong><br>
                                    <small><strong>{{ $event->short_description }}</strong></small><br>
                                    <small
                                        class="text-muted">{{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}</small>
                                </li>
                            @empty
                                <li class="py-2">No upcoming events.</li>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('styles')
    <style>
        .scroll-wrapper {
            height: 250px;
            overflow: hidden;
            position: relative;
        }

        .event-scroll-list {
            list-style: none;
            animation: scroll-up 15s linear infinite;
        }

        .scroll-wrapper.paused .event-scroll-list {
            animation-play-state: paused;
        }

        @keyframes scroll-up {
            0% {
                transform: translateY(100%);
            }

            100% {
                transform: translateY(-100%);
            }
        }
    </style>
@endpush
