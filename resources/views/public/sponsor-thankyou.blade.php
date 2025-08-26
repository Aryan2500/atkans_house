@extends('public.master')

@section('style')
    <style>
        .thankyou-bar {
            background-color: #ccff00;
            padding: 30px 0;
            font-size: 36px;
            font-weight: bold;
            color: #000;
        }

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
                            style="box-shadow: 0 8px 16px #07090D10; border-radius: 16px; background-color: #1A1D24;     padding: 31px;
    border: 1px solid #2c2626;  text-align: center;">
                            <!-- <h5 class="white">Leave <span>a Reply</span></h5> -->
                            <h1 style="color: #000;background: #b6ef00;padding-top: 5px;">Thank You</h1>

                            <div class="divider"></div>

                            <a href="{{route("products")}}" class="explore-button">Explore Atkans
                                House</a>

                            <div class="message">
                                Our team will connect with you soon and we assure you will get instant discounts by
                                purchasing from House Rack.
                            </div>

                            <div class="divider"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
