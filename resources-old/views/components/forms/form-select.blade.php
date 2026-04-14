@props([
    'name' => '',
    'selectTitle' => trans('gen.select'),
    'hasData' => false,
    'id' => '',
    'style' => '',
    'multiple' => false,
])

<select class="form-select {{ $errors->has($name) ? 'is-invalid' : '' }}" name="{{ $name }}"
    id="{{ $id ?? $name }}" style="{{ $style }}" data-silent-initial-value-set="false"
    {{ $multiple ? 'multiple' : '' }}>
    @if ($hasData)
        <option disabled selected>
            {{ $selectTitle }}
        </option>
    @endif

    {{ $slot }}
</select>
