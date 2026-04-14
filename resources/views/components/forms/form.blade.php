@props([
    'action' => '',
    'method' => 'POST',
    'id' => '',
    'style' => '',
])

<form action="{{ $action }}" method="{{ $method === 'GET' ? 'GET' : 'POST' }}" id="{{ $id }}"
    enctype="multipart/form-data" style="{{ $style }}">
    @csrf

    @unless (in_array($method, ['GET', 'POST']))
        @method($method)
    @endunless

    {{ $slot }}
</form>
