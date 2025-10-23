@extends('user.master')

@section('styles')
    <style>
        /* 🔹 Base Styles */
        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 25px;
            margin-top: 25px;
        }

        .event-card {
            background-color: #1a1d24;
            border: 1px solid #3a3a3a;
            border-radius: 16px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.25);
            color: #fff;
            padding: 22px;
            transition: all 0.3s ease;
        }

        .event-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.35);
        }

        .event-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            border-bottom: 1px solid #2e2e2e;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        .event-body {
            display: flex;
            gap: 15px;
            align-items: center;
        }

        .event-body img {
            width: 120px !important;
            height: 120px !important;
            border-radius: 10px;
            object-fit: cover;
            border: 1px solid #333;
        }

        .event-info h5 {
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .event-info small {
            color: #aaa;
        }

        .event-footer {
            border-top: 1px solid #2e2e2e;
            margin-top: 15px;
            padding-top: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .badge {
            font-size: 0.8rem;
            padding: 6px 10px;
            border-radius: 6px;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-3">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold text-white">Welcome, {{ Auth::user()->name ?? auth()->user()->firstName }}!</h3>
            <small class="text-muted">{{ \Carbon\Carbon::now()->format('l, d M Y') }}</small>
        </div>

        @php
            $participatedEvents = \App\Models\Participation::where('user_id', Auth::user()->id)
                ->where('is_approved', 1)
                ->with(['event', 'votes'])
                ->get();
        @endphp

        <div class="row mb-5">
            @if ($participatedEvents->isEmpty())
                <div class="text-center py-5">
                    <h5 class="text-muted">No Participated Events</h5>
                </div>
            @else
                @include('public.partials.alert')
                <h4 class="text-white mb-4">Participated Events</h4>


                @foreach ($participatedEvents as $pe)
                    <div class="col-12 col-md-6 col-xl-3 mb-4" style="border: 1px solid yellow;padding: 15px;">

                        <div class="event-grid">
                            @php
                                $event = $pe->event;
                            @endphp
                            <div class="event-card">
                                <div class="event-header">
                                    <div>
                                        <h6 class="mb-1">{{ $event->title }}</h6>
                                        <small class="text-muted">{{ $event->location }}</small>
                                    </div>
                                    {{-- <span class="badge {{ $event->is_free_entry ? 'bg-success' : 'bg-warning' }}">
                                        {{ $event->is_free_entry ? 'Free Entry' : 'Paid Entry' }}
                                    </span> --}}
                                </div><br>

                                <div class="event-body">
                                    <img src="{{ asset($event->hero_media_url ?? 'https://via.placeholder.com/300x200?text=Event+Image') }}"
                                        alt="{{ $event->title }}"
                                        style="width: 100%; height: 200px; border-radius: 10px; object-fit: cover; border: 1px solid #444;">
                                    <div class="event-info">
                                        <h6>{{ $event->subtitle ?? 'Exciting Event' }}</h6>
                                        <small>
                                            <strong>Start:</strong>
                                            {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y, h:i A') }}<br>
                                            <strong>End:</strong>
                                            {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y, h:i A') }}
                                        </small>
                                    </div>
                                </div>

                                <div class="event-footer">
                                    <div class="float-end">
                                        <span class="text-muted">Votes Gained:</span>
                                        <strong>{{ $pe->votes->count() }}</strong>
                                    </div>
                                    {{-- <a href="{{ route('events.show', $event->id) }}" class="btn btn-sm btn-outline-light">
                                        View Details
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
