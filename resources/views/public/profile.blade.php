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
    <section class="team-single section-padding" style="background: #181c21; padding: 60px 0;">
        <div class="container">
            <div class="row">
                @include('public.partials.alert')
                <div class="col-lg-5 col-md-12">
                    <div class="item">
                        <div class="img">
                            @if ($model->photo)
                                <img src="{{ asset($model->photo) }}" class="img-fluid" alt="">
                            @else
                                <img src="https://thumbs.dreamstime.com/b/person-gray-photo-placeholder-man-costume-white-background-person-gray-photo-placeholder-man-136701248.jpg"
                                    style="border-radius: 10px;" class="img-fluid" alt="">
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1 col-md-12 cont">
                    <h2 style="margin-bottom:0px"><span>{{ $model->user->name }}</span> </h2>
                    <p class=" mb-10" style=" font-family: 'avenirlight'; font-size:17px; color:#fff">Age :
                        {{ \Carbon\Carbon::parse($model->dob)->age }} Fashion &
                        Commercial Model | {{ $model->state }} ,{{ $model->city }}</p>
                    <hr>
                    <h5 class="mb-10">Portfolio</h5>
                    <p class="text-sm mb-0" style=" font-family: 'avenirlight';  color:#fff;margin-bottom:15px;">
                        Includes fashion, bridal, lifestyle shoots, and TV ads.<br>
                    </p>
                    <a href="#" class="text-white-600"
                        style="color:#fff; font-size:16px; text-decoration:underline">View Full Portfolio</a>
                    <!-- tab -->
                    <ul class="nav nav-tabs simpl-bord mt-30" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation"> <span class="nav-link active cursor-pointer"
                                id="skills-tab" data-bs-toggle="tab" data-bs-target="#skills">biography</span> </li>
                        <li class="nav-item" role="presentation"> <span class="nav-link cursor-pointer" id="biography-tab"
                                data-bs-toggle="tab" data-bs-target="#biography">Experience</span> </li>
                        <li class="nav-item" role="presentation"> <span class="nav-link cursor-pointer" id="education-tab"
                                data-bs-toggle="tab" data-bs-target="#education">Availability</span> </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="skills" role="tabpanel" aria-labelledby="skills-tab">
                            <p style=" font-family: 'avenirlight'; color:#fff; font-size:16px;">Ayushi Mehra is a
                                professional fashion and commercial model based in Mumbai, India. With a striking presence
                                and versatile look, Aarav has worked with leading fashion brands and appeared in several ad
                                campaigns. Known for his dedication, discipline, and effortless charm on camera, he brings a
                                unique edge to every project he works on.</p>
                        </div>
                        <div class="tab-pane fade" id="biography" role="tabpanel" aria-labelledby="biography-tab">

                            <ul class="list-unstyled list mb-60">
                                <li>
                                    <div class="list-icon"> <span class="ti-check"></span> </div>
                                    <div class="list-text">
                                        <p>5+ years in fashion, editorial, and ad campaigns</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-icon"> <span class="ti-check"></span> </div>
                                    <div class="list-text">
                                        <p>Runway model for Amazon India Fashion Week, FDCI events</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="list-icon"> <span class="ti-check"></span> </div>
                                    <div class="list-text">
                                        <p>Brand campaigns: L'Oréal, FabAlley, Pantaloonss</p>
                                    </div>
                                </li>

                                <li>
                                    <div class="list-icon"> <span class="ti-check"></span> </div>
                                    <div class="list-text">
                                        <p>Editorials: Femina, Elle India, Harper's Bazaar</p>
                                    </div>
                                </li>

                            </ul>
                        </div>
                        <div class="tab-pane fade" id="education" role="tabpanel" aria-labelledby="education-tab">
                            <p class="text-sm text-gray-700">
                                Available for shoots in Delhi, Mumbai, Bangalore & international bookings.<br>
                                Open for: fashion shows, bridal shoots, ad campaigns, influencer content.<br>
                                Weekdays & weekends (2–3 days advance notice).
                            </p>
                        </div>
                    </div>
                    <a data-bs-toggle="modal" data-bs-target="#hireRequestModal" data-bs-whatever="@mdo" href="#0"
                        class="button-2 mt-30" style="font-size:17px;  text-transform: capitalize;">Hire Me</a>
                </div>
            </div>
        </div>
    </section>
    <!-- divider line -->

    <!-- Popup Contact Form -->
    <div class="modal fade" id="hireRequestModal" tabindex="-1" aria-labelledby="hireRequestModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="hireRequestModalLabel">Hire {{ $model->user->name }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-box">
                        <form id="hireRequestForm" action="{{ route('hireRequest.store') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input type="hidden" name="model_id" value="{{ $model->id }}">
                                    <input name="name" type="text" placeholder="Brand Name *"
                                        value="{{ old('name') }}" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="shoot" type="text"
                                        placeholder="Type of Shoot (e.g., Bridal, Product) *" value="{{ old('shoot') }}"
                                        required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="phone" type="text" placeholder="Phone Number *"
                                        value="{{ old('phone') }}" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="email" type="email" placeholder="Email *"
                                        value="{{ old('email') }}" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="date" type="date" value="{{ old('date') }}" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="time" type="time" value="{{ old('time') }}" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input name="location" type="text" placeholder="Location *"
                                        value="{{ old('location') }}" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <textarea name="message" id="message" cols="20" rows="2" placeholder="Message *" required>{{ old('message') }}</textarea>
                                </div>
                                <div class="col-lg-12 col-md-12">
                                    <button type="submit" class="modal-button">Send Message</button>
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
        const validation = new JustValidate('#hireRequestForm', {
            errorFieldCssClass: 'is-invalid',
            errorLabelStyle: {
                color: '#f44336',
                fontSize: '13px',
                marginTop: '5px',
            }
        });

        validation
            .addField('[name="name"]', [{
                    rule: 'required',
                    errorMessage: 'Brand Name is required'
                },
                {
                    rule: 'minLength',
                    value: 2,
                    errorMessage: 'Name should be at least 2 characters'
                }
            ])
            .addField('[name="shoot"]', [{
                rule: 'required',
                errorMessage: 'Type of shoot is required'
            }])
            .addField('[name="phone"]', [{
                    rule: 'required',
                    errorMessage: 'Phone number is required'
                },
                {
                    rule: 'number',
                    errorMessage: 'Phone number must be a number'
                },
                {
                    rule: 'minLength',
                    value: 10,
                    errorMessage: 'Phone number must be at least 10 digits'
                },
                {
                    rule: 'maxLength',
                    value: 10,
                    errorMessage: 'Phone number must be at most 10 digits'
                }
            ])
            .addField('[name="email"]', [{
                    rule: 'required',
                    errorMessage: 'Email is required'
                },
                {
                    rule: 'email',
                    errorMessage: 'Please enter a valid email'
                }
            ])
            .addField('[name="date"]', [{
                rule: 'required',
                errorMessage: 'Date is required'
            }])
            .addField('[name="time"]', [{
                rule: 'required',
                errorMessage: 'Time is required'
            }])
            .addField('[name="location"]', [{
                rule: 'required',
                errorMessage: 'Location is required'
            }])
            .addField('[name="message"]', [{
                    rule: 'required',
                    errorMessage: 'Message is required'
                },
                {
                    rule: 'minLength',
                    value: 5,
                    errorMessage: 'Message should be at least 5 characters'
                }
            ])
            .onSuccess((event) => {
                event.target.submit(); // Submit the form normally
            });
    </script>
@endpush
