<button {{ $attributes->merge([
    'type' => 'submit', 
    'class' => '
    inline-flex 
    items-center 
    px-4 py-2 
    bg-green-400
    border 
    border-transparent 
    rounded-md 
    font-semibold 
    text-xs 
    text-gray-100
    uppercase 
    tracking-widest 
    hover:bg-green-500
    hover:text-gray-200
    focus:bg-green-400 
    active:bg-green-400 
    focus:outline-none 
    focus:ring-2 
    focus:ring-green-400 
    focus:ring-offset-2 
    transition-colors 
    ease-in-out 
    duration-200'
    ]) }}
    >
    {{ $slot }}
</button>
