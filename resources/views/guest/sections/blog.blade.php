<section class="bg-zinc-900">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-0 py-24 md:grid-cols-8 md:gap-8 md:py-60">
            <div class="cols-span-1 md:col-span-5">
                <div class="grid grid-cols-1 gap-5">
                    <!-- First column: list of blog posts -->
                    <div class="p-3">
                        <p class="text-2xl text-center mb-3 md:text-3xl md:text-start">
                            <span class="bg-yellow-400 px-5 py-2 text-gray-900 font-bold">Newest Posts</span>
                        </p>
                        @if ($posts->isEmpty())
                            <div class="flex justify-center md:justify-start">
                                <div class="flex items-center p-4 mt-3 w-72 text-sm text-start text-gray-300 rounded-lg bg-gray-800 md:p-3 md:mt-5 md:text-md" role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-bold">No Post Available!</span> Stay patient, the post will coming soon.
                                    </div>
                                </div>
                            </div>
                        {{-- @else
                            <div class="flex justify-center md:justify-start">
                                <div class="flex items-center p-4 mt-3 w- text-sm text-start text-gray-300 rounded-lg bg-gray-800 md:p-3 md:mt-5 md:text-md" role="alert">
                                    <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                    </svg>
                                    <span class="sr-only">Info</span>
                                    <div>
                                        <span class="font-bold">Newest Post Coming Soon!</span> Stay patient, get yourself a coffee and read all current post that you've not read before.
                                    </div>
                                </div>
                            </div> --}}
                        @endif
                        @foreach ($posts as $post)
                            <div class="flex mt-8">
                                <div class="w-40 relative md:w-60">
                                    <img src="{{ asset('images/'. $post->image) }}" alt="{{ $post->title }} Image" title="Image by: {{ $post->owner }}" class="absolute inset-0 w-full h-full object-cover" loading="lazy" />
                                </div>
                                <div class="flex-auto p-6">
                                    <div class="flex flex-wrap">
                                        <h1 class="flex-auto text-xl font-semibold text-gray-50">
                                            {{ $post->title }}
                                        </h1>
                                        <div class="hidden w-full text-sm font-medium text-gray-300 mt-2 md:block">
                                            {{ $post->description }}
                                        </div>
                                    </div>
                                    <span class="flex items-baseline mb-6 pb-6 border-b border-gray-800"></span>
                                    <div class="flex justify-between items-center">
                                        <p class="text-sm text-gray-50">{{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</p>
                                        <p class="text-sm text-gray-50">{{ $post->reading_duration }} Minute Read</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        {{-- <ul>
                            @foreach ($posts as $post)
                                <li class="home__list__post">
                                    <div class="home__post__card">
                                        <img id="home__post__card__image" src="{{ asset('images/'.$post->image) }}" title="Image by: {{ $post->owner }}">
                                        <a id="home__post__card__link" href="{{ route('posts.show', $post->slug) }}">
                                            <p id="home__post__card__title">{{ $post->title }}</p>
                                            <p id="home__post__card__subtitle">{{ $post->description }}</p>
                                            <div class="home__post__card__footer">
                                                <p id="home__post__card__footer__created__date">{{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</p>
                                                <p id="home__post__card__footer__read__duration">{{ $post->reading_duration }} Minute read</p>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>                                               --}}
                    </div>                    
                </div>
            </div>
            <div class="home__category__first__div">
                <div class="home__category__second__div">
                    <p id="home__category__main__section__title">
                        <span id="home__category__main__section__title__inline">Categories</span>
                    </p>
                    @if ($categories->isEmpty())
                        <p id="home__category__main__desc__nonexistent">No Category Available.</p>
                    @endif
                    <div id="home__category__column">
                        @foreach ($categories as $category)
                            <a id="home__category__link" href="{{ route('posts.category', $category->slug) }}">
                                <p id="home__category__title">{{ $category->title }}</p>
                            </a>  
                        @endforeach
                    </div>
                </div>  
            </div>            
        </div>
    </div>
</section>