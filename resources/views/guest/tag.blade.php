<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <div class="min-h-screen bg-zinc-900">
        {{-- Navigation --}}
        @include('layouts.guest-navigation')

        {{-- Float Button --}}
        @include('guest.parts.float-button')

        {{-- Hidden Feedback Success Modal --}}
        @include('guest.parts.feedback-success-modal')

        {{-- Hidden Feedback Error Modal --}}
        @include('guest.parts.feedback-error-modal')
        <section class="py-16 md:py-24">
            <div class="container mx-auto">
                <h1 class="text-center text-2xl font-bold mb-5 text-white md:text-4xl">Tags</h1>
                @if (!$tags->isEmpty())
                    <form autocomplete="on">
                        <div class="relative max-w-md mx-auto mb-5">
                            <input class="w-full p-3 border border-gray-600 bg-zinc-900 text-gray-50 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-50 focus:border-gray-50" type="search" name="search" placeholder="Search any tag..." value="{{ request('search') }}">
                        </div>
                    </form>
                    <p class="text-center text-sm mb-10 px-5 text-gray-400 md:text-lg md:px-0">Note: You can search posts by it's tag, all tags have posts related to them.</p>
                @else
                    <p class="text-gray-400 flex justify-center text-md">No Tag Available.</p>
                    <div class="flex justify-center mt-3">
                        <a href="{{ url('/') }}" class="text-gray-900 text-center font-bold text-sm bg-yellow-400 py-3 px-4 rounded-lg hover:bg-yellow-500 transition-colors duration-300 ease-in-out hover:text-gray-900 md:py-4 md:px-8 md:text-xl">
                            <span>Go Back</span>
                        </a>
                    </div>
                @endif
                <div class="grid grid-cols-2 gap-4 px-5 md:grid-cols-5 md:gap-8 md:px-0">
                    @foreach ($tags as $tag)
                        <div class="bg-yellow-400 rounded-lg shadow-xl overflow-hidden hover:bg-yellow-500 transition-colors duration-300 ease-in-out md:max-w-md">
                            <div>
                                <h2 class="text-center text-md font-bold text-neutral-900">
                                    <a href="{{ route('posts.tag', $tag->slug) }}">
                                        {{ $tag->title }}
                                    </a>
                                </h2>
                            </div>
                            <div class="flex justify-center pb-2 px-2">
                                <p class="text-black text-sm text-center md:text-md">{{ $tag->posts()->count() }} related posts</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>   
        </section>
        <footer class="py-8">
            <p class="text-center font-medium text-base mt-8 text-gray-300">© 2023 All rights reserved. Faisal Daily Blog.</p>
        </footer>  
    </div>
    <script src="{{ asset('js/navbar.js') }}"></script>
    <script src="{{ asset('js/feedback-ajax.js') }}"></script>
</body>
</html>