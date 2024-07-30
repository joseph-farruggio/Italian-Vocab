@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-black/10 border-white/20 focus:border-white/50 focus:ring-white/50 rounded-md shadow-sm text-white']) !!}>
