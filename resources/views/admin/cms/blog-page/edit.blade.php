@extends('admin.layouts.app')

@section('title', trans('gen.blog_page'))

@push('styles')
    <style>
        .nav-tabs .nav-link {
            border: none;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .nav-tabs .nav-link.active {
            border-bottom: 3px solid #007bff !important;
            /* Change to desired active color */
            color: #007bff !important;
            background-color: white !important;
        }

        .nav-tabs .nav-link:hover {
            color: #0056b3;
            /* Change to desired hover color */
        }

        .tab-content {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
        }
    </style>
@endpush

@php
    $extraData = isset($blogPageSection->extra_data) ? json_decode($blogPageSection->extra_data) : null;
@endphp

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.edit_with_name', ['attribute' => trans('gen.blog_page')])" />
            <x-admin.breadcrumb :currentPage="__('gen.edit', ['attribute' => trans('gen.blog_page')])" />
        </x-admin.container-header>



        <x-admin.container-body class="p-4">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">@lang('gen.blog')</a>
                </li>
            </ul>

            <div class="tab-content mt-3" id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <x-forms.form :action="route('cms.blog-page.update')" method="PUT">
                        <small class="fw-bold ">@lang('gen.hero_section')</small>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="hero_section_heading">
                                    @lang('gen.heading') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="text" name="hero_section_heading"
                                    id="hero_section_heading" :value="old('hero_section_heading', $extraData->hero_section_heading ?? '')" />
                                <x-forms.input-error :messages="$errors->get('hero_section_heading')" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-forms.form-label for="hero_section_video">
                                    @lang('gen.select_with_name',['attribute' => trans('gen.video') ]) <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="file" name="hero_section_video" id="hero_section_video" onchange="previewVideo(event, 'videoPreview')" />
                                <x-forms.input-error :messages="$errors->get('hero_section_video')" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <video width="200" autoplay loop controls id="videoPreview">
                                    <source src="{{ isset($extraData->hero_section_video) ? asset('storage/' . $extraData->hero_section_video) : '' }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            

                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="hero_section_description">
                                    @lang('gen.description') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-textarea name="hero_section_description" id="heroDescription"
                                    class="editor" :value="old('hero_section_description', $extraData->hero_section_description ?? '')" />
                                <x-forms.input-error :messages="$errors->get('description')" />
                            </div>
                            <hr>
                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="title">
                                    @lang('gen.blog') @lang('gen.title') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="text" name="title"
                                    id="title" :value="old('title', $blogPageSection->title ?? '')" />
                                <x-forms.input-error :messages="$errors->get('title')" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="description">
                                    @lang('gen.blog') @lang('gen.description') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-textarea name="description" id="description"
                                    class="editor" :value="old('description', $blogPageSection->description ?? '')" />
                                <x-forms.input-error :messages="$errors->get('description')" />
                            </div>
                            <hr>
                            <small class="fw-bold ">@lang('gen.services')</small>
                            <div class="col-md-12 mb-3 mt-4">
                                <x-forms.form-label for="service_title">
                                    @lang('gen.service_title') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="text" name="service_title"
                                    id="title" :value="old('service_title', $extraData->service_title ?? '')" />
                                <x-forms.input-error :messages="$errors->get('service_title')" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="service_description">
                                    @lang('gen.service_description') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-textarea name="service_description" id="service_description"
                                    class="editor" :value="old('service_description', $extraData->service_description ?? '')" />
                                <x-forms.input-error :messages="$errors->get('service_description')" />
                            </div>

                            <div class="col-md-6 mb-2">
                                <x-buttons.submit :title="__('gen.update')" />
                            </div>
                        </div>
                    </x-forms.form>
                </div>
            </div>

        </x-admin.container-body>
    </x-admin.container>
@endsection
@push('scripts')

    <script>
        function previewVideo(event, id) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById(id);
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }

    </script>



@endpush
