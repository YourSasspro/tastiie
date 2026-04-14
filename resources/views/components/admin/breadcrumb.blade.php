@props(['currentPage'])

<div class="text-end">
    <ol class="breadcrumb m-0 py-0">
        <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard.index') }}">
                @lang('gen.dashboard')
            </a>
        </li>
        <li class="breadcrumb-item active">
            {{ $currentPage ?? 'N/A' }}
        </li>
    </ol>
</div>
