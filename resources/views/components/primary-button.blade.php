<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-green-500 border-none rounded-md font-semibold text-xs text-gray-50 uppercase tracking-widest hover:bg-green-600 focus:bg-green-700 active:bg-green-700 focus:outline-none focus:ring-0 transition ease-in-out duration-300']) }}>
    {{ $slot }}
</button>
