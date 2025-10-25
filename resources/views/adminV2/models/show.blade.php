@extends('adminV2.master')

@section('content')
    <!-- START: Breadcrumbs-->
    <div class="row ">
        <div class="col-12  align-self-center">
            <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                <div class="w-sm-100 mr-auto"><span class="h4 my-auto">Model Profile</span></div>

                <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Model</li>
                    <li class="breadcrumb-item active"><a href="#">Profile</a></li>
                </ol>
            </div>
        </div>
    </div>
    <!-- END: Breadcrumbs-->


    <div class="row">
        <div class="col-12 mt-3">
            <div class="position-relative">

                <div class="position-relative px-3 py-5">
                    <div class="media d-md-flex d-block">
                        <a href="#">
                            <img src="{{ $model->photo ? asset($model->photo) : asset('img/placeholder.png') }}"
                                width="100" height="100" alt="Profile Photo" class="img-fluid rounded-circle">
                        </a>
                        <div class="media-body z-index-1">
                            <div class="pl-4">
                                <h1 class="display-4 text-uppercase text-black mb-0">{{ $model->user->name ?? 'N/A' }}</h1>
                                <h6 class="text-uppercase text-white mb-0">
                                    {{ ucfirst($model->status) }}
                                </h6>
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
                                <a class="nav-link active py-2 px-4" data-toggle="tab" href="#about"> About</a>
                            </li>
                        </ul>
                    </div>
                    <div class="align-self-center ml-auto text-center text-sm-right">
                        <a href="{{ $model->instagram_link }}" target="_blank">
                            <img src="https://img.freepik.com/premium-vector/instagram-logo-with-colorful-gradient_1273375-1516.jpg?semt=ais_hybrid&w=740&q=80"
                                alt="" srcset="" width="40" height="40">


                        </a>
                        {{-- <a href="#"><i class="icon-social-google h5"></i></a>
                        <a href="#"><i class="icon-social-github h5"></i></a> --}}
                    </div>
                </div>
            </div>

            <!-- Profile Info -->
            <div class="tab-content mt-4">
                <div class="tab-pane fade show active" id="about">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mb-4">Model Details</h4>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <strong>Email:</strong>
                                    <p>{{ $model->user->email ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Instagram:</strong>
                                    <p>{{ $model->instagram_link ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Date of Birth:</strong>
                                    <p>{{ \Carbon\Carbon::parse($model->dob)->format('d M Y') }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Phone:</strong>
                                    <p>{{ $model->phone ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>City:</strong>
                                    <p>{{ $model->city ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>State:</strong>
                                    <p>{{ $model->state ?? 'N/A' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Height (cm):</strong>
                                    <p>{{ $model->height_cm ?? '-' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Weight (kg):</strong>
                                    <p>{{ $model->weight_kg ?? '-' }}</p>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <strong>Status:</strong>
                                    <p>
                                        <span
                                            class="badge badge-{{ $model->status == 'approved' ? 'success' : ($model->status == 'pending' ? 'warning' : 'danger') }}">
                                            {{ ucfirst($model->status) }}
                                        </span>
                                    </p>
                                </div>
                                <div class="col-md-12 mt-4 text-center">
                                    <strong>Gallery:</strong>
                                    @include('adminV2.models.gallery')
                                </div>
                                <div class="col-md-12 mt-4 text-center">
                                    <a href="{{ route('models.edit', $model->id) }}" class="btn btn-outline-primary">Edit
                                        Profile</a>
                                    <a href="{{ route('models.index') }}" class="btn btn-outline-secondary">Back to
                                        List</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- END: Card DATA-->
@endsection
