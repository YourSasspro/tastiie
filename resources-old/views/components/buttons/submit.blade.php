@props([
    'title' => 'button',
    'icon' => 'fas fa-save',
    'class' => 'btn btn-primary',
])


<div class="flex-grow-1">
    <button type="submit" class="{{ $class }}">
        <i class="{{ $icon }} me-2"></i>
        {{ $title }}
    </button>
</div>
