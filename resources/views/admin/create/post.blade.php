<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('layouts.head')
    <style>
        input[type=file]::file-selector-button {
            border: none;
            background: rgb(24, 24, 27);
            padding-left: 30px;
            border-radius: 0px;
            color: #fff;
            cursor: pointer;
            transition: background .2s ease-in-out;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
        }
    </style>
</head>
<body>
    <div class="min-h-screen bg-zinc-900">
        {{-- Navigation --}}
        <x-admin-navigation :greetingMessage="$greetingMsg" />
        {{-- Page Heading --}}
        <header class="bg-zinc-900">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <div name="header">
                    <h2 class="font-bold text-2xl text-center text-yellow-400 leading-tight">
                        {{ __('Create New Post') }}
                    </h2>
                </div>
            </div>
        </header>
        {{-- Main content --}}
        <div class="mx-auto py-2">
            <div class="max-w-full grid grid-rows-1 grid-flow-col">
                <div class="w-full grid-cols-1">
                    <div class="pt-12 pb-8">
                        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
                            <div class="bg-yellow-400 overflow-hidden rounded-md shadow-lg">
                                <div class="p-4">
                                    <div class="grid grid-rows-1 mb-4">
                                        <div class="w-full mb-2">
                                            <div class="text-center py-2">
                                                <h3 class="text-lg font-bold text-gray-900">Create Post Form</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="w-full p-4 bg-zinc-900 rounded-md">
                                        <div class="grid grid-cols-1">
                                            {{-- Form input for post data --}}
                                            <form action="{{ route('post.store') }}" method="POST" class="w-full p-4 bg-zinc-900 rounded-md" enctype="multipart/form-data" autocomplete="on">
                                                @csrf
                                                @method('POST')
                                                <input type="hidden" id="user_id" name="user_id" value="{{ $author_id }}">
                                                <div class="grid grid-cols-2 gap-4">
                                                    <div class="grid grid-rows-5 grid-flow-col gap-y-4">
                                                        
                                                        {{-- Form input for title with validation --}}
                                                        <div>
                                                            <label for="title" class="block mb-2 text-xl font-bold text-yellow-400">Title</label>
                                                            <textarea id="title" rows="6" name="title" class="bg-gray-600 border-2 border-yellow-400 text-white placeholder-gray-400 text-md rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5 @error('title') is-invalid @enderror" placeholder="Yesterday Is My Best Day..." required></textarea>
                                                            <div class="mt-1 text-sm text-white" id="title_help">Note: A post need some title, so think wisely</div>
                                                        </div>

                                                        {{-- Form input for sub title with validation --}}
                                                        <div>
                                                            <label for="description" class="block mb-2 text-xl font-bold text-yellow-400">Description</label>
                                                            <textarea id="description" rows="6" name="description" class="bg-gray-600 border-2 border-yellow-400 text-white placeholder-gray-400 text-md rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5 @error('description') is-invalid @enderror" placeholder="This is my personal story about yesterday..." required></textarea>
                                                            <div class="mt-1 text-sm text-white" id="description__help">Note: Maybe some post need a sub title for clarify the contents of the post itself</div>
                                                        </div>

                                                        {{-- Form input for meta title with validation --}}
                                                        <div>
                                                            <label for="meta_title" class="block mb-2 text-xl font-bold text-yellow-400">Meta Title</label>
                                                            <textarea id="meta_title" rows="6" name="meta_title" class="bg-gray-600 border-2 border-yellow-400 text-white placeholder-gray-400 text-md rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5 @error('meta_title') is-invalid @enderror" placeholder="Personal Story About Yesterday" required></textarea>
                                                            <div class="mt-1 text-sm text-white" id="meta__title__help">Note: Meta title is the title that you put on the post page</div>
                                                        </div>

                                                        {{-- Form input for slug with validation --}}
                                                        <div>
                                                            <label for="slug" class="block mb-2 text-xl font-bold text-yellow-400">Slug</label>
                                                            <textarea id="slug" rows="6" name="slug" class="bg-gray-600 border-2 border-yellow-400 text-white placeholder-gray-400 text-md rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5 @error('slug') is-invalid @enderror" placeholder="yesterday-is-my-best-day..." required></textarea>
                                                            <div class="mt-1 text-sm text-white" id="slug_help">Note: Slug is a sentence that is stored in the url of the website posting page</div>
                                                        </div>

                                                        {{-- Form input for keywords with validation --}}
                                                        <div>
                                                            <label for="keywords" class="block mb-2 text-xl font-bold text-yellow-400">Keywords</label>
                                                            <textarea id="keywords" rows="6" name="keywords" class="bg-gray-600 border-2 border-yellow-400 text-white placeholder-gray-400 text-md rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5 @error('keywords') is-invalid @enderror" placeholder="personal story, yesterday, etc..." required></textarea>
                                                            <div class="mt-1 text-sm text-white" id="keywords_help">Note: Input keywords that represent the essence of your post</div>
                                                        </div>
                                                    </div>
                                                    <div class="grid grid-rows-5 grid-flow-col gap-y-4">

                                                        {{-- Upload Image --}}
                                                        <div>
                                                            <label class="text-xl font-bold text-yellow-400 block mb-2" for="image">Upload Image</label>
                                                            <input id="image" name="image" class="block w-full cursor-pointer bg-gray-600 border-2 border-yellow-400 text-white focus:outline-none rounded-lg focus:border-slate-500 text-sm @error('image') is-invalid @enderror" aria-describedby="image_help" id="image" type="file" required autocomplete="photo">
                                                            <div class="mt-1 text-sm text-white" id="image__help">Note: Upload image to your post is important!</div>
                                                        </div>
                                                        
                                                        {{-- Onwer of Image --}}
                                                        <div>
                                                            <label for="owner" class="block mb-2 text-xl font-bold text-yellow-400">Image Owner</label>
                                                            <textarea id="owner" rows="6" name="owner" class="bg-gray-600 border-2 border-yellow-400 text-white placeholder-gray-400 text-md rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5 @error('owner') is-invalid @enderror" placeholder="John Doe" required autocomplete="name"></textarea>
                                                            <div class="mt-1 text-sm text-white" id="owner__help">Note: Input owner of the image</div>
                                                        </div>

                                                        {{-- URL of Image --}}
                                                        <div>
                                                            <label for="url" class="block mb-2 text-xl font-bold text-yellow-400">Image URL</label>
                                                            <textarea id="url" rows="6" name="url" class="bg-gray-600 border-2 border-yellow-400 text-white placeholder-gray-400 text-md rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full p-2.5 @error('url') is-invalid @enderror" placeholder="https://www.example.com/" required autocomplete="url"></textarea>
                                                            <div class="mt-1 text-sm text-white" id="url__help">Note: Input URL of the image</div>
                                                        </div>

                                                        {{-- Select Tag --}}
                                                        <div>
                                                            <label for="tags" class="block mb-2 text-xl font-bold text-yellow-400">Select Tags</label>
                                                            <select multiple id="tags" name="tags[]" class="bg-gray-600 border-2 border-yellow-400 text-white placeholder-gray-400 text-md rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full @error('tags') is-invalid @enderror" required>
                                                                @foreach ($tags as $tag)
                                                                    <option value="{{ $tag->id }}">{{ $tag->title }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="mt-1 text-sm text-white" id="tags__help">Note: Press CTRL + click on the tag to unselect.</div>
                                                        </div>

                                                        {{-- Select Category --}}
                                                        <div>
                                                            <label for="categories" class="block mb-2 text-xl font-bold text-yellow-400">Select Categories</label>
                                                            <select multiple id="categories" name="categories[]" class="bg-gray-600 border-2 border-yellow-400 text-white placeholder-gray-400 text-md rounded-lg focus:ring-yellow-500 focus:border-yellow-500 block w-full @error('categories') is-invalid @enderror" required>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}">{{ $category->title }}</option>
                                                                @endforeach
                                                            </select>
                                                            <div class="mt-1 text-sm text-white" id="category__help">Note: Press CTRL + click on the category to unselect.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="my-6">
                                                    <label for="content" class="block mb-1 text-xl font-bold text-yellow-400">Content</label>
                                                    <div class="mb-1 text-sm text-white" id="content__help">Note: Share your experience in the form of an interesting story</div>
                                                    <textarea id="content" rows="12" name="content" class="block p-2.5 w-full bg-gray-600 border-2 border-yellow-400 text-white placeholder-gray-400 text-md focus:ring-yellow-500 focus:border-yellow-500 @error('content') is-invalid @enderror" placeholder="this is just an example of content..." required ></textarea>
                                                </div>
    
                                                {{-- Button submit --}}
                                                <button type="submit" class="mr-2 text-gray-900 bg-green-500 hover:bg-green-700 hover:text-white transition-colors duration-300 ease-in-out focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Submit</button>
                                                
                                                {{-- Button reset  --}}
                                                <button type="reset" class="text-white bg-red-500 hover:bg-red-700 hover:text-gray-900 transition-colors duration-300 ease-in-out focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Reset</button>
                                            </form>
                                            {{-- End of form input --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#content').summernote({
            lang: 'en-US',
            placeholder: 'Write your content here...',
            tabsize: 2,
            height: 800,
            toolbar: [
                ["style", ["style"]],
                ["font", ["bold", "underline", "clear"]],
                ["fontsize", ["fontsize"]],
                ["color", ["color"]],
                ["para", ["ul", "ol", "paragraph"]],
                ["table", ["table"]],
                ["insert", ["link", "picture", "video"]],
                ["view", ["fullscreen", "codeview", "help"]]
            ],
        });

        const editorContainer = document.querySelector('.note-editor');
        editorContainer.style.backgroundColor = "rgb(243, 244, 246)"
    </script>
</body>
</html>