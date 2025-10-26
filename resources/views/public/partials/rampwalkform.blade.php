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
  <div class="post section-padding bg-cream" style="background: #181c21">
      <div class="container">
          <div class="section">
              <div class="row">

                  @include('public.partials.alert')

                  <!-- Comment -->
                  <div class="col-lg-5 col-md-12">
                      <div class="wrap">

                          <div class="cont" style="padding-top: 90px;">
                              <h1 style="text-transform: capitalize; line-height:65px;">register for <span
                                      style="color: #b7d433;">atkans </span>
                                  {{ $rampwalkEvent ? $rampwalkEvent->title : 'Rampwalk' }}</h1>
                              @if ($rampwalkEvent)
                                  <p
                                      style="color:#fff; text-transform: capitalize;     font-family: 'avenirlight'; letter-spacing:1px; font-size: 12px;">
                                      <b> {{ $rampwalkEvent->subtitle }} </b>
                                  </p><br>
                              @endif

                              <p
                                  style="color:#fff; text-transform: capitalize;     font-family: 'avenirlight'; letter-spacing:1px; font-size: 18px;">
                                  We help creative agencies, designers, and other creative people showcase their
                                  perfect
                                  work.</p>
                          </div>
                      </div>
                      <div class="row">

                          <div class="col-md-4 text-center" data-delay="0" data-unload="none" data-threshold="0.5">
                              <h3 style="margin-bottom: 0px;">50+</h3>
                              <p>Rampwalk Done</p>
                          </div>

                          <div class="col-md-4 text-center" data-delay="0" data-unload="none" data-threshold="0.5">
                              <h3 style="margin-bottom: 0px;">500+</h3>
                              <p>Happy Clients</p>
                          </div>

                          <div class="col-md-4 text-center" data-delay="0" data-unload="none" data-threshold="0.5">
                              <h3 style="margin-bottom: 0px;">5+</h3>
                              <p>Years in Work</p>
                          </div>


                      </div>
                  </div>
                  <!-- Contact Form -->
                  <div class="col-lg-7 col-md-12">
                      <div class="form-box"
                          style="box-shadow: 0 8px 16px #07090D10; border-radius: 16px; background-color: #1A1D24;     padding: 31px;
    border: 1px solid #2c2626;">
                          <!-- <h5 class="white">Leave <span>a Reply</span></h5> -->
                          <form method="POST" action="{{ route('rampwalk.store') }}" id="rampwalk-form"
                              enctype="multipart/form-data" class="row">
                              @csrf

                              <div class="col-md-6 mb-10">
                                  <label>Full Name</label>
                                  <input type="text" name="name" id="name" placeholder="Your Name *"
                                      value="{{ old('name') }}">
                                  <input type="hidden" name="event_id"
                                      value="{{ $rampwalkEvent ? $rampwalkEvent->id : null }}">
                              </div>

                              <div class="col-md-6 mb-10">
                                  <label>Gender</label>
                                  <select name="gender" id="gender">
                                      <option value="">Select Gender</option>
                                      <option value="Male" {{ old('gender') == 'Male' ? 'selected' : '' }}>Male
                                      </option>
                                      <option value="Female" {{ old('gender') == 'Female' ? 'selected' : '' }}>Female
                                      </option>
                                      <option value="Others" {{ old('gender') == 'Others' ? 'selected' : '' }}>Others
                                      </option>
                                  </select>
                              </div>

                              <div class="col-md-6 mb-10">
                                  <label>Height (in cm)</label>
                                  <input type="text" name="height" id="height" placeholder="Height e.g. 172cm"
                                      value="{{ old('height') }}">
                              </div>

                              <div class="col-md-6 mb-10">
                                  <label>Weight (in kg)</label>
                                  <input type="text" name="weight" id="weight" placeholder="Weight e.g. 58kg"
                                      value="{{ old('weight') }}">
                              </div>

                              <div class="col-md-6 mb-10">
                                  <label>Category</label>
                                  <select name="category" id="category">
                                      <option value="">Select Category</option>
                                      <option value="Kids" {{ old('category') == 'Kids' ? 'selected' : '' }}>Kids
                                      </option>
                                      <option value="Teen" {{ old('category') == 'Teen' ? 'selected' : '' }}>Teen
                                      </option>
                                      <option value="Adults" {{ old('category') == 'Adults' ? 'selected' : '' }}>
                                          Adults
                                      </option>
                                      <option value="Senior" {{ old('category') == 'Senior' ? 'selected' : '' }}>
                                          Senior
                                      </option>
                                  </select>
                              </div>

                              <div class="col-md-6 mb-10">
                                  <label>Instagram Profile Link</label>
                                  <input type="text" name="instagram" id="instagram"
                                      placeholder="Instagram profile link *" value="{{ old('instagram') }}">
                              </div>

                              <div class="col-md-6 mb-10">
                                  <label>Phone Number</label>
                                  <input type="text" name="phone" id="phone" placeholder="Phone Number"
                                      value="{{ old('phone') }}">
                              </div>

                              <div class="col-md-6 mb-10">
                                  <label>Email Address</label>
                                  <input type="email" name="email" id="email" placeholder="Email address"
                                      value="{{ old('email') }}">
                              </div>

                              <div class="col-md-12 mb-20">
                                  <label>Portfolio Upload (images or PDF)</label>
                                  <input type="file" name="portfolio" id="portfolio" accept=".pdf, image/*">
                                  {{-- File inputs cannot be prefilled for security reasons --}}
                              </div>

                              <div class="col-md-12">
                                  <input type="submit" value="Register Now" style="width: 100%;">
                              </div>
                          </form>

                      </div>
                  </div>

              </div>
          </div>
      </div>
  </div>

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
              }, ])
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
              .onSuccess((event) => {
                  form.submit(); // Native form submission
              });
      </script>
  @endpush
