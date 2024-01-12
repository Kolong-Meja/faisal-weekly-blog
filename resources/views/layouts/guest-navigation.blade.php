<div class="max-w-screen-xl flex flex-wrap items-center justify-around mx-auto p-4">
    <a href="{{ route('home') }}" class="flex items-center space-x-3 rtl:space-x-reverse">
        {{-- <x-dark-application-logo class="w-20 h-20 fill-current text-gray-900" /> --}}
        <img src="{{ asset('/images/White Background.png') }}" class="h-20" alt="Faisal Weekly Blog" />
    </a>
    <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
        <span class="sr-only">Open main menu</span>
        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
        </svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-default">
        <ul class="font-medium flex flex-col space-y-4 items-center border-t border-gray-100 justify-center md:items-start md:justify-normal p-6 md:p-0 mt-4 rounded-lg bg-transparent md:flex-row md:space-x-8 md:space-y-0 rtl:space-x-reverse md:mt-0 md:border-none">
            {{-- Define all guest route here! --}}
            <li>
                <a href="{{ route('home') }}" id="navigation__link__underline" class="block px-0 text-gray-900 rounded md:hover:bg-transparent md:border-0 md:p-0 md:py-2"><span></span>Home</a>
            </li>
            <li>
                <a href="{{ route('guestArticle.index') }}" id="navigation__link__underline" class="block px-0 text-gray-900 rounded md:hover:bg-transparent md:border-0 md:p-0 md:py-2"><span></span>Articles</a>
            </li>
            <li>
                <a href="https://saweria.co/faisalramadhan08" id="navigation__link__underline" class="block px-0 text-gray-900 rounded md:hover:bg-transparent md:border-0 md:p-0 md:py-2"><span></span>Donation</a>
            </li>
            <li>
                <a href="{{ route('guestAbout.index') }}" id="navigation__link__underline" class="block px-0 text-gray-900 rounded md:hover:bg-transparent md:border-0 md:p-0 md:hidden md:py-2"><span></span>About</a>
            </li>
        </ul>
    </div>
    <div class="hidden w-full md:block md:w-auto">
        <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-transparent md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
            <li>
                <a href="{{ route('guestAbout.index') }}" id="navigation__link__underline" class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:p-0"><span></span>About</a>
            </li>
        </ul>
    </div>
</div>