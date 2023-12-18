<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('parts.head')
    <style>
        body, #welcome-msg {
            font-family: Arial, Helvetica, sans-serif;
        }
        #gradient-bg {
            background-image:
                linear-gradient(to bottom, rgba(26, 127, 167, 0.25), rgba(7, 19, 53, 0.5), rgba(0, 0, 0, 1)), 
                url(images/maxence-pira-SaNDu7hIWr4-unsplash.jpg); 
            background-size: auto 100%; 
            background-repeat: no-repeat;
        }
    </style>
</head>
<body>
    <div class="min-h-screen flex flex-col">
        <div class="grid grid-rows-1">
            <div class="grid grid-cols-1 sm:grid-cols-2">
    
                <!-- Left Side (Gradient Background) -->
                <div class="min-h-screen hidden sm:max-w-full sm:block" id="gradient-bg">
                    <div class="w-full grid place-items-center h-screen">
                        <p class="text-gray-100 text-center text-2xl px-3 md:text-4xl" id="welcome-msg"></p>
                    </div>
                </div>
    
                <!-- Right Side (Login Form) -->
                <div class="min-h-screen border-l border-gray-600 w-full sm:mx-auto px-4 sm:px-8 py-4 overflow-hidden bg-zinc-900">
    
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />
    
                    {{-- Logo --}}
                    <div class="max-w-full grid justify-items-center mb-4 sm:mb-10">
                        <img src="{{ asset('images/faisal_daily_blog.png') }}" alt="logo" class="max-w-full rounded-full w-28 h-28 sm:w-36 sm:h-36 shadow-md">
                    </div>
    
                    <div class="w-full grid mt-4 sm:mt-12  bg-yellow-400 p-4 sm:p-5 rounded-lg">
                        <form method="POST" action="{{ route('login') }}" autocomplete="off">
                            @csrf
    
                            <!-- Email Address -->
                            <div>
                                <label for="email" class="block font-bold text-md text-gray-900">Email</label>
                                <div class="flex">
                                    <span class="inline-flex items-center px-3 sm:px-4 text-sm text-yellow-400 bg-zinc-900 border-r border-gray-400 rounded-l-md">
                                        <span class="material-symbols-outlined">
                                            mail
                                        </span>
                                    </span>
                                    <input type="email" id="email" name="email" class="rounded-none rounded-r-lg bg-zinc-900 border-none text-white focus:ring-0 focus:border-none block flex-1 min-w-0 w-full text-sm border-zinc-900 p-3 @error('email') is-invalid @enderror" placeholder="example@gmail.com" required autofocus autocomplete="email" />
                                </div>
                                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                            </div>
    
                            <!-- Password -->
                            <div class="mt-4">
                                <label for="password" class="block font-bold text-md text-gray-900">Password</label>
                                <div class="flex">
                                    <span class="inline-flex items-center px-3 sm:px-4 text-sm text-yellow-400 bg-zinc-900 border-r border-gray-400 rounded-l-md">
                                        <span class="material-symbols-outlined">
                                            lock
                                        </span>
                                    </span>
                                    <input type="password" id="password" name="password" class="rounded-none rounded-r-lg bg-zinc-900 border-none text-white focus:ring-0 focus:border-none block flex-1 min-w-0 w-full text-sm border-zinc-900 p-3 @error('password') is-invalid @enderror" placeholder="******" required autocomplete="current-password" />
                                </div>
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                            </div>
    
                            <!-- Remember Me -->
                            <div class="block mt-4">
                                <label for="remember_me" class="inline-flex items-center">
                                    <input id="remember_me" type="checkbox" class="rounded border-zinc-900 text-yellow-500 shadow-sm focus:ring-zinc-900" name="remember">
                                    <span class="ml-2 text-md text-gray-900">{{ __('Remember me') }}</span>
                                </label>
                            </div>
    
                            <div class="flex items-center justify-end mt-4">
                                {{-- @if (Route::has('password.request'))
                                    <a class="underline text-sm text-gray-200 hover:text-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif --}}
    
                                <button type="submit" class="ml-3 bg-green-600 inline-flex items-center px-4 py-2 rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:text-white hover:bg-green-800 focus:bg-green-500 active:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150">
                                    {{ __('Log in') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    <script>
        new TypeIt("#welcome-msg", {
                waitUntilVisible: true,
                speed: 100,
                startDelay: 1000,
            })
            .type('Wlcome to', {
                delay: 200
            })
            .move(-8, {
                delay: 200
            })
            .type('e', {
                delay: 200
            })
            .move(null, {
                to: "END",
                delay: 200
            })
            .type(' Faisal Daily Blog!', {
                delay: 200
            })
            .go();
    </script>
</body>
</html>