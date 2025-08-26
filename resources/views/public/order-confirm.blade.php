@extends('public.master')

@section('style')
    <style>
        .divider {
            height: 40px;
            width: 1px;
            background-color: #ccff00;
            margin: 30px auto;
        }

        .explore-button {
            display: inline-block;
            padding: 12px 30px;
            border: 2px solid #ccff00;
            color: white;
            background-color: transparent;
            border-radius: 40px;
            font-size: 18px;
            text-decoration: none;
            margin: 20px 0;
            transition: all 0.3s ease;
        }

        .explore-button:hover {
            background-color: #ccff00;
            color: black;
        }

        .message {
            max-width: 630px;
            margin: 30px auto;
            font-size: 17px;
            line-height: 1.6;
            color: #fff;
            text-transform: capitalize;
        }
    </style>
@endsection

@section('content')
    <div class="post section-padding bg-cream" style="background: #181c21; padding: 55px 0;">
        <div class="container">
            <div class="section">
                <div class="row">
                    <!-- Comment -->

                    <!-- Contact Form -->
                    <div class="col-lg-10 offset-md-1 col-md-12">
                        <div class="form-box"
                            style="box-shadow: 0 8px 16px #07090D10; border-radius: 16px; background-color: #1A1D24; padding: 40px; border: 1px solid #2c2626; text-align: center;">

                            <h1 class="thank-you-title">Thank You for Shopping on Atkans Rack!</h1>

                            <div class="message">
                                Your order has been <strong>placed successfully</strong>.<br>
                                Our executive will contact you shortly with further details.<br><br>
                                In the meantime, feel free to explore our exclusive collection or become a sponsor to enjoy
                                up to <strong>50% discount</strong> on future purchases.
                            </div>

                            <div class="divider"></div>

                            <a href="{{ route('products') }}" class="explore-button">Explore Products</a>
                            <a href="{{ route('become.sponsor') }}" class="explore-button">Become a Sponsor</a>

                            <div class="divider"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
