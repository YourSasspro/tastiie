@extends('web.default.layouts.app')

@php
    $extraData = isset($becomeALeaderSection?->extra_data) ? json_decode($becomeALeaderSection?->extra_data) : null;
@endphp

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />

<style>
    .testimonial_box {
        display: flex;
        justify-content: center;
    }

    .testimonial_box-img {
        padding: 20px 0 10px;
        display: flex;
        justify-content: center;
    }
</style>
@endpush

@section('content')
    <!-- Hero section -->
    <section class="my-5 py-5 carousel-section">
        <div class="container mt-4">
            <div class="text-center">
                <div class="row justify-content-center">
                    <div class="col-md-9 mt-3">
                        <h2 class="carousel-heading fs-1 bluecolor-txt">{{ $becomeALeaderSection?->title ?? '' }}</h2>
                        <h2 class="subtitle text-center fw-bold bluecolor-txt mt-3">
                            {{ $becomeALeaderSection?->description ?? '' }}
                        </h2>
                    </div>
                </div>
                <div class="d-flex gap-4 align-items-center justify-content-center my-5">
                    <div>
                        <a href="#" class="bluecolor-txt"><i class="fa-solid fa-house"></i></a>
                    </div>
                    <div>
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                    <div>{{ $becomeALeaderSection?->title ?? '' }}</div>
                </div>
            </div>

            <div class="row align-items-center">
                @if (isset($extraData->services))
                    @foreach ($extraData->services as $service)
                        <div class="col-md-4 mt-3 text-center">
                            <x-misc.img :src="asset('storage/' . $service->icon)" class="img-fluid" />
                            <h4 class="heading bluecolor-txt">{{ $service->title }}</h4>
                            <p class="bluecolor-txt subheading mt-3">{{ $service->desc }}</p>
                        </div>
                    @endforeach
                @endif
            </div>

            <div class="text-center mt-5">
                <h4 class="heading bluecolor-txt">
                    {{ $extraData?->section_2_title ?? '' }}
                </h4>
                <x-misc.img :src="asset('storage/' . $extraData?->section_2_image)" class="img-fluid" />
            </div>
        </div>
    </section>
    <!-- End Hero section -->

    <!-- Carousel section -->
    <section class="my-5">
        <div class="container text-center justify-content-center">
            <div class="text-center">
                <h3 class="heading bluecolor-txt fs-1">
                    @lang('gen.they_trust_us')
                </h3>
            </div>
            <div class="testimonial">
                <div class="container p-3">
                    <div class="testimonial-slider text-center">
                        <div class="testimonial-slide">

                            @if (isset($extraData->clients))
                                @foreach ($extraData->clients as $key => $client)
                                    <div class="testimonial_box">
                                        <x-misc.img :src="asset('storage/' . $client->image)" width="200" />
                                    </div>
                                @endforeach
                            @else
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End carousel section -->

@endsection


@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

@endpush
