<nav class="navbar navbar-expand header-navbar navbar-light sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    {{-- <form class="d-none d-md-flex ms-4">
        <input class="form-control border-0" type="search" placeholder="Search" />
    </form> --}}
    <div class="navbar-nav align-items-center ms-auto">

        {{-- Lang Toggle --}}
        <div class="d-flex gap-0 align-items-center justify-content-end me-2">
            <p class="description fw-bold m-0 me-2 {{ app()->getLocale() == 'en' ? 'text-primary' : '' }}">
                En
            </p>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault"
                    {{ app()->getLocale() == 'fr' ? 'checked' : '' }}>
            </div>
            <p class="description fw-bold m-0 {{ app()->getLocale() == 'fr' ? 'text-primary' : '' }}">
                Fr
            </p>
        </div>

        {{-- Notification Drop down --}}
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle position-relative" data-bs-toggle="dropdown">
                <i class="fa fa-bell me-lg-2 bell-ring"></i>
                <span class="d-none d-lg-inline-flex">
                    @lang('gen.notifications')
                </span>
            </a>

            <div class="dropdown-menu dropdown-menu-end p-0 shadow-sm" style="min-width: 320px;max-height:500px;overflow-y:scroll">
                @forelse(auth()->user()->unreadNotifications as $notification)
                    <a href="#" class="dropdown-item d-flex flex-column align-items-start py-3">
                        <h6 class="mb-1 fw-bold text-dark">
                            {{ __('gen.' . $notification->data['message']) ?? 'No Message' }}
                        </h6>
                        <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                    </a>
                    @if (!$loop->last)
                        <div class="dropdown-divider m-0"></div>
                    @endif
                @empty
                    <div class="dropdown-item text-center text-muted py-3">
                        @lang('gen.no_new_notifications')
                    </div>
                @endforelse
                <div class="dropdown-item text-center border-top">
                    <a href="{{ route('notifications.index') }}" class="text-decoration-none text-primary">
                        @lang('gen.view_all_notifications')
                    </a>
                </div>
            </div>
        </div>


        {{-- Profile Drop down --}}
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <x-misc.img class="rounded-circle me-lg-2" src="{{ getAuthUser()->image }}" alt=""
                    style="width: 40px; height: 40px" />
                <span class="d-none d-lg-inline-flex">
                    {{ getAuthUser()->name ?? '' }}
                </span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                {{-- Profile Setting --}}
                <a href="{{ route('setting.profile') }}" class="dropdown-item">
                    @lang('gen.profile_settings')
                </a>

                {{-- Logout --}}
                <x-forms.form :action="route('logout')">
                    <button type="submit" class="dropdown-item" style="background: none; border: none;">
                        @lang('gen.logout')
                    </button>
                </x-forms.form>
            </div>
        </div>
    </div>
</nav>
