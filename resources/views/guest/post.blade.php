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

        @media (min-width: 768px) {
            #post__card {
                transition: 300ms;
            }

            #post__card:hover {
                box-shadow: 10px 10px rgba(18, 103, 74, 1);
                transition-timing-function: ease-in-out;
            }
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
        <div class="py-16 md:py-24">
            <div class="container mx-auto">
                <h1 class="text-center text-2xl font-bold mb-5 text-white md:text-4xl">All Posts</h1>
                @if (!$post_images->isEmpty())
                    <div>
                        <form autocomplete="on">
                            <div class="relative mb-5 flex justify-center px-5 md:px-0">
                                <span class="inline-flex items-center px-3 sm:px-4 text-sm text-gray-900 bg-zinc-900 border-2 border-r-0 border-gray-200 rounded-l-md">
                                    <span class="material-symbols-outlined text-white">
                                        search
                                    </span>
                                </span>
                                <input type="search" name="search" id="default-search" class="block w-full p-4 pl-5 text-sm bg-zinc-900 rounded-none rounded-r-lg shadow-lg border-2 border-l-0 border-gray-200 focus:border-gray-100 focus:ring-0 md:w-2/4" placeholder="Search title of post..." value="{{ request('search') }}">
                            </div>
                        </form>
                        <button id="dropdownRadioButton" data-dropdown-toggle="dropdownDefaultRadio" data-dropdown-offset-skidding="30" data-dropdown-placement="bottom" class="hidden text-gray-800 bg-yellow-400 hover:bg-yellow-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 ml-5 mb-3 text-center items-center transition-colors duration-300 ease-in-out md:ml-0 md:inline-flex" type="button">
                            Filters 
                            <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                            </svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="dropdownDefaultRadio" class="hidden z-10 w-48 bg-gray-700 divide-gray-600 rounded-lg shadow-lg">
                            <form>
                                <ul class="p-3 space-y-3 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownRadioButton">
                                    <li>
                                        <div class="flex items-center p-2 hover:bg-gray-600">
                                            <input id="default-radio-2" type="radio" value="newest" name="filter" class="w-4 h-4 text-yellow-400 bg-gray-600 border-gray-500 focus:ring-yellow-500 dark:focus:ring-yellow-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="default-radio-2" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Newest Post</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="flex items-center p-2 hover:bg-gray-600">
                                            <input id="default-radio-3" type="radio" value="oldest" name="filter" class="w-4 h-4 text-yellow-400 bg-gray-600 border-gray-500 focus:ring-yellow-500 dark:focus:ring-yellow-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
                                            <label for="default-radio-3" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Oldest Post</label>
                                        </div>
                                    </li>
                                </ul>
                                <div class="px-2 flex justify-center">
                                    <button type="submit" class="text-gray-900 bg-yellow-400 hover:bg-yellow-600 transition-colors duration-300 ease-in-out w-50 focus:ring-4 hover:text-white focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p class="text-center text-sm mb-10 px-5 text-gray-400 md:text-lg md:px-0">Note: You can search all newest posts. The newest post will be in the first position.</p>
                @else
                    <p class="text-white flex justify-center text-md">No Post Available.</p>
                    <div class="flex justify-center mt-3">
                        <a href="{{ url('/') }}" class="text-gray-900 text-center font-bold text-sm bg-yellow-400 py-3 px-4 rounded-lg hover:bg-yellow-500 transition-colors duration-300 ease-in-out hover:text-gray-900 md:py-4 md:px-8 md:text-xl">
                            <span>Go Back</span>
                        </a>
                    </div>
                @endif
                <div class="grid grid-cols-1 gap-6 px-5 md:grid-cols-3 md:gap-8 md:px-0">
                    @foreach ($post_images as $post_image)
                        <div id="post__card" class="bg-yellow-400 rounded-b-lg shadow-xl shadow-gray-900/40 overflow-hidden hover:bg-yellow-500 transition-colors duration-300 ease-in-out md:max-w-md md:h-min">
                            <a href="{{ $post_image->url }}">
                                <img src="{{ asset('images/'.$post_image->image) }}" class="w-full h-64 object-cover object-center" title="Image by: {{ $post_image->owner }}">
                            </a>
                            <div class="px-4 pt-4 mb-2">
                                <h2 class="text-[22px] font-bold mb-2 text-gray-900">
                                    <a href="{{ route('posts.show', $post_image->slug) }}">
                                        {{ $post_image->short_title }}
                                    </a>
                                </h2>
                                <p class="text-[16px] text-gray-900">{{ $post_image->sub_title }}</p>
                            </div>
                            <div class="p-4 flex justify-between items-center mt-auto content-end">
                                <span class="text-gray-900 font-semibold text-sm">{{ Carbon\Carbon::parse($post_image->created_at)->toFormattedDateString() }}</span>
                                <span class="text-gray-900 font-semibold text-sm">Read time: {{ $post_image->reading_duration }} Minute</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>   
            {{ $post_images->links("vendor.pagination.simple-tailwind") }}
        </div>           
    </div>
    {{-- Navigation Transition --}}
    <script src="{{ asset('js/navbar-transition.js') }}"></script>

    {{-- Feedback Store Ajax --}}
    <script src="{{ asset('js/feedback-ajax.js') }}"></script>
</body>
</html>