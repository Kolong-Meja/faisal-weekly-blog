<section class="bg-zinc-900">
    <div class="container mx-auto">
        <div class="grid grid-cols-1 gap-0 py-24 md:grid-cols-8 md:gap-8 md:py-60">
            <div class="cols-span-1 md:col-span-5">
                <div class="grid grid-cols-1 gap-5">
                    <!-- First column: list of blog posts -->
                    <div class="p-3">
                        <p class="text-3xl text-center mb-3 md:text-3xl md:text-start">
                            <span class="bg-yellow-400 px-5 py-2 text-gray-900 font-bold rounded-tl-lg rounded-br-lg">Newest Posts</span>
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
                        @endif
                        {{-- Need to be fixed tomorrow! --}}
                        @foreach ($posts as $post)    
                            <div class="max-w-[48rem] mx-auto mt-10 bg-transparent md:relative md:flex md:w-full md:flex-row md:bg-clip-border">
                                <img src="{{ asset('images/'.$post->image) }}" alt="Post Image" title="Image by: {{ $post->owner }}" class="object-cover w-full rounded-t-lg h-64 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"/>
                                <a href="{{ route('posts.show', $post->slug) }}" class="block no-underline" title="{{ $post->title }}">
                                    <div class="p-4 space-y-4">
                                        <h4 class="text-2xl font-semibold leading-snug tracking-normal text-gray-50">{{ $post->title }}</h4>
                                        <p class="font-sans text-base font-normal leading-relaxed text-gray-200">{{ $post->description }}</p>
                                        <p class="font-sans text-base font-normal leading-relaxed text-gray-200"><span class="font-semibold">Written by:</span> {{ $authorName }}</p>
                                        <div class="flex justify-between items-center">
                                            <p class="text-sm text-gray-200">{{ Carbon\Carbon::parse($post->created_at)->toFormattedDateString() }}</p>
                                            <p class="text-sm text-gray-200">{{ $post->reading_duration }} Minute Read</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>                    
                </div>
            </div>
            <div class="hidden md:block md:col-span-3">
                <div class="p-3">
                    <p class="text-3xl text-gray-50 font-bold mr-3">
                        <span class="bg-yellow-400 px-5 py-2 text-gray-900 rounded-bl-lg rounded-tr-lg">Categories</span>
                    </p>
                    @if ($categories->isEmpty())
                        <div class="flex justify-center md:justify-start">
                            <div class="flex items-center p-4 mt-3 w-72 text-sm text-start text-gray-300 rounded-lg bg-gray-800 md:p-3 md:mt-5 md:text-md" role="alert">
                                <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                                </svg>
                                <span class="sr-only">Info</span>
                                <div>
                                    <span class="font-bold">No Categories Available!</span> Stay patient, the post category will coming soon.
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="grid grid-cols-3 gap-3 mt-6">
                        @foreach ($categories as $category)
                            <a href="{{ route('posts.category', $category->slug) }}" class="grow w-full">
                                <p class="py-2 text-center text-base rounded-full bg-transparent text-gray-50 font-semibold no-underline hover:text-gray-200 transition-colors duration-300 ease-in-out">{{ $category->title }}</p>
                            </a>  
                        @endforeach
                    </div>
                </div>  
            </div>            
        </div>
    </div>
</section>