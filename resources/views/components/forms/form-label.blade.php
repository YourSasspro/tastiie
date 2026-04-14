@props(['value'])

<label {{ $attributes->merge(['class' => 'fw-bold form-label']) }}>
    {{ $value ?? $slot }}
</label>
