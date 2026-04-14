@extends('web.default.layouts.app')

@section('content')
    <!-- Faqs section -->
    <section class="my-5 py-5">
        <div class="container mt-4">
            <div class="text-center">
                <h2 class="carousel-heading fs-1 bluecolor-txt">
                    @lang('gen.terms_and_conditions')
                </h2>
                <div class="d-flex gap-4 align-items-center justify-content-center my-5">
                    <div>
                        <a href="" class="bluecolor-txt"><i class="fa-solid fa-house"></i></a>
                    </div>
                    <div>
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                    <div>
                        @lang('gen.terms_and_conditions')
                    </div>
                </div>
            </div>

        </div>
    </section>
    @php
        $extraData = isset($termsAndConditionsSection->extra_data) ? json_decode($termsAndConditionsSection->extra_data) : null;
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
