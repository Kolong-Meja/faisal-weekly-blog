<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('description')">

        <title>Faisal Weekly Blog | @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Scripts --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- @if (!in_array(env("APP_ENV"), ["local", "development", "staging"]))
            <!-- Scripts -->
            <link rel="stylesheet" href="{{ asset('build/assets/app-dCbWKUg1.css') }}">
            <script src="{{ asset('build/assets/app-tg-piSOZ.js') }}"></script>
        @else
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif --}}
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div 
        class="login-bg-screen-style"
        style="background-image: url(images/faisal-weekly-bg.jpg)"
        >
            <!-- Logo -->
            <div>
                <a title="Faisal Weekly Blog">
                    <x-application-logo />
                </a>
            </div>

            <!-- Login Section -->
            <div class="login-section-style">
                {{ $slot }}
            </div>

            <!-- Footer -->
            <footer>
                <x-auth-footer />
            </footer>
        </div>
    </body>
</html>
