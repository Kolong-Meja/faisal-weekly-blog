@section('title')
    Articles
@endsection

@section('description')
    You can read the list of articles I have published.
@endsection

<x-guest-layout>
    @section('header')
        <div class="container mx-auto px-auto">
            <div class="grid grid-cols-1">
                <div class="max-w-lg md:max-w-3xl mx-auto px-5 md:px-0 bg-white rounded-xl overflow-hidden">
                    <div class="flex flex-col space-y-4 p-4">
                        <p class="text-gray-600 text-xl md:text-2xl font-serif leading-relaxed">
                            “The more that you read, the more things you will know. The more that you learn, the more places you’ll go.”
                            <span class="text-gray-900 text-base md:text-lg">― Dr. Seuss</span>
                        </p>
                    </div>
                </div>
                <div class="hidden md:block relative">
                    <div class="absolute top-0 left-20">
                        <a href="{{ route('home') }}" title="previous">
                            <div class="p-3 bg-transparent hover:bg-gray-100 transition-colors duration-200 ease-in-out rounded-full">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-arrow-left text-gray-900 w-8 h-8" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                            </svg>
                            </div>
                        </a>
                    </div>  
                </div>
            </div>
        </div>
    @endsection


    @section('content')
       {{-- Search --}}
       <div class="pt-16 flex justify-center">
            <form action="{{ route('guestArticle.index') }}" autocomplete="on" id="searchForm" class="flex items-center">
                <x-search-articles />
                
                {{-- Refresh Button --}}
                <button 
                type="button"
                id="buttonRefresh"
                name="refresh"
                class="
                text-gray-900
                ml-2
                "
                >
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466"/>
                    </svg>
                </button>
            </form>
       </div>

        {{-- Result of articles --}}
        <div class="container mx-auto mt-8">
            <div class="grid grid-cols-1 gap-4 pb-8">
                @foreach ($articles as $article)
                    @if ($article->status->value !== "pending")
                    <div class="max-w-lg md:max-w-3xl mx-auto px-5 md:px-0 bg-white rounded-xl overflow-hidden">
                        <div class="flex flex-col p-4">
                            <a href="{{ route('guestArticle.show', $article->slug) }}">
                                <div class="flex flex-col space-y-4 pb-4">
                                    <h1 class="font-bold text-gray-900 text-xl md:text-2xl">{{ $article->title }}</h1>
                                    <p class="desc-text text-gray-600">{{ $article->description }}</p>
                                </div>
                                <p class="text-sm pt-4 border-t border-gray-100"><span class="italic text-gray-600">Written by </span>{{ $article->user->name }} | {{ $article->created_at->format('M j, Y') }} —
                                    @foreach ($article->categories as $category)
                                        <a href="{{ route('guestArticle.category', $category->name) }}">
                                            <span class="text-gray-900 bg-gray-100 p-2 rounded-full hover:bg-blue-200/50 transition-colors duration-200 ease-in-out mx-1">{{ $category->name }}</span>
                                        </a> 
                                    @endforeach
                                </p>
                            </a>    
                        </div>
                    </div>
                    @endif
                @endforeach
            </div>
            @if ($articles->isEmpty())
                <div class="flex items-center justify-center py-4">
                    <p class="desc-text text-gray-500">No article's found.</p>
                </div>
            @endif
        </div>    
    @endsection
</x-guest-layout>