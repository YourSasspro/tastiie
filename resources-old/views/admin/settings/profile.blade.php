@extends('admin.layouts.app')

@section('pageTitle', trans('gen.settings'))

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="row">
            <div class="col-md-4 mt-3">
                <div class="card border-0 shadow rounded-4">
                    <div class="card-body text-center">
                        <img src="{{ getAuthUser()->image }}" alt="" class="img-fluid rounded-circle" width="250">

                        <x-forms.form :action="route('setting.profile.image.update')">
                            {{-- User Image --}}
                            <div class="col-md-12 mb-4 mt-5">
                                <x-forms.form-input type="file" name="image" id="image" />
                                <x-forms.input-error :messages="$errors->get('image')" />
                            </div>
                            <div class="col-md-12 mb-2">
                                <x-buttons.submit :title="__('gen.save')" />
                            </div>
                        </x-forms.form>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-3">
                <div class="card border-0 shadow rounded-4">
                    <div class="card-body">
                        <nav>
                            <div class="nav nav-tabs border-0" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home"
                                    aria-selected="true">@lang('gen.home')</button>
                                <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                                    aria-selected="false">@lang('gen.password')</button>
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">

                            {{-- Profile --}}
                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                aria-labelledby="nav-home-tab" tabindex="0">
                                <x-forms.form id="updateUser" :action="route('user-profile-information.update')" method="PUT">
                                    <div class="row mt-3">

                                        {{-- First Name --}}
                                        <div class="col-md-6 mb-3">
                                            <x-forms.form-label for="first_name">
                                                @lang('gen.first_name') <span class="text-danger">*</span>
                                            </x-forms.form-label>
                                            <x-forms.form-input type="text" name="first_name" id="first_name"
                                                :value="old('first_name', getAuthUser()->first_name ?? '')" />
                                            <x-forms.input-error :messages="$errors->get('first_name')" />
                                        </div>

                                        {{-- Last Name --}}
                                        <div class="col-md-6 mb-3">
                                            <x-forms.form-label for="last_name">
                                                @lang('gen.last_name') <span class="text-danger">*</span>
                                            </x-forms.form-label>
                                            <x-forms.form-input type="text" name="last_name" id="last_name"
                                                :value="old('last_name', getAuthUser()->last_name ?? '')" />
                                            <x-forms.input-error :messages="$errors->get('last_name')" />
                                        </div>

                                        {{-- User Email --}}
                                        <div class="col-md-12 mb-3">
                                            <x-forms.form-label for="email">
                                                @lang('gen.email') <span class="text-danger">*</span>
                                            </x-forms.form-label>
                                            <x-forms.form-input type="email" name="email" id="email"
                                                :value="old('email', getAuthUser()->email ?? '')" />
                                            <x-forms.input-error :messages="$errors->get('email')" />
                                        </div>

                                        {{-- User Phone Number  --}}
                                        <div class="col-md-12 mb-3">
                                            <x-forms.form-label for="phone_number ">
                                                @lang('gen.phone_number') <span class="text-danger">*</span>
                                            </x-forms.form-label>
                                            <x-forms.form-input type="tel" name="phone_number" id="phone_number"
                                                :value="old('phone_number', getAuthUser()->phone_number ?? '')" />
                                            <x-forms.input-error :messages="$errors->get('phone_number')" />
                                        </div>
                                    </div>

                                    {{-- Delivery address --}}
                                    <div class="col-md-12 mb-4">
                                        <x-forms.form-label for="delivery_address">
                                            @lang('gen.delivery_address') <span class="text-danger">*</span>
                                        </x-forms.form-label>
                                        <x-forms.form-input type="text" name="delivery_address"
                                            value="{{ old('delivery_address', getAuthUser()->delivery_address ?? '') }}"
                                            class="form-control subheading py-3 text-secondary fw-normal" />
                                        <x-forms.input-error :messages="$errors->get('delivery_address')" />

                                    </div>

                                    {{-- Where did you hear about --}}
                                    <div class="col-md-12 mb-4">
                                        <x-forms.form-label for="where_did_you_hear_about_us">
                                            @lang('gen.where_did_you_hear_about_us')
                                        </x-forms.form-label>
                                        <x-forms.form-textarea name="where_did_you_hear_about_us"
                                            class="form-control subheading py-3 text-secondary fw-normal">{{ old('where_did_you_hear_about_us', getAuthUser()->where_did_you_hear_about_us ?? '') }}</x-forms.form-textarea>
                                        <x-forms.input-error :messages="$errors->get('where_did_you_hear_about_us')" />
                                    </div>
                                    <div class="col-md-12 mb-2">
                                        <x-buttons.submit :title="__('gen.save')" />
                                    </div>
                                </x-forms.form>
                            </div>

                            {{-- Password --}}
                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                                tabindex="0">
                                <x-forms.form :action="route('user-password.update')" method="PUT">
                                    <div class="row">
                                        {{-- Current Password --}}
                                        <div class="form-group mt-4">
                                            <div class="password-container">
                                                <x-forms.form-label for="current_password">
                                                    @lang('gen.current_password') <span class="text-danger">*</span>
                                                </x-forms.form-label>
                                                <x-forms.form-input type="password" name="current_password"
                                                    value="{{ old('password') }}"
                                                    class="form-control subheading py-3 text-secondary fw-normal" />
                                                <x-forms.input-error :messages="$errors->get('current_password')" />
                                            </div>
                                        </div>

                                        {{-- Password --}}
                                        <div class="form-group mt-4">
                                            <div class="password-container">
                                                <x-forms.form-label for="current_password">
                                                    @lang('gen.password') <span class="text-danger">*</span>
                                                </x-forms.form-label>
                                                <x-forms.form-input type="password" name="password"
                                                    value="{{ old('password') }}"
                                                    class="form-control subheading py-3 text-secondary fw-normal" />
                                                <x-forms.input-error :messages="$errors->get('password')" />
                                            </div>
                                        </div>

                                        {{-- Confirm password --}}
                                        <div class="form-group mt-4">
                                            <x-forms.form-label for="current_password">
                                                @lang('gen.confirm_password') <span class="text-danger">*</span>
                                            </x-forms.form-label>
                                            <x-forms.form-input type="password" name="password_confirmation"
                                                value="{{ old('password_confirmation') }}"
                                                class="form-control subheading py-3 text-secondary fw-normal" />
                                            <x-forms.input-error :messages="$errors->get('password_confirmation')" />
                                        </div>
                                    </div>
                                    <div class="d-flex gap-2 mt-3">
                                        <button class="btn save-btn mt-3">Save</button>
                                    </div>
                                </x-forms.form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
