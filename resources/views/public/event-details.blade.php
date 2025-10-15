@extends('public.master')

@section('content')
    <!-- Header Banner -->
    <section class="banner-header middle-height section-padding bg-img" data-overlay-dark="7"
        data-background="{{ asset($event->hero_media_url) }}">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mt-30">

                        <h2 style="text-transform:capitalize">{{ $event->title }}</h2>
                        <div class="post">
                            <div class="author mb-15"> <img src="{{ asset('img/team/a.jpg') }}" alt=""
                                    class="avatar"> <span>Atkans
                                    House</span> </div>
                            <div class="date-comment"> <i class="ti-calendar"></i> {{ $event->start_date }} |
                                {{ $event->location }}</div>


                            {{-- @if ($event->type == 'Show') --}}
                            @if ($event->milestone)
                                <p href="#" class=" mb-15 mt-4"> {{ $event->milestone->rule_name }} </p>
                                <p href="#" class=" mb-15 mt-4">Achieve your milestones and shine bright!</p>
                            @endif
                            @auth

                                @php
                                    $p = \App\Models\Participation::where('event_id', $event->id)
                                        ->where('user_id', auth()->id())
                                        ->exists();
                                @endphp

                                @if ($p)
                                    <br>
                                    <p href="#" class="button-3 mb-15 mt-4"> Wait For Approval</p>
                                    <p href="#" class=" mb-15 mt-4">Get ready to shine! Once approved, your photo will go
                                        live for voting in the Show Gallery.</p>
                                @else
                                    <form action="{{ route('participate.store') }}" method="post">
                                        @csrf
                                        <input type="hidden" name="event_id" value="{{ $event->id }}">
                                        <button type="submit" class="button-3 mb-15 mt-4">Participate
                                            Now</button>

                                    </form>
                                @endif
                            @else
                                <a href="{{ route('user.login', ['redirect' => url()->current()]) }}"
                                    class="button-3 mb-15 mt-4">Login to Participate</a>
                            @endauth
                            {{-- @endif --}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Post -->
    <div class="post section-padding" style="    padding:60px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-30">
                    <p style="color:#fff; font-size:17px;"> {{ $event->short_description }}</p>

                    {{-- <p class="mt-4" style="color:#fff; font-size:17px;">
                        Experience fashion history in the making as <strong>Dolce & Gabbana</strong> unveil their
                        breathtaking <strong>Alta Moda collection</strong> in one of the most iconic landmarks in the world
                        — <em>The Roman Forum</em>.
                    </p>

                    <p style="color:#fff; font-size:17px;">
                        Set against the grandeur of ancient ruins, this exclusive couture event fuses timeless Roman
                        heritage with the unmatched elegance of Italian high fashion. Expect dramatic silhouettes,
                        hand-crafted embellishments, and an atmosphere that radiates luxury, culture, and artistic mastery.
                    </p> --}}

                    {{-- <h4 class="mt-4" style="color:#fff; font-size:17px;">What to Expect:</h4>
                    <ul style="color:#fff; font-size:17px; ">
                        <li>✔️ Mesmerizing Alta Moda runway showcase</li>
                        <li>✔️ Star-studded guest list with celebrities & fashion icons</li>
                        <li>✔️ Immersive cultural and design experience</li>
                        <li>✔️ Behind-the-scenes designer insights</li>
                    </ul>

                    <h4 class="mt-4" style="color:#fff; font-size:17px;">Who Should Attend:</h4>
                    <p style="color:#fff; font-size:17px;">
                        Fashion enthusiasts, luxury buyers, VIP clients, influencers, and media professionals.
                    </p> --}}

                    <div class="alert alert-warning mt-4" role="alert">
                        <strong>Note:</strong> {{ $event->venue_note }}
                    </div>

                </div>
            </div>

        </div>
    </div>
    <!-- divider line -->
    <div class="line-vr-section"></div>
@endsection
