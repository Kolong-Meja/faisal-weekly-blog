<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <div class="max-w-full">
                <section>
                    <header>
                        <h2 class="text-lg font-bold text-gray-900">
                            Patch Article Data
                        </h2>
                    </header>

                    <p class="mt-1 text-sm text-gray-500">
                        Update article data according to the ID that was previously passed.
                    </p>

                    <form action="{{ route('article.patch', $article->id) }}" method="post">
                        @csrf
                        @method('PATCH')

                        <div class="grid grid-cols-2 gap-5 my-4">
                            
                            {{-- Article ID --}}
                            <div class="col-span-2">
                                <label for="id" class="block mb-2 text-sm font-medium text-gray-900">Article ID <span class="text-xs text-gray-700">(cannot be change)</label>
                                <input 
                                type="text" 
                                name="id" 
                                id="id" 
                                class="
                                bg-gray-100
                                border 
                                border-none 
                                text-gray-500 
                                placeholder-gray-400
                                text-sm 
                                rounded-lg
                                focus:ring-2
                                focus:ring-green-400
                                focus:border-green-500 
                                block 
                                p-2.5  
                                w-full 
                                "
                                value="{{ old('id', $article->id) }}" 
                                disabled
                                />

                                @error('id')
                                    <div class="text-sm text-red-600 space-y-1" x-init="$el.closest('form').scrollIntoView()">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- User ID --}}
                            <div class="col-span-2">
                                <label for="id" class="block mb-2 text-sm font-medium text-gray-900">User ID <span class="text-xs text-gray-700">(cannot be change)</span></label>
                                <input 
                                type="text" 
                                name="id" 
                                id="id" 
                                class="
                                bg-gray-100
                                border 
                                border-none 
                                text-gray-500
                                placeholder-gray-400
                                text-sm 
                                rounded-lg
                                focus:ring-2
                                focus:ring-green-400
                                focus:border-green-500 
                                block 
                                p-2.5  
                                w-full 
                                "
                                value="{{ old('user_id', $article->user_id) }}" 
                                disabled />
                            </div>

                            {{-- Status --}}
                            <div class="col-span-2">
                                <label for="status" class="block mb-2 text-sm font-medium text-gray-900">Select article status <span class="text-xs text-gray-700">(optional)</span></label>
                                <select 
                                id="status" 
                                name="status" 
                                class="
                                bg-gray-100
                                border-none 
                                text-gray-900
                                text-sm 
                                rounded-lg 
                                focus:ring-2
                                focus:ring-green-500 
                                focus:border-green-500 
                                block 
                                w-full 
                                p-2.5 
                                "
                                >
                                    <option selected disabled>Select status</option>
                                    <option value="pending" @if($article->status->value === 'pending' ) selected @endif>Pending</option>
                                    <option value="published" @if($article->status->value === 'published') selected @endif>Published</option>
                                </select>
                            </div>

                            {{-- Category --}}
                            <div class="col-span-2">
                                <label for="categories" class="block mb-2 text-sm font-medium text-gray-900">Select categories</label>
                                <select
                                multiple 
                                id="categories" 
                                name="categories[]" 
                                class="
                                bg-gray-100
                                border-none 
                                text-gray-900
                                text-sm 
                                rounded-lg 
                                focus:ring-green-400 
                                focus:border-green-400 
                                block 
                                w-full 
                                p-2.5 
                                "
                                >

                                @foreach($article->categories as $category)
                                    <option value="{{ $category->id }}" @if($articleCategoryPivot->category_id === $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            
                            {{-- Title --}}
                            <div class="col-span-2">
                                <label for="title" class="block mb-2 text-sm font-medium text-gray-900">Title <span class="text-xs text-gray-700">(optional)</span></label>
                                <input 
                                type="text" 
                                name="title" 
                                id="title" 
                                class="
                                bg-gray-100
                                border 
                                border-none
                                text-gray-900 
                                placeholder-gray-400
                                text-sm 
                                rounded-lg 
                                focus:ring-green-400
                                focus:border-green-400 
                                block 
                                p-2.5  
                                w-full 
                                "
                                value="{{ old('title', $article->title) }}"
                                placeholder="Title" 
                                required />

                                @error('title')
                                    <div class="text-sm text-red-600 space-y-1" x-init="$el.closest('form').scrollIntoView()">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            {{-- Meta Title --}}
                            <div class="col-span-2">
                                <label for="meta_title" class="block mb-2 text-sm font-medium text-gray-900">Meta Title <span class="text-xs text-gray-700">(optional)</span></label>
                                <input 
                                type="text" 
                                name="meta_title" 
                                id="meta_title" 
                                class="
                                bg-gray-100
                                border 
                                border-none
                                text-gray-900 
                                placeholder-gray-400
                                text-sm 
                                rounded-lg 
                                focus:ring-green-400
                                focus:border-green-400 
                                block 
                                p-2.5  
                                w-full 
                                @error('meta_title')
                                is-invalid
                                @enderror
                                "
                                value="{{ old('meta_title', $article->meta_title) }}"
                                placeholder="Meta Title" 
                                required />

                                @error('meta_title')
                                    <div class="text-sm text-red-600 space-y-1" x-init="$el.closest('form').scrollIntoView()">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Slug --}}
                            <div class="col-span-2">
                                <label for="slug" class="block mb-2 text-sm font-medium text-gray-900">Slug <span class="text-xs text-gray-700">(optional)</span></label>
                                <input 
                                type="text" 
                                name="slug" 
                                id="slug" 
                                class="
                                bg-gray-100
                                border 
                                border-none
                                text-gray-900 
                                placeholder-gray-400
                                text-sm 
                                rounded-lg 
                                focus:ring-green-400
                                focus:border-green-400 
                                block 
                                p-2.5  
                                w-full 
                                "
                                value="{{ old('slug', $article->slug) }}"
                                placeholder="Slug" 
                                required />

                                @error('slug')
                                    <div class="text-sm text-red-600 space-y-1" x-init="$el.closest('form').scrollIntoView()">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Description --}}
                            <div class="col-span-2">
                                <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Description <span class="text-xs text-gray-700">(optional)</span></label>
                                <textarea 
                                type="text" 
                                name="description" 
                                id="description" 
                                class="
                                bg-gray-100
                                border 
                                border-none
                                text-gray-900 
                                placeholder-gray-400
                                text-sm 
                                rounded-lg 
                                focus:ring-green-400
                                focus:border-green-400 
                                block 
                                p-2.5  
                                w-full 
                                "
                                placeholder="Description" 
                                required>{{ old('description', $article->description) }}</textarea>
                                
                                @error('description')
                                    <div class="text-sm text-red-600 space-y-1" x-init="$el.closest('form').scrollIntoView()">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Meta Description --}}
                            <div class="col-span-2">
                                <label for="meta_description" class="block mb-2 text-sm font-medium text-gray-900">Meta Description <span class="text-xs text-gray-700">(optional)</span></label>
                                <textarea 
                                type="text" 
                                name="meta_description" 
                                id="meta_description" 
                                class="
                                bg-gray-100
                                border 
                                border-none
                                text-gray-900 
                                placeholder-gray-400
                                text-sm 
                                rounded-lg 
                                focus:ring-green-400
                                focus:border-green-400 
                                block 
                                p-2.5  
                                w-full 
                                "
                                placeholder="Meta Description" 
                                required>{{ old('meta_description', $article->meta_description) }}</textarea>
                                
                                @error('meta_description')
                                    <div class="text-sm text-red-600 space-y-1" x-init="$el.closest('form').scrollIntoView()">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-span-2">
                                <label for="content" class="block mb-2 text-sm font-medium text-gray-900">Content <span class="text-xs text-gray-700">(optional)</span></label>
                                <div class="overflow-y-auto rounded-md">
                                    <textarea id="content" name="content" class="text-gray-900 h-full" required>{!! old('content', $article->content) !!}</textarea>
                                </div>

                                @error('content')
                                    <div class="text-sm text-red-600 space-y-1" x-init="$el.closest('form').scrollIntoView()">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        {{-- Submit Button --}}
                        <button 
                        type="submit" 
                        class="
                        text-gray-100
                        inline-flex 
                        items-center 
                        bg-green-400
                        font-medium 
                        rounded-lg 
                        text-sm 
                        px-5 py-2.5 
                        text-center 
                        hover:bg-green-500 
                        hover:text-gray-200
                        focus:ring-4 
                        focus:outline-none 
                        focus:ring-green-500 
                        transition-colors
                        duration-200
                        ease-in-out
                        "
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cloud-arrow-up-fill me-1 -ms-1 w-5 h-5" viewBox="0 0 16 16">
                                <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z"/>
                            </svg>
                            Patch article data
                        </button>
                    </form>
                </section>
            </div>
        </div>
    </div>
</div>