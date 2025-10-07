@extends('public.master')

@section('style')
    <style>
        .color-picker {
            display: flex;
            gap: 10px;
        }

        .color-box {
            width: 30px;
            height: 30px;
            border: 2px solid transparent;
            border-radius: 3px;
            cursor: pointer;
            transition: border 0.2s ease;
        }

        .color-box.selected {
            border: 2px solid white;
        }

        .thumbs {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 10px;
        }

        .thumbs img {
            width: 60px;
            height: 60px;
            border: 2px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
        }

        .details {
            flex: 2;
        }

        .title {
            font-size: 28px;
            font-weight: 600;
        }

        .price {
            margin: 10px 0;
            font-size: 20px;
        }

        .price span {
            text-decoration: line-through;
            color: #888;
            font-size: 16px;
        }

        .rating {
            color: green;
        }

        .size-options {
            margin: 20px 0;
        }

        .size-options button {
            padding: 10px 20px;
            margin-right: 10px;
            border: 1px solid #ccc;
            background: #f0f0f0;
            border-radius: 20px;
            cursor: pointer;
        }

        .size-options button.active {
            background: #d6f7d6;
            border-color: green;
        }

        .quantity {
            display: flex;
            align-items: center;
            margin: 15px 0;
        }

        .quantity button {
            padding: 10px;
            border: none;
            background: #eee;
            font-size: 18px;
            cursor: pointer;
        }

        .quantity input {
            width: 40px;
            text-align: center;
            font-size: 16px;
            margin: 0 10px;
        }

        .add-to-cart {
            background: #3b2659;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
        }

        .features {
            display: flex;
            gap: 30px;
            margin-top: 30px;
        }

        .feature-box {
            text-align: center;
            font-size: 14px;
        }

        .feature-box i {
            font-size: 24px;
            color: #3b2659;
        }

        .description {
            margin-top: 40px;
        }

        .thumbs {
            display: flex;
            flex-direction: column;
            gap: 10px;
            margin-top: 10px;
        }

        .thumbs img {
            width: 60px;
            height: 60px;
            border: 2px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
        }

        .details {
            flex: 2;
        }

        .title {
            font-size: 28px;
            font-weight: 600;
        }

        .price {
            margin: 10px 0;
            font-size: 20px;
        }

        .price span {
            text-decoration: line-through;
            color: #888;
            font-size: 16px;
        }

        .rating {
            color: green;
        }

        .size-options {
            margin: 20px 0;
        }

        .size-options button {
            padding: 0px 18px;
            margin-right: 3px;
            border: 1px solid #ccc;
            background: #f0f0f0;
            border-radius: 11px;
            cursor: pointer;
            line-height: 29px;
            font-size: 14px;
        }

        .size-options button.active {
            background: #d6f7d6;
            border-color: green;
        }

        .quantity {
            display: flex;
            align-items: center;
            margin: 15px 0;
        }

        .quantity button {
            padding: 10px;
            border: none;
            background: #eee;
            font-size: 18px;
            cursor: pointer;
        }

        .quantity input {
            width: 40px;
            text-align: center;
            font-size: 16px;
            margin: 0 10px;
        }

        .add-to-cart {
            background: #3b2659;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            font-size: 16px;
            cursor: pointer;
        }

        .features {
            display: flex;
            gap: 30px;
            margin-top: 30px;
        }

        .feature-box {
            text-align: center;
            font-size: 14px;
        }

        .feature-box i {
            font-size: 24px;
            color: #3b2659;
        }

        .description {
            margin-top: 10px;
        }
    </style>
@endsection

@section('content')
    <!-- About -->
    <section class="services2 section-padding" style="background: #181c21;     padding: 50px 0;">
        <div class="container">
            <div class="row"
                style="box-shadow: 0 8px 16px #07090D10; border-radius: 16px; background-color: #101217; padding: 25px; border: 1px solid #2c2626;">
                <div class="gallery col-md-5 mb-30">
                    <div class="owl-carousel owl-theme">
                        @if ($product->images->count())
                            @foreach ($product->images as $image)
                                <div class="item">
                                    <img src="{{ asset($image->image_url) }}" alt="{{ $product->name }}">
                                </div>
                            @endforeach
                        @else
                            <div class="item">
                                <img src="{{ asset('images/no-image.png') }}" alt="No image available">
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Details Section -->
                <div class="details col-md-6 offset-md-1" style="padding-right:0px; padding-left:0px;">

                    <!-- Product Name -->
                    <div class="title text-white">{{ $product->name }}</div>

                    <!-- Price & Discount -->
                    <div class="price">
                        @if ($product->discount_price)
                            ₹{{ number_format($product->price, 2) }}
                            <span>₹{{ number_format($product->price + $product->discount_price, 2) }}</span>
                            <small>({{ $product->discount_percent ?? round(($product->discount_price / ($product->price + $product->discount_price)) * 100) }}%
                                OFF)</small>
                        @else
                            ₹{{ number_format($product->price, 2) }}
                        @endif
                    </div>


                    @if ($product->type == 'Clothing')
                        <!-- Description -->
                        <div class="description">
                            <h4 style="font-weight:500; font-size:27px;">Product Description</h4>
                            <p style="font-weight:500; font-size:14px; color:#fff;">
                                {{ $product->description }}
                            </p>

                            <p style="font-weight:500; font-size:14px; color:#fff;">
                                ✅ Material: {{ $product->material ?? 'N/A' }} <br>
                                👕 Available sizes:
                                @foreach ($product->sizes as $size)
                                    {{ $size->name }}@if (!$loop->last)
                                        ,
                                    @endif
                                @endforeach
                                <br>
                                🎨 Multiple color options
                                <br>
                            </p>
                        </div>

                        <!-- Colors -->
                        @if ($product->colors->count())
                            <div class="color-picker">
                                @foreach ($product->colors as $color)
                                    <div class="color-box {{ $loop->first ? 'active' : '' }}"
                                        data-color-id="{{ $color->id }}"
                                        style="background-color: {{ $color->hex_code ?? '#000' }} !important;">
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        <!-- Sizes -->
                        @if ($product->sizes->count())
                            <div class="size-options">
                                @foreach ($product->sizes as $size)
                                    <button class="size" onclick="selectSize(this)" data-size-id="{{ $size->id }}">
                                        {{ $size->name }}
                                    </button>
                                @endforeach
                            </div>
                        @endif
                    @else
                        <div class="description">
                            <h4 style="font-weight:500; font-size:27px;">Product Description</h4>
                            <p style="font-weight:500; font-size:14px; color:#fff;">
                                {{ $product->description }}
                            </p>
                        </div>
                    @endif

                    @auth
                        <!-- Get It Now -->
                        <form action="{{ route('checkout') }}" method="GET" id="checkoutForm">
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="color_id" id="selected_color">
                            <input type="hidden" name="size_id" id="selected_size">
                            <button type="submit" class="button-2" style="width: 93%; border-radius:8px; padding: 4px 36px;">
                                Get It Now
                            </button>
                        </form>
                    @else
                        <a href="{{ route('user.login', ['redirect' => route('product.details', $product->id)]) }}"
                            class="button-2" style="width: 93%; border-radius:8px; padding: 4px 36px;">
                            Get It Now
                        </a>
                    @endauth

                </div>

                <script>
                    // Color selection
                    @if ($product->type == 'Clothing')


                        document.querySelectorAll('.color-box').forEach(box => {
                            box.addEventListener('click', function() {
                                document.querySelectorAll('.color-box').forEach(b => b.classList.remove('selected'));
                                this.classList.add('selected');
                                document.getElementById('selected_color').value = this.getAttribute('data-color-id');
                            });
                        });

                        // Size selection
                        function selectSize(el) {
                            document.querySelectorAll('.size').forEach(b => b.classList.remove('active'));
                            el.classList.add('active');
                            document.getElementById('selected_size').value = el.getAttribute('data-size-id');
                        }

                        // Prevent form submission if no size/color selected
                        document.getElementById('checkoutForm').addEventListener('submit', function(e) {
                            const color = document.getElementById('selected_color').value;
                            const size = document.getElementById('selected_size').value;

                            console.log(color, size);

                            if (!color || !size) {
                                e.preventDefault();
                                alert("Please select both color and size before proceeding.");
                            }
                        });
                    @endif
                </script>

            </div>

        </div>
        <!-- pagination -->

        </div>
    </section>
@endsection
