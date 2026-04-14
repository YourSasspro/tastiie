@extends('admin.layouts.app')

@section('title', trans('gen.who_we_are'))

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
    $extraData = isset($whoWeAre?->extra_data) ? json_decode($whoWeAre?->extra_data) : null;
@endphp

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.edit_with_name', ['attribute' => trans('gen.who_we_are')])" />
            <x-admin.breadcrumb :currentPage="__('gen.edit', ['attribute' => trans('gen.who_we_are')])" />
        </x-admin.container-header>

        <x-admin.container-body class="p-4">

            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">@lang('gen.who_we_are')</a>
                </li>
            </ul>

            <div class="tab-content mt-3" id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <x-forms.form :action="route('cms.who-we-are.update')" method="PUT">
                        <small class="fw-bold text-secondary">@lang('gen.hero_section')</small>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="title">
                                    @lang('gen.title') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="text" name="title"
                                    id="title" :value="old('title', $whoWeAre->title ?? '')" />
                                <x-forms.input-error :messages="$errors->get('title')" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="sub_title">
                                    @lang('gen.sub_title') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="text" name="sub_title"
                                    id="sub_title" :value="old('sub_title', $extraData->sub_title ?? '')" />
                                <x-forms.input-error :messages="$errors->get('sub_title')" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-forms.form-label for="hero_image">
                                    @lang('gen.select_with_name',['attribute' => trans('gen.image')])<span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="file" name="hero_image" id="hero_image" onchange="previewImage(event, 'imagePreview1')" />
                                <x-forms.input-error :messages="$errors->get('hero_image')" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-misc.img :src="asset('storage/'. $extraData?->hero_image)" width="150" id="imagePreview1"/>
                            </div>
                            <hr>
                            <small class="fw-bold text-secondary mt-3 mb-3">@lang('gen.section_with_name',['attribute'=> '2'])</small>
                            <div class="col-md-12 mb-3 ">
                                <x-forms.form-label for="section_2_heading">
                                    @lang('gen.heading') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="text" name="section_2_heading"
                                    id="section_2_heading" :value="old('section_2_heading', $extraData?->section_2_heading ?? '')" />
                                <x-forms.input-error :messages="$errors->get('section_2_heading')" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="section_2_description">
                                    @lang('gen.description') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-textarea name="section_2_description" id="section_2_description"
                                    class="editor" :value="old('section_2_description', $extraData?->section_2_description ?? '')" />
                                <x-forms.input-error :messages="$errors->get('section_2_description')" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="section_2_title">
                                    @lang('gen.title') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="text" name="section_2_title"
                                    id="section_2_title" :value="old('section_2_title', $extraData?->section_2_title ?? '')" />
                                <x-forms.input-error :messages="$errors->get('section_2_title')" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="section_2_sub_title">
                                    @lang('gen.sub_title') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="text" name="section_2_sub_title"
                                    id="section_2_sub_title" :value="old('section_2_sub_title', $extraData?->section_2_sub_title ?? '')" />
                                <x-forms.input-error :messages="$errors->get('section_2_sub_title')" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-forms.form-label for="section_2_image">
                                    @lang('gen.select_with_name',['attribute' => trans('gen.background_image')])<span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="file" name="section_2_image" id="section_2_image" onchange="previewImage(event, 'imagePreview2')" />
                                <x-forms.input-error :messages="$errors->get('section_2_image')" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-misc.img :src="asset('storage/'.$extraData?->section_2_image)" width="150" id="imagePreview2"/>
                            </div>
                            <hr>
                            <small class="fw-bold text-secondary mt-3 mb-3">@lang('gen.section_with_name',['attribute'=> '3'])</small>
                            <div class="col-md-12 mb-3 ">
                                <x-forms.form-label for="section_3_heading">
                                    @lang('gen.heading') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="text" name="section_3_heading"
                                    id="section_3_heading" :value="old('section_3_heading', $extraData?->section_3_heading ?? '')" />
                                <x-forms.input-error :messages="$errors->get('section_3_heading')" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-forms.form-label for="section_3_image">
                                    @lang('gen.select_with_name',['attribute' => trans('gen.background_image')])<span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="file" name="section_3_image" id="section_3_image" onchange="previewImage(event, 'imagePreview3')" />
                                <x-forms.input-error :messages="$errors->get('section_3_image')" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-misc.img :src="asset('storage/'.$extraData?->section_3_image)" width="150" id="imagePreview3"/>
                            </div>
                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="section_3_description">
                                    @lang('gen.description') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-textarea name="section_3_description" id="section_3_description"
                                    class="editor" :value="old('section_3_description', $extraData?->section_3_description ?? '')" />
                                <x-forms.input-error :messages="$errors->get('section_3_description')" />
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




@endpush
