<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
        <x-admin-navigation :greetingMessage="$greetingMsg" />
        {{-- Page Heading --}}
        <header class="bg-zinc-900">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div name="header">
                    <h2 class="font-bold text-2xl text-center text-yellow-400 leading-tight">
                        {{ __('Edit Category') }}
                    </h2>
                </div>
            </div>
        </header>
        {{-- Main content --}}
        <div class="mx-auto py-2">
            <div class="max-w-full grid grid-rows-1 grid-flow-col">
                <div class="w-full grid-cols-1">
                    <div class="pt-12 pb-8">
                        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                            <div class="bg-yellow-400 overflow-hidden rounded-md shadow-lg">
                                <div class="p-4">
                                    <div class="grid grid-rows-1 mb-4">
                                        <div class="w-full mb-2">
                                            <div class="text-center py-2">
                                                <h3 class="text-lg font-semibold text-gray-900">Edit Category Form</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full p-4 bg-zinc-900 rounded-md">
                                        <div class="grid grid-cols-1">
                                            {{-- Form input for post data --}}
                                            <form action="{{ route('category.update', $category->slug) }}" method="POST" class="w-full p-4 bg-zinc-900 rounded-md" enctype="multipart/form-data" autocomplete="on">
                                                @csrf
                                                @method('PATCH')
                                                <div class="grid grid-cols-1">
                                                    <div class="grid grid-rows-3 grid-flow-col gap-y-4 mb-4">
                                                        {{-- Form input for title with validation --}}
                                                        <div>
                                                            <label for="title" class="block mb-2 text-xl font-bold text-yellow-400">Category Title</label>
                                                            <div class="flex">
                                                                <span class="inline-flex items-center px-4 text-md text-yellow-400 bg-zinc-900 border-2 border-r-0 border-yellow-400 rounded-l-md">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-tag" viewBox="0 0 16 16">
                                                                        <path d="M6 4.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm-1 0a.5.5 0 1 0-1 0 .5.5 0 0 0 1 0z"/>
                                                                        <path d="M2 1h4.586a1 1 0 0 1 .707.293l7 7a1 1 0 0 1 0 1.414l-4.586 4.586a1 1 0 0 1-1.414 0l-7-7A1 1 0 0 1 1 6.586V2a1 1 0 0 1 1-1zm0 5.586 7 7L13.586 9l-7-7H2v4.586z"/>
                                                                    </svg>
                                                                </span>
                                                                <input type="text" id="title" name="title" class="rounded-none rounded-r-lg bg-gray-600 border-2 text-white focus:ring-yellow-400 focus:border-yellow-400 block flex-1 min-w-0 w-full text-md border-yellow-400 p-2.5 @error('title') is-invalid @enderror" placeholder="Yesterday Is My Best Day..." value="{{ old('title', $category->title) }}" required>
                                                            </div>
                                                            <div class="mt-1 text-sm text-white" id="title_help">Note: A post need some category, so think wisely</div>
                                                        </div>
                                                        {{-- Form input for meta title with validation --}}
                                                        <div>
                                                            <label for="meta_title" class="block mb-2 text-xl font-bold text-yellow-400">Category Meta Title</label>
                                                            <input type="text" id="meta_title" name="meta_title" class="bg-gray-600 border-2 border-yellow-400 text-white placeholder-gray-400 text-md rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 @error('meta_title') is-invalid @enderror" placeholder="Personal Story About Yesterday" value="{{ old('meta_title', $category->meta_title) }}" required>
                                                            <div class="mt-1 text-sm text-white" id="meta__title__help">Note: Meta title is the title that you put on the category page</div>
                                                        </div>
                                                        {{-- Form input for slug with validation --}}
                                                        <div>
                                                            <label for="slug" class="block mb-2 text-xl font-bold text-yellow-400">Category Slug</label>
                                                            <input type="text" id="slug" name="slug" class="bg-gray-600 border-2 border-yellow-400 text-white placeholder-gray-400 text-md rounded-lg focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 @error('slug') is-invalid @enderror" placeholder="yesterday-is-my-best-day..." value="{{ old('slug', $category->slug) }}" required>
                                                            <div class="mt-1 text-sm text-white" id="slug__help">Note: Slug is a sentence that is stored in the url of the website category page</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                {{-- Button submit --}}
                                                <button type="submit" class="mr-2 text-gray-900 bg-green-500 hover:bg-green-700 hover:text-white transition-colors duration-300 ease-in-out focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                                                {{-- Button reset  --}}
                                                <button type="reset" class="text-white bg-red-500 hover:bg-red-700 hover:text-gray-900 transition-colors duration-300 ease-in-out focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Reset</button>
                                            </form>
                                            {{-- End of form input --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>