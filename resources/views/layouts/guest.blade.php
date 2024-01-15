<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('description')">

        <title>Faisal Weekly Blog | @yield('title')</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">

        {{-- Jquery CDN --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        {{-- Scripts --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        {{-- @if (!in_array(env("APP_ENV"), ["local", "development", "staging"]))
            <!-- Scripts -->
            <link rel="stylesheet" href="{{ asset('build/assets/app-d5Dapr-r.css') }}">
            <script src="{{ asset('build/assets/app-tg-piSOZ.js') }}"></script>
        @else
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @endif --}}
    </head>
    <body class="guest__layout">
        {{-- Navigation --}}
        <nav class="guest-nav">
            @include('layouts.guest-navigation')
        </nav>

        {{-- Header --}}
        <header class="guest-header">
            @yield('header')
        </header>

        {{-- Main Content --}}
        <main class="guest-main">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="guest-footer">
            <x-guest-footer />
        </footer>
        
        <script src="{{ asset('js/refresh-button.js') }}"></script>
    </body>
</html>
