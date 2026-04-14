@extends('admin.layouts.app')

@section('pageTitle', trans('gen.newsletter'))

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.newsletter')" />
            <x-admin.breadcrumb :currentPage="__('gen.newsletter')" />
        </x-admin.container-header>

        <x-admin.container-body class="p-4">
            {{-- Button to navigate to users page --}}
            <div class="row mb-5">
                <div class="col-md-12 d-flex justify-content-start">
                    <a href="{{ route('view.email') }}" class="btn btn-primary">
                        @lang('gen.view_all_subscribed_email')
                    </a>
                </div>
            </div>
            <form action="{{ route('send.newsletter') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="multi_option" class="form-label">
                            @lang('gen.select_email')
                        </label>
                        <x-forms.form-select name="email" id="multi_option" :hasData="count($subscribedEmails)" multiple="true"
                            data-silent-initial-value-set="false" style="display: block !important;">
                            @foreach ($subscribedEmails as $name => $email)
                                <option value="{{ $email }}" @selected(old('email') == $email)>
                                    <b class="fw-bold">{{ $name ?? '' }}</b>
                                    <small class="text-muted text-secondary">({{ $email ?? '' }})</small>
                                </option>
                            @endforeach
                        </x-forms.form-select>
                        <x-forms.input-error :messages="$errors->get('email')" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="subject" class="form-label">
                            @lang('gen.subject')
                        </label>
                        <input type="text" class="form-control" id="subject" name="subject"
                            value="{{ old('subject') }}" style="padding: 10px">
                        <x-forms.input-error :messages="$errors->get('subject')" />
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="content" class="form-label">
                            @lang('gen.email_content')
                        </label>
                        <textarea class="form-control editor" id="content" name="content" rows="5">{{ old('content') }}</textarea>
                        <x-forms.input-error :messages="$errors->get('content')" />
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <x-buttons.submit icon="fas fa-paper-plane" :title="__('gen.send_newsletter_email')" />
                </div>
            </form>

        </x-admin.container-body>
    </x-admin.container>
@endsection


@push('styles')
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 200px;
        }

        #multi_option {
            display: block !important;
            max-width: 100%;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('#content'))
                .catch(error => {
                    console.error(error);
                });
        });

        VirtualSelect.init({
            ele: '#multi_option'
        });
    </script>
@endpush
