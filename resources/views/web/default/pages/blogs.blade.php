
@extends('web.default.layouts.app')
@php
        $extraData = isset($blogPageSection->extra_data) ? json_decode($blogPageSection->extra_data) : null;
    @endphp
@push('styles')
<style>
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
        padding: 80px 0;
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
</style>


<!---->
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
      
      
    </style>
@endpush
@section('content')

    

    <!-- Hero Section with Only Text -->
    <section class="hero-section">
      <div class="hero-card" style="background-color: transparent; padding:  0px;box-shadow:none;">
        <h2 style="color:white;font-size:34px;">{{ $extraData->hero_section_heading ?? '' }}</h2>
      </div>
    </section>

    <!-- Services Section -->
    <!---->
    <section class="why-section">
        <div class="why-container">
            <h2 class="why-title">{{ $extraData->service_title ?? '' }}</h2>

            <div class="why-content">
                {{ $extraData->service_description ?? '' }}
            </div>
        </div>
    </section>

    <!-- Cocktail-Finger Food Section 1 -->
    
    @forelse($blogs as $index => $blog)
    <!--style="{{ $index == 0 ? 'margin-bottom: 6rem;' : '' }}"-->
    <section class="cocktail-finger-section">
     <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-2 order-lg-1 cocktail-content">
            <h2 class="cocktail-title">{{ $blog?->category?->name }} - {{ $blog->title }}</h2>
            <p class="cocktail-description">
              {!! $blog->content !!}
            </p>
            
            <button class="btn-request-quote">Demande de devis</button>
          </div>
          @if ($blog->images)
          <div class="col-lg-6 order-1 order-lg-2 cocktail-images">
            <img
              src="{{ asset('storage/'.json_decode($blog->images,true)[0]) }}"
              alt="Cocktail food spread"
              class="img-fluid rounded-3 shadow"
            />
          </div>
          @endif
        </div>
      </div>
    </section>
    @empty
    <section class="cocktail-finger-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 order-2 order-lg-1 cocktail-content">
            <h2 class="cocktail-title">No blogs found</h2>
          </div>
        </div>
      </div>
    </section>    
    @endforelse
    
    <!-- src="https://images.unsplash.com/photo-1555939594-58d7cb561ad1?w=800" -->

    <!-- Trust Section with Logos -->
    <section class="trust-section" >
      <div class="container">
        <h2 class="trust-heading">Ils nous font confiance</h2>
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

@endsection    

