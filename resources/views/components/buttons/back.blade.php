@props([
    'route' => route('admin.dashboard.index'),
    'title' => trans('gen.dashboard'),
])


<div class="flex-grow-1">
    <a href="{{ $route }}" class="btn btn-primary">
        <i class="fas fa-arrow-left me-2"></i>
        {{ $title }}
    </a>
</div>
