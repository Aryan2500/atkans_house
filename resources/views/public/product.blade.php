@extends('public.master')
@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .model-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            max-width: 350px;
            animation: fadeInUp 0.6s ease-out;
        }

        .model-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 12px 48px rgba(0, 255, 255, 0.2);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .model-image-container {
            position: relative;
            overflow: hidden;
            height: 400px;
        }

        .model-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .model-card:hover .model-image {
            transform: scale(1.1);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(to bottom, transparent 0%, rgba(0, 0, 0, 0.7) 100%);
        }

        .card-content {
            padding: 25px;
            position: relative;
        }

        .model-name {
            color: #fff;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            animation: slideInLeft 0.6s ease-out 0.2s both;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .votes-container {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 25px;
            animation: slideInRight 0.6s ease-out 0.3s both;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(20px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .votes-label {
            color: #a0a0a0;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .votes-count {
            color: #00ffff;
            font-size: 32px;
            font-weight: 700;
            text-shadow: 0 0 10px rgba(0, 255, 255, 0.5);
        }

        .vote-btn {
            width: 100%;
            padding: 15px;
            font-size: 18px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
            border: none;
            border-radius: 50px;
            background: linear-gradient(45deg, #ff00ff, #00ffff);
            color: #fff;
            cursor: pointer;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            animation: slideInUp 0.6s ease-out 0.4s both;
            box-shadow: 0 4px 15px rgba(0, 255, 255, 0.4);
        }

        @keyframes slideInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .vote-btn::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .vote-btn:hover::before {
            width: 300px;
            height: 300px;
        }

        .vote-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 25px rgba(0, 255, 255, 0.6);
        }

        .vote-btn:active {
            transform: scale(0.98);
        }

        .vote-btn span {
            position: relative;
            z-index: 1;
        }

        @keyframes neonPulse {

            0%,
            100% {
                box-shadow: 0 4px 15px rgba(0, 255, 255, 0.4);
            }

            50% {
                box-shadow: 0 4px 25px rgba(255, 0, 255, 0.6);
            }
        }

        .vote-btn {
            animation: slideInUp 0.6s ease-out 0.4s both, neonPulse 2s ease-in-out infinite;
        }
    </style>
@endsection
@section('content')
    <!-- Header Banner -->
    <section class="banner-header section-padding bg-img" data-overlay-dark="7" data-background="img/slider/4.jpg">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center mt-30">
                        <h1>House Rack</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Section -->
    <section class="blog section-padding">
        <div class="container">
            <div class="row">

                @if ($products->count() > 0)
                    @foreach ($products as $product)
                        <div class="col-lg-3 col-md-12 mb-60">
                            <div class="item">
                                <div class="wrapper">
                                    <img src="{{ asset($product->images->first()->image_url ?? 'default.png') }}"
                                        alt="{{ $product->name }}" style="border-radius:8px;">
                                </div>
                                <div class="text text-center mt-15">
                                    <h6
                                        style="font-family: 'avenirlight'; margin-bottom:5px; font-weight:600; white-space: nowrap; width: 90%; overflow: hidden; text-overflow: ellipsis;">
                                        {{ $product->name }}
                                    </h6>
                                    <p class="price" style="font-family: 'avenirlight'; font-weight:700;">
                                        {{ $product->price }}</p>
                                    <a href="{{ route('product.details', $product->id) }}" class="button-3"
                                        style="
                                    padding: 8px 30px;
                                    border: 1px solid #b6ef00;
                                    border-radius: 10px;
                                    text-align: center;
                                    font-family: 'avenirlight';
                                    font-size: 14.4px;
                                    font-weight: 600;
                                    text-transform: capitalize;
                                    margin-bottom:15px;">
                                        Get it Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
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








                {{-- ////////////////////////////////////// VOTING SECTION //////////////////////////////// --}}

                @if ($events->count() > 0)
                    @foreach ($events as $event)
                        <div class="col-12  py-5">

                            <h4 class="mt-4" style="color: #ccc; letter-spacing: 1px;">
                                {{ $event->title }}
                            </h4>
                            <p style="color: #777; font-size: 15px;">
                                {{ $event->short_description }} </p>
                        </div>

                        <div class="col-md-12">
                            <div class="owl-carousel owl-theme">

                                <div class="item">
                                    @include('public.partials.vote_section')
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif


            </div>
        </div>
    </section>
@endsection
