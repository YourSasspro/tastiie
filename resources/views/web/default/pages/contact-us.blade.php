@extends('web.default.layouts.app')

@section('content')
    <!-- Faqs section -->
    <section class="my-5 pt-5 pb-4 carousel-section">
        <div class="container mt-4">
            <div class="text-center">
                <h2 class="carousel-heading fs-1 bluecolor-txt">
                    @lang('gen.contact_us')
                </h2>
                <div class="d-flex gap-4 align-items-center justify-content-center my-5">
                    <div>
                        <a href="index.html" class="bluecolor-txt"><i class="fa-solid fa-house"></i></a>
                    </div>
                    <div>
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                    <div>@lang('gen.contact_us')</div>
                </div>
            </div>
        </div>
    </section>
    <!-- End faqs section -->

    <!-- Contact us form section -->
    <section class="my-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 mt-3" data-aos="fade-right">
                    <h3 class="heading fs-1 bluecolor-txt mb-5">@lang('gen.get_in_touch_with_us')</h3>
                    <h3 class="subheading bluecolor-txt mt-3 pt-3">
                        @lang('gen.support')
                    </h3>
                    <p class="description bluecolor-txt">
                        <a href="mailto:{{ getGeneralSettings()->site_email ?? '' }}"
                            class="text-decoration-none bluecolor-txt">
                            {{ getGeneralSettings()->site_email ?? '' }}
                        </a>
                    </p>
                </div>
                <div class="col-md-6 mt-3" data-aos="fade-up">
                    <x-forms.form :action="route('contact.us.store')">
                        <div class="form-group">
                            <x-forms.form-label for="name">
                                @lang('gen.enter_with_name', ['attribute' => trans('gen.name')])<span class="text-danger">*</span>
                            </x-forms.form-label>
                            <x-forms.form-input type="text" required
                                class="form-control descriptiion p-3 text-secondary rounded-3" name="name"
                                id="name" />
                            <x-forms.input-error :messages="$errors->get('name')" />
                        </div>
                        <div class="form-group mt-3">
                            <x-forms.form-label for="email">
                                @lang('gen.enter_with_name', ['attribute' => trans('gen.email')])<span class="text-danger">*</span>
                            </x-forms.form-label>
                            <x-forms.form-input type="email" required
                                class="form-control descriptiion p-3 text-secondary rounded-3" name="email"
                                id="email" />
                            <x-forms.input-error :messages="$errors->get('email')" />
                        </div>
                        <div class="form-group mt-3">
                            <x-forms.form-label for="email">
                                @lang('gen.enter_with_name', ['attribute' => trans('gen.message')])<span class="text-danger">*</span>
                            </x-forms.form-label>
                            <x-forms.form-textarea name="message" id="message" class="form-control rounded-3"
                                rows="5" class="editor" :value="old('message')" />
                            <x-forms.input-error :messages="$errors->get('message')" />
                        </div>
                        <button class="btn btn-dark px-4 py-2 rounded-5 mt-3">
                            @lang('gen.submit_your_inquiry')
                        </button>
                    </x-forms.form>

                </div>
            </div>
        </div>
    </section>
    <!-- End contact us form section -->
@endsection
