<section class="home__post__section">
    <div class="home__post__container">
        <div class="home__post__second__div">
            <div class="home__post__third__div">
                <div class="home__post__fourth__div">
                    <!-- First column: list of blog posts -->
                    <div class="home__post__main">
                        <p id="home__post__main__section__title">
                            <span id="home__post__main__section__title__inline">Newest Posts</span>
                        </p>
                        @if ($posts->isEmpty())
                            <p id="home__post__main__desc__nonexistent">No Post Available.</p>
                        @endif
                        <ul>
                            @foreach ($posts as $post)
                                <li class="home__list__post">
                                    <div class="home__post__card">
                                        <img id="home__post__card__image" src="{{ asset('images/'.$post->image) }}" title="Image by: {{ $post->owner }}">
                                        <a id="home__post__card__link" href="{{ route('posts.show', $post->slug) }}">
                                            <p id="home__post__card__title">{{ $post->title }}</p>
                                            <p id="home__post__card__subtitle">{{ $post->sub_title }}</p>
                                            <div class="home__post__card__footer">
                                                <p id="home__post__card__footer__created__date">{{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</p>
                                                <p id="home__post__card__footer__read__duration">{{ $post->reading_duration }} Minute read</p>
                                            </div>
                                        </a>
                                    </div>
                                </li>
                            @endforeach
                        </ul>                                              
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