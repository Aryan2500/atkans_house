@extends('public.master')

@section('content')
    <!-- Slider -->
    <section class="banner-header section-padding bg-img" data-overlay-dark="7" data-background="img/slider/4.jpg">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center mt-30">

                        <h1>Models</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About -->

    <!-- divider line -->
    <div class="line-vr-section"></div>


    <!-- Team -->
    <section class="team section-padding">
        <div class="container">
            <div class="form-box mb-30"
                style="box-shadow: 0 8px 16px #07090D10; border-radius: 8px; background-color: #1A1D24;     padding: 16px;
    border: 1px solid #2c2626;">
                {{-- <div class="row">
                    <div class="col-md-2 mb-10"> <input type="text" id="filterCity" placeholder="City"></div>
                    <div class="col-md-2 mb-10"> <select id="filterGender" class="">
                            <option value="">Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-10">
                        <select id="filterAge" class="">
                            <option value="">Age Group</option>
                            <option value="18-25">18-25</option>
                            <option value="26-35">26-35</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-10">
                        <select id="filterBudget" class="">
                            <option value="">Budget</option>
                            <option value="low">Below ₹5,000</option>
                            <option value="mid">₹5,000 - ₹10,000</option>
                            <option value="high">Above ₹10,000</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-10">
                        <select id="filterCategory" class="">
                            <option value="">Category</option>
                            <option value="Fashion">Fashion</option>
                            <option value="Commercial">Commercial</option>
                            <option value="Fitness">Fitness</option>
                        </select>
                    </div>
                    <div class="col-md-2 mb-10"> <button onclick="filterModels()"
                            style="padding: 12px 12px;width: 100%;border-radius: 9px;" class="button-1 ">Search</button>
                    </div>
                </div> --}}
                <div class="row">
                    <div class="col-md-2 mb-10">
                        <input type="text" id="filterCity" placeholder="City" value="{{ request('city') }}">
                    </div>

                    <div class="col-md-2 mb-10">
                        <select id="filterGender">
                            <option value="">Gender</option>
                            <option value="Male" {{ request('gender') == 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ request('gender') == 'Female' ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-10">
                        <select id="filterAge">
                            <option value="">Age Group</option>
                            <option value="18-25" {{ request('age') == '18-25' ? 'selected' : '' }}>18-25</option>
                            <option value="26-35" {{ request('age') == '26-35' ? 'selected' : '' }}>26-35</option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-10">
                        <select id="filterBudget">
                            <option value="">Budget</option>
                            <option value="low" {{ request('budget') == 'low' ? 'selected' : '' }}>Below ₹5,000</option>
                            <option value="mid" {{ request('budget') == 'mid' ? 'selected' : '' }}>₹5,000 - ₹10,000
                            </option>
                            <option value="high" {{ request('budget') == 'high' ? 'selected' : '' }}>Above ₹10,000
                            </option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-10">
                        <select id="filterCategory">
                            <option value="">Category</option>
                            <option value="Fashion" {{ request('category') == 'Fashion' ? 'selected' : '' }}>Fashion
                            </option>
                            <option value="Commercial" {{ request('category') == 'Commercial' ? 'selected' : '' }}>
                                Commercial</option>
                            <option value="Fitness" {{ request('category') == 'Fitness' ? 'selected' : '' }}>Fitness
                            </option>
                        </select>
                    </div>

                    <div class="col-md-2 mb-10">
                        <button onclick="filterModels()" style="padding: 12px 12px;width: 100%;border-radius: 9px;"
                            class="button-1">Search</button>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="team">
                        <div class="row">

                            @if (count($models) > 0)
                                @foreach ($models as $m)
                                    <div class="col-lg-3 mb-20">
                                        <div class="wrapper"
                                            style="box-shadow: 0 8px 16px #07090D10; border-radius: 16px; background-color: #1A1D24;   padding: 10px;border: 1px solid #2c2626;">
                                            @if ($m->photo)
                                                <img src="{{ asset($m->photo) }}" style="border-radius: 10px;"
                                                    class="img-fluid" alt="">
                                            @else
                                                <img src="https://thumbs.dreamstime.com/b/person-gray-photo-placeholder-man-costume-white-background-person-gray-photo-placeholder-man-136701248.jpg"
                                                    style="border-radius: 10px;" class="img-fluid" alt="">
                                            @endif
                                            <div class="text" style="padding-top: 10px;">
                                                <h5 class="name" style="margin-bottom: 5px;">{{ $m->user->name }}</h5>
                                                <h6 class="position">Age : {{ \Carbon\Carbon::parse($m->user->dob)->age }}
                                                </h6>
                                                <div class="icon"> <a href="{{ route('profile', $m->id) }}"
                                                        class="button-1">View Profile</a> </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12 text-center py-5">
                                    <img src="{{ asset('/img/empty-calender.png') }}" alt="No Events"
                                        style="max-width: 120px; opacity: 0.5;">
                                    <h4 class="mt-4"
                                        style="color: #ccc; font-family: 'avenirlight'; letter-spacing: 1px;">
                                        No models found.
                                    </h4>
                                    <p style="color: #777; font-size: 15px;">
                                        Please check back later — we’re working on something amazing for you!
                                    </p>
                                </div>
                            @endif


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="line-vr-section"></div>
@endsection

@push('scripts')
    <script>
        function filterModels() {
            const city = document.getElementById('filterCity').value;
            const gender = document.getElementById('filterGender').value;
            const age = document.getElementById('filterAge').value;
            const budget = document.getElementById('filterBudget').value;
            const category = document.getElementById('filterCategory').value;

            const queryParams = new URLSearchParams();

            if (city) queryParams.append('city', city);
            if (gender) queryParams.append('gender', gender);
            if (age) queryParams.append('age', age);
            if (budget) queryParams.append('budget', budget);
            if (category) queryParams.append('category', category);

            window.location.href = `{{ url()->current() }}?${queryParams.toString()}`;
        }
    </script>
@endpush
