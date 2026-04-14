@extends('web.default.layouts.app')

@section('pageTitle', trans('gen.verify_email'))

@section('content')
    <section class="my-5 py-5 carousel-section">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="text-center">
                        <h2 class="carousel-heading">
                            @lang('gen.verify_email')
                        </h2>
                        <p class="description text-secondary fw-normal">
                            @lang('gen.verify_email_text')
                        </p>

                        @if (session('status'))
                            <div class="mb-4 mt-3 fw-bold text-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        
                        {{-- Resend Verification Email status --}}
                        @if (session('status'))
                            <div class="mb-4 text-muted text-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <x-forms.form :action="route('verification.send')">

                            {{-- Resend Verification Link --}}
                            <button type="submit" class="btn btn-warning mt-3 mb-2 w-100 text-white rounded-5 p-2">
                                @lang('gen.resend_verification_email')
                            </button>
                        </x-forms.form>

                        <x-forms.form :action="route('logout')">
                            {{-- Logout --}}
                            <button type="submit" class="btn btn-outline-danger mb-5 w-100 rounded-5 p-2">
                                @lang('gen.logout')
                            </button>
                        </x-forms.form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
