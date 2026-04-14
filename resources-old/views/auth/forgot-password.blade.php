@extends('web.default.layouts.app')

@section('pageTitle', trans('gen.forgot_password'))

@section('content')
    <section class="my-5 py-5 carousel-section">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="text-center">
                        <h2 class="carousel-heading">
                            @lang('gen.forgot_password')
                        </h2>
                        <p class="description fw-normal mt-3">
                            @lang('gen.forgot_password_text')
                        </p>

                        @if (session('status'))
                            <div class="mb-4 mt-3 fw-bold text-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <x-forms.form :action="route('password.email')">
                            {{-- Email --}}
                            <div class="form-group mt-4">
                                <x-forms.form-input type="email" name="email" value="{{ old('email') }}"
                                    placeholder="{{ __('gen.email') }}" class="mb-2" />
                                <x-forms.input-error :messages="$errors->get('email')" />
                            </div>

                            {{-- Submit --}}
                            <button class="btn btn-warning mt-3 mb-5 w-100 text-white rounded-5 p-2">
                                @lang('gen.send_password_reset_link')
                            </button>
                        </x-forms.form>

                        {{-- Login --}}
                        <p class="description text-secondary fw-normal">
                            <a href="#" class="email-hover subheading fw-normal" data-bs-target="#exampleModalToggle"
                                data-bs-toggle="modal">
                                @lang('gen.login')
                            </a>
                            @lang('gen.with_password')
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
