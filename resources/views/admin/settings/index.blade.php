@extends('admin.layouts.app')

@section('pageTitle', trans('gen.settings'))

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.general_settings')" />
            <x-admin.breadcrumb :currentPage="__('gen.general_settings')" />
        </x-admin.container-header>

        <x-admin.container-body class="p-4">
            {{-- Setting Form --}}
            <x-forms.form :action="route('setting.general.update')">
                <div class="row">
                    {{-- Site Name --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="site_name">
                            @lang('gen.site_name') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="text" name="site_name" id="site_name" :value="old('site_name', $generalSetting->site_name ?? '')" />
                        <x-forms.input-error :messages="$errors->get('site_name')" />
                    </div>

                    {{-- Site Email --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="site_email">
                            @lang('gen.site_email') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="email" name="site_email" id="site_email" :value="old('site_email', $generalSetting->site_email ?? '')" />
                        <x-forms.input-error :messages="$errors->get('site_email')" />
                    </div>

                    {{-- Site Logo --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="site_logo">
                            @lang('gen.site_logo')
                        </x-forms.form-label>

                        @if (isset($generalSetting) && $generalSetting->site_logo)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $generalSetting->site_logo) }}" alt="Current Logo"
                                    style="max-width: 100px;">
                            </div>
                        @endif

                        <x-forms.form-input type="file" name="site_logo" id="site_logo" />
                        <x-forms.input-error :messages="$errors->get('site_logo')" />
                    </div>

                    {{-- Site Favicon --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="site_favicon">
                            @lang('gen.site_favicon')
                        </x-forms.form-label>

                        @if (isset($generalSetting) && $generalSetting->site_favicon)
                            <div class="mb-2">
                                <img src="{{ asset('storage/' . $generalSetting->site_favicon) }}" alt="Current Favicon"
                                    style="max-width: 100px;">
                            </div>
                        @endif

                        <x-forms.form-input type="file" name="site_favicon" id="site_favicon" />
                        <x-forms.input-error :messages="$errors->get('site_favicon')" />
                    </div>

                    {{-- Site Description --}}
                    <div class="col-md-12 mb-3">
                        <x-forms.form-label for="site_description">
                            @lang('gen.site_description') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-textarea name="site_description" id="site_description" class="editor"
                            :value="old('site_description', $generalSetting->site_description ?? '')" />
                        <x-forms.input-error :messages="$errors->get('site_description')" />
                    </div>

                    {{-- Site Address --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="site_address">
                            @lang('gen.site_address') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="text" name="site_address" id="site_address" :value="old('site_address', $generalSetting->site_address ?? '')" />
                        <x-forms.input-error :messages="$errors->get('site_address')" />
                    </div>



                    {{-- Site Phone --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="site_phone">
                            @lang('gen.site_phone') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="text" name="site_phone" id="site_phone" :value="old('site_phone', $generalSetting->site_phone ?? '')" />
                        <x-forms.input-error :messages="$errors->get('site_phone')" />
                    </div>

                    {{-- Site Copyright --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="site_copy_right">
                            @lang('gen.site_copy_right') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="text" name="site_copy_right" id="site_copy_right" :value="old('site_copy_right', $generalSetting->site_copy_right ?? '')" />
                        <x-forms.input-error :messages="$errors->get('site_copy_right')" />
                    </div>


                    {{-- Submit Button --}}
                    <div class="col-md-12 mb-2">
                        <x-buttons.submit :title="__('gen.save')" />
                    </div>
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
                .create(document.querySelector('#site_description'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endpush
