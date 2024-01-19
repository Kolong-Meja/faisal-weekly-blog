<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ $category->meta_description }}">
        <link rel="shortcut icon" href="{{ asset('images/Faisal Weekly Blog Favicon.jpg') }}" type="image/x-icon">
        <title>Faisal Weekly Blog | Category — {{ $category->meta_title }}</title>

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

        <header class="bg-white">
            <div class="container mx-auto px-auto">
                <div class="grid grid-cols-1">
                    <div class="max-w-lg md:max-w-3xl mx-auto px-5 md:px-0 bg-white rounded-xl overflow-hidden">
                        <div class="flex flex-col space-y-4 p-4">
                            <p class="text-gray-600 text-xl md:text-2xl font-serif leading-relaxed">
                                “The beautiful thing about learning is that nobody can take it away from you.”
                                <span class="text-gray-900 text-base md:text-lg">― B.B. King</span>
                            </p>
                        </div>
                    </div>
                    <div class="hidden md:block relative">
                        <div class="absolute top-0 left-20">
                            <a href="{{ route('guestArticle.index') }}" title="previous">
                                <div class="p-3 bg-transparent hover:bg-gray-100 transition-colors duration-200 ease-in-out rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left text-gray-900 w-8 h-8" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                                </svg>
                                </div>
                            </a>
                        </div>  
                    </div>
                </div>
            </div>
        </header>

        <main class="bg-white font-medium text-gray-900">
            {{-- Search --}}
            <div class="pt-16 flex justify-center">
                <form action="{{ route('guestArticle.category', $category->name) }}" autocomplete="on" id="searchForm" class="flex items-center">
                    <x-search-articles />
                    
                    {{-- Refresh Button --}}
                    <button 
                    type="button"
                    id="buttonRefresh"
                    name="refresh"
                    class="
                    text-gray-900
                    ml-2
                    "
                    >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                    </svg>
                    </button>
                </form>
            </div>

            {{-- Result of articles --}}
            <div class="container mx-auto mt-8">
                <div class="grid grid-cols-1 gap-4 pb-8">
                    @foreach ($articles as $article)
                        <div class="max-w-lg md:max-w-3xl mx-auto px-5 md:px-0 bg-white rounded-xl overflow-hidden">
                            <div class="flex flex-col p-4">
                                <a href="{{ route('guestArticle.show', $article->slug) }}">
                                    <div class="flex flex-col space-y-4 pb-4">
                                        <h1 class="font-bold text-gray-900 text-xl md:text-2xl">{{ $article->title }}</h1>
                                        <p class="text-gray-600 text-base md:text-lg font-serif leading-relaxed">{{ $article->description }}</p>
                                    </div>
                                    <p class="text-sm pt-4 border-t border-gray-100"><span class="italic text-gray-600">Written by </span>{{ $article->user->name }} | {{ $article->created_at->format('M j, Y') }} — 
                                        @foreach ($article->categories as $category)
                                            <a href="{{ route('guestArticle.category', $category->name) }}">
                                                <span class="text-gray-900 bg-gray-100 p-2 rounded-full hover:bg-blue-200/50 transition-colors duration-200 ease-in-out mx-1">{{ $category->name }}</span>
                                            </a> 
                                        @endforeach
                                    </p>
                                </a>    
                            </div>
                        </div>
                    @endforeach
                </div>
                @if ($articles->isEmpty())
                    <div class="flex items-center justify-center py-4">
                        <p class="font-serif text-lg text-gray-500">No article's found.</p>
                    </div>
                @endif
            </div>    
        </main>
        <footer class="bg-white font-medium text-gray-900 border-t border-gray-100">
            <x-guest-footer />
        </footer>

        <script src="{{ asset('js/refresh-button.js') }}"></script>
    </body>
</html>