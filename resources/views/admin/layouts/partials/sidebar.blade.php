<div class="sidebar pe-4 pb-3">
    <nav class="navbar navbar-light">
        <a href="{{route('admin.dashboard.index')}}" class="navbar-brand mx-auto mb-3">
            <h3 class="text-primary ">
                <x-misc.img src="{{ getLogo() }}" width="100" alt="Logo" class="img-fluid" />
            </h3>
        </a>
        {{-- <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <x-misc.img class="rounded-circle me-lg-2" src="{{ getAuthUser()->image }}" alt=""
                    style="width: 40px; height: 40px" />
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">
                    {{ getAuthUser()->name ?? '' }}
                </h6>
            </div>
        </div> --}}
        <div class="navbar-nav w-100">
            @foreach (adminSidebarRoutes() as $item)
                {{-- Dropdown Menu --}}
                @if (isset($item['dropdown']))
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle {{ isset($item['show']) ? 'show' : '' }}"
                            data-bs-toggle="dropdown">
                            <i class="fa {{ $item['icon'] }} me-2"></i>
                            {{ $item['label'] }}
                        </a>
                        <div class="dropdown-menu bg-transparent border-0 {{ isset($item['show']) ? 'show' : '' }}"
                            {{ isset($item['show']) ? 'data-bs-popper="static"' : '' }}>
                            @foreach ($item['dropdown'] as $dropdown)
                                <a href="{{ $dropdown['link'] }}"
                                    class="dropdown-item {{ !empty($item['active']) ? 'active' : '' }}">
                                    {{ $dropdown['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @else
                    {{-- Single Item --}}
                    <a href="{{ $item['link'] }}"
                        class="nav-item nav-link {{ !empty($item['active']) ? 'active' : '' }}">
                        <i class="fa {{ $item['icon'] }} me-2"></i>
                        {{ $item['label'] }}
                    </a>
                @endif
            @endforeach
        </div>
    </nav>
</div>
