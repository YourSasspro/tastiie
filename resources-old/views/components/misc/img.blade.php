@props([
    'src' => '',
    'alt' => ''
])

<img src="{{ $src }}" alt="{{ $alt }}" loading="lazy" {!! $attributes->merge(['class' => '']) !!}
onerror="this.src='https://placehold.co/600x400'; this.onerror=null;"
/>