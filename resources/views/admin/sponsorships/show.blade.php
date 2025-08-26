@extends('admin.master')

@section('content')
    <!-- START: Breadcrumbs -->
    <div class="row">
        <div class="col-12 align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><span class="h4 my-auto">Sponsorship Profile</span></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Sponsorships</li>
                    <li class="breadcrumb-item active"><a href="#">Profile</a></li>
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
                            <img src="{{ asset('dist/images/contact-3.jpg') }}" width="100" height="100"
                                alt="Brand Logo" class="img-fluid rounded-circle">
                        </a>
                        <div class="media-body z-index-1">
                            <div class="pl-4">
                                <h1 class="display-4 text-uppercase text-white mb-0">{{ $sponsorship->brand_name }}</h1>
                                <h6 class="text-uppercase text-white mb-0">{{ ucfirst($sponsorship->status) }}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Menu -->
            <div class="profile-menu mt-4 theme-background border z-index-1 p-2">
                <div class="d-sm-flex">
                    <div class="align-self-center">
                        <ul class="nav nav-pills flex-column flex-sm-row" id="myTab" role="tablist">
                            <li class="nav-item ml-0">
                                <a class="nav-link active py-2 px-4" data-toggle="tab" href="#about">About</a>
                            </li>
                        </ul>
                    </div>
                    <div class="align-self-center ml-auto text-center text-sm-right">
                        @if ($sponsorship->social_link)
                            <a href="{{ $sponsorship->social_link }}" target="_blank">
                                <i class="icon-social-facebook h5"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Profile Info -->
            <div class="tab-content mt-4">
                <div class="tab-pane fade show active" id="about">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4">Sponsorship Details</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3"><strong>Industry:</strong>
                                    <p>{{ $sponsorship->industry_category }}</p>
                                </div>

                                <div class="col-md-6 mb-3"><strong>Contact Name:</strong>
                                    <p>{{ $sponsorship->contact_name }}</p>
                                </div>

                                <div class="col-md-6 mb-3"><strong>Designation:</strong>
                                    <p>{{ $sponsorship->contact_designation }}</p>
                                </div>

                                <div class="col-md-6 mb-3"><strong>Email:</strong>
                                    <p>{{ $sponsorship->email }}</p>
                                </div>

                                <div class="col-md-6 mb-3"><strong>Phone:</strong>
                                    <p>{{ $sponsorship->contact_number }}</p>
                                </div>

                                <div class="col-md-6 mb-3"><strong>City & State:</strong>
                                    <p>{{ $sponsorship->city_state }}</p>
                                </div>

                                <div class="col-md-6 mb-3"><strong>Budget Range:</strong>
                                    <p>{{ $sponsorship->budget_range }}</p>
                                </div>

                                <div class="col-md-6 mb-3"><strong>How Did You Hear About Us?</strong>
                                    <p>{{ $sponsorship->heard_from ?? 'N/A' }}</p>
                                </div>

                                <div class="col-md-12 mb-3"><strong>Sponsorship Interests:</strong><br>
                                    @foreach ($sponsorship->sponsorshipTypes as $type)
                                        <span class="badge badge-info">{{ $type->name }}</span>
                                    @endforeach
                                </div>

                                <div class="col-md-12 mb-3"><strong>Product/Service Description:</strong>
                                    <p>{{ $sponsorship->product_service_details }}</p>
                                </div>

                                <div class="col-md-4 mb-3"><strong>Want to Hire Models?</strong>
                                    <p>{{ $sponsorship->hire_models }}</p>
                                </div>

                                @if ($sponsorship->hire_models === 'Yes' || $sponsorship->hire_models === 'Maybe')
                                    <div class="col-md-4 mb-3"><strong>Model Preference:</strong>
                                        <p>{{ $sponsorship->model_preference }}</p>
                                    </div>
                                @endif

                                <div class="col-md-4 mb-3"><strong>Need Booth Setup?</strong>
                                    <p>{{ $sponsorship->booth_setup }}</p>
                                </div>

                                <div class="col-md-4 mb-3"><strong>Handle Own Travel & Setup?</strong>
                                    <p>{{ $sponsorship->handle_own_travel }}</p>
                                </div>

                                <div class="col-md-12 mb-3"><strong>Special Requests / Notes:</strong>
                                    <p>{{ $sponsorship->special_requests ?? 'N/A' }}</p>
                                </div>

                                <div class="col-md-12 mt-4 text-center">
                                    <a href="{{ route('sponsership.edit', $sponsorship->id) }}"
                                        class="btn btn-outline-primary">Edit</a>
                                    <a href="{{ route('sponsership.index') }}" class="btn btn-outline-secondary">Back to
                                        List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
