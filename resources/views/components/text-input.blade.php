@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'bg-gray-600 border-none focus:border-none focus:ring-0 rounded-md shadow-md']) !!}>
