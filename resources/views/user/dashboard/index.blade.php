@extends('user.master')

@section('styles')
    <style>
        .just-validate-error-label {
            color: #f44336;
            font-size: 13px;
            margin-top: -50px !important;
            margin-bottom: 15px !important;

        }
    </style>
@endsection

@section('content')
    <div class="container-fluid py-2">

        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="fw-bold">Welcome, {{ Auth::user()->name ?? auth()->user()->firstName }}!</h3>
            <small class="text-muted">{{ \Carbon\Carbon::now()->format('l, d M Y') }}</small>
        </div>

        <div class="row">

            <div class="post  py-4  bg-cream" style="background: #181c21">
                <div class="container">
                    <div class="section">
                        <div class="row">
                            @include('public.partials.alert')

                            <!-- Comment -->
                            <div class="col-lg-5 col-md-12">
                                <div class="wrap">

                                    <div class="cont" style="padding: 40px;">
                                        <h1 style="text-transform: capitalize; line-height:65px;">Complete Your Model
                                            Profile
                                        </h1>

                                        <p
                                            style="color:#fff; text-transform: capitalize;     font-family: 'avenirlight'; letter-spacing:1px; font-size: 18px;">
                                            Build a stunning profile that captures attention and connects you with top
                                            creative agencies and brands.</p>


                                        <h3 style="text-transform: capitalize; line-height:65px;"> My Gallery
                                        </h3>

                                        @include('user.partials.gallery')

                                    </div>

                                </div>

                            </div>
                            <!-- Contact Form -->
                            <div class="col-lg-7 col-md-12">
                                <div class="form-box"
                                    style="box-shadow: 0 8px 16px #07090D10; border-radius: 16px; background-color: #1A1D24;     padding: 31px;
    border: 1px solid #2c2626;">
                                    <!-- <h5 class="white">Leave <span>a Reply</span></h5> -->
                                    <form method="POST"
                                        action="  {{ auth()->user()->modelprofile ? route('modelprofile.update', auth()->user()->modelprofile->id) : route('modelprofile.store') }}"
                                        id="rampwalk-form" enctype="multipart/form-data" class="row">
                                        @csrf


                                        @if (auth()->user()->modelprofile)
                                            @method('PUT')
                                        @endif

                                        <div class="col-md-6 mb-10">
                                            <label>Full Name</label>
                                            <input type="text" name="name" id="name" placeholder="Your Name *"
                                                value="{{ old('name') ?? auth()->user()->name }}">
                                        </div>

                                        <div class="col-md-6 mb-10">
                                            <label>Gender</label>
                                            <select name="gender" id="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Male"
                                                    {{ old('gender') ?? auth()->user()->gender == 'Male' ? 'selected' : '' }}>
                                                    Male
                                                </option>
                                                <option value="Female"
                                                    {{ old('gender') ?? auth()->user()->gender == 'Female' ? 'selected' : '' }}>
                                                    Female
                                                </option>
                                                <option value="Others"
                                                    {{ old('gender') ?? auth()->user()->gender == 'Others' ? 'selected' : '' }}>
                                                    Others
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-6 mb-10">
                                            <label>Height (in cm)</label>
                                            <input type="text" name="height_cm" id="height"
                                                placeholder="Height e.g. 172cm"
                                                value="{{ old('height') ?? auth()->user()->modelProfile ? auth()->user()->modelProfile->height_cm : '' }}">
                                        </div>

                                        <div class="col-md-6 mb-10">
                                            <label>Weight (in kg)</label>
                                            <input type="text" name="weight_kg" id="weight"
                                                placeholder="Weight e.g. 58kg"
                                                value="{{ old('weight') ?? auth()->user()->modelProfile ? auth()->user()->modelProfile->weight_kg : '' }}">
                                        </div>

                                        <div class="col-md-6 mb-10">
                                            <label>Category</label>
                                            <select name="category" id="category">
                                                <option value="">Select Category</option>
                                                <option value="Kids"
                                                    {{ old('category', auth()->user()->modelProfile->category ?? '') == 'Kids' ? 'selected' : '' }}>
                                                    Kids
                                                </option>
                                                <option value="Teen"
                                                    {{ old('category', auth()->user()->modelProfile->category ?? '') == 'Teen' ? 'selected' : '' }}>
                                                    Teen
                                                </option>
                                                <option value="Adults"
                                                    {{ old('category', auth()->user()->modelProfile->category ?? '') == 'Adults' ? 'selected' : '' }}>
                                                    Adults
                                                </option>
                                                <option value="Senior"
                                                    {{ old('category', auth()->user()->modelProfile->category ?? '') == 'Senior' ? 'selected' : '' }}>
                                                    Senior
                                                </option>
                                            </select>


                                        </div>

                                        <div class="col-md-6 mb-10">
                                            <label>Instagram Profile Link</label>
                                            <input type="text" name="instagram_link" id="instagram"
                                                placeholder="Instagram profile link *"
                                                value="{{ old('instagram') ?? auth()->user()->modelProfile ? auth()->user()->modelProfile->instagram_link : '' }}">
                                        </div>

                                        {{-- {{ dd(auth()->user()) }} --}}
                                        <div class="col-md-6 mb-10">
                                            <label>Phone Number</label>
                                            <input type="text" name="phone" id="phone" placeholder="Phone Number"
                                                value="{{ old('phone') ?? auth()->user()->phone }} ">
                                        </div>

                                        <div class="col-md-6 mb-10">
                                            <label>Email Address</label>
                                            <input type="email" name="email" id="email" placeholder="Email address"
                                                value="{{ old('email') ?? auth()->user()->email }} "
                                                {{ auth()->user()->email ? 'disabled' : '' }}>
                                        </div>

                                        <div class="col-md-12 mb-20">
                                            <label>Portfolio Upload (images or PDF)</label>
                                            <input type="file" name="portfolio[]" id="portfolio" accept=".pdf, image/*"
                                                multiple>
                                            {{-- File inputs cannot be prefilled for security reasons --}}
                                        </div>

                                        <div class="col-md-12">
                                            <input type="submit"
                                                value= " {{ auth()->user()->email ? 'Update Profile' : 'Register Now' }} "
                                                style="width: 100%;">
                                        </div>
                                    </form>

                                </div>
                            </div>

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
        const form = document.getElementById('rampwalk-form');

        const validation = new JustValidate('#rampwalk-form', {
            errorFieldCssClass: 'is-invalid',
            errorLabelStyle: {
                color: 'red',
                fontSize: '13px',
                marginTop: '5px',
                display: 'block'
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
                },
                {
                    rule: 'customRegexp',
                    value: /^[A-Za-z\s]+$/, // allows only letters and spaces
                    errorMessage: 'Name must not contain numbers or special characters'
                }
            ])
            .addField('#gender', [{
                rule: 'required',
                errorMessage: 'Please select gender'
            }])
            .addField('#height', [{
                    rule: 'required'
                },
                {
                    rule: 'number',
                    errorMessage: 'Height must be numeric'
                }
            ])
            .addField('#weight', [{
                    rule: 'required'
                },
                {
                    rule: 'number',
                    errorMessage: 'Weight must be numeric'
                }
            ])
            .addField('#category', [{
                rule: 'required',
                errorMessage: 'Please select category'
            }])
            .addField('#instagram', [{
                    rule: 'required',
                    errorMessage: 'Instagram link is required'
                },
                {
                    rule: 'customRegexp',
                    value: /^(https?:\/\/)?(www\.)?instagram\.com\/[A-Za-z0-9._%-]+\/?$/,
                    errorMessage: 'Must be a valid Instagram profile link'
                }
            ])
            .addField('[name="phone"]', [{
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

        @if (auth()->user()->modelProfile == null)
            .addField('#portfolio', [{
                    rule: 'required',
                    errorMessage: 'Please upload a portfolio file'
                },
                {
                    validator: (value, fields) => {
                        const fileInput = document.querySelector('#portfolio');
                        return fileInput.files.length > 0;
                    },
                    errorMessage: 'File is required'
                }
            ])
        @endif

        .onSuccess((event) => {
            form.submit(); // Native form submission
        });
    </script>
@endpush
