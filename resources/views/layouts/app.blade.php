<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('description')">

        <title>Faisal Weekly Blog | @yield('title')</title>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Jquery CDN -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <!-- Summernote JS -->
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

        <!-- Chart JS -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <!-- @if (!in_array(env("APP_ENV"), ["local", "development", "staging"]))
            <link rel="stylesheet" href="{{ asset('build/assets/app-dCbWKUg1.css') }}">
            <script src="{{ asset('build/assets/app-tg-piSOZ.js') }}"></script>
        @endif -->
    </head>
    <body>
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    @yield('header')
                </div>
            </header>

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
        <script src="{{ asset('js/refresh-button.js') }}"></script>
        <script>
            $(document).ready(function () {
                $('#content').summernote({
                    lang: 'en-US',
                    height: 500,
                    minHeight: null,
                    maxHeight: null,
                    focus: true,
                    toolbar: [
                        ["style", ["style"]],
                        ["font", ["bold", "underline", "clear"]],
                        ["fontsize", ["fontsize"]],
                        ["color", ["color"]],
                        ["para", ["ul", "ol", "paragraph"]],
                        ["table", ["table"]],
                        ["insert", ["link", "picture", "video"]],
                        ["view", ["fullscreen", "codeview", "help"]]
                    ],
                });
            });
        </script>
    </body>
</html>
