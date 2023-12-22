<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.head')
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        p {
            color: black;
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
        <section class="py-16 md:py-20">
            <div class="container mx-auto">
                <h1 class="text-center text-2xl font-bold mb-5 text-white md:text-4xl">{{ ucwords(strtolower($tag_title->title)) }} Posts</h1>
                @if (!$post_tags->isEmpty())
                    <div>
                        <form autocomplete="on">
                            <div class="relative max-w-md mx-auto mb-5">
                                <input class="w-full p-3 border border-gray-600 bg-zinc-900 text-gray-50 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-gray-50 focus:border-gray-50" type="search" name="search" placeholder="Search any post..." value="{{ request('search') }}">
                            </div>
                        </form>
                    </div>
                    <p class="text-center text-sm mb-10 px-5 text-gray-400 md:text-lg md:px-0">Note: You can search all newest posts. The newest post will be in the first position.</p>
                @else
                    <p class="text-gray-400 flex justify-center">No Post Available.</p>
                    <div class="flex justify-center mt-3">
                        <a href="{{ url('/') }}" class="text-white text-center font-bold text-sm bg-yellow-500 py-3 px-4 rounded-lg hover:bg-yellow-600 transition-colors duration-300 ease-in-out hover:text-gray-900 md:py-4 md:px-8 md:text-xl">
                            <span>Go Back</span>
                        </a>
                    </div>
                @endif
                <div class="grid grid-cols-1 gap-6 px-5 md:grid-cols-3 md:gap-8 md:px-0">
                    @foreach ($post_tags as $post_tag)
                        <div id="post__card" class="bg-transparent rounded-b-lg overflow-hidden md:max-w-md md:h-min">
                            @foreach ($post_tag->images as $image)
                                <a href="{{ $image->url }}">
                                    <img src="{{ asset('images/'.$image->image) }}" class="w-full h-64 object-cover object-center" title="Image by: {{ $image->owner }}">
                                </a>
                            @endforeach
                            <a href="{{ route('posts.show', $post_tag->slug) }}" class="no-underline" title="{{ $post_tag->title }}">
                                <div class="px-4 pt-4 mb-2">
                                    <h2 class="text-[22px] font-bold mb-2 text-gray-50">
                                        {{ $post_tag->title }}
                                    </h2>
                                    <div class="space-y-4">
                                        <p class="text-[16px] text-gray-50">{{ $post_tag->description }}</p>
                                        <p class="text-[16px] text-gray-50">
                                            <span class="font-semibold">Written By:</span>
                                            {{ $postAuthorName }}
                                        </p>
                                    </div>
                                </div>
                                <div class="p-4 flex justify-between items-center mt-auto content-end">
                                    <span class="text-gray-50 font-semibold text-sm">{{ Carbon\Carbon::parse($post_tag->created_at)->toFormattedDateString() }}</span>
                                    <span class="text-gray-50 font-semibold text-sm">Read time: {{ $post_tag->reading_duration }} Minute</span>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
            {{ $post_tags->links('vendor.pagination.simple-tailwind') }}
        </section>  
        <footer class="py-8">
            <p class="text-center font-medium text-base mt-8 text-gray-300">© 2023 All rights reserved. Faisal Daily Blog.</p>
        </footer> 
    </div>
    <script src="{{ asset('js/navbar-transition.js') }}"></script>
    <script src="{{ asset('js/feedback-ajax.js') }}"></script>
</body>
</html>