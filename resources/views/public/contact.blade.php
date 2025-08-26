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
    <!-- Header Banner -->
    <section class="banner-header middle-height section-padding bg-img" data-overlay-dark="7"
        data-background="{{ asset('img/slider/4.jpg') }}">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center mt-30">
                        <h6>Get in touch</h6>
                        <h1>Contact Us</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Box -->
    <div class="contact-box">
        <div class="container">
            <div class="row">
                <!-- Placeholder for other content -->
            </div>
        </div>
    </div>

    <!-- Contact -->
    <section class="contact section-padding mt-30">
        <div class="container">
            <div class="row">
                <!-- Form -->
                <div class="col-lg-12 col-md-12 mb-30">
                    <div class="form-box">
                        <h5>Get in touch</h5>
                        @include('public.partials.alert')
                        <form method="POST" action="{{ route('contact.store') }}" id="contact-form" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input name="name" id="name" type="text" placeholder="Your Name *"
                                            value="{{ old('name') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input name="email" id="email" type="email" placeholder="Your Email *"
                                            value="{{ old('email') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input name="subject" id="subject" type="text" placeholder="Subject *"
                                            value="{{ old('subject') }}">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" cols="30" rows="3" placeholder="Message">{{ old('message') }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" value="Send Message">
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    <script>
        const form = document.getElementById('contact-form');

        const validation = new JustValidate('#contact-form', {
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
                    errorMessage: 'Name is required',
                },
                {
                    rule: 'minLength',
                    value: 2,
                    errorMessage: 'Name must be at least 2 characters',
                }
            ])
            .addField('#email', [{
                    rule: 'required',
                    errorMessage: 'Email is required',
                },
                {
                    rule: 'email',
                    errorMessage: 'Email is not valid',
                }
            ])
            .addField('#subject', [{
                    rule: 'required',
                    errorMessage: 'Subject is required',
                },
                {
                    rule: 'minLength',
                    value: 3,
                    errorMessage: 'Subject must be at least 3 characters',
                }
            ])
            .onSuccess((event) => {
                form.submit(); // ✅ This is the correct and safest approach
            });
    </script>
@endpush
