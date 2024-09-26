<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <div class="flex h-screen bg-gray-100 relative">
                <div class="absolute inset-0 overflow-hidden">
                    <div class="slideshow-container">
                        <div class="slide bg-cover bg-center" style='background-image: url({{ asset("img/epst_logo.jpg")}}); background-size: cover; background-position: center; max-height: 80vh;'></div>
                        <div class="slide bg-cover bg-center" style='background-image: url({{ asset("img/logo_epst.jpg")}}); background-size: cover; background-position: center; max-height: 100%;'></div>
                        <div class="slide bg-cover bg-center" style='background-image: url({{ asset("img/logo_edunc.png")}}); background-size: cover; background-position: center; max-height: 80vh; max-width:100%'></div>
                    </div>
                    <div class="overlay bg-black opacity-40"></div>
                </div>
                <div class="flex-1 p-6 z-10">
                    <main>
                        {{ $slot }}
                    </main>
                </div>
            </div>
        </div>
    </body>
</html>
<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');
    const totalSlides = slides.length;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            slide.style.display = (i === index) ? 'block' : 'none';
        });
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % totalSlides;
        showSlide(currentSlide);
    }

    // Initial display of the first slide
    showSlide(currentSlide);
    // Change slide every 5 seconds
    setInterval(nextSlide, 5000);
</script>

<style>
    .slideshow-container {
        position: relative;
        height: 100%;
    }

    .slide {
        display: none;
        background-size: cover;
        background-position: center;
        height: 100%;
        width: 100%;
    }

    .overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
    }
</style>
