<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
    tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header border-0">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="text-center">
                    {{-- Logo --}}
                    <x-misc.img src="{{ asset('assets/img/logo-2.jpeg') }}" alt="Logo" class="img-fluid"
                        width="150" />
                    <p class="description fw-normal mt-4 m-0">
                        {{-- Login if already member --}}
                        @lang('gen.already_a_member')
                        <a href="#" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                            class="fw-bold bluecolor-txt">
                            @lang('gen.login')
                        </a>
                    </p>

                    <x-forms.form :action="route('register.user')" id="registerForm">
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                {{-- First Name --}}
                                <div class="form-group mt-4">
                                    <x-forms.form-input type="text" name="first_name" value="{{ old('first_name') }}"
                                        placeholder="{{ trans('gen.first_name') }}"
                                        class="form-control subheading py-3 text-secondary fw-normal" />
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                {{-- Last Name --}}
                                <div class="form-group mt-4">
                                    <x-forms.form-input type="text" name="last_name" value="{{ old('last_name') }}"
                                        placeholder="{{ trans('gen.last_name') }}"
                                        class="form-control subheading py-3 text-secondary fw-normal" />
                                </div>
                            </div>
                        </div>

                        {{-- Email --}}
                        <div class="form-group mt-4">
                            <x-forms.form-input type="email" name="email" value="{{ old('email') }}"
                                placeholder="{{ trans('gen.email') }}"
                                class="form-control subheading py-3 text-secondary fw-normal" />
                        </div>

                        {{-- Password --}}
                        <div class="form-group mt-4">
                            <div class="password-container">
                                <x-forms.form-input type="password" name="password" value="{{ old('password') }}"
                                    placeholder="{{ trans('gen.password') }}"
                                    class="form-control subheading py-3 text-secondary fw-normal" />
                                <i class="far fa-eye password-toggle pe-2" onclick="togglePasswordVisibility(this)"></i>
                            </div>
                        </div>

                        {{-- Confirm password --}}
                        <div class="form-group mt-4">
                            <x-forms.form-input type="password" name="password_confirmation"
                                value="{{ old('password_confirmation') }}"
                                placeholder="{{ trans('gen.confirm_password') }}"
                                class="form-control subheading py-3 text-secondary fw-normal" />
                        </div>

                        {{-- Phone number --}}
                        <div class="form-group mt-4">
                            <x-forms.form-input type="tel" name="phone_number" value="{{ old('phone_number') }}"
                                placeholder="{{ trans('gen.phone_number') }}"
                                class="form-control subheading py-3 text-secondary fw-normal" />
                        </div>

                        {{-- Enterprise --}}
                        <div class="form-group mt-4">
                            <x-forms.form-input type="text" name="enterprise"
                                value="{{ old('enterprise') }}"
                                placeholder="{{ trans('gen.enterprise') }}"
                                class="form-control subheading py-3 text-secondary fw-normal" />
                        </div>

                        {{-- Delivery address --}}
                        <div class="form-group mt-4">
                            <x-forms.form-input type="text" name="delivery_address" id="location"
                                value="{{ old('delivery_address') }}"
                                placeholder="{{ trans('gen.delivery_address') }}"
                                class="form-control subheading py-3 text-secondary fw-normal" />
                            <div id="suggestionsContainer"></div>
                        </div>
                        <input type="hidden" name="latitude" id="latitude">
                        <input type="hidden" name="longitude" id="longitude">

                        {{-- Where did you hear about --}}
                        <div class="form-group mt-4 mb-4">
                            <x-forms.form-textarea name="where_did_you_hear_about_us"
                                placeholder="{{ trans('gen.where_did_you_hear_about_us') }}"
                                class="form-control subheading py-3 text-secondary fw-normal">{{ old('where_did_you_hear_about_us') }}</x-forms.form-textarea>
                        </div>

                        {{-- Recieve Daily Menu --}}
                        <div class="form-check d-flex gap-2 justify-content-center">
                            <x-forms.form-input type="checkbox" name="receive_daily_menu"
                                class="form-check-input subheading" id="defaultCheck1" />
                            <label class="form-check-label subheading fw-normal" for="defaultCheck1">
                                @lang('gen.recive_daily_menus')
                            </label>
                        </div>


                        {{-- Submit button --}}
                        <button type="submit" class="btn btn-warning mt-3 mb-5 w-100 text-white rounded-5 p-2" id="registerBtn">
                            @lang('gen.register_now')
                        </button>
                    </x-forms.form>

                    {{-- Privacy Message --}}
                    <p class="description text-secondary mt-4 fw-normal m-0">
                        @lang('gen.accept_our_text')
                    </p>
                    <p class="description text-secondary fw-normal">
                        <a href="#" class="email-hover subheading fw-normal">
                            @lang('gen.general_conditions')
                        </a>
                        @lang('gen.and_legal_age')
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
