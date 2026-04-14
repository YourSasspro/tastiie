@extends('admin.layouts.app')

@section('title', trans('gen.blog'))

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.create', ['attribute' => __('gen.blog')])" />
            <x-admin.breadcrumb :currentPage="__('gen.blog')" />
        </x-admin.container-header>

        <x-admin.container-body class="p-4">
            <x-forms.form id="createUser" :action="route('admin.blogs.store')">
                {{-- <x-alerts.validation-alert/> --}}
                <div class="row">

                    {{-- title --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="title">
                            @lang('gen.title') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="text" name="title" id="title" :value="old('title')" />
                        <x-forms.input-error :messages="$errors->get('title')" />
                    </div>

                    {{-- category --}}
                    <div class="col-md-6 mb-3 mt-1">
                        <x-forms.form-label for="category_id">
                            @lang('gen.category') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-select name="category_id" id="category_id">
                            <option value="">@lang('gen.select') @lang('gen.category')</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </x-forms.form-select>
                        <x-forms.input-error :messages="$errors->get('category_id')" />
                    </div>

                    {{-- image  --}}
                    <div class="col-md-12 mb-3">
                        <x-forms.form-label for="image">
                            @lang('gen.select') @lang('gen.image')<span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="file" name="images[]" id="image" multiple />
                        <span class="text-danger">
                            @lang('gen.hold_ctrl_to_select_multiple_images')
                        </span>
                        <x-forms.input-error :messages="$errors->get('image')" />
                    </div>
                    {{-- <div class="col-md-6 mb-3">
                        <x-misc.img :src="'https://placehold.co/600x400'" width="150" id="imagePreview1" />
                    </div> --}}


                    {{-- Body --}}
                    <div class="col-md-12 mb-3">
                        <x-forms.form-label for="content">
                            @lang('gen.content') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-textarea name="content" id="content" class="editor"
                            :value="old('content')" />
                        <x-forms.input-error :messages="$errors->get('content')" />
                    </div>


                    <div class="col-md-6 mb-2">
                        <x-buttons.submit :title="__('gen.create', ['attribute' => trans('gen.blogs')])" />
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
                .create(document.querySelector('#content'), {
                    ckfinder: {
                        uploadUrl: '{{ route('ckeditor.upload') }}?_token={{ csrf_token() }}'
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endpush
