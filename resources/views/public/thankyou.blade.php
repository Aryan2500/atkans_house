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
                            style="box-shadow: 0 8px 16px #07090D10; border-radius: 16px; background-color: #1A1D24;     padding: 31px;
    border: 1px solid #2c2626;  text-align: center;">
                            <!-- <h5 class="white">Leave <span>a Reply</span></h5> -->
                            <h1 style="color: #000;background: #b6ef00;padding-top: 5px;">Thank You</h1>


                            <div class="message">
                                we are uploading your story soon......until then you can explore our atkans house rack and
                                even can become our sponsor and 20%-50% discount on each product
                            </div>
                            <div class="divider"></div>
                            <a href="{{ route('products') }}" class="explore-button">Explore Atkans
                                House</a>
                            <a href="{{route('become.sponsor')}}" class="explore-button">Be
                                Sponser</a>



                            <div class="divider"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
