@extends('adminv2.master')

@section('content')
    
            <!-- START: Stats -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>{{ $totalModels }}</h3>
                            <p>Total Models</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-stalker"></i>
                        </div>
                        <a href="{{ route('models.index') }}" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{ $pendingHires }}</h3>
                            <p>Pending Hire Requests</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-briefcase"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{ $totalEvents }}</h3>
                            <p>Total Events</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-calendar"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $volunteerCount }}</h3>
                            <p>Volunteers</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-people"></i>
                        </div>
                        <a href="#" class="small-box-footer">
                            More info <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- END: Stats -->

            <!-- START: Upcoming Events -->
            <div class="row mt-4 ">
                <div class="col-lg-6 col-12">
                    <div class="card card-outline card-info">
                        <div class="card-header">
                            <h5 class="mb-0"><i class="fas fa-calendar-alt"></i> Upcoming Events</h5>
                        </div>
                        <div class="card-body p-0 scroll-wrapper">
                            <ul class="list-group list-group-flush event-scroll-list ">
                                @forelse ($upcomingEvents as $event)
                                    <li class="list-group-item">
                                        <strong class="text-danger">{{ $event->title }}</strong><br>
                                        <small><strong>{{ $event->short_description }}</strong></small><br>
                                        <small class="text-muted">
                                            {{ \Carbon\Carbon::parse($event->event_date)->format('d M Y') }}
                                        </small>
                                    </li>
                                @empty
                                    <li class="list-group-item">No upcoming events.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Upcoming Events -->
       
@endsection


@section('styles')
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
@endsection
