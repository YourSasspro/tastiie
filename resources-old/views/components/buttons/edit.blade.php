@props([
    'route' => '',
])

<a href="{{ $route }}">
    <i class="ti ti-pencil"></i>
    <span> @lang('gen.edit') </span>
</a>
