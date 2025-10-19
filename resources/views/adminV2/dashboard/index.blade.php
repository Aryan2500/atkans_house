@extends('adminV2.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Dashboard</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->


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
                <a href="{{ route('hireRequests.index') }}" class="small-box-footer">
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
                <a href="{{ route('event.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $products }}</h3>
                    <p>Total Products</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-shopping-basket"></i>
                </div>
                <a href="{{ route('products.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $orders }}</h3>
                    <p>Total Orders</p>
                </div>
                <div class="icon">
                    <i class="nav-icon fas fa-list"></i>
                </div>
                <a href="{{ route('orders.index') }}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $earnings }}</h3>
                    <p>Total Earnings</p>
                </div>
                <div class="icon">
                    <i class="fas fa-money-bill-wave"></i>
                </div>

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
