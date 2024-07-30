@props(['active'])

@php
$classes = ($active ?? false) ? 'bg-black/20' : 'hover:black/20';
$classes .= ' text-white p-2 rounded-lg mx-auto w-full transition-colors text-center';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
