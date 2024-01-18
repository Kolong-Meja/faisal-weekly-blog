@props(['value'])

<label {{ $attributes->merge([
    'class' => 'input-label-style'
    ]) }}
    >
    {{ $value ?? $slot }}
    <span class="input-label-text-style">(required)</span>
</label>
