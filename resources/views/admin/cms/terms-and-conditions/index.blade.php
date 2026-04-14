@extends('admin.layouts.app')

@section('title', trans('gen.terms_and_conditions'))

@push('styles')

@endpush

@php
    $extraData = isset($termsAndConditions->extra_data) ? json_decode($termsAndConditions->extra_data) : null;
@endphp

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.edit_with_name', ['attribute' => trans('gen.terms_and_conditions')])" />
            <x-admin.breadcrumb :currentPage="__('gen.edit', ['attribute' => trans('gen.terms_and_conditions')])" />
        </x-admin.container-header>

        <x-admin.container-body class="p-4">

            <x-forms.form :action="route('cms.terms-and-conditions.update')" method="PUT">

                <x-alerts.alert :message="session('success')"/>
                <x-alerts.validation-alert />

                <div class="row">
                    <div class="col-md-12 mb-3">
                        <x-forms.form-label for="content">
                            @lang('gen.content') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-textarea name="content" id="content" class="editor"
                            :value="old('content',$extraData?->content)" />
                        <x-forms.input-error :messages="$errors->get('content')" />
                    </div>

                </div>

                <div class="col-md-6 mb-2 mt-3">
                    <x-buttons.submit :title="__('gen.update', ['attribute' => trans('gen.terms_and_conditions')])" />
                </div>
            </x-forms.form>



        </x-admin.container-body>
    </x-admin.container>
@endsection
@push('styles')
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 200px;
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
    </script>
@endpush
