<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => 'primary-btn-style'
    ]) }}
    >
    {{ $slot }}
</button>
