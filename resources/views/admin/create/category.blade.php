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
        @php
            $greetingWord = "";
            $recentTime = date("G");

            if ($recentTime > 0 && $recentTime < 24) {
                if ($recentTime >= 3 && $recentTime < 12) {
                    $greetingWord = "Good Morning";
                } else if ($recentTime >= 12 && $recentTime < 17) {
                    $greetingWord = "Good Afternoon";
                } else {
                    $greetingWord = "Good Evening";
                }
            } 
        @endphp
        <x-admin-navigation :greetingMessage="$greetingWord"/>
        <header class="bg-zinc-900">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div name="header">
                    <h2 class="font-bold text-2xl text-center text-yellow-400 leading-tight">
                        {{ __('Create New Category') }}
                    </h2>
                </div>
            </div>
        </header>
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
                                                <h3 class="text-lg font-bold text-gray-900">Create Category Form</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full p-4 bg-zinc-900 rounded-md">
                                        <div class="grid grid-cols-1">
                                            <form action="{{ route('category.store') }}" method="POST" class="w-full p-4 bg-zinc-900 rounded-md" enctype="multipart/form-data" autocomplete="on">
                                                @csrf
                                                @method('POST')
                                                <div class="grid grid-cols-1">
                                                    <div class="grid grid-rows-3 grid-flow-col gap-y-4 mb-4">
                                                        <div>
                                                            <label for="title" class="block mb-2 text-xl font-bold text-yellow-400">Title</label>
                                                            <input type="text" id="title" name="title" class="rounded-lg bg-gray-600 border-2 text-white focus:ring-yellow-400 focus:border-yellow-400 block flex-1 min-w-0 w-full text-md border-yellow-400 p-2.5 @error('title') is-invalid @enderror" placeholder="Example" required>
                                                            <div class="mt-1 text-sm text-white" id="title__help">Note: Make sure you enter the title correctly</div>
                                                        </div>
                                                        <div>
                                                            <label for="meta_title" class="block mb-2 text-xl font-bold text-yellow-400">Meta Title</label>
                                                            <input type="text" id="meta_title" name="meta_title" class="rounded-none rounded-r-lg bg-gray-600 border-2 border-yellow-400 text-white placeholder-gray-400 text-md focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 @error('meta_title') is-invalid @enderror" placeholder="Example of Something" required>
                                                            <div class="mt-1 text-sm text-white" id="meta__title__help">Note: Make sure you enter the meta title correctly</div>
                                                        </div>
                                                        <div>
                                                            <label for="slug" class="block mb-2 text-xl font-bold text-yellow-400">Slug</label>
                                                            <input type="text" id="slug" name="slug" class="rounded-none rounded-r-lg bg-gray-600 border-2 border-yellow-400 text-white placeholder-gray-400 text-md focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 @error('slug') is-invalid @enderror" placeholder="this-is-just-example" required>
                                                            <div class="mt-1 text-sm text-white" id="password_help">Note: The slug doesn't have to be the same as the original title.</div>
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