<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ $article->meta_description }}">

        <title>Faisal Weekly Blog | Article — {{ $article->meta_title }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        {{-- Jquery CDN --}}
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        
        {{-- Navigation --}}
        <nav class="bg-white">
            @include('layouts.guest-navigation')
        </nav>

        <div class="flex flex-row w-full">
            <div class="w-full md:w-3/4 border-r border-gray-100">
                <div class="px-4 md:px-10">
                    {{-- Header --}}
                    <header class="bg-white border-b border-gray-100">
                        <div class="flex flex-col space-y-4 pt-10 pb-4 md:pt-20 md:pb-12">
                            <p class="text-gray-900 font-bold text-3xl md:text-4xl">{{ $article->title }}</p>
                            <p class="text-gray-500 font-serif text-base md:text-lg italic">{{ $article->description }}</p>
                            <p class="text-gray-900 font-serif"><span class="text-gray-500 italic">Written by</span> {{ $article->user->name }} | {{ $article->created_at->format('M j, Y') }} — 
                                @foreach ($article->categories as $category)
                                    <a href="{{ route('guestArticle.category', $category->name) }}">
                                        <span class="text-gray-900 bg-gray-100 p-2 rounded-full hover:bg-blue-200/50 transition-colors duration-200 ease-in-out mx-1">{{ $category->name }}</span>
                                    </a>    
                                @endforeach
                            </p>
                        </div>
                    </header>
        
                    {{-- Main Content --}}
                    <main class="bg-white font-medium text-gray-900">
                        <div class="flex flex-col space-y-4 py-8">
                            <p class="text-gray-900 font-medium font-serif text-base md:text-lg">{!! $article->content !!}</p>
                        </div>
                    </main>
                </div>
            </div>
            <div class="hidden md:block sticky top-2 md:w-1/4 md:h-[100px]">
                <p class="font-semibold text-center text-gray-900 text-lg py-5">Next to read</p>
                <div class="px-10">
                    <div class="flex flex-col w-full space-y-6">
                        @foreach ($articles as $article)
                            <a href="{{ route('guestArticle.show', $article->slug) }}">
                                <p class="italic text-gray-500 hover:text-gray-900 hover:underline transition-colors duration-200 ease-in-out">{{ $article->title }}</p>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col space-y-6 w-full md:hidden">
            <div class="w-full border-t border-gray-100 px-4 py-16">
                <p class="font-semibold text-gray-900 mb-4 text-lg">Next to read</p>
                @foreach ($articles as $article)
                <a href="{{ route('guestArticle.show', $article->slug) }}">
                    <ul class="list-disc list-inside">    
                        <li class="italic text-gray-500 text-base hover:text-gray-900 hover:underline transition-colors duration-200 ease-in-out">{{ $article->title }}</li>
                    </ul>
                </a>
                @endforeach
            </div>
        </div>
        

        {{-- Footer --}}
        <footer class="bg-white font-medium text-gray-900 border-t border-gray-100">
            <x-guest-footer />
        </footer>

        <script src="{{ asset('js/refresh-button.js') }}"></script>
    </body>
</html>
