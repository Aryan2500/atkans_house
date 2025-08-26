@extends('public.master')

@section('content')
    <!-- Header Banner -->
    <section class="banner-header section-padding bg-img" data-overlay-dark="7" data-background="img/slider/4.jpg">
        <div class="v-middle">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center mt-30">
                        <h1>Our Gallery</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="section-padding">
        <div class="container">
            <div class="gallery-items">
                <div class="row">
                    @if ($galleries->count() > 0)
                        @foreach ($galleries as $g)
                            <div class="col-lg-4 col-md-6 single-item branding mb-15">
                                <a href="{{ asset($g->image_path) }}" title="{{ $g->title }}"
                                    class="gallery-masonry-item-img-link img-zoom">
                                    <div class="gallery-box">
                                        <div class="gallery-img">
                                            <img src="{{ asset($g->image_path) }}" class="img-fluid mx-auto d-block"
                                                alt="{{ $g->title }}">
                                        </div>
                                        <div class="gallery-detail">
                                            <h4>{{ $g->title }}</h4>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-12 col-md-12 single-item   mb-15 text-center">
                            <div class="col-12  ">

                                <img src="{{ asset('/img/empty-image.png') }}" alt="No Gallery"
                                    style="max-width: 120px; opacity: 0.5;">
                                <h4 style="color: #ccc; font-family: 'avenirlight'; letter-spacing: 1px;">
                                    No Gallery found.
                                </h4>
                                <p style="color: #777; font-size: 15px;">
                                    Please check back later — we’re working on something amazing for you!
                                </p>

                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <div class="line-vr-section"></div>
@endsection
