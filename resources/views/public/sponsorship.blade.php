@extends('public.master')

@section('style')
    <style>
        .cut:hover {
            background: #221c55;
            border: 1px solid #CDDC39;
        }
    </style>

    <style>
        .just-validate-error-label {
            color: #f44336;
            font-size: 13px;
            margin-top: -20px !important;
            margin-bottom: 15px !important;

        }
    </style>
@endsection

@section('content')
    @include('public.partials.alert')

    <!-- Header Banner -->
    <section class="banner-header section-padding bg-img" data-overlay-dark="7" data-background="img/slider/4.jpg">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center mt-30">

                        <h1>Sponsorship Opportunities</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About -->
    <section class="price section-padding">
        <div class="container">
            <div class="row mb-30">
                <h3>Sponsorship Opportunities</h3>
                <p class="text-white" style="font-size:17px"> Partnering with us as a sponsor gives your brand the spotlight
                    at high-impact events that attract a diverse, engaged, and influential audience. Whether you're looking
                    to build brand awareness, launch a product, or strengthen community presence, our events offer unmatched
                    visibility through digital and on-ground platforms.</p>

                <p class="text-white" style="font-size:17px">Sponsoring our events offers you exposure to a highly engaged
                    audience while supporting community-driven experiences. Get recognized as a forward-thinking brand
                    committed to innovation, creativity, and growth.</p>

            </div>

            <div class="row mb-30">


                <h3 class=" ">Benefits of Sponsoring</h3>

                <ul style="color:#fff; text-transform: captilize">

                    <li>Direct Engagement With A Targeted Audience</li>
                    <li>Featured Branding Across Digital And On-site Platforms</li>
                    <li>Networking With Decision-makers And Influencers</li>
                    <li>Boosted Brand Awareness And Reputation</li>

                </ul>
            </div>

            <div class="row mb-30">
                <h3 class="text-center">Sponsorship Tiers</h3>
            </div>

            <div class="row">
                @if ($tiers->count() > 0)
                    @foreach ($tiers as $index => $t)
                        <div class="col-lg-4 col-md-12 mb-45">
                            <div class="item {{ $index === 1 ? '' : 'cut' }}"
                                style="{{ $index === 1 ? 'border: 1px solid #b4ec00; background: #12121e;' : '' }}">

                                <h3>{{ $t->name }}</h3>
                                <div class="cont">
                                    <ul class="dot-list">
                                        @foreach ($t->features as $feature)
                                            <li>{{ $feature }}</li>
                                        @endforeach
                                    </ul>
                                </div>

                                <a data-bs-toggle="modal" onclick="setPackage({{ $t->id }})"
                                    data-bs-target="#sponsorshipModel" data-bs-whatever="@mdo" href="#0"
                                    class="button-2 mt-30" style="font-size:17px; text-transform: capitalize;">Discover
                                    Now</a>

                                <a data-bs-toggle="modal" data-bs-target="#sponsorshipModel" data-bs-whatever="@mdo"
                                    onclick="setPackage({{ $t->id }})" href="#0" class="rmore active">

                                    <div class="br-left-top">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path d="M11 1.54972e-06L0 0L0 11C0 4.92487 4.92487 0 11 0Z" fill="#000">
                                            </path>
                                        </svg>
                                    </div>
                                    <div class="br-right-bottom">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path d="M11 1.54972e-06L0 0L0 11C0 4.92487 4.92487 0 11 0Z" fill="#000">
                                            </path>
                                        </svg>
                                    </div>
                                    {{ $t->price }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        <img src="{{ asset('/img/empty-calender.png') }}" alt="No Events"
                            style="max-width: 120px; opacity: 0.5;">
                        <h4 class="mt-4" style="color: #ccc; font-family: 'avenirlight'; letter-spacing: 1px;">
                            No Sponsorship tiers found.
                        </h4>
                        <p style="color: #777; font-size: 15px;">
                            Please check back later — we’re working on something amazing for you!
                        </p>
                    </div>
                @endif

            </div>

        </div>
    </section>

    <!-- Popup Contact Form -->
    <div class="modal fade" id="sponsorshipModel" tabindex="-1" aria-labelledby="sponsorshipModelLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="sponsorshipModelLabel">Contact Us</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-box">
                        <form method="POST" action="{{ route('sponsorship.store') }}" id="sponsorship-form"
                            enctype="multipart/form-data" novalidate>
                            @csrf
                            <input type="hidden" name="package_id" id="package_id" value="">

                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Company Name</label>
                                    <input name="brand_name" type="text" placeholder="Company Name *"
                                        value="{{ old('brand_name') }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Contact Person Name</label>
                                    <input name="contact_name" type="text" placeholder="Contact Person Name *"
                                        value="{{ old('contact_name') }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Phone Number</label>
                                    <input name="contact_number" type="text" placeholder="Phone Number *"
                                        value="{{ old('contact_number') }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Email Address</label>
                                    <input name="email" type="email" placeholder="Email *"
                                        value="{{ old('email') }}">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Upload Logo or Proposal (PDF, JPG, PNG)</label>
                                    <input name="file" type="file" accept=".jpg,.jpeg,.png,.pdf">
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Sponsorship Type</label>
                                    <select id="type" name="type">
                                        <option value="">-- Select Type --</option>
                                        <option value="Cash" {{ old('type') == 'Cash' ? 'selected' : '' }}>Cash</option>
                                        <option value="Gift Items" {{ old('type') == 'Gift Items' ? 'selected' : '' }}>
                                            Gift
                                            Items</option>
                                        <option value="Services" {{ old('type') == 'Services' ? 'selected' : '' }}>
                                            Services
                                        </option>
                                    </select>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="modal-button">Submit Form</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function setPackage(id) {
            $('#package_id').val(id);
        }

        const form = document.getElementById('sponsorship-form');

        const sponsorshipValidation = new JustValidate('#sponsorship-form', {
            errorFieldCssClass: 'is-invalid',
            errorLabelStyle: {
                color: 'red',
                fontSize: '13px',
                display: 'block',
            }
        });

        sponsorshipValidation
            .addField('[name="brand_name"]', [{
                    rule: 'required',
                    errorMessage: 'Company name is required'
                },
                {
                    rule: 'minLength',
                    value: 2
                },
            ])
            .addField('[name="contact_name"]', [{
                    rule: 'required',
                    errorMessage: 'Contact name is required'
                },
                {
                    rule: 'minLength',
                    value: 2
                },
            ])
            .addField('[name="contact_number"]', [{
                    rule: 'required',
                    errorMessage: 'Phone is required'
                },
                {
                    rule: 'minLength',
                    value: 10
                },
                {
                    rule: 'maxLength',
                    value: 10
                },
                {
                    rule: 'number',
                    value: 10
                },
            ])
            .addField('[name="email"]', [{
                    rule: 'required'
                },
                {
                    rule: 'email'
                }
            ])
            .addField('[name="type"]', [{
                rule: 'required',
                errorMessage: 'Please select sponsorship type'
            }, ])
            .onSuccess((event) => {
                form.submit(); // Native form submission
            });
    </script>
@endpush
