<!DOCTYPE html>
<html lang="zxx">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Atkans House | Top Modeling Agency for New Faces & Professionals</title>
    <link rel="icon" type="image/png" href="img/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Federo&amp;family=Barlow:wght@100..900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Flex:opsz,wght@8..144,100..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fonts/stylesheet.css') }}">
    <style>
        @media(max-width: 768px) {
            .kadwa {
                padding-right: 0px !important;
            }

            .slider-fade .owl-item,
            .slider .owl-item {
                height: 34vh;
                position: relative;
            }

            .header {
                height: 40vh;
                overflow: hidden;
            }
        }
    </style>


    <style>
        .custom-alert {
            position: relative;
            padding: 15px 20px;
            border-radius: 6px;
            margin-bottom: 25px;
            font-family: 'avenirlight', sans-serif;
            font-size: 15px;
            letter-spacing: 0.5px;
            width: 100%;
            text-align: center;
            transition: 0.3s ease-in-out;
        }

        .success-alert {
            background-color: #c5ff3f;
            /* Neon green */
            color: #000;
            border: 1px solid #b0ff23;
        }

        .error-alert {
            background-color: #ff4c4c;
            color: #fff;
            border: 1px solid #ff2d2d;
        }

        .alert-close {
            position: absolute;
            top: 8px;
            right: 12px;
            background: none;
            border: none;
            font-size: 20px;
            line-height: 1;
            color: inherit;
            cursor: pointer;
        }
    </style>
    @yield('style')
</head>

<body>


    @include('public.partials.navbar')

    @yield('content')

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <!-- top -->
            <div class="top">
                <div class="row">
                    <div class="col-md-4 mb-30">
                        <div class="item">
                            <div class="logo">
                                <img src="{{ asset('img/logo.png') }}" alt="">
                            </div>
                            <p style="color:#fff; letter-spacing: 1px; font-weight: 100; font-family: 'avenirlight';">
                               We are a collective of models and creatives who believe in shaping trends, elevating style, and bringing bold stories to life on and off the runway
                            </p>
                            <div class="social-icons">
                                <ul class="list-inline">
                                    <li><a href="https://www.facebook.com/profile.php?id=61580380611390" target="_blank"><i class="fab fa-facebook"></i></a></li>
                                    <li><a href="https://www.snapchat.com/add/atkans_house?share_id=kkc6dC5gKvI&locale=en-GB" target="_blank"><i class="fab fa-snapchat"></i></a></li>

                                    <li><a href="https://www.reddit.com/u/Atkans_House/s/ZDAB1fosPU" target="_blank"><i class="fab fa-reddit"></i></a></li>
                                    <li><a href="https://x.com/Atkans_House" target="_blank"><i class="fab fa-x-twitter" ></i></a></li>
                                    <li><a href="https://www.instagram.com/atkans_house_academy/" target="_blank"><i class="fa-brands fa-instagram"></i></a></li>
                                    <li><a href="https://www.youtube.com/channel/UCbbAZDkUMHDy7g7Q6BgdOEg" target="_blank"><i class="fa-brands fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 offset-md-1 mb-30">
                        <div class="item">
                            <h3>Quick Links</h3>
                            <div class="links">
                                <ul>
                                    <li>
                                        <a href="{{ route('home') }}"
                                            style="color:#fff; letter-spacing: 1px; font-weight: 100; font-family: 'avenirlight';">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('about') }}"
                                            style="color:#fff; letter-spacing: 1px; font-weight: 100; font-family: 'avenirlight';">
                                            About Us
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('photoshoot') }}"
                                            style="color:#fff; letter-spacing: 1px; font-weight: 100; font-family: 'avenirlight';">
                                            Photoshoot
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('models') }}"
                                            style="color:#fff; letter-spacing: 1px; font-weight: 100; font-family: 'avenirlight';">
                                            Hire Model
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('rampwalk') }}"
                                            style="color:#fff; letter-spacing: 1px; font-weight: 100; font-family: 'avenirlight';">
                                            Rampwalk Registration
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('events') }}"
                                            style="color:#fff; letter-spacing: 1px; font-weight: 100; font-family: 'avenirlight';">
                                            Upcoming Events
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contact.index') }}"
                                            style="color:#fff; letter-spacing: 1px; font-weight: 100; font-family: 'avenirlight';">
                                            Contact Us
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 mb-30">
                        <div class="item">
                            <h3>Subscribe</h3>
                            <p style="color:#fff; letter-spacing: 1px; font-weight: 100; font-family: 'avenirlight';">
                                Want to be notified about our services? Just sign up and we'll send you a notification
                                by email.
                            </p>
                            <div class="newsletter">
                                <form action="{{ route('subscriber.store') }}" method="POST">
                                    @csrf
                                    <input type="email" name="email" placeholder="Email Address" required>
                                    <button type="submit"><i class="ti-arrow-top-right"></i></button>
                                </form>

                                @if (session('success'))
                                    <p class="text-success mt-2">{{ session('success') }}</p>
                                @endif

                                @if (session('error'))
                                    <p class="text-danger mt-2">{{ session('error') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- bottom -->
            <div class="bottom">
                <div class="row">
                    <div class="col-md-12">
                        <p class="mb-0" style="font-weight: 100; font-family: 'avenirlight'; text-align: center">
                            &copy; 2025 Atkans House. All Rights Reserved.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Popup Contact Form -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Contact Us</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="modal-box">
                        <form method="post">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <input name="name" type="text" placeholder="Your Name *" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="email" type="email" placeholder="Your Email *" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="phone" type="text" placeholder="Your Number *" required>
                                </div>
                                <div class="col-md-6 form-group">
                                    <input name="subject" type="text" placeholder="Subject *" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <textarea name="message" id="message" cols="30" rows="4" placeholder="Message *" required></textarea>
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
    <!-- jQuery -->
    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.4.1.min.js') }}"></script>
    <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ asset('js/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('js/jquery.isotope.v3.0.2.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/scrollIt.min.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('js/YouTubePopUp.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>

    @stack('scripts')

</body>


</html>
