@extends('web.default.layouts.app')

@section('content')
    <!-- Faqs section -->
    <section class="my-5 py-5">
        <div class="container mt-4">
            <div class="text-center">
                <div class="row justify-content-center">
                    <div class="col-md-9 mt-3">
                        <h2 class="carousel-heading fs-1 bluecolor-txt"> @lang('gen.privacy_policy')</h2>
                        <!--<h2 class="subtitle text-center fw-bold bluecolor-txt mt-3">{{$whoWeAreSection->title ?? ''}}</h2>-->
                    </div>
                </div>
                <div class="d-flex gap-4 align-items-center justify-content-center my-5">
                    <div>
                        <a href="index.html" class="bluecolor-txt"><i class="fa-solid fa-house"></i></a>
                    </div>
                    <div>
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                    <div> @lang('gen.privacy_policy')</div>
                </div>
            </div>
        </div>
    </section>    
    @php
        $extraData = isset($privacyPolicySection->extra_data) ? json_decode($privacyPolicySection->extra_data) : null;
    @endphp

    <!-- Privacy Policy section -->
    <section class="" style="min-height: 70vh;">
        <div class="container">
            {!!$extraData?->content!!}
        </div>
    </section>
    <!-- End privacy policy section -->
    <!-- End faqs section -->
@endsection
