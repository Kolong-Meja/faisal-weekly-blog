<style>
    #navigation__link__underline {
        text-decoration: none;
        position: relative;
        padding-top: 2px;
        padding-bottom: 2px;
    }

    #navigation__link__underline span {
        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        width: 0;
        border-bottom: 2px solid rgba(17, 24, 39, 1);
        transition: width .3s;
    }

    #navigation__link__underline:hover span {
        width: 100%;
    }
</style>

<nav id="guest__navigation" class="bg-zinc-900 fixed w-full z-20 top-0 start-0 mx-auto max-w-full px-2 sm:px-6 lg:px-8">
    <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
            <a href="{{ route('home.index') }}" class="btn btn-ghost">
                <img class="h-12 w-auto rounded-full" src="{{ asset('images/faisal_daily_blog.png') }}" alt="Faisal Daily Blog Logo"/>
            </a>
        </div>
        <div class="flex flex-1 items-center justify-center">
            <div class="flex space-x-4 items-center md:space-x-6">
                <a id="guest__navigation__link" type="button" class="text-gray-50 hover:bg-yellow-400 hover:text-gray-900 rounded-md px-3 py-2 text-base font-medium transition-colors duration-300 ease-in-out" data-model-target="small-modal" data-modal-toggle="small-modal">
                    <span class="material-symbols-outlined flex items-center">
                        menu
                    </span>
                </a>
                <a id="guest__navigation__link" href="https://saweria.co/faisalramadhan08" class="text-gray-50 hover:bg-yellow-400 hover:text-gray-900 rounded-md px-3 py-2 text-base font-medium transition-colors duration-300 ease-in-out">Donate</a>
                <a id="guest__navigation__link" href="{{ route('home.portfolio') }}" class="text-gray-50 hover:bg-yellow-400 hover:text-gray-900 rounded-md px-3 py-2 text-base font-medium transition-colors duration-300 ease-in-out">Portfolio</a>
            </div>
        </div>
    </div>
</nav>

<div id="small-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-yellow-400 rounded-lg shadow-lg p-4 space-y-4 md:p-5">
            <!-- Modal body -->
            <div class="text-center">
                <a href="{{ route('home.index') }}" id="navigation__link__underline" class="text-lg leading-relaxed text-gray-900 font-semibold"><span></span>Home</a>
            </div>
            <div class="text-center">
                <a href="{{ route('posts.index') }}" id="navigation__link__underline" class="text-lg leading-relaxed text-gray-900 font-semibold"><span></span>Posts</a>
            </div>
            <div class="text-center">
                <a href="{{ route('categories') }}" id="navigation__link__underline" class="text-lg leading-relaxed text-gray-900 font-semibold"><span></span>Categories</a>
            </div>
            <div class="text-center">
                <a href="{{ route('tags') }}" id="navigation__link__underline" class="text-lg leading-relaxed text-gray-900 font-semibold"><span></span>Tags</a>
            </div>
        </div>
    </div>
</div>