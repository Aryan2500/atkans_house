@extends('public.master')

@section('style')
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
    <div class="post section-padding bg-cream" style="background: #181c21">
        <div class="container">
            <div class="section">
                <div class="row">
                    <!-- Info Text -->
                    <div class="col-lg-5 col-md-12">
                        <div class="wrap">
                            <div class="cont" style="padding-top: 120px;">
                                <h1 style="text-transform: capitalize; line-height:65px;">Register as <span
                                        style="color: #b7d433;">Sponsor</span></h1>
                                <p
                                    style="color:#fff; text-transform: capitalize; font-family: 'avenirlight'; letter-spacing:1px; font-size: 18px;">
                                    Join our sponsor program in just a few easy steps and enjoy exclusive discounts of 20%
                                    to 50% on all our products.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Form -->
                    <div class="col-lg-7 col-md-12">
                        <div class="form-box"
                            style="box-shadow: 0 8px 16px #07090D10; border-radius: 16px; background-color: #1A1D24; padding: 31px; border: 1px solid #2c2626;">
                            <form method="post" class="row" action="{{ route('become.sponsor.store') }}"
                                id="sponsor-form">
                                @csrf

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize; font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">
                                        Your Name
                                    </label>
                                    <input type="text" name="name" id="name" placeholder="Your Name *"
                                        value="{{ old('name') }}" required>
                                </div>

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize; font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">
                                        Instagram profile link
                                    </label>
                                    <input type="text" name="insta_profile_link" id="insta_profile_link"
                                        placeholder="Your Instagram Profile Link" value="{{ old('insta_profile_link') }}"
                                        required>
                                </div>

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize; font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">
                                        No. of Followers
                                    </label>
                                    <input type="text" name="no_of_followers" id="no_of_followers"
                                        placeholder="No. of Followers" value="{{ old('no_of_followers') }}" required>
                                </div>

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize; font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">
                                        Other social media
                                    </label>
                                    <input type="text" name="other_social_media" id="other_social_media"
                                        placeholder="Other social media" value="{{ old('other_social_media') }}" required>
                                </div>

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize; font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">
                                        Phone No.
                                    </label>
                                    <input type="text" name="phone_number" id="phone_number" placeholder="Phone No."
                                        value="{{ old('phone_number') }}" required>
                                </div>

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize; font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">
                                        Email Address
                                    </label>
                                    <input type="email" name="email" id="email" placeholder="Email address *"
                                        value="{{ old('email') }}" required>
                                </div>

                                <div class="col-md-12 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize; font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">
                                        Which Product you are Interested in
                                    </label>
                                    <select name="interested_product" id="interested_product">
                                        <option value="">Choose</option>
                                        @foreach ($products as $p)
                                            <option value="{{ $p->name }}"
                                                {{ old('interested_product') == $p->name ? 'selected' : '' }}>
                                                {{ $p->name }}</option>
                                        @endforeach

                                    </select>
                                </div>

                                <div class="col-md-5 mb-30">
                                    <button class="button-3" type="submit"
                                        style="text-transform: capitalize; font-size:17px; font-family: 'avenirlight'; width: 100%;">
                                        Purchase Now
                                    </button>
                                </div>

                                <div class="col-md-7">
                                    <a href="{{ route('sponsor.thankyou') }}" class="button-3 fo"
                                        style="text-transform: capitalize; font-size:17px; font-family: 'avenirlight'; width: 100%; padding: 12px 30px; color:#fff;">
                                        Wait For Sponsorship And Discount
                                    </a>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <script>
        const form = document.getElementById('sponsor-form');

        const validation = new JustValidate('#sponsor-form', {
            errorFieldCssClass: 'is-invalid',
            errorLabelStyle: {
                color: 'red',
                fontSize: '13px',
                display: 'block',
            }
        });

        validation
            .addField('#name', [{
                    rule: 'required',
                    errorMessage: 'Name is required'
                },
                {
                    rule: 'minLength',
                    value: 2,
                    errorMessage: 'At least 2 characters'
                }
            ])
            .addField('#email', [{
                    rule: 'required',
                    errorMessage: 'Email is required'
                },
                {
                    rule: 'email',
                    errorMessage: 'Invalid email format'
                }
            ])
            .addField('#phone_number', [{
                    rule: 'required',
                    errorMessage: 'Phone number is required'
                },
                {
                    rule: 'minLength',
                    value: 10,
                    errorMessage: 'Enter a valid phone number'
                }
            ])
            .addField('#insta_profile_link', [{
                rule: 'required',
                errorMessage: 'Instagram link is required'
            }])
            .addField('#no_of_followers', [{
                rule: 'required',
                errorMessage: 'Followers count is required'
            }])
            .addField('#interested_product', [{
                rule: 'required',
                errorMessage: 'Please select a product'
            }])
            .onSuccess(() => {
                form.submit();
            });
    </script>
@endpush
