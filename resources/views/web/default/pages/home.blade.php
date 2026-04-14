@extends('web.default.layouts.app')

@push('styles')
    <style>
        .star-label {
            font-size: 52px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .trust-logo-icon {
            width: 140px !important;
            height: 100px !important;
            object-fit: contain;
        }
        @media (max-width: 992px) {
            .trust-logo-icon {
                width: 140px !important;
                height: 100px !important;
                object-fit: contain;
            }
        }
        @media (max-width: 768px) {
            .trust-logo-icon {
                width: 140px !important;
                height: 100px !important;
                object-fit: contain;
            }
        }
        @media (max-width: 576px) {
           .trust-logo-icon {
                 width: 80px !important;
                 height: 80px !important;
                object-fit: contain;
            }
            
        }
        
        /**/
       .full-carousel-section {
    background: #f8f9fa;
    overflow-x: hidden;
}

.carousel-inner {
    overflow: hidden;
}

.carousel-item {
    width: 100%;
}

.carousel-card {
    background: #fff;
    border-radius: 14px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
    overflow: hidden;
}

.carousel-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.carousel-card-content {
    padding: 16px;
}

.carousel-control-prev,
.carousel-control-next {
    width: 6%;
}
/**/
/* === Carousel Controls Fix === */
.carousel {
    position: relative;
}

.carousel-control-prev,
.carousel-control-next {
    width: 40px;
    height: 40px;
    top: 50%;
    transform: translateY(-50%);
    background: rgba(0,0,0,0.6);
    border-radius: 50%;
    opacity: 1;
}

.carousel-control-prev {
    left: -15px;
}

.carousel-control-next {
    right: -15px;
}

/* Icons center */
.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 18px;
    height: 18px;
}

/* === Mobile Fix === */
@media (max-width: 767px) {
    .carousel-control-prev {
        left: 5px;
    }

    .carousel-control-next {
        right: 5px;
    }

    .carousel-control-prev,
    .carousel-control-next {
        width: 34px;
        height: 34px;
    }
}

    </style>
    
<style>
      /* Trust Section Styles */
      .trust-section {
        background-color: #f5f5f5;
        padding: 40px 20px 20px;
        text-align: center;
      }

      .trust-heading {
        font-size: 24px;
        font-weight: 400;
        color: #333;
        margin: 0;
        padding: 0;
      }

      .trust-logo-section {
        background-color: #f5f5f5;
        padding: 30px 20px 60px;
        overflow: hidden;
      }

      .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 15px;
      }

      .logos-wrapper {
        display: flex;
        justify-content: center;
        align-items: flex-start;
        gap: 35px;
        flex-wrap: wrap;
        max-width: 1200px;
        margin: 0 auto;
      }

      .logo-item {
        flex: 0 0 auto;
      }

      .logo-circle {
        /* width: 120px; */
        /* height: 120px; */
        /* background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%); */
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 8px;
        /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); */
      }

      .logo-circle-inner {
        width: 100%;
        height: 100%;
        background-color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 15px;
      }

      .trust-logo-icon {
        width: 140px;
        height: 100px;
        object-fit: contain;
      }

      /* Responsive Design */
      @media (max-width: 768px) {
        .logos-wrapper {
          flex-wrap: nowrap;
          overflow-x: auto;
          scroll-snap-type: x mandatory;
          -webkit-overflow-scrolling: touch;
          padding: 15px 0 25px 0;
          gap: 25px;
          justify-content: flex-start;
        }

        .logo-circle {
          width: 100px;
          height: 100px;
        }

        .trust-heading {
          font-size: 20px;
        }
      }

      @media (max-width: 480px) {
        .logo-circle {
          width: 80px;
          height: 80px;
        }

        .logos-wrapper {
          flex-wrap: nowrap;
          overflow-x: auto;
          scroll-snap-type: x mandatory;
          -webkit-overflow-scrolling: touch;
          padding: 15px 0 25px 0;
          gap: 25px;
          justify-content: flex-start;
        }
      }
      /* Ensure the video covers the background */
      .video-container {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        overflow: hidden;
        z-index: -1;
        /* Sends video to background */
      }

      .video-container video {
        width: 100%;
        height: 100%;
        object-fit: cover;
        /* Ensures video covers the entire screen */
      }

      /* Services Section Styles */
      .services-section {
        padding: 80px 0;
        background-color: #f8f9fa;
      }

      .services-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
      }

      .services-header {
        text-align: center;
        margin-bottom: 60px;
      }

      .services-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
      }

      .services-subtitle {
        font-size: 1.2rem;
        color: #666;
        max-width: 800px;
        margin: 0 auto;
        line-height: 1.6;
      }

      /* Cocktail-Finger Food Section Styles */
      .cocktail-finger-section {
        /* padding: 80px 0; */
        background-color: #fff;
      }

      .cocktail-content {
        padding: 40px;
      }

      .cocktail-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #333;
        margin-bottom: 30px;
        font-family: "Playfair Display", serif;
      }

      .cocktail-description {
        font-size: 1.1rem;
        color: #666;
        line-height: 1.8;
        margin-bottom: 20px;
      }

      .btn-request-quote {
        background-color: #ffc107;
        color: #333;
        border: none;
        padding: 12px 30px;
        font-size: 1rem;
        font-weight: 600;
        border-radius: 5px;
        cursor: pointer;
        transition: all 0.3s ease;
        margin-top: 20px;
      }

      .btn-request-quote:hover {
        background-color: #ffb300;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(255, 193, 7, 0.3);
      }

      .cocktail-images {
        margin-bottom: 30px;
      }

      .cocktail-images img {
        width: 100%;
        height: auto;
        object-fit: cover;
      }

      /* Mobile Responsive Styles */
      @media (max-width: 991px) {
        .cocktail-finger-section {
          padding: 60px 0;
        }

        .cocktail-content {
          padding: 20px;
          margin-bottom: 0;
        }

        .cocktail-title {
          font-size: 2rem;
          margin-bottom: 20px;
        }

        .cocktail-description {
          font-size: 1rem;
          margin-bottom: 15px;
        }

        .cocktail-images {
          margin-bottom: 30px;
        }
      }

      @media (max-width: 576px) {
        .cocktail-title {
          font-size: 1.75rem;
        }

        .cocktail-content {
          padding: 15px;
        }

        .btn-request-quote {
          width: 100%;
          padding: 14px 30px;
        }
      }
      /*new*/
      /**/
      /* Mobile adjustments (screens smaller than 768px) */
      @media (max-width: 768px) {
        .service-features {
          padding: 40px 15px;
        }

        .features-row {
          grid-template-columns: 1fr;
          gap: 30px;
        }

        .feature-item {
          display: flex;
          flex-direction: column;
          height: auto !important;
          grid-template-rows: none;
        }

        .feature-image-wrapper {
          height: 300px;
          order: 1 !important;
        }

        .feature-content {
          padding: 30px 20px;
          height: auto !important;
          order: 2 !important;
        }

        .feature-title {
          font-size: 24px;
          margin-bottom: 10px;
        }

        .feature-description {
          margin-bottom: 20px;
        }
        
        .feature-image {
          height: 280px;
        }
      }
      @media (max-width: 576px) {

        .feature-content {
          padding: 25px 20px;
          padding-top: 0;
        }

        .feature-title {
          font-size: 22px;
        }

        .feature-subtitle,
        .feature-description {
          font-size: 14px;
        }

        .cta-button {
          padding: 12px 30px;
          font-size: 14px;
        }

        .purple-badge {
          width: 40px;
          height: 40px;
          font-size: 16px;
          top: 15px;
          right: 15px;
        }
      }
      
    </style>
@endpush

@section('content')

    @php
        $decodedCarousels = isset($carousels) ? json_decode($carousels) : [];
    @endphp
    <!-- Hero Section with Card -->
    <section class="hero-section">
    <div class="hero-card">
        <h2>{{ __('gen.hero_title') }}</h2>
        <p>
        {!! __('gen.hero_description') !!}
        </p>
        <a class="hero-btn" href="{{route('contact.us')}}">{{ __('gen.contact_us') }}</a>
    </div>
    </section>


    <!-- Why Section -->
    <section class="why-section">
        <div class="why-container">
            <h2 class="why-title">@lang('gen.why_title')</h2>

            <div class="why-content">
                <p>
                    <strong>@lang('gen.why_strong_text')</strong>
                </p>

                <p>@lang('gen.why_p1')</p>

                <p>@lang('gen.why_p2')</p>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section">
    <div class="container">
        <div class="features-grid">

        <!-- Card 1 - Cuisine -->
        <div class="feature-card">
            <div class="feature-icon">
            <!-- Cooking Pot Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M20 6h-2.18c.11-.31.18-.65.18-1a2.996 2.996 0 0 0-5.5-1.65l-.5.67-.5-.68C10.96 2.54 10.05 2 9 2 7.34 2 6 3.34 6 5c0 .35.07.69.18 1H4c-1.11 0-1.99.89-1.99 2L2 19c0 1.11.89 2 2 2h16c1.11 0 2-.89 2-2V8c0-1.11-.89-2-2-2zm-5-2c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zM9 4c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm11 15H4v-2h16v2zm0-5H4V8h5.08L7 10.83 8.62 12 12 7.4l3.38 4.6L17 10.83 14.92 8H20v6z"/>
            </svg>
            </div>

            <h3 class="feature-title">@lang('gen.world_cuisine')</h3>
            <p class="feature-description">
            @lang('gen.world_cuisine_description')
            </p>
        </div>

        <!-- Card 2 - Chefs -->
        <div class="feature-card">
            <div class="feature-icon">
            <!-- Chef Hat Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M12.5 1.5c-1.77 0-3.33.78-4.42 2-.42-.11-.86-.17-1.3-.17-2.76 0-5 2.24-5 5 0 .28.03.55.08.81C.93 10.43 0 11.91 0 13.5c0 2.21 1.79 4 4 4v4h16v-4c2.21 0 4-1.79 4-4 0-1.59-.93-3.07-2.36-3.36.05-.26.08-.53.08-.81 0-2.76-2.24-5-5-5-.44 0-.88.06-1.3.17-1.09-1.22-2.65-2-4.42-2zm-6 18v-1.89h11V19.5H6.5z"/>
            </svg>
            </div>

            <h3 class="feature-title">@lang('gen.passionate_chefs')</h3>
            <p class="feature-description">
            @lang('gen.passionate_chefs_description')
            </p>
        </div>

        <!-- Card 3 - Recommendation -->
        <div class="feature-card">
            <div class="feature-icon">
            <!-- Thumbs Up Icon -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M1 21h4V9H1v12zm22-11c0-1.1-.9-2-2-2h-6.31l.95-4.57.03-.32c0-.41-.17-.79-.44-1.06L14.17 1 7.59 7.59C7.22 7.95 7 8.45 7 9v10c0 1.1.9 2 2 2h9c.83 0 1.54-.5 1.84-1.22l3.02-7.05c.09-.23.14-.47.14-.73v-2z"/>
            </svg>
            </div>

            <h3 class="feature-title">@lang('gen.recommended')</h3>
            <p class="feature-description">
            @lang('gen.recommended_description')
            </p>
        </div>

        </div>
    </div>
    </section>
    <!--  -->
    <!-- Categories section -->
    <section class="my-5">
        <div class="container">
            <div class="row sticky-row">
                <div class="col-md-12 px-3">
                    <div id="categoryNav" class=" sticky-row" data-bs-spy="scroll" data-bs-target="#categoryNav"
                        data-bs-offset="10">
                        <div class="row">
                            <div class="col-10 mt-3 d-flex overflow-auto border-bottom pb-2">
                                @forelse ($categories as $category)
                                    <a href="#{{ $category->slug }}" class="category-link text-decoration-none px-3">
                                        <h2 class="description fs-5">{{ $category->name }}</h2>
                                    </a>
                                @empty
                                    {{-- not found --}}
                                    <div class="text-center text-danger">
                                        <h2 class="description fs-5">
                                            @lang('gen.no_record_found')
                                        </h2>
                                    </div>
                                @endforelse

                            </div>
                            <div class="col-2 text-end">

                                <div class="dropdown" data-bs-auto-close="outside">
                                    <a class="btn bg-blue btn-dropdown text-white rounded-0" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-filter text-white fs-3"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        @foreach ($dietaryPreferences as $preference)
                                            <li>
                                                <div class="dropdown-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input dietary-filter" type="checkbox"
                                                            value="{{ $preference }}"
                                                            id="preference_{{ $loop->index }}">
                                                        <label class="form-check-label"
                                                            for="preference_{{ $loop->index }}">
                                                            {{ ucfirst($preference) }}</label>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-bs-spy="scroll" data-bs-target="#categoryNav" data-bs-offset="0" class="scrollspy-example">

                        {{-- @foreach ($categories as $category)
                            <div id="{{ $category->slug }}" class="my-5">
                                <div class="d-flex">
                                    <h2 class="subheading calltoaction-bg p-2 text-white fw-bold">
                                        {{ $category->name }}
                                    </h2>
                                </div>
                                <div class="row">
                                    @foreach ($category->products as $product)
                                        <div class="col-md-4 mt-3">
                                            <div class="card rounded-0 h-100">
                                                <div class="card-header bg-transparent border-0 p-0">
                                                    <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                                        aria-controls="offcanvasExample"
                                                        class="text-decoration-none bluecolor-txt subheading fw-bold showDetails"
                                                        data-product="{{ $product }}">
                                                        <x-misc.img :src="asset('storage/' . $product->image)"
                                                            class="img-fluid w-100" />
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <div>
                                                            <h2 class="heading bluecolor-txt">
                                                                {{ $product->price }}€
                                                            </h2>
                                                        </div>
                                                        <div>
                                                            <button class="btn p-0 border-0 addtocartBtnGeneral"
                                                                data-product-id="{{ $product->id }}">
                                                                <i class="fa-solid fa-circle-plus txt-orange fs-1"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                                        aria-controls="offcanvasExample"
                                                        class="text-decoration-none bluecolor-txt subheading fw-bold showDetails"
                                                        data-product="{{ $product }}">
                                                        {{ $product->name }}
                                                    </a>
                                                    <div class="d-flex gap-2 mt-2">
                                                        @php
                                                            $dietary_preferences = json_decode($product->dietary_preferences, true) ?? [];
                                                        @endphp
                                                        @if (!empty($dietary_preferences))
                                                            @foreach ($dietary_preferences as $dietary_preference)
                                                                <p class="calltoaction-bg subdescription p-1 m-0">
                                                                    <span class="text-white">
                                                                        {{ $dietary_preference }}
                                                                    </span>
                                                                </p>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach --}}
                        <div id="loader" class="text-center mt-3" style="display: none;">
                            <div class="spinner-border  text-dark" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <div id="productContainer">
                            @include('web.default.pages.partials.filtered-products', ['categories' => $categories,])
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End categories section -->

    {{-- Newsletter subscribe --}}
    <!-- @include('web.default.pages.includes.newsletter-subs') -->

    <!-- dish Offcanvas seciton -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

        <div class="offcanvas-body p-0 position-relative pb-3">
            <button class="btn border-0 p-0 btn-close-2" data-bs-dismiss="offcanvas"><i
                    class="bi bi-x-circle-fill text-white fs-1"></i>
            </button>
            <x-misc.img :src="asset('storage/')" id="productImage" class="img-fluid" style="width: var(--bs-offcanvas-width);" />
            <div class="px-3">
                <div class="d-flex gap-2 align-items-center mt-3">
                    <div>
                        <x-misc.img :src="asset('assets/img/country-flag.png')" width="40" alt="" id="countryImage" class="img-fluid" />
                    </div>
                    <div>
                        <h4 class="heading bluecolor-txt fs-5" id="productName"></h4>
                    </div>
                </div>
                <div class="d-flex gap-2 align-items-center mt-3">
                    <div>
                        <div class="d-flex align-items-center gap-1" id="reviewSection">
                            <div>
                                <i class="fa-solid fa-star txt-orange"></i>
                                <i class="fa-solid fa-star txt-orange"></i>
                                <i class="fa-solid fa-star txt-orange"></i>
                                <i class="fa-solid fa-star txt-orange"></i>
                                <i class="fa-regular fa-star txt-orange"></i>
                            </div>
                            <div>
                                <a href="" class="text-secondary description reviewOffcanvas">
                                    0 reviews
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4" id="shortDescriptionSection">

                </div>
                <div class="mt-4" id="ingredientsSection">

                </div>
                <div class="mt-4" id="allergensSection">

                </div>
                <div class="mt-4" id="preparationSection">
                </div>
                <div class="mt-4" id="weightSection">
                </div>
                <div class="mt-4" id="nutritionalSection">
                </div>
                <div class="d-flex justify-content-between align-items-center mt-4">

                </div>
                <div class="mt-4" id="expiryDateSection">
                    <h3 class="heading fw-bold bluecolor-txt">Expiry Dates</h3>
                    <p class="description bluecolor-txt fw-normal m-0">

                    </p>
                </div>
                <button class="btn orange-bg w-100 text-white mt-3 rounded-5 addtocartBtnGeneral"
                    id="addToCartBtn">@lang('gen.add_to_cart')</button>
            </div>
        </div>
    </div>
    <!-- dish End offcanvas section -->

    <!-- chef offcanvas section -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample2"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body p-0 pb-3 position-relative">
            <button class="btn border-0 p-0 btn-close-2" data-bs-dismiss="offcanvas"><i
                    class="bi bi-x-circle-fill text-white fs-1"></i>
            </button>
            <img src="https://placehold.co/600x400" id="reviewProdImage" alt="" class="img-fluid w-100">

        </div>
    </div>
    <!-- End chef offcanvas section -->
    <!-- New Sections -->
    <!-- Service Features Section -->
    <section class="service-features">
        <div class="container">
            <!-- First Row -->
            <div class="features-row">
                <!-- Feature 1: Left Side -->
                <div class="feature-item">
                    <!-- Content First -->
                    <div class="feature-content">
                        <h2 class="feature-title">@lang('gen.feature1_title')</h2>
                        <p class="feature-subtitle">@lang('gen.feature1_subtitle')</p>
                        <p class="feature-description">@lang('gen.feature1_description')</p>
                        <button class="cta-button">@lang('gen.feature1_button')</button>
                    </div>

                    <!-- Image Below -->
                    <div class="feature-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1546069901-ba9599a7e63c?w=800"
                            alt="@lang('gen.feature1_alt')"
                            class="feature-image" />
                    </div>
                </div>

                <!-- Feature 2: Right Side -->
                <div class="feature-item reverse">
                    <!-- Image First -->
                    <div class="feature-image-wrapper">
                        <img src="https://images.unsplash.com/photo-1504674900247-0877df9cc836?w=800"
                            alt="@lang('gen.feature2_alt')"
                            class="feature-image" />
                    </div>

                    <!-- Content Below -->
                    <div class="feature-content">
                        <h2 class="feature-title">@lang('gen.feature2_title')</h2>
                        <p class="feature-subtitle">@lang('gen.feature2_subtitle')</p>
                        <p class="feature-description">@lang('gen.feature2_description')</p>
                        <button class="cta-button">@lang('gen.feature2_button')</button>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonial Heading Section -->
    <section class="testimonial-heading-section">
        <div class="testimonial-container">
            <h2 class="main-heading">@lang('gen.testimonial_title')</h2>
            <p class="sub-heading">@lang('gen.testimonial_subtitle')</p>
        </div>
    </section>


    <!--  -->
    <!-- Client Carousel Section -->
    <!-- Client Carousel Section -->
<!--<section class="clients-carousel-section">-->
<!--    <div class="container">-->
<!--        <div class="carousel-wrapper">-->
            <!--<div id="clientsCarousel" class="carousel slide" data-bs-ride="carousel">-->
<!--            <div id="clientsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">-->


                <!-- Indicators -->
<!--                <div class="carousel-indicators">-->
<!--                    @foreach(array_chunk($blogs->toArray(), 3) as $index => $chunk)-->
<!--                        <button type="button" data-bs-target="#clientsCarousel" data-bs-slide-to="{{ $index }}" -->
<!--                            class="{{ $index == 0 ? 'active' : '' }}"></button>-->
<!--                    @endforeach-->
<!--                </div>-->

                <!-- Carousel Items -->
<!--                <div class="carousel-inner">-->
<!--                    @foreach(array_chunk($blogs->toArray(), 3) as $index => $chunk)-->
<!--                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">-->
<!--                            <div class="row g-4">-->
<!--                                @foreach($chunk as $blog)-->
<!--                                    <div class="col-md-4">-->
<!--                                        <div class="carousel-card">-->
<!--                                            @if ($blog['images'])-->
<!--                                            <img src="{{ asset('storage/'.json_decode($blog['images'],true)[0]) }}" -->
<!--                                                 alt="{{ $blog['title'] }}" class="carousel-img" />-->
<!--                                            @endif     -->
<!--                                            <div class="carousel-card-content">-->
<!--                                                <h3 class="carousel-card-title">{{ $blog['title'] }}</h3>-->
<!--                                                <p class="carousel-card-text">{{ Str::limit(strip_tags($blog['content']), 100) }}</p>-->
<!--                                            </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                @endforeach-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    @endforeach-->
<!--                </div>-->

                <!-- Controls -->
<!--                <button class="carousel-control-prev" type="button" data-bs-target="#clientsCarousel" data-bs-slide="prev">-->
<!--                    <span class="carousel-control-prev-icon"></span>-->
<!--                    <span class="visually-hidden">@lang('gen.previous')</span>-->
<!--                </button>-->
<!--                <button class="carousel-control-next" type="button" data-bs-target="#clientsCarousel" data-bs-slide="next">-->
<!--                    <span class="carousel-control-next-icon"></span>-->
<!--                    <span class="visually-hidden">@lang('gen.next')</span>-->
<!--                </button>-->

<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->

<!---->
<section class="full-carousel-section py-5 overflow-hidden">
    <div class="container">

        {{-- ===== DESKTOP (3 columns) ===== --}}
        <div class="d-none d-md-block">
            <div id="desktopCarousel" class="carousel slide" data-bs-ride="false">
                <div class="carousel-inner">

                    @foreach(array_chunk($blogs->toArray(), 3) as $index => $chunk)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="row gx-4">

                                @foreach($chunk as $blog)
                                    <div class="col-md-4">
                                        <div class="carousel-card h-100">
                                            @if(!empty($blog['images']))
                                                <img src="{{ asset('storage/'.json_decode($blog['images'], true)[0]) }}"
                                                     class="carousel-img"
                                                     alt="{{ $blog['title'] }}">
                                            @endif

                                            <div class="carousel-card-content">
                                                <h5>{{ $blog['title'] }}</h5>
                                                <p>{{ Str::limit(strip_tags($blog['content']), 90) }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach

                </div>

                <button class="carousel-control-prev" type="button"
                        data-bs-target="#desktopCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button"
                        data-bs-target="#desktopCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>

        {{-- ===== MOBILE (1 column) ===== --}}
        <div class="d-block d-md-none">
            <div id="mobileCarousel" class="carousel slide" data-bs-ride="false">
                <div class="carousel-inner">

                    @foreach($blogs as $index => $blog)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="carousel-card">
                                        @if(!empty($blog->images))
                                            <img src="{{ asset('storage/'.json_decode($blog->images, true)[0]) }}"
                                                 class="carousel-img"
                                                 alt="{{ $blog->title }}">
                                        @endif

                                        <div class="carousel-card-content">
                                            <h5>{{ $blog->title }}</h5>
                                            <p>{{ Str::limit(strip_tags($blog->content), 80) }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

                <button class="carousel-control-prev" type="button"
                        data-bs-target="#mobileCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>

                <button class="carousel-control-next" type="button"
                        data-bs-target="#mobileCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>

    </div>
</section>


    
    <!---->
    <!-- Trust Section with Logos -->
    <section class="trust-section" >
      <div class="container">
        <h2 class="trust-heading">@lang('gen.trust_heading')</h2>
      </div>
    </section>
    <!-- Trust Section with Logos -->
    <section class="trust-logo-section">
      <div class="container" style="background-color: #fff;">
        <div class="logos-wrapper">
          <div class="logo-item">
            <div class="logo-circle">
              <div class="logo-circle-inner">
                <img
                  src="assets/img/Screenshot 2026-02-02 154256.png"
                  alt="Traiteur"
                  class="trust-logo-icon"
                />
              </div>
            </div>
          </div>
          <div class="logo-item">
            <div class="logo-circle">
              <div class="logo-circle-inner">
                <img
                  src="assets/img/Screenshot 2026-02-02 154315.png"
                  alt="Traiteur"
                  class="trust-logo-icon"
                />
              </div>
            </div>
          </div>
          <div class="logo-item">
            <div class="logo-circle">
              <div class="logo-circle-inner">
                <img
                  src="assets/img/Screenshot 2026-02-02 154327.png"
                  alt="Traiteur"
                  class="trust-logo-icon"
                />
              </div>
            </div>
          </div>
          <div class="logo-item">
            <div class="logo-circle">
              <div class="logo-circle-inner">
                <img
                  src="assets/img/Screenshot 2026-02-02 154341.png"
                  alt="Traiteur"
                  class="trust-logo-icon"
                />
              </div>
            </div>
          </div>
          <div class="logo-item">
            <div class="logo-circle">
              <div class="logo-circle-inner">
                <img
                  src="assets/img/Screenshot 2026-02-02 154403.png"
                  alt="Traiteur"
                  class="trust-logo-icon"
                />
              </div>
            </div>
          </div>
          <div class="logo-item">
            <div class="logo-circle">
              <div class="logo-circle-inner">
                <img
                  src="assets/img/Screenshot 2026-02-02 154419.png"
                  alt="Traiteur"
                  class="trust-logo-icon"
                />
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </section>
    <!-- Add review modal section -->
        @include('web.default.pages.partials.add-review-model')
    <!-- End add review modal section -->
@endsection

@push('scripts')
    <script>
      // Add smooth scroll animation when buttons are clicked
      document.querySelectorAll(".cta-button").forEach((button) => {
            button.addEventListener("click", function () {
                console.log("Button clicked:", this.textContent);
        
                // Smooth scroll to footer
                const footer = document.querySelector("footer"); // make sure your footer tag exists
                if (footer) {
                    footer.scrollIntoView({ behavior: "smooth" });
                }
        
                // Optional alert
                // alert("Merci pour votre intérêt! Nous vous contacterons bientôt.");
            });
        });


      // Add entrance animation on scroll
      const observerOptions = {
        threshold: 0.2,
        rootMargin: "0px 0px -50px 0px",
      };

      const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
          if (entry.isIntersecting) {
            entry.target.style.opacity = "1";
            entry.target.style.transform = "translateY(0)";
          }
        });
      }, observerOptions);

      // Apply animation to feature items
      document.querySelectorAll(".feature-item").forEach((item, index) => {
        item.style.opacity = "0";
        item.style.transform = "translateY(30px)";
        item.style.transition = `all 0.6s ease ${index * 0.2}s`;
        observer.observe(item);
      });
    </script>
    <script>
        // 
        

        // 
        $(document).ready(function() {

            $(document).on('click', '.showDetails', function(e) {
                e.preventDefault();
                let product = $(this).data('product');
                let reviews = product.reviews;
                // console.log(reviews);

                if (reviews && reviews.length > 0) {
                    let totalRating = 0;
                    reviews.forEach(review => {
                        totalRating += review.rating;
                    });
                    let avgRating = totalRating / reviews.length;
                    let avgRatingHtml = '';
                    for (let i = 1; i <= 5; i++) {
                        if (i <= avgRating) {
                            avgRatingHtml += '<i class="fa-solid fa-star txt-orange"></i>';
                        } else {
                            avgRatingHtml += '<i class="fa-regular fa-star txt-orange"></i>';
                        }
                    }
                    $('#reviewSection').html(`
                        <div>
                            ${avgRatingHtml}
                        </div>
                        <div>
                            <a href="" class="text-secondary description reviewOffcanvas">
                                ${reviews.length} @lang('gen.reviews')
                            </a>
                        </div>
                    `);
                } else {
                    $('#reviewSection').html(`
                        <div>
                            <i class="fa-regular fa-star txt-orange"></i>
                            <i class="fa-regular fa-star txt-orange"></i>
                            <i class="fa-regular fa-star txt-orange"></i>
                            <i class="fa-regular fa-star txt-orange"></i>
                            <i class="fa-regular fa-star txt-orange"></i>
                        </div>
                        <div>
                            <a href="" class="text-secondary description reviewOffcanvas">
                                0 @lang('gen.reviews')
                            </a>
                        </div>
                    `);
                }


                $('#productName').text(product.name);
                $('#productName').data('product-id', product.id);
                // Set product image
                $('#productImage').attr('src', "{{ asset('storage/') }}" + '/' + product.image);
                // Function to conditionally display sections
                function updateSection(sectionId, title, value) {
                    if (value) {
                        $(sectionId).html(`
                            <h3 class="heading fw-bold bluecolor-txt">${title}</h3>
                            <p class="description bluecolor-txt fw-normal">${value}</p>
                        `).show();
                    } else {
                        $(sectionId).hide();
                    }
                }

                updateSection('#shortDescriptionSection', '@lang('gen.short_description')', product.short_description);
                updateSection('#ingredientsSection', '@lang('gen.ingredients')', product.ingredients);
                updateSection('#allergensSection', '@lang('gen.allergens')', product.allergens);
                updateSection('#preparationSection', '@lang('gen.preparation_advice')', product.preparation_advice);
                updateSection('#weightSection', '@lang('gen.weight')', product.weight);
                updateSection('#expiryDateSection', "@lang('gen.expiry_date')", product.expiry_date);

                // **for Nutritional Values**
                if (product.nutritional_values) {
                    try {
                        let nutritionalValues = JSON.parse(product.nutritional_values);

                        if (Array.isArray(nutritionalValues) && nutritionalValues.length > 0) {
                            let nutritionalValuesHtml = nutritionalValues.map(item => `
                                <div>
                                    <p class="description fw-normal m-0 text-center bluecolor-txt weight-circle pt-1">
                                        ${item.value}</br>${item.unit}
                                    </p>
                                    <p class="description fw-normal m-0 text-center bluecolor-txt">${item.name}</p>
                                </div>
                            `).join('');

                            $('#nutritionalSection').html(`
                                <h3 class="heading fw-bold bluecolor-txt">@lang('gen.nutritional_values')</h3>
                                <p class="description bluecolor-txt fw-normal m-0">For 100g:</p>
                                <div class="d-flex gap-2 align-items-center mt-4" id="nutritionalValuesContainer">
                                    ${nutritionalValuesHtml}
                                </div>
                            `).show();
                        } else {
                            $('#nutritionalSection').hide();
                        }
                    } catch (error) {
                        console.error("Error parsing nutritional_values:", error);
                        $('#nutritionalSection').hide();
                    }
                } else {
                    $('#nutritionalSection').hide();
                }

                $('#addToCartBtn').data('product-id', product.id);

                // Show the offcanvas
                $('#offcanvasExample').offcanvas('show');
            });

            // **Add to Cart Button Click Event**
            $(document).on('click', '.addtocartBtnGeneral', function() {
                let productId = $(this).data('product-id');

                if (!productId) {
                    // console.error("Product ID not found!");
                    toastr.error("Product ID not found!");
                    return;
                }
                // if user is not login
                if (!@json(auth()->check())) {
                    toastr.error("Please login to add product to cart!");
                    // hide
                    $('#offcanvasExample').offcanvas('hide');
                    // show login model
                    $('#exampleModalToggle').modal('show');
                    return;
                }

                $.ajax({
                    url: "{{ route('carts.store') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_id: productId,
                        quantity: 1
                    },
                    success: function(response) {
                        if (response.status === 200) {
                            toastr.success(response.message);
                            window.location.href = '{{ route('carts.index') }}'
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            // Validation error - display each error message
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                toastr.error(value[0]);
                            });
                        } else if (xhr.status === 400 || xhr.status === 404) {
                            var response = JSON.parse(xhr.responseText);
                            toastr.error(response.message);
                        } else if (xhr.status === 403) {
                            var response = JSON.parse(xhr.responseText);
                            // toastr.error(response.message);
                            
                            toastr.error("Veuillez vérifier votre adresse e-mail !");
                            // Redirect after 2 seconds (so user can see toast)
                            setTimeout(function () {
                                window.location.href = '/email/verify';
                            }, 2000);
                        } else {
                            // Generic error message for unexpected issues
                            toastr.error("An unexpected error occurred. Please try again.");
                        }
                        console.error(xhr.responseText);
                    },
                    complete: function() {}

                });

            });

        });

        // filter products
        $(document).ready(function() {
            $('#filterDate, #filterTime').on('change', function() {
                let date = $('#filterDate').val();
                let time = $('#filterTime').val();

                // Show loader
                $('#loader').show();

                $.ajax({
                    url: '{{ route('filter.products') }}',
                    method: 'GET',
                    data: {
                        date: date,
                        time: time
                    },
                    success: function(response) {
                        $('#productContainer').html(response); // Update products section
                    },
                    complete: function() {
                        // Hide loader after request completes
                        $('#loader').hide();
                    }
                });
            });
            // by dietary preferences
            $('.dietary-filter').on('change', function() {
                let selectedPreferences = [];

                // Get all checked dietary preferences
                $('.dietary-filter:checked').each(function() {
                    selectedPreferences.push($(this).val());
                });

                $.ajax({
                    url: '{{ route('filter.products.by.preferences') }}',
                    method: 'GET',
                    data: {
                        preferences: selectedPreferences
                    },
                    beforeSend: function() {
                        // $('#productContainer').html(''); // Clear products section
                        // Show loader
                        $('#loader').show();
                    },
                    success: function(response) {
                        $('#productContainer').html(response);
                    },
                    complete: function() {
                        // Hide loader after request completes
                        $('#loader').hide();
                    }
                });

            });



            // review offcanvas
            $(document).on('click', '.reviewOffcanvas', function(e) {
                e.preventDefault();
                let productId = $('#productName').data('product-id');
                let reviewRoute = "{{ route('product.review', ':id') }}";
                reviewRoute = reviewRoute.replace(':id', productId);
                $('#offcanvasExample2 .offcanvas-body').empty();
                $('#offcanvasExample2').offcanvas('show');
                // add loading
                $('#offcanvasExample2 .offcanvas-body').html(`
                    <div class="text-center mt-5 loaderContainer d-flex justify-content-center align-items-center" style="height: 70vh;">
                        <div class="spinner-border text-dark" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                `);
                $.ajax({
                    url: reviewRoute,
                    method: 'GET',
                    data: {
                        product_id: productId
                    },
                    success: function(response) {
                        $('#offcanvasExample2 .offcanvas-body').html(response);
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            // Validation error - display each error message
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                toastr.error(value[0]);
                            });
                        } else if (xhr.status === 400 || xhr.status === 404) {
                            var response = JSON.parse(xhr.responseText);
                            toastr.error(response.message);
                        } else {
                            // Generic error message for unexpected issues
                            toastr.error("An unexpected error occurred. Please try again.");
                        }
                        console.error(xhr.responseText);
                    },
                    complete: function() {
                        // hide the loader
                        $('#offcanvasExample2 .offcanvas-body .loaderContainer').remove();
                    }
                });
            });

            // add review model
            $(document).on('click', '#addReviewModelBtn', function(e) {
                e.preventDefault();

                // if user not login then open login model
                if (!@json(auth()->check())) {
                    toastr.error("Please login to add review!");
                    // hide
                    $('#offcanvasExample').offcanvas('hide');
                    $('#offcanvasExample2').offcanvas('hide');
                    // show login model
                    $('#exampleModalToggle').modal('show');
                    return;
                }

                let productId = $(this).data('product-id');
                $('#addReviewProductId').val(productId);
                $('#addReviewModel').modal('show');
            });
        });
    </script>

    {{-- Star Rating --}}
    <script>
        const LABELCOLORINACTIV = "#dccfcf";
        const LABELCOLORACTIV = "#ff8119";

        const RATINGSLABELS = document.querySelectorAll("form.star label");
        const RATINGSINPUTS = document.querySelectorAll("form.star input");

        // make inputs disappear
        RATINGSINPUTS.forEach(function(anInput) {
            anInput.style.display = "none";
        });

        // manage label click & hover display
        function notationLabels(e) {
            let currentLabelRed = e.target;
            let currentLabelBlack = e.target;

            // console.log(e.target.localName);

            if (e.type == "mouseenter" || !e.target.control.checked) {
                // coloring red from the clicked/hovered label included, going backward till the node start - if we are hovering or the star isn't already checked.
                while (currentLabelRed != null) {
                    currentLabelRed.style.color = LABELCOLORACTIV;
                    currentLabelRed = currentLabelRed.previousElementSibling;
                }

                // coloring black from the clicked/hovered label excluded, going forward till the node end
                while ((currentLabelBlack = currentLabelBlack.nextElementSibling) != null) {
                    currentLabelBlack.style.color = LABELCOLORINACTIV;
                }
            } else {
                // if the clicked label was already checked we uncheck it and prevent the click event from doing its job - defacto enabling zero star rating
                e.target.control.checked = false;
                e.preventDefault();
            }
            if (e.type == "click") {
                // Assuming the rating value is stored in the value attribute of the input
                const ratingValue = e.target.control.value;
                const ratingInput = document.getElementById('rating');
                ratingInput.value = ratingValue;
            }
        }

        function notationLabelsOut(e) {
            let notesNode = e.target.parentNode.querySelectorAll("label");
            let currentLabel = notesNode[notesNode.length - 1];

            // console.log("out : " + e.target.localName);
            // console.log("out checked: " + e.target.control.checked);

            notesNode.forEach(function redrum(starLabel) {
                starLabel.style.color = LABELCOLORACTIV;
            });

            while (currentLabel != null && !currentLabel.control.checked) {
                currentLabel.style.color = LABELCOLORINACTIV;
                currentLabel = currentLabel.previousElementSibling;

                //console.log("currentLabel null?: " + currentLabel);
                // previousElementSibling become the input ...
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            RATINGSLABELS.forEach(function(aStar) {
                aStar.style.color = "#eee";
                aStar.addEventListener("click", notationLabels);
                aStar.addEventListener("mouseenter", notationLabels);
                aStar.addEventListener("mouseout", notationLabelsOut);
            });

            // stop a callback to the label click event function notationLabels passed on the input element associated ... why ... that's behond me
            // alternatively we could check for e.target.localName in the notationLabels function
            RATINGSINPUTS.forEach(function(aStarInput) {
                aStarInput.addEventListener("click", function(e) {
                    e.stopPropagation();
                });
            });
        });
    </script>
    
    {{-- end star rating  --}}
@endpush
