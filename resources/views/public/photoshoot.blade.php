@extends('public.master')

@section('style')
    <style>
        .button-3 {
            display: inline-block;
            height: auto;
            padding: 12px 36px;
            border: 1px solid #b6ef00;
            border-radius: 15px;
            background-color: transparent;
            color: #fff;
            width: 100%;
            text-align: center;
            font-family: 'avenirlight';
            font-size: 18px;
            font-weight: 400;
            text-transform: capitalize;
            transition: border-color 300ms ease, transform 300ms ease, background-color 300ms ease, color 300ms ease;
            transform-style: preserve-3d;
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
    <!-- Header Banner -->
    @include('public.partials.alert')
    <section class="banner-header section-padding bg-img" data-overlay-dark="7" data-background="img/works/01.jpg">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center mt-30">
                        <h6>Professional Photography Services?</h6>
                        <h1>Capture Your Moments</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About -->
    <section class="section-padding">
        <div class="container">
            <div class="gallery-items">
                <div class="row">
                    <div class="col-lg-4 col-md-6  mb-15">
                        <a href="img/work/1.jpg" title="" class="gallery-masonry-item-img-link img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="img/work/1.jpg" class="img-fluid mx-auto d-block"
                                        alt=""> </div>
                                <div class="gallery-detail">
                                    <h4>Fashion Shoot</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 mb-15">
                        <a href="img/work/2.jpg" title="" class="gallery-masonry-item-img-link img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="img/work/2.jpg" class="img-fluid mx-auto d-block"
                                        alt=""> </div>
                                <div class="gallery-detail">
                                    <h4>Fashion Shoot</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 single-item exterior mb-15">
                        <a href="img/works/3.jpg" title="" class="gallery-masonry-item-img-link img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="img/works/3.jpg" class="img-fluid mx-auto d-block"
                                        alt=""> </div>
                                <div class="gallery-detail">
                                    <h4>Fashion Shoot</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 single-item web mb-15">
                        <a href="img/works/4.jpg" title="" class="gallery-masonry-item-img-link img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="img/works/4.jpg" class="img-fluid mx-auto d-block"
                                        alt=""> </div>
                                <div class="gallery-detail">
                                    <h4>Fashion Shoot</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 single-item web mb-15">
                        <a href="img/works/5.jpg" title="" class="gallery-masonry-item-img-link img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="img/works/5.jpg" class="img-fluid mx-auto d-block"
                                        alt=""> </div>
                                <div class="gallery-detail">
                                    <h4>Fashion Shoot</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 single-item branding mb-15">
                        <a href="img/works/6.jpg" title="" class="gallery-masonry-item-img-link img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="img/works/6.jpg" class="img-fluid mx-auto d-block"
                                        alt=""> </div>
                                <div class="gallery-detail">
                                    <h4>Fashion Shoot</h4>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-6 single-item branding mb-15">
                        <a href="img/works/7.jpg" title="" class="gallery-masonry-item-img-link img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="img/works/7.jpg" class="img-fluid mx-auto d-block"
                                        alt=""> </div>
                                <div class="gallery-detail">
                                    <h4>Fashion Shoot</h4>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-4 col-md-6 single-item branding mb-15">
                        <a href="img/works/7.jpg" title="" class="gallery-masonry-item-img-link img-zoom">
                            <div class="gallery-box">
                                <div class="gallery-img"> <img src="img/works/8.jpg" class="img-fluid mx-auto d-block"
                                        alt=""> </div>
                                <div class="gallery-detail">
                                    <h4>Fashion Shoot</h4>
                                </div>
                            </div>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </section>

    <!-- divider line -->
    <div class="line-vr-section"></div>
    <!-- Testimonials -->
    <section class="price section-padding">
        <div class="container">
            <div class="row mb-30">
                <h3 class="text-center "> Photography Packages</h3>
            </div>
            <div class="row">
                @if ($packages->count() > 0)
                    @foreach ($packages as $p)
                        <div class="col-lg-4 col-md-12 mb-45">
                            <div class="item">
                                <h3>{{ $p->name }}</h3>
                                <div class="cont">
                                    <ul class="dot-list">
                                        @foreach ($p->features as $f)
                                            <li>{{ $f }}</li>
                                        @endforeach
                                    </ul> <a data-bs-toggle="modal" data-bs-target="#bookingModel"
                                        onclick="setPackage({{ $p->id }})" data-bs-whatever="@mdo" href="#0"
                                        class="button-3 mt-30">Discover
                                        Pakages</a>
                                </div>
                                <a data-bs-toggle="modal" data-bs-target="#bookingModel" data-bs-whatever="@mdo"
                                    href="#0" class="rmore active">
                                    <div class="arrow"> <span>₹</span>{{ $p->price }}</div>
                                    <div class="br-left-top">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path
                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                fill="#000"></path>
                                        </svg>
                                    </div>
                                    <div class="br-right-bottom">
                                        <svg viewBox="0 0 11 11" fill="none" xmlns="http://www.w3.org/2000/svg"
                                            class="w-11 h-11">
                                            <path
                                                d="M11 1.54972e-06L0 0L2.38419e-07 11C1.65973e-07 4.92487 4.92487 1.62217e-06 11 1.54972e-06Z"
                                                fill="#000"></path>
                                        </svg>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-12 text-center py-5">
                        <img src="{{ asset('/img/empty-calender.png') }}" alt="No Events"
                            style="max-width: 120px; opacity: 0.5;">
                        <h4 class="mt-4" style="color: #ccc; font-family: 'avenirlight'; letter-spacing: 1px;">
                            No Packages found.
                        </h4>
                        <p style="color: #777; font-size: 15px;">
                            Please check back later — we’re working on something amazing for you!
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </section>
    <!-- Clients -->

    <!-- Popup Contact Form -->
    <div class="modal fade" id="bookingModel" tabindex="-1" aria-labelledby="bookingModelLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="bookingModelLabel"
                        style="letter-spacing:-1px; text-transform:capitalize; font-weight:500; font-size:30px;">Booking
                        Form</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-box">
                        <form method="POST" action="{{ route('photoshoot.booking') }}" id="booking-form">
                            @csrf
                            <input type="hidden" name="package_id" id="package_id" value="">

                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input name="name" id="name" type="text" placeholder="Your Name *"
                                        style="font-family: 'avenirlight'; font-size:17px;">
                                </div>

                                <div class="col-md-6 form-group">
                                    <input name="email" id="email" type="email" placeholder="Your Email *"
                                        style="font-family: 'avenirlight'; font-size:17px;">
                                </div>

                                <div class="col-md-6 form-group">
                                    <input name="phone" id="phone" type="text" placeholder="Your Number *"
                                        style="font-family: 'avenirlight'; font-size:17px;">
                                </div>

                                {{-- <div class="col-md-6 form-group">
                                    <select name="package" id="package" class="form-control">
                                        <option value="">-- Select Package --</option>
                                        <option value="Basic">Basic</option>
                                        <option value="Standard">Standard</option>
                                        <option value="Premium">Premium</option>
                                    </select>
                                </div> --}}

                                <div class="col-md-6 form-group">
                                    <input type="date" name="shoot_date" id="shootDate" class="form-control"
                                        placeholder="Shoot Date">
                                </div>

                                <div class="col-md-12 form-group">
                                    <textarea name="notes" id="message" cols="20" rows="2" placeholder="Additional Notes"
                                        style="font-size:17px; font-family: 'avenirlight';"></textarea>
                                </div>

                                <section class="addons mb-20 col-md-12">
                                    <h6>Add-on Options</h6>
                                    <label><input type="checkbox" class="addon" name="add_ons[]" value="Makeup Artist">
                                        Makeup Artist (+₹500)</label>&nbsp;
                                    <label><input type="checkbox" class="addon" name="add_ons[]"
                                            value="Outdoor Location"> Outdoor Location (+₹700)</label>&nbsp;
                                    <label><input type="checkbox" class="addon" name="add_ons[]" value="Extra Edits">
                                        Extra Edits (+₹300)</label>&nbsp;
                                </section>

                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="modal-button"
                                        style="font-size:17px; font-family: 'avenirlight'; font-weight:400">
                                        Send Message
                                    </button>
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
    <script src="https://cdn.jsdelivr.net/npm/just-validate@4.3.0/dist/just-validate.production.min.js"></script>

    <script>
        function setPackage(id) {
            // alert(id);
            $('#package_id').val(id);
        }

        const form = document.getElementById('booking-form');
        const validation = new JustValidate('#booking-form', {
            errorFieldCssClass: 'is-invalid',
            errorLabelStyle: {
                color: '#f44336',
                fontSize: '13px',
                marginTop: '5px',
            }
        });

        validation
            .addField('#name', [{
                    rule: 'required',
                    errorMessage: 'Name is required'
                },
                {
                    rule: 'minLength',
                    value: 2
                }
            ])
            .addField('#email', [{
                    rule: 'required',
                    errorMessage: 'Email is required'
                },
                {
                    rule: 'email',
                    errorMessage: 'Invalid email'
                }
            ])
            .addField('#phone', [{
                    rule: 'required',
                    errorMessage: 'Phone number is required'
                },
                {
                    rule: 'minLength',
                    value: 10
                },
                {
                    rule: 'maxLength',
                    value: 10
                }
            ])
            // .addField('#package', [{
            //     rule: 'required',
            //     errorMessage: 'Please select a package'
            // }])
            .addField('#shootDate', [{
                rule: 'required',
                errorMessage: 'Select a shoot date'
            }])
            .addField('#message', [{
                    rule: 'required',
                    errorMessage: 'Message is required'
                },
                {
                    rule: 'minLength',
                    value: 5
                }
            ])
            .onSuccess((event) => {
                form.submit(); // native submission
            });
    </script>
@endpush
