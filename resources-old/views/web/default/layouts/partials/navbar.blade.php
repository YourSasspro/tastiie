<section class="fixed-top bg-white">
    <div class="container-fluid px-3">
        {{-- Large Screen --}}
        <div class="d-none d-lg-block">
            <div class="row justify-content-between align-items-center">

                {{-- Logo --}}
                <div class="col-md-3">
                    <a href="{{ route('home') }}" class="logo-heading text-decoration-none text-dark">
                        <span class="logo-heading">
                            <x-misc.img src="{{ getLogo() }}" width="100" alt="Logo" class="img-fluid" />
                        </span>
                    </a>
                </div>

                {{-- <div class="col-md-6 text-center">
                    <div class="d-flex gap-2 w-100 justify-content-center align-items-center">
                        <div class="input-group w-auto rounded-0">
                            <span class="input-group-text bg-transparent rounded-0 border border-end-0"
                                id="addon-wrapping">
                                <img width="20" height="20" loading="lazy" src="{{asset('assets/img/calendar-icon.png')}}"
                                    alt="picto pin">
                            </span>
                            <input type="date" class="form-control description fw-normal">
                        </div>
                        <img src="{{asset('assets/img/help-icon.svg')}}" alt="" class="img-fluid">
                        <div>
                        </div>
                        <div class="input-group w-auto rounded-0">
                            <span class="input-group-text bg-transparent rounded-0 border border-end-0"
                                id="addon-wrapping">
                                <img width="20" loading="lazy" src="{{asset('assets/img/clock.png')}}" alt="picto pin">
                            </span>
                            <input type="time" class="form-control description fw-normal">
                        </div>
                        <img src="{{asset('assets/img/help-icon.svg')}}" alt="" class="img-fluid">
                    </div>
                </div> --}}
                <div class="col-md-6 text-center">
                    <div class="d-flex gap-2 w-100 justify-content-center align-items-center">
                        <!-- Date Picker -->
                        <div class="input-group w-auto rounded-0">
                            <span class="input-group-text bg-transparent rounded-0 border border-end-0">
                                <img width="20" height="20" loading="lazy" src="{{ asset('assets/img/calendar-icon.png') }}" alt="calendar">
                            </span>
                            <input type="date" class="form-control description fw-normal" id="filterDate">
                        </div>

                        <img src="{{ asset('assets/img/help-icon.svg') }}" alt="" class="img-fluid">

                        <!-- Time Picker -->
                        <div class="input-group w-auto rounded-0">
                            <span class="input-group-text bg-transparent rounded-0 border border-end-0">
                                <img width="20" loading="lazy" src="{{ asset('assets/img/clock.png') }}" alt="clock">
                            </span>
                            <input type="time" class="form-control description fw-normal" id="filterTime">
                        </div>

                        <img src="{{ asset('assets/img/help-icon.svg') }}" alt="" class="img-fluid">
                    </div>
                </div>


                <div class="col-md-3 text-end">
                    <div class="d-flex align-items-center gap-3 justify-content-end">
                        {{-- Blog Page Link --}}
                        <a href="{{route('blogs.index')}}" class="text-decoration-none text-dark me-auto description">
                            @lang('gen.blogs')
                        </a>
                        {{-- cart  --}}
                        <a href="{{ route('carts.index') }}" class="text-decoration-none text-dark me-3">
                            <i class="bi bi-basket fs-3"></i>
                        </a>

                        {{-- User auth and dashboard redirect link --}}
                        @auth
                            <div class="dropdown d-flex align-items-center">
                                <span class="user-menu d-flex align-items-center" data-bs-toggle="dropdown"
                                    aria-expanded="false" style="cursor: pointer;">
                                    <i class="fas fa-user me-2"></i>
                                    <span>@lang('gen.account')</span>
                                </span>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    @role('Super Admin')
                                        <li>
                                            <a href="{{ route('admin.dashboard.index') }}" class="dropdown-item">
                                                @lang('gen.dashboard')
                                            </a>
                                        </li>
                                    @endrole
                                    <li><a class="dropdown-item" href="{{route('orders.index')}}">@lang('gen.my_orders')</a></li>
                                    <li><a class="dropdown-item" href="{{route('user.setting.profile')}}">@lang('gen.profile_settings')</a></li>
                                    <li>
                                        <a class="dropdown-item" href="javascript:void(0)"
                                            onclick="document.getElementById('logout-form').submit()">@lang('gen.logout')</a>
                                        <form action="{{route('logout')}}"
                                            method="POST" id="logout-form" style="display:none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @else
                            <a href="#" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                                class="text-decoration-none text-dark">
                                <i class="fa-regular fa-user fs-3"></i>
                            </a>
                        @endauth

                        {{-- Lang Toggle --}}
                        <div class="d-flex gap-0 align-items-center justify-content-end">
                            <p
                                class="description fw-bold m-0 me-2 {{ app()->getLocale() == 'en' ? 'text-primary' : '' }}">
                                En
                            </p>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    id="flexSwitchCheckDefault" {{ app()->getLocale() == 'fr' ? 'checked' : '' }}>
                            </div>
                            <p class="description fw-bold m-0 {{ app()->getLocale() == 'fr' ? 'text-primary' : '' }}">
                                Fr
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Small Screen --}}
        <div class="d-block d-lg-none pb-3">
            <div class="row justify-content-between align-items-center">
                {{-- User auth and dashboard redirect link --}}
                <div class="col-4">
                    @auth
                        <div class="dropdown d-flex align-items-center">
                            <span class="user-menu d-flex align-items-center" data-bs-toggle="dropdown"
                                aria-expanded="false" style="cursor: pointer;">
                                <i class="fas fa-user me-2"></i>
                                <span>@lang('gen.account')</span>
                            </span>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a href="{{ route('admin.dashboard.index') }}" class="dropdown-item">
                                        @lang('gen.dashboard')
                                    </a>
                                </li>
                                <li><a class="dropdown-item" href="{{route('orders.index')}}">@lang('gen.my_orders')</a></li>
                                <li><a class="dropdown-item" href="{{route('user.setting.profile')}}">@lang('gen.profile_settings')</a></li>
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)"
                                        onclick="document.getElementById('logout-form').submit()">@lang('gen.logout')</a>
                                    <form action="{{route('logout')}}"
                                        method="POST" id="logout-form" style="display:none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @else
                        <a href="#" data-bs-target="#exampleModalToggle" data-bs-toggle="modal"
                            class="text-decoration-none text-dark">
                            <i class="fa-regular fa-user fs-3"></i>
                        </a>
                    @endauth
                </div>

                {{-- Logo --}}
                <div class="col-4 text-center">
                    <a href="/" class="logo-heading text-decoration-none text-dark">
                        <span class="logo-heading">
                            <img src="assets/img/logo-2.jpeg" alt="logo Avekapeti" width="100">
                        </span>
                    </a>
                </div>

                {{-- Cart --}}
                <div class="col-4 text-end">
                    <div class="d-flex gap-2 align-items-center justify-content-end">
                        <div class="d-flex gap-0 align-items-center justify-content-end">
                            <p class="description fw-normal m-0 me-2 text-dark">Fr</p>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    id="flexSwitchCheckDefault">
                                <!-- <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label> -->
                            </div>
                            <p class="description fw-normal m-0 text-dark">En</p>
                        </div>
                        <a href="#" class="text-decoration-none text-dark">
                            <i class="bi bi-basket fs-3"></i>
                        </a>
                    </div>
                </div>
            </div>

            {{-- Search by address --}}
            <div class="mt-4">
                <div class="input-group rounded-0">
                    <span class="input-group-text bg-transparent rounded-0 border border-end-0" id="addon-wrapping">
                        <img width="20" height="20" loading="lazy"
                            src="https://www.avekapeti.com/bundles/avekapeticommon/img/web-design-v4/picto/pin.png"
                            alt="picto pin">
                    </span>
                    <input type="text" class="form-control border border-start-0 rounded-0"
                        placeholder="Address de livarison" aria-label="Username" aria-describedby="addon-wrapping">
                </div>
            </div>

            {{-- Date and Time --}}
            <div class="d-flex gap-2 w-100 align-items-center mt-3">
                <div class="input-group w-100 rounded-0">
                    <span class="input-group-text bg-transparent rounded-0 border border-end-0" id="addon-wrapping">
                        <img width="20" height="20" loading="lazy" src="{{asset('assets/img/calendar-icon.png')}}"
                            alt="picto pin">
                    </span>
                    <input type="date" class="form-control description fw-normal">
                </div>
                <img src="{{asset('assets/img/help-icon.svg')}}" alt="" class="img-fluid">
                <div>
                </div>
                <div class="input-group w-100 rounded-0">
                    <span class="input-group-text bg-transparent rounded-0 border border-end-0" id="addon-wrapping">
                        <img width="20" loading="lazy" src="{{asset('assets/img/clock.png')}}" alt="picto pin">
                    </span>
                    <input type="time" class="form-control description fw-normal">
                </div>
                <img src="{{asset('assets/img/help-icon.svg')}}" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>
