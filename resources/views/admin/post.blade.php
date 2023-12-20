<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        p {
            color: white;
        }
    </style>
</head>
<body>
    <div class="min-h-screen bg-zinc-900">
        {{-- Navigation --}}
        <x-admin-navigation :greetingMessage="$greetingMsg" />
        <header class="bg-zinc-900">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div name="header">
                    <p class="font-bold text-2xl text-center text-yellow-400 leading-tight">
                        {{ __('Posts Table') }}
                    </p>
                </div>
            </div>
        </header>
        <div class="mx-auto py-2">
            <div class="grid grid-rows-1">
                <div class="grid grid-cols-1">
                    <div class="pt-12 pb-8">
                        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                            <div class="bg-yellow-400 overflow-hidden rounded-md shadow-lg">
                                <div class="overflow-x-auto max-w-full p-4">
                                    @if (session()->has("success"))
                                        <div class="flex items-center p-4 mb-4 text-sm text-gray-50 border border-none rounded-lg bg-green-600" role="alert">
                                            <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                            </svg>
                                            <span class="sr-only">Info</span>
                                            <div>
                                                <span class="font-bold">Success!</span> {{ session()->get("success") }}
                                            </div>
                                        </div>
                                    @elseif (session()->has("error"))
                                        <div class="container mx-auto">
                                            <div class="flex items-center p-4 mb-4 text-sm text-gray-50 border border-none rounded-lg bg-red-500" role="alert">
                                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                </svg>
                                                <span class="sr-only">Info</span>
                                                <div>
                                                    <span class="font-bold">Not Permitted!</span> {{ session()->get("error") }}
                                                </div>
                                            </div>  
                                        </div> 
                                    @endif
                                    <table class="w-full text-md text-white">
                                        <thead class="text-xs text-yellow-400 border-b border-yellow-400 text-center uppercase bg-zinc-900">
                                            <tr>
                                                <th scope="col" class="p-4">ID</th>
                                                <th scope="col" class="p-4">Author</th>
                                                <th scope="col" class="p-4">Title</th>
                                                <th scope="col" class="p-4">Description</th>
                                                <th scope="col" class="p-4">Meta Title</th>
                                                <th scope="col" class="p-4">Slug</th>
                                                <th scope="col" class="p-4">Keywords</th>
                                                <th scope="col" class="p-4">Created At</th>
                                                <th scope="col" class="p-4">Updated At</th>
                                                <th scope="col" class="p-4">Activity</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @forelse ($posts as $post)
                                                <tr class="bg-zinc-900">
                                                    <td class="px-6 py-3">
                                                        {{ $post->post_id }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        {{ $post->user_name }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        {{ $post->short_title }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        {{ $post->short_description }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        {{ $post->meta_title }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        {{ $post->slug }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        {{ $post->keywords }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        {{ $post->created_at }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        {{ $post->updated_at }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        <form onsubmit="return confirm('Are you sure to remove this post?');" action="{{ route('post.delete', $post->post_id) }}" method="POST">
                                                            <div class="inline-flex shadow-sm gap-2" role="group">
                                                                <a href="{{ route('post.edit', $post->slug) }}">
                                                                    <button type="button" class="px-4 py-2 text-sm font-medium rounded-md text-gray-900 bg-green-500 hover:bg-green-600 hover:text-white transition-colors duration-300 ease-in-out focus:z-10 focus:ring-2 focus:ring-green-700 focus:text-white">
                                                                        Edit
                                                                    </button>
                                                                </a>
                                                                <a href="{{ route('post.detail', $post->slug) }}">
                                                                    <button type="button" class="px-4 py-2 text-sm font-medium rounded-md text-gray-900 bg-blue-500 hover:bg-blue-600 hover:text-white transition-colors duration-300 ease-in-out focus:z-10 focus:ring-2 focus:ring-green-700 focus:text-white">
                                                                        View
                                                                    </button>
                                                                </a>
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="px-4 py-2 text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-600 hover:text-gray-900 transition-colors duration-300 ease-in-out focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-white">
                                                                    Delete
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <div class="flex items-center p-4 mb-4 text-sm text-white border border-red-500 rounded-lg bg-red-500" role="alert">
                                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                                    </svg>
                                                    <span class="sr-only">Info</span>
                                                    <div>
                                                        <span class="font-bold">Post Data Not Found!</span> Try create a new post.
                                                    </div>
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $posts->links("vendor.pagination.simple-tailwind") }}
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