@props([
    'route' => route('admin.dashboard.index'),
    'title' => trans('gen.dashboard'),
    'icon' => 'fas fa-plus',
])


<div class="flex-grow-1">
    <a href="{{ $route }}" class="fs-5 text-decoration-none">
        <i class="{{ $icon }} me-1"></i>
        {{ $title }}
    </a>
</div>
