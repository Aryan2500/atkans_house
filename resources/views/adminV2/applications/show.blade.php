@extends('adminV2.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><span class="h4 my-auto">Application Details</span></div>
                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Rampwalk</li>
                    <li class="breadcrumb-item active"><a href="#">Application</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs -->

    <div class="row">
        <div class="col-12 mt-3">
            <div class="position-relative">
                <div class="background-image-maker py-5"></div>
                <div class="holder-image">
                    <img src="{{ asset('dist/images/portfolio13.jpg') }}" alt="" class="img-fluid d-none">
                </div>
                <div class="position-relative px-3 py-5">
                    <div class="media d-md-flex d-block">
                        <a href="#">
                            <img src="{{ $application->modelProfile->photo ? asset('storage/' . $application->modelProfile->photo) : asset('dist/images/contact-3.jpg') }}"
                                width="100" height="100" alt="Profile Photo" class="img-fluid rounded-circle">
                        </a>
                        <div class="media-body z-index-1">
                            <div class="pl-4">
                                <h1 class="display-4 text-uppercase text-black mb-0">
                                    {{ $application->modelProfile->user->name ?? 'N/A' }}</h1>
                                <h6 class="text-uppercase text-white mb-0">{{ ucfirst($application->status) }} Application
                                </h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Info -->
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="mb-4">Application Details</h4>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <strong>Email:</strong>
                            <p>{{ $application->modelProfile->user->email ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Phone:</strong>
                            <p>{{ $application->modelProfile->phone ?? 'N/A' }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Instagram:</strong>
                            <p><a href="{{ $application->modelProfile->instagram_link }}"
                                    target="_blank">{{ $application->modelProfile->instagram_link }}</a></p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Height / Weight:</strong>
                            <p>{{ $application->modelProfile->height_cm }} cm / {{ $application->modelProfile->weight_kg }}
                                kg</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Category:</strong>
                            <p>{{ ucfirst($application->modelProfile->category) }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Status:</strong>
                            <p>
                                <span
                                    class="badge badge-{{ $application->status == 'approved' ? 'success' : ($application->status == 'pending' ? 'warning' : 'danger') }}">
                                    {{ ucfirst($application->status) }}
                                </span>
                            </p>
                        </div>

                        @if ($application->event)
                            <div class="col-md-6 mb-3">
                                <strong>Event:</strong>
                                <p>{{ $application->event->title }} ({{ $application->event->location }})</p>
                            </div>
                        @endif

                        <div class="col-md-6 mb-3">
                            <strong>Submitted At:</strong>
                            <p>{{ $application->created_at->format('d M Y h:i A') }}</p>
                        </div>

                        @if ($application->modelProfile->portfolio_path)
                            <div class="col-md-6 mb-3">
                                <strong>Portfolio:</strong>
                                <p><a href="{{ asset($application->modelProfile->portfolio_path) }}" target="_blank"
                                        class="btn btn-sm btn-primary">View Portfolio</a></p>
                            </div>
                        @endif
                    </div>

                    <div class="text-center mt-4">
                        <a href="{{ route('ramp-applications.index') }}" class="btn btn-outline-secondary">← Back to
                            List</a>

                        @if ($application->status !== 'approved')
                            <form action="{{ route('ramp-applications.approve', $application->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-success ml-2">✅ Approve</button>
                            </form>
                        @endif
                        @if ($application->status !== 'rejected')
                            <form action="{{ route('ramp-applications.reject', $application->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                <button type="submit" class="btn btn-danger ml-2">❌ Reject</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
