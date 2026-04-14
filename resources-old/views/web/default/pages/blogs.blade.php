@extends('web.default.layouts.blog')

@section('content')

    @php
        $extraData = isset($blogPageSection->extra_data) ? json_decode($blogPageSection->extra_data) : null;
    @endphp

    <!-- Carousel section -->
    <section class="mt-5 pt-5 carousel-section">
        <div class="container py-5">
            <p class="carousel-heading fs-1 text-white" style="width: 60%">
                {{ $extraData->hero_section_heading ?? '' }}
            </p>
        </div>
    </section>
    <seciton class="calltoaction-bg">
        <div class="container-fluid calltoaction-bg text-center py-4">
            <p class="description fw-bold m-0 text-white">
                {{ $extraData->hero_section_description ?? '' }}
            </p>
        </div>
    </seciton>
    <!-- End carousel section -->

    <!-- Blog carousel section -->
    <section class="bg-light py-5">
        <div class="container py-5">
            <div class="text-center">
                <h3 class="heading bluecolor-txt fs-3">
                    Cocktails, buffets, breakfasts <br class="d-none d-md-block">
                    & plated services from our chefs
                </h3>
                <p class="description fw-normal bluecolor-txt mt-3">
                    Your homemade cocktails and buffets with fresh products, mostly locally sourced, <br
                        class="d-none d-md-block">
                    in recyclable or reusable zero waste containers with an anti-waste option (return of leftovers).
                </p>
            </div>

            @forelse ($blogs as $blog)
                <div class="row mx-0 mx-lg-5 mt-5">
                    <div class="col-lg-5 col-md-6 mt-3 bg-white pe-0">
                        <div class="card bg-transparent h-100 border-0">
                            <div class="card-body">
                                <span class="badge calltoaction-bg">
                                    {{ $blog?->category?->name }}
                                </span>
                                <h6 class="heading bluecolor-txt fs-5 mt-4">
                                    {{ $blog->title }}
                                </h6>
                                <p class="description bluecolor-txt">
                                    {!! $blog->content !!}
                                </p>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6 mt-3 ps-0">
                        <div id="carouselExample{{ $loop->iteration }}" class="carousel slide">
                            <div class="carousel-inner">
                                {{-- <div class="carousel-item active">
                                <img src="assets/img/dessert.jpg" class="img-fluid w-100 blog-carousel-img"
                                    alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/dishes-2.jpg" class="img-fluid w-100 blog-carousel-img"
                                    alt="...">
                            </div>
                            <div class="carousel-item">
                                <img src="assets/img/drinks.jpg" class="d-block w-100 blog-carousel-img" alt="...">
                            </div> --}}
                                {{-- @foreach ($blog->images as $image)
                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <img src="{{ asset('storage/' . $image) }}"
                                        class="img-fluid w-100 blog-carousel-img" alt="...">
                                </div>
                            @endforeach --}}
                                @foreach (json_decode($blog->images, true) as $image)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <x-misc.img :src="asset('storage/' . $image)" class="img-fluid blog-carousel-img" alt="..."
                                            style="max-width: 500px" />
                                    </div>
                                @endforeach
                            </div>
                            <button class="carousel-control-prev" type="button"
                                data-bs-target="#carouselExample{{ $loop->iteration }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button"
                                data-bs-target="#carouselExample{{ $loop->iteration }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center">
                    <h3 class="heading bluecolor-txt fs-3">
                        No blogs found
                    </h3>
                </div>
            @endforelse

        </div>
    </section>
    <!-- End blog carousel section -->
    <!-- Call to action section -->
    <section class="py-5 calltoaction-bg">
        <div class="container py-5">
            <div class="text-center text-white">
                <h2 class="heading fs-1">
                    {{ $extraData->service_title ?? '' }}
                </h2>
                <p class="subheading fw-normal mt-3">
                    {{ $extraData->service_description ?? '' }}
                </p>
            </div>
        </div>
    </section>
    <!-- End call to action section -->

@endsection
