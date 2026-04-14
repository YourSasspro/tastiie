@extends('admin.layouts.app')

@section('title', trans('gen.category'))

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.edit_with_name', ['attribute' => trans('gen.category')])" />
            <x-admin.breadcrumb :currentPage="__('gen.edit', ['attribute' => trans('gen.category')])" />
        </x-admin.container-header>

        <x-admin.container-body class="p-4">
            <x-forms.form :action="route('admin.categories.update', $category->id)" method="PUT">
                <div class="row">

                    {{-- name --}}
                    <div class="col-md-12 mb-3">
                        <x-forms.form-label for="name">
                            @lang('gen.name') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="text" name="name" id="name" :value="old('name',$category->name ?? '')" />
                        <x-forms.input-error :messages="$errors->get('name')" />
                    </div>
                    {{-- status  --}}
                    <div class="col-md-12 mb-3">
                        <x-forms.form-label for="status">
                            @lang('gen.status') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-select name="status" id="status">
                            <option value="1" {{ old('status',$category->status ?? '') == 1 ? 'selected' : '' }}>
                                @lang('gen.active')</option>
                            <option value="0" {{ old('status',$category->status ?? '') == 0 ? 'selected' : '' }}>
                                @lang('gen.inactive')</option>
                        </x-forms.form-select>
                        <x-forms.input-error :messages="$errors->get('status')" />
                    </div>

                    <div class="col-md-6 mb-2 mt-2">
                        <x-buttons.submit :title="__('gen.update', ['attribute' => trans('gen.category')])" />
                    </div>
                </div>
            </x-forms.form>
        </x-admin.container-body>
    </x-admin.container>
@endsection
