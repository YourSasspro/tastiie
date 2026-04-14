@extends('admin.layouts.app')

@section('title', trans('gen.users'))

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.edit_with_name', ['attribute' => trans('gen.user')])" />
            <x-admin.breadcrumb :currentPage="__('gen.edit', ['attribute' => trans('gen.user')])" />
        </x-admin.container-header>

        <x-admin.container-body class="p-4">
            <x-forms.form :action="route('admin.blog-categories.update', $blogCategories->id)" method="PUT">
                <div class="row">

                    {{-- name --}}
                    <div class="col-md-12 mb-3">
                        <x-forms.form-label for="name">
                            @lang('gen.name') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="text" name="name" id="name" :value="old('name',$blogCategories->name ?? '')" />
                        <x-forms.input-error :messages="$errors->get('name')" />
                    </div>

                    <div class="col-md-6 mb-2">
                        <x-buttons.submit :title="__('gen.update', ['attribute' => trans('gen.blog_category')])" />
                    </div>
                </div>
            </x-forms.form>
        </x-admin.container-body>
    </x-admin.container>
@endsection
