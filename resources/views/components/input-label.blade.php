@props(['value'])

<label {{ $attributes->merge([
    'class' => '
    block 
    font-medium 
    text-sm 
    text-gray-900'
    ]) }}
    >
    {{ $value ?? $slot }}
    <span class="text-xs font-medium text-gray-600">(required)</span>
</label>
