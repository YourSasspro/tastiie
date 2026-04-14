@extends('web.default.layouts.app')

@php
    $extraData = isset($whoWeAreSection?->extra_data) ? json_decode($whoWeAreSection?->extra_data) : null;
@endphp

@push('styles')
    <style>
        .additive-bg{
            background: linear-gradient(272.45deg, rgba(0, 0, 0, 0) 23.25%, #000 66.7%), url("{{asset('storage/'. $extraData?->section_2_image)}}"), #000 !important;
        }
        .idea-bg{
            background: linear-gradient(272.45deg, rgba(0, 0, 0, 0) 23.25%, #000 66.7%), url("{{asset('storage/'. $extraData?->section_3_image)}}"), #000 !important;
        }
    </style>
@endpush

@section('content')
    <!-- who we are section -->
    <section class="my-5 py-5">
        <div class="container mt-4">
            <div class="text-center">
                <div class="row justify-content-center">
                    <div class="col-md-9 mt-3">
                        <h2 class="carousel-heading fs-1 bluecolor-txt">{{$whoWeAreSection?->title ?? ''}}</h2>
                        <h2 class="subtitle text-center fw-bold bluecolor-txt mt-3">{{$whoWeAreSection->title ?? ''}}</h2>
                    </div>
                </div>
                <div class="d-flex gap-4 align-items-center justify-content-center my-5">
                    <div>
                        <a href="index.html" class="bluecolor-txt"><i class="fa-solid fa-house"></i></a>
                    </div>
                    <div>
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                    <div>{{$whoWeAreSection?->title ?? ''}}</div>
                </div>
            </div>

            <div class="text-center">
                {{-- <img src="assets/img/about-us.png" alt="" class="img-fluid"> --}}
                <x-misc.img :src="asset('storage/'. $extraData?->hero_image)" class="img-fluid"/>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-md-5 mt-3 text-center">
                    <h2 class="heading bluecolor-txt">{{$extraData?->section_2_heading ?? ''}}</h2>
                    <p class="description bluecolor-txt fw-normal mt-4">
                        {{$extraData?->section_2_description ?? ''}}
                    </p>
                </div>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="col-md-10 mt-3">
                    <div class="additive-bg d-flex align-items-center p-5 rounded-5 w-100">
                        <div class="" style="width: 50%;">
                            <h2 class="heading text-white">{{$extraData?->section_2_title ?? ''}}</h2>
                            <p class="subheading text-white mt-4">
                                {{$extraData?->section_2_sub_title ?? ''}}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center mt-5">
                <div class="text-center">
                    <img src="assets/img/bulb.png" alt="" class="img-fluid" width="70">
                    <h2 class="heading bluecolor-txt mt-4 fw-normal">
                        {{$extraData?->section_3_heading ?? ''}}
                    </h2>
                </div>
                <div class="col-md-10 mt-3">
                    <div class="idea-bg p-5 rounded-5">
                        <p class="subheading text-white mt-4" style="width: 50%;">
                            {!!$extraData?->section_3_description ?? ''!!}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End faqs section -->

@endsection
