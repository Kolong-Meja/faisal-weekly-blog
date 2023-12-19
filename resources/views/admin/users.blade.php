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
                    <p class="font-bold text-2xl text-center text-yellow-400 leading-tight">
                        {{ __('Users Status') }}
                    </p>
                </div>
            </div>
        </header>
        {{-- Main Content --}}
        <div class="mx-auto py-2">
            <div class="grid grid-rows-1">
                <div class="grid grid-cols-1">
                    {{-- Post Data Table --}}
                    <div class="pt-12 pb-8">
                        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                            <div class="bg-yellow-400 overflow-hidden rounded-md shadow-lg">
                                <div class="p-6">
                                    <div class="grid grid-rows-1">
                                        <div class="w-full mb-2">
                                            <div class="text-center">
                                                <h2 class="text-lg font-bold text-gray-900">Users Data Table</h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="overflow-x-auto max-w-full px-4 pb-4">
                                    {{-- Flash Notification --}}
                                    @if (session()->has('success'))
                                        <div class="flex items-center p-4 mb-4 text-base text-gray-50 border border-gray-50 rounded-lg bg-green-600" role="alert">
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
                                    {{-- Table Content --}}
                                    <table class="w-full text-md text-white">
                                        <thead class="text-xs text-yellow-400 border-b border-yellow-400 text-center uppercase bg-zinc-900">
                                            <tr>
                                                <th scope="col" class="p-4">ID</th>
                                                <th scope="col" class="p-4">Role</th>
                                                <th scope="col" class="p-4">Username</th>
                                                <th scope="col" class="p-4">Email</th>
                                                <th scope="col" class="p-4">Email Verified At</th>
                                                <th scope="col" class="p-4">Last Login At</th>
                                                <th scope="col" class="p-4">Created At</th>
                                                <th scope="col" class="p-4">Updated At</th>
                                                <th scope="col" class="p-4">Status</th>
                                                <th scope="col" class="p-4">Activity</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-center">
                                            @forelse ($users as $user)
                                                <tr class="bg-zinc-900">
                                                    <td class="px-6 py-3">
                                                        {{ $user->id }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        {{ $user->role_title }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        {{ $user->username }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        {{ $user->email }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        {{ $user->email_verified_at }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        {{ $user->last_login_at }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        {{ $user->created_at }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        {{ $user->updated_at }}
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        @if ($user->status != 'online')
                                                            <span class="relative flex items-center bg-red-900 text-red-300 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                                <span class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-red-500 opacity-75"></span>
                                                                <span class="relative inline-flex rounded-full h-2 w-2 bg-red-500"></span>
                                                                <span class="ml-1">{{ $user->status }}</span>
                                                            </span>
                                                        @else
                                                            <span class=" relative flex items-center bg-green-900 text-green-300 text-xs font-medium px-2.5 py-0.5 rounded-full">
                                                                <span class="animate-ping absolute inline-flex h-2 w-2 rounded-full bg-green-500 opacity-75"></span>
                                                                <span class="relative inline-flex rounded-full h-2 w-2 bg-green-500"></span>
                                                                <span class="ml-1">{{ $user->status }}</span>
                                                            </span>
                                                        @endif
                                                    </td>
                                                    <td class="px-6 py-3">
                                                        <form onsubmit="return confirm('Are you sure to remove this user?');" action="{{ route('admin.delete', $user->id) }}" method="POST">
                                                            <div class="inline-flex shadow-sm gap-2" role="group">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="px-4 py-2 text-sm font-medium rounded-md text-white bg-red-500 hover:bg-red-700 hover:text-gray-900 transition-colors duration-300 ease-in-out focus:z-10 focus:ring-2 focus:ring-red-700 focus:text-white">
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
                                                        <span class="font-bold">Admin Data Not Found!</span> Try to create a new admin account.
                                                    </div>
                                                </div>
                                            @endforelse
                                        </tbody>
                                    </table>
                                    {{ $users->links('vendor.pagination.simple-tailwind') }}
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