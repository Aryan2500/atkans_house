@extends('public.master')

@section('content')
    <!-- Header Banner -->
    <section class="banner-header section-padding bg-img" data-overlay-dark="7" data-background="img/slider/4.jpg">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center mt-30">

                        <h1>Upcoming Events</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog section-padding">
        <div class="container">
            <div class="row">
                @if ($upcomingEvents->count() > 0)
                    @foreach ($upcomingEvents as $ue)
                        <div class="col-lg-6 col-md-12 mb-60">
                            <div class="item">
                                <a href="{{ route('event.details', $ue->id) }}" class="d-block"
                                    style="color:#aeca31; font-size:17px;">
                                    <img src=" {{ asset($ue->hero_media_url) }}" class="img-fluid w-100" alt="">
                                    <div class="bottom-fade"></div>
                                    <div class="icon">
                                        <div class="icon-w">
                                            <i class="icon-show">
                                                <span>29<br><i>Apr</i></span>
                                            </i>
                                            <i class="ti-arrow-top-right icon-hidden"></i>
                                        </div>
                                    </div>
                                    <div class="title">
                                        <h4 class="text-white">{{ $ue->title }}</h4>
                                        <p style="font-family: 'avenirlight'; color: #ffffff;">{{ $ue->location }}</p>
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
                            No upcoming events found.
                        </h4>
                        <p style="color: #777; font-size: 15px;">
                            Please check back later — we’re working on something amazing for you!
                        </p>
                    </div>
                @endif
            </div>
        </div>
    </section>

@endsection
