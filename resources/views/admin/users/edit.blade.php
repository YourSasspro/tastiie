@extends('admin.layouts.app')

@section('title', trans('gen.users'))

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.edit_with_name', ['attribute' => trans('gen.user')])" />
            <x-admin.breadcrumb :currentPage="__('gen.edit', ['attribute' => trans('gen.user')])" />
        </x-admin.container-header>

        <x-admin.container-body class="p-4">
            <x-forms.form :action="route('users.update', $user->id)" method="PUT">
                <div class="row">
                    {{-- First Name --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="first_name">
                            @lang('gen.first_name') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="text" name="first_name" id="first_name" :value="old('first_name', $user->first_name)" />
                        <x-forms.input-error :messages="$errors->get('first_name')" />
                    </div>

                    {{-- Last Name --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="last_name">
                            @lang('gen.last_name') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="text" name="last_name" id="last_name" :value="old('last_name', $user->last_name)" />
                        <x-forms.input-error :messages="$errors->get('last_name')" />
                    </div>

                    {{-- User Email --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="email">
                            @lang('gen.email') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="email" name="email" id="email" :value="old('email', $user->email)" />
                        <x-forms.input-error :messages="$errors->get('email')" />
                    </div>

                    {{-- User Phone Number --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="phone_number">
                            @lang('gen.phone_number') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="tel" name="phone_number" id="phone_number" :value="old('phone_number', $user->phone_number)" />
                        <x-forms.input-error :messages="$errors->get('phone_number')" />
                    </div>

                    {{-- User Password (Optional) --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="password">
                            @lang('gen.password')
                        </x-forms.form-label>
                        <x-forms.form-input type="password" name="password" id="password" />
                        <x-forms.input-error :messages="$errors->get('password')" />
                    </div>

                    {{-- User Confirm Password (Optional) --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="password_confirmation">
                            @lang('gen.confirm_password')
                        </x-forms.form-label>
                        <x-forms.form-input type="password" name="password_confirmation" id="password_confirmation" />
                        <x-forms.input-error :messages="$errors->get('password_confirmation')" />
                    </div>

                    {{-- User Role --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="role">
                            @lang('gen.role') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-select name="role" :selectTitle="__('gen.select_with_name', ['attribute' => trans('gen.roles')])" :hasData="!empty($roles)">
                            @forelse ($roles as $id => $role)
                                <option value="{{ $role }}" @selected($user->roles->contains('id', $id))>
                                    {{ $role ?? '' }}
                                </option>
                            @empty
                                @lang('gen.no_result_found')
                            @endforelse
                        </x-forms.form-select>
                        <x-forms.input-error :messages="$errors->get('role')" />
                    </div>

                    {{-- User Image --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="image">
                            @lang('gen.image')
                        </x-forms.form-label>
                        <x-forms.form-input type="file" name="image" id="image" />
                        <x-forms.input-error :messages="$errors->get('image')" />
                    </div>
                </div>

                <div class="col-md-6 mb-2">
                    <x-buttons.submit :title="__('gen.update', ['attribute' => trans('gen.user')])" />
                </div>
            </x-forms.form>
        </x-admin.container-body>
    </x-admin.container>
@endsection
