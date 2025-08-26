@extends('public.master')

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

            </div>
        </div>
    </section>
@endsection
