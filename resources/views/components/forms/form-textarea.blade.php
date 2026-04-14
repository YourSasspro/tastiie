@props(['value', 'id' => ''])

<textarea {{ $attributes->merge(['class' => 'form-control']) }} id="{{ $id }}" rows="3">{!! $value ?? $slot !!}</textarea>
