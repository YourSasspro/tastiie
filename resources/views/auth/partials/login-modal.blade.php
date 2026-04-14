<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
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
                    {{-- Login Message --}}
                    <p class="description fw-normal mt-5 mb-4 m-0">
                        @lang('gen.login_mess_1.1')
                        <span class="fw-bold bluecolor-txt"> @lang('gen.login_mess_1.2') </span>
                    </p>

                    {{-- Sign Through Google --}}
                    <div>
                        <a href="{{ route('auth.google') }}" class="btn border login-btn">
                            <img src="assets/img/google.png" alt="" class="img-fluid">
                            <span>@lang('gen.google_signin')</span>
                        </a>
                    </div>


                    <x-forms.form :action="route('login.user')" id="loginForm">
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

                        {{-- Submit --}}
                        <button type="submit" class="btn btn-warning mt-3 mb-5 w-100 text-white rounded-5 p-2">
                            @lang('gen.login')
                        </button>
                    </x-forms.form>


                    {{-- Forgot Password --}}
                    <a href="{{ route('password.request') }}" class="email-hover subheading">
                        @lang('gen.forgot_password')
                    </a>

                    {{-- Register --}}
                    <p class="description text-secondary mt-4 fw-normal">
                        @lang('gen.not_a_member')
                        <a href="#" class="email-hover subheading fw-normal" data-bs-target="#exampleModalToggle2"
                            data-bs-toggle="modal">
                            @lang('gen.register_now')
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function togglePasswordVisibility(e) {
        const passwordInput = e.previousElementSibling;
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            e.classList.remove('fa-eye');
            e.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            e.classList.remove('fa-eye-slash');
            e.classList.add('fa-eye');
        }
    }
</script>
