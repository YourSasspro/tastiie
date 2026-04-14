@extends('web.default.layouts.app')

@section('content')
    <!-- Faqs section -->
    <section class="my-5 py-5">
        <div class="container mt-4">
            <div class="text-center">
                <h2 class="carousel-heading fs-1 bluecolor-txt">
                    @lang('gen.faqs_full')
                </h2>
                <div class="d-flex gap-4 align-items-center justify-content-center my-5">
                    <div>
                        <a href="" class="bluecolor-txt"><i class="fa-solid fa-house"></i></a>
                    </div>
                    <div>
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                    <div>
                        @lang('gen.faqs_short')
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="form-group">
                        <input type="search" placeholder="Search" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6 mt-4">
                    <div class="accordion" id="accordionExample">
                        @foreach ($faqs as $faq)
                            <div class="accordion-item rounded-5 border-0 shadow p-2 mt-3">
                                <h2 class="accordion-header rounded-5">
                                    <button class="accordion-button collapsed rounded-5 description" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#collapse{{ $faq->id }}"
                                        aria-expanded="false" aria-controls="collapse{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="collapse{{ $faq->id }}" class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        {!! $faq->answer !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End faqs section -->
@endsection
