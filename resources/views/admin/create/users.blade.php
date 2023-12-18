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
                        {{ __('Create New Account') }}
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
                                                <h3 class="text-lg font-bold text-gray-900">Create New Account Form</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full p-4 bg-zinc-900 rounded-md">
                                        <div class="grid grid-cols-1">
                                            <form action="{{ route('admin.store') }}" method="POST" class="w-full p-4 bg-zinc-900 rounded-md" enctype="multipart/form-data" autocomplete="on">
                                                @csrf
                                                @method('POST')
                                                <div class="grid grid-cols-1">
                                                    <div class="grid grid-rows-4 grid-flow-col gap-y-4 mb-4">
                                                        <div>
                                                            <label for="name" class="block mb-2 text-xl font-bold text-yellow-400">Fullname</label>
                                                            <input type="text" id="name" name="name" class="rounded-lg bg-gray-600 border-2 text-white focus:ring-yellow-400 focus:border-yellow-400 block flex-1 min-w-0 w-full text-md border-yellow-400 p-2.5 @error('name') is-invalid @enderror" placeholder="John Doe" required autocomplete="name">
                                                            <div class="mt-1 text-sm text-white" id="name__help">Note: Make sure you enter the name correctly</div>
                                                        </div>
                                                        <div>
                                                            <label for="email" class="block mb-2 text-xl font-bold text-yellow-400">Email</label>
                                                            <div class="flex">
                                                                <span class="inline-flex items-center px-4 text-md text-yellow-400 bg-zinc-900 border-2 border-r-0 border-yellow-400 rounded-l-md">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-envelope" viewBox="0 0 16 16">
                                                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/>
                                                                    </svg>
                                                                </span>
                                                                <input type="text" id="email" name="email" class="rounded-none rounded-r-lg bg-gray-600 border-2 border-yellow-400 text-white placeholder-gray-400 text-md focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 @error('email') is-invalid @enderror" placeholder="example@test.com" required autocomplete="email">
                                                            </div>
                                                            <div class="mt-1 text-sm text-white" id="email_help">Note: Don't input emails with unknown domains</div>
                                                        </div>
                                                        <div>
                                                            <label for="password" class="block mb-2 text-xl font-bold text-yellow-400">Password</label>
                                                            <div class="flex">
                                                                <span class="inline-flex items-center px-4 text-md text-yellow-400 bg-zinc-900 border-2 border-r-0 border-yellow-400 rounded-l-md">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
                                                                        <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56"/>
                                                                        <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"/>
                                                                    </svg>
                                                                </span>
                                                                <input type="text" id="password" name="password" class="rounded-none rounded-r-lg bg-gray-600 border-2 border-yellow-400 text-white placeholder-gray-400 text-md focus:ring-yellow-400 focus:border-yellow-400 block w-full p-2.5 @error('password') is-invalid @enderror" placeholder="Fjhk77#$" required autocomplete="new-password">
                                                            </div>
                                                            <div class="mt-1 text-sm text-white" id="password_help">Note: Enter a password with a minimum of 8 characters, provided that it has upper and lower case letters, and contains symbols and numbers.</div>
                                                        </div>
                                                        <div>
                                                            <label for="role" class="block mb-2 text-xl font-bold text-yellow-400">Role</label>
                                                            <div class="flex">
                                                                <span class="inline-flex items-center px-4 text-md text-yellow-400 bg-zinc-900 border border-yellow-400 rounded-l-md">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                                                                        <path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                                                                    </svg>
                                                                </span>
                                                                <select id="role" class="rounded-none rounded-r-lg bg-gray-600 text-white focus:ring-yellow-400 focus:border-yellow-400 flex-1 min-w-0 w-full text-md p-2.5" required>
                                                                    <option value="admin">Admin</option>
                                                                    <option value="super admin">Super Admin</option>
                                                                </select>
                                                            </div>
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