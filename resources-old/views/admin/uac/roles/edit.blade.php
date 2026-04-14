@extends('admin.layouts.app')

@section('title', trans('gen.roles'))

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.edit', ['attribute' => __('gen.role')])" />
            <x-admin.breadcrumb :currentPage="__('gen.roles')" />
        </x-admin.container-header>

        <x-admin.container-body class="p-4">
            <x-forms.form id="editRole" :action="route('roles.update', $role->id)" method="POST">
                @csrf
                @method('PUT')
                <div class="row">

                    {{-- Role Name --}}
                    <div class="col-md-12 mb-3">
                        <x-forms.form-label for="name">
                            @lang('gen.name') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="text" name="name" id="name" :value="old('name', $role->name)" />
                        <x-forms.input-error :messages="$errors->get('name')" />
                    </div>

                    {{-- Permissions --}}
                    <div class="col-md-12 mb-3">
                        <x-forms.form-label for="permissions">
                            @lang('gen.permissions') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-select name="permissions" id="multi_option" :hasData="count($permissions)" multiple="true"
                            data-silent-initial-value-set="false" style="display: block !important;">
                            @foreach ($permissions as $id => $permission)
                                <option value="{{ $permission }}"
                                    {{ in_array($permission, old('permissions', $role->permissions->pluck('name')->toArray())) ? 'selected' : '' }}>
                                    {{ $permission ?? '' }}
                                </option>
                            @endforeach
                        </x-forms.form-select>
                        <x-forms.input-error :messages="$errors->get('permissions')" />
                    </div>
                </div>
                <div class="col-md-6 mb-2">
                    <x-buttons.submit :title="__('gen.update', ['attribute' => trans('gen.role')])" />
                </div>
            </x-forms.form>
        </x-admin.container-body>
    </x-admin.container>
@endsection

@push('styles')
    <style>
        #multi_option {
            display: block !important;
            max-width: 100%;
        }
    </style>
@endpush

@push('scripts')
    <script type="text/javascript">
        VirtualSelect.init({
            ele: '#multi_option'
        });
    </script>
@endpush
