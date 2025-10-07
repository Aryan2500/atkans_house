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
        @include('adminV2.partials.alerts')
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

                            @if ($event->participants->count() > 0)
                                @foreach ($event->participants as $participant)
                                    <!-- Participant 1 -->
                                    <div class="post">
                                        <div class="user-block">
                                            <img class="img-circle img-bordered-sm"
                                                src="https://img.freepik.com/premium-vector/default-avatar-profile-icon-social-media-user-image-gray-avatar-icon-blank-profile-silhouette-vector-illustration_561158-3383.jpg?semt=ais_hybrid&w=740&q=80"
                                                alt="User image">
                                            <span class="username">
                                                <a href="#">{{ $participant->user->name }}</a>
                                            </span>
                                            <span class="description text-success">Eligible</span>
                                        </div>
                                        <!-- /.user-block -->
                                        <p>
                                            Aspiring model from {{ $participant->user->state }}, passionate about ramp walks
                                            and
                                            fashion shows.
                                        </p>

                                        @php
                                            $onboardImg = \App\Models\OnboardImages::where(
                                                'user_id',
                                                $participant->user_id,
                                            )
                                                ->where('event_id', $event->id)
                                                ->first();
                                            // dd($onboardImg->user);
                                        @endphp

                                        @if ($onboardImg ?? false && $onboardImg->user_id === $participant->user_id)
                                            <a href="#" class="btn btn-sm btn-success">Already Onboarded </a>
                                            <a href="{{ asset($onboardImg->modelPhoto->photo_path) }}" target="_blank"
                                                class="btn btn-sm btn-warning">See Image</a>
                                            <a href="{{ route('removeOnboard-participants', ['user_id' => $participant->user_id, 'event_id' => $event->id]) }}"
                                                class="btn btn-sm btn-danger" onclick="confirmDelete(event, this)">
                                                Remove
                                            </a>
                                        @else
                                            <div class="d-flex justify-content-end">

                                                <a href="{{ route('onboard-participants', ['user_id' => $participant->user_id, 'event_id' => $event->id]) }}"
                                                    class="btn btn-sm btn-primary">Onboard</a>
                                            </div>
                                        @endif



                                    </div>
                                @endforeach
                            @endif

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
                            <img src="{{ asset($event->hero_media_url) }}" class="img-fluid rounded"
                                alt="Event Hero Image">
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


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmDelete(event, element) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: 'All the votes for this participant will be permanently deleted and cannot be retrieved!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Open link in new tab (since you used target="_blank")
                    window.location.href = element.href;
                }
            });
        }
    </script>
@endpush
