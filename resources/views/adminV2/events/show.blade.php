@extends('adminV2.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header  py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto">
                    <h4 class="mb-0">Events</h4>
                </div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Events Details</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Event Detail</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                    <div class="row">
                        <!-- Event Start Date -->
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Start Date</span>
                                    <span class="info-box-number text-center text-muted mb-0">
                                        {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y, h:i A') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Event End Date -->
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">End Date</span>
                                    <span class="info-box-number text-center text-muted mb-0">
                                        {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y, h:i A') }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <!-- Registration Deadline -->
                        <div class="col-12 col-sm-4">
                            <div class="info-box bg-light">
                                <div class="info-box-content">
                                    <span class="info-box-text text-center text-muted">Registration Deadline</span>
                                    <span class="info-box-number text-center text-muted mb-0">
                                        {{ $event->registration_deadline ? \Carbon\Carbon::parse($event->registration_deadline)->format('d M Y, h:i A') : 'N/A' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h4 class="mb-3">Participants</h4>

                            <!-- Participant 1 -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm"
                                        src="{{ asset('v2/dist/img/user1-128x128.jpg') }}" alt="User image">
                                    <span class="username">
                                        <a href="#">Riya Sharma</a>
                                    </span>
                                    <span class="description text-success">Eligible</span>
                                </div>
                                <!-- /.user-block -->
                                <p>
                                    Aspiring model from Delhi, passionate about ramp walks and fashion shows.
                                </p>
                                <div class="d-flex justify-content-end">

                                    <button class="btn btn-sm btn-primary">Onboard</button>
                                </div>
                            </div>

                            <!-- Participant 2 -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm"
                                        src="{{ asset('v2/dist/img/user1-128x128.jpg') }}" alt="User image">
                                    <span class="username">
                                        <a href="#">Arjun Mehta</a>
                                    </span>
                                    <span class="description text-danger">Not Eligible</span>
                                </div>
                                <p>
                                    Strong portfolio but missing some eligibility criteria for this event.
                                </p>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-sm btn-primary">Onboard</button>
                                </div>
                            </div>

                            <!-- Participant 3 -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm"
                                        src="{{ asset('v2/dist/img/user1-128x128.jpg') }}" alt="User image">
                                    <span class="username">
                                        <a href="#">Neha Verma</a>
                                    </span>
                                    <span class="description text-success">Eligible</span>
                                </div>
                                <p>
                                    Talented newcomer with interest in fashion photography and media coverage.
                                </p>
                                <div class="d-flex justify-content-end">

                                    <button class="btn btn-sm btn-primary">Onboard</button>
                                </div>
                            </div>

                            <!-- Participant 4 -->
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm"
                                        src="{{ asset('v2/dist/img/user1-128x128.jpg') }}" alt="User image">
                                    <span class="username">
                                        <a href="#">Karan Singh</a>
                                    </span>
                                    <span class="description text-success">Eligible</span>
                                </div>
                                <p>
                                    Experienced participant with previous rampwalk competition background.
                                </p>
                                <div class="d-flex justify-content-end">

                                    <button class="btn btn-sm btn-primary">Onboard</button>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- Right Column -->
                <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                    <h3 class="text-primary">
                        <i class="fas fa-calendar-alt"></i> {{ $event->title }}
                    </h3>
                    <p class="text-muted">{{ $event->subtitle ?? '' }}</p>

                    <div class="mb-3">
                        @if ($event->hero_media_type === 'image')
                            <img src="{{ asset($event->hero_media_url) }}" class="img-fluid rounded" alt="Event Hero Image">
                        @elseif($event->hero_media_type === 'video')
                            <video class="w-100 rounded" controls>
                                <source src="{{ asset($event->hero_media_url) }}" type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                        @endif
                    </div>

                    <div class="text-muted">
                        <h4>Event Information</h4>

                        <p class="text-sm">Location
                            <b class="d-block">{{ $event->location }}</b>
                        </p>
                        <p class="text-sm">Venue Note
                            <b class="d-block">{{ $event->venue_note ?? '—' }}</b>
                        </p>
                        <p class="text-sm">Milestone
                            <b class="d-block">{{ $event->milestone->name ?? '—' }}</b>
                        </p>
                        <p><strong>Subtitle:</strong> {{ $event->subtitle ?? '—' }}</p>
                        <p><strong>Short Description:</strong> {{ $event->short_description }}</p>
                        <p><strong>Disclaimer:</strong> {{ $event->disclaimer ?? '—' }}</p>

                        <h5 class="mt-4">Statistics</h5>
                        <p><strong>Total Registered:</strong> {{ $event->total_registered }}</p>
                        <p><strong>Models Count:</strong> {{ $event->models_count ?? '—' }}</p>
                        <p><strong>Number of Rounds:</strong> {{ $event->number_of_rounds }}</p>
                        <p><strong>Free Entry:</strong> {{ $event->is_free_entry ? 'Yes' : 'No' }}</p>
                        <p><strong>Media Coverage:</strong> {{ $event->has_media_coverage ? 'Yes' : 'No' }}</p>
                        <p><strong>On-site Hiring:</strong> {{ $event->has_on_site_hiring ? 'Yes' : 'No' }}</p>
                        <p><strong>Visible on Home Page:</strong> {{ $event->show_on_home_page ? 'Yes' : 'No' }}</p>

                    </div>

                    <h5 class="mt-4 text-muted">Event Brochure</h5>
                    @if ($event->brochure_url)
                        <a href="{{ asset($event->brochure_url) }}" target="_blank" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-file-pdf"></i> View Brochure
                        </a>
                    @else
                        <p class="text-muted">No brochure uploaded.</p>
                    @endif

                    <div class="text-center mt-5 mb-3">
                        <a href="{{ route('event.edit', $event->id) }}" class="btn btn-sm btn-primary">Edit Event</a>
                        {{-- <a href="{{ route('events.report', $event->id) }}" class="btn btn-sm btn-warning">Generate
                            Report</a> --}}
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection
