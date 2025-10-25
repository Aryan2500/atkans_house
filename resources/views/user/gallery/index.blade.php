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

        <div class="row mb-5">
            @include('public.partials.alert')
            <h4 class="text-white mb-4">Gallery</h4>
            @if (auth()->user()->modelprofile != null)
                @foreach (auth()->user()->modelprofile->photos as $photo)
                    <div class="col-12 col-md-6 col-xl-3 m-2" style="cursor: pointer;">
                        <div class="event-grid">
                            <div class="event-card">
                                <div class="event-body">
                                    <img src="{{ asset($photo->photo_path) }}" data-bs-toggle="modal"
                                        data-bs-target="#viewPhotoModal{{ $photo->id }}"
                                        style="width: 100%; height: 200px; border-radius: 10px; object-fit: cover; border: 1px solid #444;">
                                </div>


                            </div>
                        </div>
                    </div>

                    {{-- View Photo Modal --}}
                    <div class="modal fade" id="viewPhotoModal{{ $photo->id }}" tabindex="-1"
                        aria-labelledby="viewPhotoModalLabel{{ $photo->id }}" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg">
                            <div class="modal-content bg-dark text-white">
                                <div class="modal-header border-0">
                                    <h5 class="modal-title" id="viewPhotoModalLabel{{ $photo->id }}">Photo Preview</h5>
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                    <img src="{{ asset($photo->photo_path) }}" class="img-fluid rounded shadow">
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                <div class="col-12 col-md-6 col-xl-3 m-2" style="cursor: pointer;">
                    <div class="event-grid">
                        <div class="event-card">
                            <!-- Form to upload image -->
                            <form id="galleryForm" action="{{ route('user.upload-image') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf

                                <!-- Hidden file input -->
                                <input type="file" id="galleryImage" name="portfolio[]"
                                    accept="image/.jpg, image/.png, image/.jpeg" style="display: none;"
                                    onchange="document.getElementById('galleryForm').submit();" multiple />

                                <!-- Add image button -->
                                {{-- <button type="button" class="btn btn-primary rounded-circle shadow"
                                    style="width: 50px; height: 50px; font-size: 22px;"
                                    onclick="document.getElementById('galleryImage').click()">
                                    <i class="fa fa-plus"></i>
                                </button> --}}

                                <div class="col-12 " style="cursor: pointer;">
                                    <div class="event-grid">
                                        <div class="event-card">
                                            <div class="event-body">
                                                {{-- <i class="fa fa-plus"
                                                    onclick="document.getElementById('galleryImage').click()"></i> --}}
                                                <img src="{{ asset('img/add-image.png') }}"
                                                    onclick="document.getElementById('galleryImage').click()"
                                                    style="width: 100%; height: 200px; border-radius: 10px; object-fit: fit; border: 1px solid #444;">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="text-center py-5">
                    <h5 class="text-muted">Complete your model profile first</h5>
                </div>
            @endif


        </div>
    </div>
@endsection
