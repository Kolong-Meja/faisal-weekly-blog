@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' => '
    text-gray-900
    border-none
    bg-gray-200 
    focus:ring-green-400 
    rounded-md 
    shadow-sm'
    ]) !!}
    >
