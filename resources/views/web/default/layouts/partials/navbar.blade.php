<section class="fixed-top bg-white">
    <div class="container-fluid px-3">
        @php
                    // Create a Carbon instance for today
                    $now = \Illuminate\Support\Carbon::now();
                    
                    // Map English months to French abbreviations
                    $monthsFr = [
                        1 => 'Jan', 2 => 'Fév', 3 => 'Mar', 4 => 'Avr', 
                        5 => 'Mai', 6 => 'Juin', 7 => 'Juil', 8 => 'Août', 
                        9 => 'Sep', 10 => 'Oct', 11 => 'Nov', 12 => 'Déc'
                    ];
                    
                    $day = $now->format('d'); // e.g., 27
                    $month = $monthsFr[$now->month]; // e.g., Mar
                    $isoDate = $now->format('Y-m-d'); // e.g., 2026-03-27
                @endphp
        <div class="d-none d-lg-block">
            <div class="row justify-content-between align-items-center">

                
                <div class="col-md-3">
                    <a href="{{ route('home') }}" class="logo-heading text-decoration-none text-dark">
                        <span class="logo-heading">
                            <img src="{{ getLogo() }}" alt="Logo" loading="lazy" class="img-fluid" width="100"/>
                        </span>
                    </a>
                </div>

                
                <div class="col-md-6 text-center">
                    <div class="d-flex gap-2 w-100 justify-content-center align-items-center">
                        
                         <!--Date Dropdown -->
                        <div class="input-wrapper custom-dropdown-wrapper" id="headerDateWrapper">
                            <div class="dropdown-trigger">
                                <i class="bi bi-calendar3"></i>
                                <span class="selected-text" id="headerSelectedDate"
                                      data-value="">{{ $day }} {{ $month }}</span>
                                <i class="bi bi-chevron-down ms-2 arrow-icon"></i>
                            </div>
                            <div class="custom-dropdown-menu" id="headerDateMenu"></div>
                        </div>
                        
                        <!--<img src="{{ asset('assets/img/help-icon.svg') }}" alt="" class="img-fluid">-->

                        
                         <!--Time Dropdown -->
                        <div class="input-wrapper custom-dropdown-wrapper" id="headerTimeWrapper">
                            <div class="dropdown-trigger">
                                <i class="bi bi-clock"></i>
                                <span class="selected-text" id="headerSelectedTime" data-value="">
                                    Créneaux horaires
                                </span>
                                <i class="bi bi-chevron-down ms-2 arrow-icon"></i>
                            </div>
                            <div class="custom-dropdown-menu" id="headerTimeMenu"></div>
                        </div>


                        <!--<img src="{{ asset('assets/img/help-icon.svg') }}" alt="" class="img-fluid">-->
                    </div>
                </div>

                
                <!---->
                <div class="col-md-3 text-end">
                    <div class="d-flex align-items-center gap-3 justify-content-end">
                        
                        <a href="{{route('blogs.index')}}" class="text-decoration-none text-dark me-auto description">
                            @lang('gen.blogs')                        </a>
                        
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
                        
                        
                        <div class="d-flex gap-0 align-items-center justify-content-end">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
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
                            <img src="/assets/img/logo-2.jpeg" alt="logo Avekapeti" width="100">
                        </span>
                    </a>
                </div>

                
                {{-- Cart --}}
                <div class="col-4 text-end">
                    <div class="d-flex gap-2 align-items-center justify-content-end">
                        <div class="d-flex gap-0 align-items-center justify-content-end">
                            <!-- <p class="description fw-normal m-0 me-2 text-dark">Fr</p> -->
                            <!-- <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch"
                                    id="flexSwitchCheckDefault"> -->
                                <!-- <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label> -->
                            <!-- </div>
                            <p class="description fw-normal m-0 text-dark">En</p> -->
                        </div>
                        <a href="{{ route('carts.index') }}" class="text-decoration-none text-dark">
                            <i class="bi bi-basket fs-3"></i>
                        </a>
                    </div>
                </div>
            </div>

            
            <!--<div class="mt-4">-->
            <!--    <div class="input-group rounded-0">-->
            <!--        <span class="input-group-text bg-transparent rounded-0 border border-end-0" id="addon-wrapping">-->
            <!--            <img width="20" height="20" loading="lazy"-->
            <!--                src="https://www.avekapeti.com/bundles/avekapeticommon/img/web-design-v4/picto/pin.png"-->
            <!--                alt="picto pin">-->
            <!--        </span>-->
            <!--        <input type="text" class="form-control border border-start-0 rounded-0"-->
            <!--            placeholder="Address de livarison" aria-label="Username" aria-describedby="addon-wrapping">-->
            <!--    </div>-->
            <!--</div>-->

            
            <div class="d-flex gap-2 w-100 align-items-center mt-3">
                
                <div class="input-wrapper custom-dropdown-wrapper w-100" id="mobileDateWrapper">
                    <div class="dropdown-trigger">
                        <i class="bi bi-calendar3"></i>
                        <span class="selected-text" id="mobileSelectedDate" data-value="">{{ $day }} {{ $month }}</span>
                        <i class="bi bi-chevron-down ms-auto arrow-icon"></i>
                    </div>
                    <div class="custom-dropdown-menu" id="mobileDateMenu">
                        </div>
                </div>
                
                <!--<img src="https://tastiie.com/assets/img/help-icon.svg" alt="" class="img-fluid mb-2">-->
                
                <div class="input-wrapper custom-dropdown-wrapper w-100" id="mobileTimeWrapper">
                    <div class="dropdown-trigger">
                        <i class="bi bi-clock"></i>
                        <span class="selected-text" id="mobileSelectedTime" data-value="">Créneaux horaires</span>
                        <i class="bi bi-chevron-down ms-auto arrow-icon"></i>
                    </div>
                    <div class="custom-dropdown-menu" id="mobileTimeMenu">
                        </div>
                </div>
                
                <!--<img src="/assets/img/help-icon.svg" alt="" class="img-fluid mt-2">-->
                
                <!---->
            </div>
        </div>
    </div>
</section>
