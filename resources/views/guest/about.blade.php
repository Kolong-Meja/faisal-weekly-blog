@section('title')
    About
@endsection

@section('description')
    Hello, my name is Faisal Ramadhan. I am a web developer and the creator of Faisal Weekly Blog.
@endsection

<x-guest-layout>
    @section('header')
        <div class="container mx-auto px-8">
            {{-- About me --}}
            <div class="flex w-full">
                <div class="flex-col space-y-6 py-16 leading-relaxed text-center">
                    <div>
                        <h1 class="head-title-style">Dear fellas</h1>
                    </div>
                    <p class="font-serif text-base md:text-lg">
                        my name is Faisal Ramadhan, you can call me as Mr. Faisal. I am a web developer that recently create this personal blog website called "Faisal Weekly Blog". I created this personal blog with great patience and dedication to be able to provide useful articles for all of you.
                    </p>
                    <p class="font-serif text-base md:text-lg">
                        Besides being a web developer, I am also a student majoring in Information Systems. I learned many things in the world of technology, especially in web development. I spent almost 2 years learning what a website is, how to make one, even to the realm of creating APIs. This is also the main reason why I created the Faisal Weekly Blog, because it just proves that I can create my own personal blog website.
                    </p>
                    <div>
                        <ul class="flex w-full justify-center items-center mt-8 space-x-4">
                            <li>
                                <a href="https://github.com/Kolong-Meja" class="text-gray-900 hover:text-gray-700 transition-colors duration-200 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-github w-5 h-5" viewBox="0 0 16 16">
                                        <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://twitter.com/EquanimityRF" class="text-gray-900 hover:text-gray-700 transition-colors duration-200 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-twitter w-5 h-5" viewBox="0 0 16 16">
                                        <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://instagram.com/faisalrmdhn08" class="text-gray-900 hover:text-gray-700 transition-colors duration-200 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-instagram w-5 h-5" viewBox="0 0 16 16">
                                        <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                    </svg>
                                </a>
                            </li>
                            <li>
                                <a href="https://www.linkedin.com/in/faisal-ramadhan-9ab18a269" class="text-gray-900 hover:text-gray-700 transition-colors duration-200 ease-in-out">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-5 h-5">
                                        <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                    </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            {{-- Website main content description --}}
            <div class="flex w-full">
                <div class="flex-col space-y-6 py-16 leading-relaxed text-center">
                    <div>
                        <h1 class="head-title-style">What articles included?</h1>
                    </div>
                    <p class="font-serif text-base md:text-lg">
                        The first thing I want to clarify is that the articles I write will contain about my personal life, my thoughts and opinions about things in the world (including events that may be happening right now), and then my personal hobbies.
                    </p>
                    <p class="font-serif text-base md:text-lg">
                        As time goes by, the categories listed in the article will increase, and at that time I will probably create a separate page to make it easier to find articles. However, these articles are certainly not far from the things I mentioned previously.
                    </p>
                    <p class="font-serif text-base md:text-lg">
                        The reason why this personal blog website is a little different from the personal blog websites that you find on the internet, is because this is a site that is specifically for me personally, not for anyone else or any organization. So I hope that whatever article I make, you readers can enjoy it, and if you don't enjoy it, please send a message or feedback in the form I have created at the end of this page. So, thank you to those of you who have paid attention to this line.
                    </p>
                    <p class="font-serif text-base">
                        <span class="italic">Regards</span> — Faisal Ramadhan
                    </p>
                </div>
            </div>
        </div>
    @endsection

    @section('content')
        <div class="container mx-auto px-8">
            
            {{-- Flash Session --}}
            <div x-data="{ showMessage:true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 3000)">
                @if (session()->has("success"))
                    <x-success-session />
                @elseif (session()->has("error"))
                    <x-error-session />
                @endif
            </div>
            
            <section class="flex w-full">
                <div class="py-32 px-4 mx-auto">
                    <h1 class="mb-4 text-2xl md:text-3xl tracking-tight font-extrabold text-center text-gray-900">Send Feedback</h1>
                    <p class="mb-8 text-base font-medium font-serif text-center text-gray-500">If you have any thoughts and suggestions please let me know.</p>
                    <form action="{{ route('feedback.store') }}" method="POST" id="form-feedback" class="space-y-8 font-serif">
                        @csrf
                        @method('POST')

                        <div>
                            <label for="name" class="block mb-2 text-base font-medium text-gray-900">Your Fullname</label>
                            <input type="text" id="name" name="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-base rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5" placeholder="Fullname" required autocomplete="name">
                        </div>
                        <div>
                            <label for="email" class="block mb-2 text-base font-medium text-gray-900">Your Email</label>
                            <input type="email" id="email" name="email" class="block p-3 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-green-500 focus:border-green-500" placeholder="Email" required autocomplete="email">
                        </div>
                        <div class="sm:col-span-2">
                            <label for="content" class="block mb-2 text-base font-medium text-gray-900">Your message</label>
                            <textarea id="content" name="content" rows="6" class="block p-2.5 w-full text-base text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-green-500 focus:border-green-500" placeholder="Leave a feedback message..." required></textarea>
                        </div>
                        <button type="submit" class="py-2 px-4 md:py-3 md:px-5 text-base font-medium text-center text-gray-100 rounded-lg bg-green-400 sm:w-fit hover:bg-green-500 focus:ring-4 focus:outline-none focus:ring-green-300 transition-colors duration-200 ease-in-out">Send message</button>
                    </form>
                </div>
            </section>
        </div>
    @endsection
</x-guest-layout>