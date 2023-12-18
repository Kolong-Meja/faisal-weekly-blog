<nav class="home__navbar">
    <div class="home__navbar__position">
        <div class="home__navbar__logo__position">
            <a id="home__navbar__logo__link" href="{{ route('home.index') }}">
                <img src="{{ asset('images/faisal_daily_blog.png') }}" alt="Faisal Daily Blog Logo" id="home__navbar__logo__image">
            </a>
        </div>
        <div class="home__navbar__list__position">
            <ul id="home__navbar__list__link">
                <li class="home__navbar__list">
                    <a class="home__navbar__link" title="Menu" data-model-target="home__navbar__link__modal" data-modal-toggle="home__navbar__link__modal">
                        <span class="material-symbols-outlined flex items-center">
                            menu
                        </span>
                    </a>
                </li>
                <li class="home__navbar__list">
                    <a class="home__navbar__link" title="Donate Me" href="https://saweria.co/faisalramadhan08">Donate</a>
                </li>
                <li class="home__navbar__list">
                    <a class="home__navbar__link" title="My Portfolio" href="{{ route('home.portfolio') }}">Portfolio</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div id="home__navbar__link__modal" tabindex="-1" aria-hidden="true" class="hidden h-[calc(100%-1rem)]">
    <div class="home__navbar__link__modal__block">
        <!-- Modal content -->
        <div class="home__navbar__link__modal__content__block">
            <button id="home__navbar__link__modal__content__close__button" type="button" data-modal-hide="home__navbar__link__modal">
                <svg id="home__navbar__link__modal__content__close__button__icon" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span id="home__navbar__link__modal__content__close__button__logic">Close modal</span>
            </button>
            <div class="home__navbar__link__modal__content__link__position">
                <div class="home__navbar__link__modal__content__link">
                    <h4 class="home__navbar__link__modal__content__text">
                        <a class="home__navbar__link__modal__content__link__underline" href="{{ route('home.index') }}"><span></span>Home Page</a>
                    </h4>
                </div>
                <div class="home__navbar__link__modal__content__link">
                    <h4 class="home__navbar__link__modal__content__text">
                        <a class="home__navbar__link__modal__content__link__underline" href="{{ route('posts.index') }}"><span></span>Blogs</a>
                    </h4>
                </div>
                <div class="home__navbar__link__modal__content__link">
                    <h4 class="home__navbar__link__modal__content__text">
                        <a class="home__navbar__link__modal__content__link__underline" href="{{ route('categories') }}"><span></span>Categories</a>
                    </h4>
                </div>
                <div id="home__navbar__link__modal__content__link__last">
                    <h4 class="home__navbar__link__modal__content__text">
                        <a class="home__navbar__link__modal__content__link__underline" href="{{ route('tags') }}"><span></span>Tags</a>
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div> 