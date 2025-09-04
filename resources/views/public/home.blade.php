@extends('public.master')

@section('style')
    <style>
        .banner {
            margin-top: -97px !important;
            background-color: #ccff00;
            color: #000;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 40px;
            border-radius: 10px;
        }

        .banner-text {
            font-size: 28px;
            font-weight: 500;
        }

        .highlight {
            color: red;
        }

        .btn {
            background-color: #0b1b2b;
            color: #ccff00;
            padding: 10px 25px;
            border-radius: 25px;
            text-decoration: none;
            font-size: 18px;
            font-weight: 500;
        }

        @media (max-width: 600px) {
            .banner {
                flex-direction: column;
                text-align: center;
                gap: 20px;
            }
        }
    </style>
@endsection


@section('content')
    <!-- Slider -->
    <header class="header slider-fade">
        <div class="owl-carousel owl-theme">
            <!-- The opacity on the image is made with "data-overlay-dark="number". You can change it using the numbers 0-9. -->
            <div class="item bg-img" data-overlay-dark="0" data-background="img/slider/2.jpg">
                <!--        <div class="v-middle caption">
                                                                                                                                                                                                                                                                                                                                                                                            <div class="container">
                                                                                                                                                                                                                                                                                                                                                                                                <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="col-lg-8 col-md-12 mt-30">
                                                                                                                                                                                                                                                                                                                                                                                                        <h6>World Class</h6>
                                                                                                                                                                                                                                                                                                                                                                                                        <h1>We're a digital agency</h1> <a href="#" class="button-3">Getting started</a>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                        </div> -->
            </div>
            <div class="item bg-img" data-overlay-dark="0" data-background="img/slider/1.jpg">
                <!--     <div class="v-middle caption">
                                                                                                                                                                                                                                                                                                                                                                                            <div class="container">
                                                                                                                                                                                                                                                                                                                                                                                                <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="col-lg-8 col-md-12 mt-30">
                                                                                                                                                                                                                                                                                                                                                                                                        <h6>World Class</h6>
                                                                                                                                                                                                                                                                                                                                                                                                        <h1>Digital Agency Solutions</h1> <a href="#" class="button-3">Getting started</a>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                        </div> -->
            </div>

        </div>
    </header>
    <!-- About -->
    <section class="about section-padding" style="padding-top:50px">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <div class="content">
                        <div class="section-subtitle">Where Talent Meets the Spotlight.</div>
                        <div class="section-title">Your Runway Starts Here<span>Atkans House </span> Agency</div>
                        <p class="mb-20" style="color: #fff; font-size:17px; font-weight:500">Atkans House is a premier
                            modeling agency dedicated to discovering, developing, and promoting fresh talent alongside
                            seasoned professionals. Atkans House is a premier modeling agency committed to discovering new
                            faces and nurturing experienced professionals. We specialize in talent development, event
                            collaborations, and empowering models to shine in the fashion and entertainment industries.</p>
                        <!-- <h5 class="mb-30">Where Talent Meets the Spotlight.</h5>  -->
                        <a href="{{ route('about') }}" class="button-3 mb-15">Read More</a>
                        <!--<div class="phone"><a href="tel:+12345678910"><i class="fa-light fa-phone"></i>+91 234 567 8910</a></div>-->
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1 col-md-12 mt-30">
                    <div class="item"> <img src="img/ab.png" class="img-fluid" alt="">
                        <!-- <div class="bottom-fade"></div> -->
                        <!-- <div class="icon"> <a href="https://youtu.be/ZU35cy-04G0" class="vid arrow"><span class="ti-control-play"></span></a> </div> -->
                        <!-- <div class="title">
                                                                                                                                                                                                                                                                                                                                                                                                    <h4>Watch Video</h4>
                                                                                                                                                                                                                                                                                                                                                                                                </div> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- divider line -->
    <div class="line-vr-section"></div>
    <!-- Services -->
    <!--  <section class="services section-padding">
                                                                                                                                                                                                                                                                                                                                                                                <div class="container">
                                                                                                                                                                                                                                                                                                                                                                                    <div class="row justify-content-center">
                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-md-12 text-center mb-20">
                                                                                                                                                                                                                                                                                                                                                                                            <div class="section-subtitle">What we do</div>
                                                                                                                                                                                                                                                                                                                                                                                            <div class="section-title">Our Services</div>
                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-md-12">
                                                                                                                                                                                                                                                                                                                                                                                            <div class="owl-carousel owl-theme">
                                                                                                                                                                                                                                                                                                                                                                                                <div class="item">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="text">
                                                                                                                                                                                                                                                                                                                                                                                                        <h5>Digital Strategy</h5>
                                                                                                                                                                                                                                                                                                                                                                                                        <p>Lorem ipsum dolor miss onso altin amen the in constran adipiscing entesue in the rana duru miss fermen.</p>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="icon">
                                                                                                                                                                                                                                                                                                                                                                                                        <a href="service-details.html" class="arrow">
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="icon-w"> <i class="et-strategy icon-show"></i> <i class="ti-arrow-top-right icon-hidden"></i> </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </a>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="item">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="text">
                                                                                                                                                                                                                                                                                                                                                                                                        <h5>Web Development</h5>
                                                                                                                                                                                                                                                                                                                                                                                                        <p>Lorem ipsum dolor miss onso altin amen the in constran adipiscing entesue in the rana duru miss fermen.</p>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="icon">
                                                                                                                                                                                                                                                                                                                                                                                                        <a href="service-details.html" class="arrow">
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="icon-w"> <i class="et-browser icon-show"></i> <i class="ti-arrow-top-right icon-hidden"></i> </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </a>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="item">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="text">
                                                                                                                                                                                                                                                                                                                                                                                                        <h5>Social Media</h5>
                                                                                                                                                                                                                                                                                                                                                                                                        <p>Lorem ipsum dolor miss onso altin amen the in constran adipiscing entesue in the rana duru miss fermen.</p>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="icon">
                                                                                                                                                                                                                                                                                                                                                                                                        <a href="service-details.html" class="arrow">
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="icon-w"> <i class="et-chat icon-show"></i> <i class="ti-arrow-top-right icon-hidden"></i> </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </a>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="item">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="text">
                                                                                                                                                                                                                                                                                                                                                                                                        <h5>Digital Marketing</h5>
                                                                                                                                                                                                                                                                                                                                                                                                        <p>Lorem ipsum dolor miss onso altin amen the in constran adipiscing entesue in the rana duru miss fermen.</p>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="icon">
                                                                                                                                                                                                                                                                                                                                                                                                        <a href="service-details.html" class="arrow">
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="icon-w"> <i class="et-target icon-show"></i> <i class="ti-arrow-top-right icon-hidden"></i> </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </a>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="item">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="text">
                                                                                                                                                                                                                                                                                                                                                                                                        <h5>E-Commerce</h5>
                                                                                                                                                                                                                                                                                                                                                                                                        <p>Lorem ipsum dolor miss onso altin amen the in constran adipiscing entesue in the rana duru miss fermen.</p>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="icon">
                                                                                                                                                                                                                                                                                                                                                                                                        <a href="service-details.html" class="arrow">
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="icon-w"> <i class="et-basket icon-show"></i> <i class="ti-arrow-top-right icon-hidden"></i> </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </a>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="item">
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="text">
                                                                                                                                                                                                                                                                                                                                                                                                        <h5>Branding</h5>
                                                                                                                                                                                                                                                                                                                                                                                                        <p>Lorem ipsum dolor miss onso altin amen the in constran adipiscing entesue in the rana duru miss fermen.</p>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                    <div class="icon">
                                                                                                                                                                                                                                                                                                                                                                                                        <a href="service-details.html" class="arrow">
                                                                                                                                                                                                                                                                                                                                                                                                            <div class="icon-w"> <i class="et-genius icon-show"></i> <i class="ti-arrow-top-right icon-hidden"></i> </div>
                                                                                                                                                                                                                                                                                                                                                                                                        </a>
                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                            </section> -->
    <!-- divider line -->
    <!-- <div class="line-vr-section"></div> -->
    <!-- Portfolio -->
    <!--  <section class="portfolio-home section-padding">
                                                                                                                                                                                                                                                                                                                                                                                <div class="container">
                                                                                                                                                                                                                                                                                                                                                                                    <div class="row">
                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-md-12 text-center mb-20">
                                                                                                                                                                                                                                                                                                                                                                                            <div class="section-subtitle">Projects</div>
                                                                                                                                                                                                                                                                                                                                                                                            <div class="section-title white">Our Works</div>
                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                    <div class="portfolio-home-carousel owl-theme owl-carousel">
                                                                                                                                                                                                                                                                                                                                                                                        <div class="item">
                                                                                                                                                                                                                                                                                                                                                                                            <div class="img"> <img src="img/works/01.jpg" alt=""> </div>
                                                                                                                                                                                                                                                                                                                                                                                            <div class="con opacity-1">
                                                                                                                                                                                                                                                                                                                                                                                                <div class="title">
                                                                                                                                                                                                                                                                                                                                                                                                    <h6><span class="et-layers"></span> Design</h6>
                                                                                                                                                                                                                                                                                                                                                                                                    <h3>Branding Design</h3>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="icon">
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="portfolio-details.html" class="arrow"> <i class="ti-arrow-top-right"></i> </a>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                        <div class="item">
                                                                                                                                                                                                                                                                                                                                                                                            <div class="img"> <img src="img/works/02.jpg" alt=""> </div>
                                                                                                                                                                                                                                                                                                                                                                                            <div class="con opacity-1">
                                                                                                                                                                                                                                                                                                                                                                                                <div class="title">
                                                                                                                                                                                                                                                                                                                                                                                                    <h6><span class="et-layers"></span> Architecture</h6>
                                                                                                                                                                                                                                                                                                                                                                                                    <h3>Exterior Design</h3>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="icon">
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="portfolio-details2.html" class="arrow"> <i class="ti-arrow-top-right"></i> </a>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                        <div class="item">
                                                                                                                                                                                                                                                                                                                                                                                            <div class="img"> <img src="img/works/03.jpg" alt=""> </div>
                                                                                                                                                                                                                                                                                                                                                                                            <div class="con opacity-1">
                                                                                                                                                                                                                                                                                                                                                                                                <div class="title">
                                                                                                                                                                                                                                                                                                                                                                                                    <h6><span class="et-layers"></span> Branding</h6>
                                                                                                                                                                                                                                                                                                                                                                                                    <h3>Product Design</h3>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="icon">
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="portfolio-details3.html" class="arrow"> <i class="ti-arrow-top-right"></i> </a>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                        <div class="item">
                                                                                                                                                                                                                                                                                                                                                                                            <div class="img"> <img src="img/works/04.jpg" alt=""> </div>
                                                                                                                                                                                                                                                                                                                                                                                            <div class="con opacity-1">
                                                                                                                                                                                                                                                                                                                                                                                                <div class="title">
                                                                                                                                                                                                                                                                                                                                                                                                    <h6><span class="et-layers"></span> Branding</h6>
                                                                                                                                                                                                                                                                                                                                                                                                    <h3>Corporate Identity</h3>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="icon">
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="portfolio-details.html" class="arrow"> <i class="ti-arrow-top-right"></i> </a>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                        <div class="item">
                                                                                                                                                                                                                                                                                                                                                                                            <div class="img"> <img src="img/works/05.jpg" alt=""> </div>
                                                                                                                                                                                                                                                                                                                                                                                            <div class="con opacity-1">
                                                                                                                                                                                                                                                                                                                                                                                                <div class="title">
                                                                                                                                                                                                                                                                                                                                                                                                    <h6><span class="et-layers"></span> Design</h6>
                                                                                                                                                                                                                                                                                                                                                                                                    <h3>Branding Design</h3>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="icon">
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="portfolio-details.html" class="arrow"> <i class="ti-arrow-top-right"></i> </a>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                        <div class="item">
                                                                                                                                                                                                                                                                                                                                                                                            <div class="img"> <img src="img/works/06.jpg" alt=""> </div>
                                                                                                                                                                                                                                                                                                                                                                                            <div class="con opacity-1">
                                                                                                                                                                                                                                                                                                                                                                                                <div class="title">
                                                                                                                                                                                                                                                                                                                                                                                                    <h6><span class="et-layers"></span> Design</h6>
                                                                                                                                                                                                                                                                                                                                                                                                    <h3>Web Design</h3>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                                <div class="icon">
                                                                                                                                                                                                                                                                                                                                                                                                    <a href="portfolio-details.html" class="arrow"> <i class="ti-arrow-top-right"></i> </a>
                                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                            </div>
                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                            </section> -->
    <!-- divider line -->
    <div class="line-vr-section"></div>
    <!-- Team -->
    <section class="team section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 mb-30">
                    <!-- <div class="section-subtitle">Seniors</div> -->
                    <div class="section-title">Featured Models</div>
                    <p style="color: #fff; font-weight:500">Meet our top models—blending style, talent, and charisma. From
                        fresh faces, they’re ready to shine on any stage </p> <a href="{{ route('models') }}"
                        class="button-3">View
                        All Models <span class="ti-arrow-top-right"></span></a>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="team-container">
                        <div class="owl-carousel owl-theme">
                            @if (count($featured) > 0)
                                @foreach ($featured as $f)
                                    <div class="item ">
                                        <div class="wrapper">
                                            @if ($f && $f->photo)
                                                <img src="{{ $f->photo }}" class="img-fluid" alt="">
                                            @else
                                                <img src="https://thumbs.dreamstime.com/b/person-gray-photo-placeholder-man-costume-white-background-person-gray-photo-placeholder-man-136701248.jpg"
                                                    class="img-fluid" alt="">
                                            @endif

                                            <div class="icon"> <a href="{{ route('profile', ['id' => $f->id]) }}"
                                                    class="button-1">Hire me</a> </div>
                                            <div class="text">
                                                <h4 class="name">{{ $f->user->name }}</h4>
                                                <h6 class="position">Age : {{ \Carbon\Carbon::parse($f->dob)->age }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            {{-- <div class="item">
                                <div class="wrapper"> <img src="img/team/y.jpg" class="img-fluid" alt="">
                                    <div class="icon"> <a href="https://merishapr.com/atkansnew/view-profile.html"
                                            class="button-1">Hire me</a> </div>
                                    <div class="text">
                                        <h4 class="name">Model Name</h4>
                                        <h6 class="position">Age : 24</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="wrapper"> <img src="img/team/z.jpg" class="img-fluid" alt="">
                                    <div class="icon"> <a href="https://merishapr.com/atkansnew/view-profile.html"
                                            class="button-1">Hire me</a> </div>
                                    <div class="text">
                                        <h4 class="name">Model Name</h4>
                                        <h6 class="position">Age : 16</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="wrapper"> <img src="img/team/v.jpg" class="img-fluid" alt="">
                                    <div class="icon"> <a href="https://merishapr.com/atkansnew/view-profile.html"
                                            class="button-1">Hire me</a> </div>
                                    <div class="text">
                                        <h4 class="name">Model Name</h4>
                                        <h6 class="position">Age : 23</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="wrapper"> <img src="img/team/t.jpg" class="img-fluid" alt="">
                                    <div class="icon"> <a href="https://merishapr.com/atkansnew/view-profile.html"
                                            class="button-1">Hire me</a> </div>
                                    <div class="text">
                                        <h4 class="name">Model Name</h4>
                                        <h6 class="position">Age : 16</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="wrapper"> <img src="img/team/s.jpg" class="img-fluid" alt="">
                                    <div class="icon"> <a href="https://merishapr.com/atkansnew/view-profile.html"
                                            class="button-1">Hire me</a> </div>
                                    <div class="text">
                                        <h4 class="name">Model Name</h4>
                                        <h6 class="position">Age : 16</h6>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="line-vr-section"></div>
    <!-- Video -->
    <!--     <div class="video-wrapper section-padding bg-img" data-overlay-dark="7" data-background="img/slider/1.jpg">
                                                                                                                                                                                                                                                                                                                                                                                <div class="container">
                                                                                                                                                                                                                                                                                                                                                                                    <div class="row justify-content-center align-items-center">
                                                                                                                                                                                                                                                                                                                                                                                        <div class="col-md-12 text-center rotatex">
                                                                                                                                                                                                                                                                                                                                                                                            <a href="https://youtu.be/hG7Ok0HvDcU" data-lity="video" class="rotate-box vid">
                                                                                                                                                                                                                                                                                                                                                                                                <div class="rotate-circle rotate-text">
                                                                                                                                                                                                                                                                                                                                                                                                    <svg class="textcircle" viewBox="0 0 500 500">
                                                                                                                                                                                                                                                                                                                                                                                                        <defs>
                                                                                                                                                                                                                                                                                                                                                                                                            <path id="textcircle" d="M250,400 a150,150 0 0,1 0,-300a150,150 0 0,1 0,300Z"> </path>
                                                                                                                                                                                                                                                                                                                                                                                                        </defs>
                                                                                                                                                                                                                                                                                                                                                                                                        <text>
                                                                                                                                                                                                                                                                                                                                                                                                            <textPath xlink:href="#textcircle" textLength="900"> dagency - creative agency - </textPath>
                                                                                                                                                                                                                                                                                                                                                                                                        </text>
                                                                                                                                                                                                                                                                                                                                                                                                    </svg>
                                                                                                                                                                                                                                                                                                                                                                                                </div> <span class="icon"> <i class="fas fa-play"></i> </span>
                                                                                                                                                                                                                                                                                                                                                                                            </a>
                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                                
                                                                                                                                                                                                                                                                                                                                                                                <div class="video-text">videos</div>
                                                                                                                                                                                                                                                                                                                                                                            </div> -->
    <!-- Scrolling -->
    <!-- <div class="scrolling scrolling-ticker">
                                                                                                                                                                                                                                                                                                                                                                                <div class="wrapper">
                                                                                                                                                                                                                                                                                                                                                                                    <div class="content">
                                                                                                                                                                                                                                                                                                                                                                                        <span><img src="img/asterisk-icon.svg" alt="">Photoshoot</span>
                                                                                                                                                                                                                                                                                                                                                                                        <span><img src="img/asterisk-icon.svg" alt="">Rampwalk</span>
                                                                                                                                                                                                                                                                                                                                                                                          <span><img src="img/asterisk-icon.svg" alt="">Hire A Model</span>
                                                                                                                                                                                                                                                                                                                                                                                        <span><img src="img/asterisk-icon.svg" alt="">Events</span>
                                                                                                                                                                                                                                                                                                                                                                                    
                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                    
                                                                                                                                                                                                                                                                                                                                                                                </div>
                                                                                                                                                                                                                                                                                                                                                                            </div> -->
    <!-- Products Section -->
    <section class="testimonials section-padding mb-30">
        <div class="container">
            @if (count($products) > 0)
                <div class="row">

                    <div class="col-md-12">
                        <div class="owl-carousel owl-theme">
                            @foreach ($products as $product)
                                <div class="item">
                                    <div class="wrapper">
                                        <img src="{{ asset($product->images->first()->image_url ?? 'default.png') }}"
                                            alt="{{ $product->name }}" style="border-radius:8px;">
                                    </div>
                                    <div class="text text-center mt-15">
                                        <h6
                                            style="font-family: 'avenirlight'; margin-bottom:5px; font-weight:600;
                                    white-space: nowrap; width: 90%; overflow: hidden; text-overflow: ellipsis;">
                                            {{ $product->name }}
                                        </h6>
                                        <p style="font-family: 'avenirlight'; font-weight:700" class="price">
                                            ₹{{ number_format($product->price, 2) }}
                                        </p>
                                        <a href="{{ route('product.details', $product->id) }}" class="button-3"
                                            style="padding: 8px 30px; border: 1px solid #b6ef00; border-radius: 10px;
                                          text-align: center; font-family: 'avenirlight'; font-size: 14.4px;
                                          font-weight: 600; text-transform: capitalize; margin-bottom:15px;">
                                            Get it Now
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-md-12 text-center mt-30">
                        <a href="{{ route('products') }}" class="button-3"
                            style="text-transform:capitalize; font-size:17px;">Explore Atkans House</a>
                    </div>

                </div>
            @else
                <div class="col-12 text-center py-5">
                    <img src="{{ asset('/img/empty-calender.png') }}" alt="No Events"
                        style="max-width: 120px; opacity: 0.5;">
                    <h4 class="mt-4" style="color: #ccc; font-family: 'avenirlight'; letter-spacing: 1px;">
                        No products found.
                    </h4>
                    <p style="color: #777; font-size: 15px;">
                        Please check back later — we’re working on something amazing for you!
                    </p>
                </div>
            @endif
        </div>
    </section>

    <div class="col-md-8 offset-md-2 text-center  mb-40">
        <div class="banner">
            <div class="banner-text">
                Become Our Sponsor By Simple Steps<br>
                and Get Our Products at <span class="highlight">20% - 50% off</span>
            </div>
            <a href="{{ route('become.sponsor') }}" class="btn" style="  z-index:10;">Be Sponsor</a>



        </div>
    </div>

    <!-- divider line -->
    <div class="line-vr-section mt-30"></div>

    <section class="blog section-padding" style="padding-top: 60px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center mb-40">
                    <!-- <div class="section-subtitle">Our Blog</div> -->
                    <div class="section-title">Upcoming Events</div>
                </div>
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme">

                        @if (count($upcomingEvents) > 0)
                            @foreach ($upcomingEvents as $event)
                                <!-- Item 1 -->
                                <div class="item">
                                    <a href="{{ route('event.details', $event->id) }}">
                                        <img src="{{ asset($event->hero_media_url) }}" class="img-fluid" alt="">
                                        <div class="bottom-fade"></div>
                                        <div class="icon">
                                            <div class="icon-w">
                                                <i class="icon-show">
                                                    <span>
                                                        {{ \Carbon\Carbon::parse($event->end_date)->format('d') }}<br>
                                                        <i>{{ \Carbon\Carbon::parse($event->end_date)->format('M') }}</i>
                                                    </span>
                                                </i>
                                                <i class="ti-arrow-top-right icon-hidden"></i>
                                            </div>
                                        </div>
                                        <div class="title">
                                            <h4>{{ $event->title }}</h4>
                                            <p style="font-family: 'avenirlight'; color: #ffffff;">{{ $event->location }}
                                            </p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Clients -->
    <!-- <div class="line-vr-section"></div> -->
    <div class="clients">
        <div class="container">
            <div class="col-md-12 text-center mb-40">
                <!-- <div class="section-subtitle">Our Blog</div> -->
                <div class="section-title">Our Sponsor</div>
            </div>
            <div class="row wrap">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme feather-shadow">

                        @if ($sponsorships->count() > 0)
                            @foreach ($sponsorships as $s)
                                <div class="item">
                                    <a href="#"><img src="{{ asset($s->file_path) }}" alt=""></a>
                                </div>
                            @endforeach
                        @endif

                        {{-- <div class="item">
                            <a href="#"><img src="img/clients/logo-envato-white.svg" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="img/clients/logo-monday-white.svg" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="img/clients/logo-pingdom-white.svg" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="img/clients/logo-walmart-white.svg" alt=""></a>
                        </div>
                        <div class="item">
                            <a href="#"><img src="img/clients/logo-woocommerce-white.svg" alt=""></a>
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="col-md-8 offset-md-2 text-center mt-30 mb-40">
                <div class="banner">
                    <div class="banner-text">
                        Participate in Our Story Contest
                    </div>
                    <a href="{{ route('story.contest') }}" class="btn">Click Here to Participate</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Lets Talk -->
    {{-- <div class="post section-padding bg-cream" style="background: #181c21">
        <div class="container">
            <div class="section">
                <div class="row">
                    <!-- Comment -->
                    <div class="col-lg-5 col-md-12">
                        <div class="wrap">

                            <div class="cont" style="padding-top: 120px;">
                                <h1 style="text-transform: capitalize; line-height:65px;">register for <span
                                        style="color: #b7d433;">atkans </span> walk 2025</h1>
                                <p
                                    style="color:#fff; text-transform: capitalize;  font-family: 'avenirlight'; letter-spacing:1px; font-size: 18px;">
                                    We help creative agencies, designers, and other creative people showcase their perfect
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
                            <form method="post" class="row">
                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize;  font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">Your
                                        Name</label>
                                    <input type="text" name="name" id="name" placeholder="Your Name *"
                                        required="">
                                </div>

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize;  font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">Gender</label>
                                    <select>
                                        <option> Gender</option>
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Others</option>

                                    </select>
                                </div>

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize;  font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">Height
                                        (in cm.)</label>
                                    <input type="text" name="email" id="email" placeholder="Height Eg : 172cm "
                                        required="">
                                </div>

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize;  font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">Weight
                                        (in Kg.)</label>
                                    <input type="text" name="name" id="name" placeholder="Weight eg: 34kg "
                                        required="">
                                </div>


                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize;  font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">Category</label>
                                    <select>
                                        <option>Category</option>
                                        <option>Kids</option>
                                        <option>Teen</option>
                                        <option>Adults</option>
                                        <option>Senior</option>

                                    </select>
                                </div>

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize;  font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">Instagram
                                        profile link</label>
                                    <input type="text" name="email" id="email"
                                        placeholder="Your Instagram Profile Link " required="">
                                </div>

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize;  font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">Phone
                                        No.</label>
                                    <input type="text" name="email" id="email" placeholder="Phone No. "
                                        required="">
                                </div>

                                <div class="col-md-6 mb-10">
                                    <label
                                        style="color:#fff; text-transform: capitalize;  font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">Email
                                        Address</label>
                                    <input type="email" name="email" id="email" placeholder="Email address *"
                                        required="">
                                </div>


                                <div class="col-md-12 mb-20">
                                    <label
                                        style="color:#fff; text-transform: capitalize;  font-family: 'avenirlight'; letter-spacing:1px; font-size: 15px;">Portfolio
                                        upload (images or PDF)</label>
                                    <input type="file" id="portfolio" name="portfolio" accept=".pdf, image/*"
                                        required>
                                </div>


                                <div class="col-md-12">
                                    <input name="submit" type="submit" value="Register Now"
                                        style=" font-family: 'avenirlight'; width: 100%;">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    @include('public.partials.rampwalkform')
@endsection


@push('scripts')
    <script>
        $('.owl-item:not(.cloned) .item img').each(function() {
            console.log($(this).attr('src'));
        });
    </script>
@endpush
