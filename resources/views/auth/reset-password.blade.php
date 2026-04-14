@extends('web.default.layouts.app')

@section('pageTitle', trans('gen.reset_password'))

@section('content')
    <section class="my-5 py-5 carousel-section">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="text-center">
                        <h2 class="carousel-heading">
                            @lang('gen.reset_password')
                        </h2>

                        @if (session('status'))
                            <div class="mb-4 mt-3 fw-bold text-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <x-forms.form :action="route('password.update')">

                            <input type="hidden" name="token" value="{{ $request->token }}">

                            {{-- Email --}}
                            <div class="form-group mt-4">
                                <x-forms.form-input type="email" name="email" :value="old('email', $request->email)"
                                    placeholder="{{ trans('gen.email') }}"
                                    class="form-control subheading py-3 text-secondary fw-normal" readonly />
                                <x-forms.input-error :messages="$errors->get('email')" />

                            </div>

                            {{-- Password --}}
                            <div class="form-group mt-4">
                                <div class="password-container">
                                    <x-forms.form-input type="password" name="password" value="{{ old('password') }}"
                                        placeholder="{{ trans('gen.password') }}"
                                        class="form-control subheading py-3 text-secondary mb-2 fw-normal" />
                                    <i class="far fa-eye password-toggle pe-2" onclick="togglePasswordVisibility(this)"></i>
                                </div>
                                <x-forms.input-error :messages="$errors->get('password')" />
                            </div>

                            {{-- Confirm password --}}
                            <div class="form-group mt-4">
                                <x-forms.form-input type="password" name="password_confirmation"
                                    value="{{ old('password_confirmation') }}"
                                    placeholder="{{ trans('gen.confirm_password') }}"
                                    class="form-control subheading py-3 mb-2 text-secondary fw-normal" />
                                <x-forms.input-error :messages="$errors->get('password_confirmation')" />
                            </div>

                            {{-- Submit --}}
                            <button class="btn btn-warning mt-3 mb-5 w-100 text-white rounded-5 p-2">
                                @lang('gen.reset_password')
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
