<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>My Portfolio</title>
    
    {{-- Vite --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    {{-- Flowbite CDN --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.js"></script>
    
    {{-- Google Icon --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    
    {{-- My Own Style CSS --}}
    <link rel="stylesheet" href="{{ asset('css/portfolio.css') }}">
</head>
<body class="font-mono antialiased">
    
    <!--- NAVBAR --->
    <nav class="fixed w-full z-20 top-0 left-0">
        <div class="max-w-screen flex flex-wrap items-center justify-center p-8">
            <div class="items-center justify-between w-full md:flex md:w-auto md:order-1" id="default__navbar">
                <ul class="flex items-center justify-center font-medium text-lg md:p-0 md:flex-row md:space-x-8 md:mt-0">
                    <li>
                        <a id="navbar__underline" class="mr-8" href="https://saweria.co/faisalramadhan08"><span></span>Donate</a>
                    </li>
                    <li>
                        <a id="navbar__underline" class="mr-8" href="https://faisaldailyblog.com/"><span></span>Personal Blog</a>
                    </li>
                    <li>
                        <a id="navbar__underline" href="https://github.com/Kolong-Meja/"><span></span>Github</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!--- END OF NAVBAR --->
    
    <!--- MAIN PROPERTY LAYER --->
    <main class="flex relative w-full h-full max-w-[950px] max-h-[450px] overflow-hidden">
        <div class="button__group">
            <span id="left__navigation" class="carousel__arrow">
                <svg class="carousel__icon" width="24" height="24" viewBox="0 0 24 24">
                    <path d="M20,11V13H8L13.5,18.5L12.08,19.92L4.16,12L12.08,4.08L13.5,5.5L8,11H20Z"></path>
                </svg>
            </span>
            <span id="right__navigation" class="carousel__arrow">
                <svg class="carousel__icon"  width="24" height="24" viewBox="0 0 24 24">
                    <path d="M4,11V13H16L10.5,18.5L11.92,19.92L19.84,12L11.92,4.08L10.5,5.5L16,11H4Z"></path>
                </svg>
            </span>
        </div>
        <section class="carousel__item">
            <div class="personal__info">
                <div class="carousel_item__container">
                    <h1 class="personal_title__information" title="About me in brief">
                        <span id="personal_title_natural__span">Hello There!</span>
                    </h1>
                    <p class="personal__description">My name is Faisal Ramadhan. I am a web developer from Indonesia. Currently I am still continuing my education at the Bachelor of Information Systems level at Bina Sarana Informatics University. I have been studying websites for more than 2+ years and have created several website projects. Such as, personal blog and portfolio website.</p>
                </div>
            </div>
        </section>
        <section class="carousel__item">
            <div class="personal_blog__info">
                <div class="carousel_item__container">
                    <h1 class="personal_blog_title__information" title="My Personal Blog Website">
                        <span id="personal_blog_natural__span">Faisal Daily Blog</span>
                    </h1>
                    <p class="personal_blog__description">
                        Faisal Daily Blog has been published in October 2023. This is my side project that I created using the Laravel framework. All kinds of information about technology, self-improvement, life, social economy, entertainment, and others are on this website. You can visit this site on the 
                        <a id="personal_blog__link" href="https://faisaldailyblog.com">Faisal Daily Blog.</a>
                    </p>
                </div>
            </div>
        </section>
        <section class="carousel__item">
            <div class="sefile_cli__info">
                <div class="carousel_item__container">
                    <h1 class="sefile_cli_title__information" title="My CLI Tool">
                        <span id="sefile_cli_natural__span">Sefile CLI</span> 
                    </h1>
                    <p class="sefile_cli__description">
                        Sefile CLI Tool began to be published together with the Faisal Daily Blog. This is a tool for managing and modifying all folders and files on your personal computer. I created this tool using native Python, and you can install it at 
                        <a id="sefile_cli__link" href="https://pypi.org/project/new-sefile/">PyPi.org</a>
                    </p>
                </div>
            </div>
        </section>
        <section class="carousel__item">
            <div class="contact__info">
                <div class="carousel_item__container">
                    <h1 class="contact_title__information">
                        <a href="#" id="contact_title__underline"><span></span>Follow Me On:</a>
                    </h1>
                    <ul class="contact__description">
                        <li>
                            <a class="hover:text-yellow-500 transition-colors duration-300" href="https://github.com/Kolong-Meja" title="My Github Account">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a class="hover:text-yellow-500 transition-colors duration-300" href="https://twitter.com/EquanimityRF" title="My Twitter Account">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a class="hover:text-yellow-500 transition-colors duration-300" href="https://instagram.com/faisalrmdhn08" title="My Instagram Account">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                                </svg>
                            </a>
                        </li>
                        <li>
                            <a class="hover:text-yellow-500 transition-colors duration-300" href="https://www.linkedin.com/in/faisal-ramadhan-9ab18a269" title="My Linkedin Account">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </section>
    </main>

    <!--- END OF PROPERTY LAYER --->  
    <script src="{{ asset("js/portfolio-navigation.js") }}"></script>
</body>
</html>