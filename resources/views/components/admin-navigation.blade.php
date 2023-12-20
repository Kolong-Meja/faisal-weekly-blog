<nav class="bg-zinc-900 border-b border-gray-800 sticky z-20 max-w-full max-h-full">
    <div class="mx-auto px-6">
        <div class="flex justify-between py-4">
            <div class="flex">
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('admin.index') }}">
                        <img src="{{ asset('images/faisal_daily_blog.png') }}" alt="Logo" class="block h-12 w-auto fill-current rounded-full">
                    </a>
                </div>
                <div class="hidden sm:ml-6 md:flex">
                    <x-nav-link :href="route('post.index')" :active="request()->routeIs('post.index')">
                        {{ __('Posts') }}
                    </x-nav-link>
                </div>
                <div class="hidden sm:ml-6 md:flex">
                    <x-nav-link :href="route('tag.index')" :active="request()->routeIs('tag.index')">
                        {{ __('Tags') }}
                    </x-nav-link>
                </div>
                <div class="hidden sm:ml-6 md:flex">
                    <x-nav-link :href="route('category.index')" :active="request()->routeIs('category.index')">
                        {{ __('Categories') }}
                    </x-nav-link>
                </div>
                <div class="hidden sm:ml-6 md:flex">
                    <x-nav-link :href="route('feedback.index')" :active="request()->routeIs('feedback.index')">
                        {{ __('Feedbacks') }}
                    </x-nav-link>
                </div>
                <div class="hidden sm:ml-6 md:flex">
                    <x-nav-link :href="route('admin.users')" :active="request()->routeIs('admin.users')">
                        {{ __('Users') }}
                    </x-nav-link>
                </div>
                <div class="hidden sm:ml-6 sm:flex">
                    <div class="grid place-items-center md:w-full">
                        <button id="menu__dropdown" data-dropdown-toggle="menu__dropdown__non__divider" tabindex="0" type="button" class="text-gray-900 bg-yellow-400 hover:bg-yellow-500 transition-colors duration-300 ease-in-out focus:ring-4 focus:outline-none focus:ring-amber-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center mr-2" id="multiLevelDropdownButton" data-dropdown-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5"/>
                            </svg>
                        </button>
                        {{-- dropdown --}}
                        <div id="menu__dropdown__non__divider" class="z-20 hidden bg-yellow-400 rounded-lg shadow-lg w-56">
                            <ul class="py-2 text-sm text-gray-900" aria-labelledby="menu__dropdown">
                                <li>
                                    <a href="{{ route('post.create') }}" class="block px-4 py-2 hover:bg-zinc-900 hover:text-yellow-400 transition-colors duration-300 ease-in-out">Create New Post</a>
                                </li>
                                <li>
                                    <a href="{{ route('category.create') }}" class="block px-4 py-2 hover:bg-zinc-900 hover:text-yellow-400 transition-colors duration-300 ease-in-out">Create New Category</a>
                                </li>
                                <li>
                                    <a href="{{ route('tag.create') }}" class="block px-4 py-2 hover:bg-zinc-900 hover:text-yellow-400 transition-colors duration-300 ease-in-out">Create New Tag</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.create') }}" class="block px-4 py-2 hover:bg-zinc-900 hover:text-yellow-400 transition-colors duration-300 ease-in-out">Create New Admin Account</a>
                                </li>
                            </ul>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="flex items-center">
                <div class="grid place-items-center md:w-full">
                    <button id="admin__dropdown" data-dropdown-toggle="admin__dropdown__divider" tabindex="0" type="button" class="inline-flex items-center px-5 border-none text-sm leading-6 font-medium rounded-md text-white bg-transparent hover:text-gray-300 focus:outline-none transition ease-in-out duration-300">
                        <span class="font-bold text-white">{{ $greetingMessage }} <span class="font-normal">{{ Auth::user()->name }}</span></span>
                        <svg class="fill-current h-4 w-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                    
                    {{-- Dropdown --}}
                    <div id="admin__dropdown__divider" class="z-20 hidden bg-yellow-400 divide-y divide-gray-900 rounded-lg shadow-lg w-44">
                        <ul class="py-2 text-sm text-gray-900" aria-labelledby="admin__dropdown">
                            <li>
                                <a href="{{ route('admin.index') }}" class="block px-4 py-2 hover:bg-zinc-900 hover:text-yellow-400 transition-colors duration-300 ease-in-out">Dashboard</a>
                            </li>
                            <li>
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 hover:bg-zinc-900 hover:text-yellow-400 transition-colors duration-300 ease-in-out">Edit Profile</a>
                            </li>
                        </ul>
                        <div class="py-2">
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="flex items-start justify-start px-4 py-2 w-44 text-sm text-gray-900 hover:bg-zinc-900 hover:text-yellow-400 transition-colors duration-300 ease-in-out">
                                    Sign Out
                                </button>
                            </form>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</nav>