<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('pageTitle')</title>

    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    {{-- Favicon --}}
    <link href="img/favicon.ico" rel="icon" />

    {{-- Style Libraries --}}

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    {{-- Font Awesome Icons --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet" />

    {{-- Customize Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    {{-- CSS Assets --}}
    @vite(['resources/css/assets/style.css'])

    <style>
        .category-link {
            color: #001C69;
            position: relative;
            font-weight: 500 !important;
        }

        .category-link:hover,
        .category-link.active {
            color: #001C69;
            font-weight: 800;
            text-decoration: none;
        }

        .category-link.active::after {
            content: "";
            position: absolute;
            bottom: -5px;
            /* Adjust as needed */
            left: 0;
            width: 100%;
            height: 2px;
            /* Thickness of the underline */
            background-color: #001C69;
        }

        html {
            scroll-behavior: smooth;
        }

        .sticky-row {
            position: -webkit-sticky;
            position: sticky;
            top: 60px;
            z-index: 10;
            padding: 10px 0;
            background-color: white;
            /* To ensure background visibility */
        }
    </style>
    <style>
        /* Ensure the video covers the background */
        .video-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            overflow: hidden;
            z-index: -1;
            /* Sends video to background */
        }

        .video-container video {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Ensures video covers the entire screen */
        }

        /* Overlay content */
        .overlay {
            position: relative;
            /* width: 100%; */
            /* height: 100vh; */
            /* display: flex; */
            /* flex-direction: column;
            justify-content: center;
            align-items: center; */
            /* color: white; */
            /* text-align: center; */
        }

        /* Ensure header stays above video */
        /* .header {
            position: absolute;
            top: 0;
            width: 100%;
            background: rgba(255, 255, 255, 0.9);
            z-index: 100;
            padding: 10px 0;
        } */
    </style>

</head>

<body>

    <!-- Video Background -->
    <div class="video-container">
        <video autoplay loop muted playsinline>
            <source src="{{ isset($extraData->hero_section_video) ? asset('storage/' . $extraData->hero_section_video) : 'assets/img/small.mp4' }}" type="video/mp4">
            <!-- Your browser does not support the video tag. -->
        </video>
    </div>

    <div class="overlay">
        {{-- Header --}}
        @include('web.default.layouts.partials.navbar')

        {{-- Content --}}

        @yield('content')

        {{-- Footer --}}
        @include('web.default.layouts.partials.footer')
    </div>

    {{-- Auth Modals --}}
    @include('auth.partials.login-modal')
    @include('auth.partials.signup-modal')

    {{-- << JavaScript Libraries >> --}}

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- JS Assets --}}
    @vite(['resources/js/assets/main.js', 'resources/js/assets/register-user.js', 'resources/js/assets/login.js'])

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const categoryNav = document.getElementById("categoryNav");
            const section = document.getElementById("categorySection");
            const offset = categoryNav.offsetTop;

            window.addEventListener("scroll", () => {
                const sectionBottom = section.offsetTop + section.offsetHeight;
                if (window.scrollY >= offset && window.scrollY < sectionBottom - categoryNav.offsetHeight) {
                    categoryNav.classList.add("sticky-top-category");
                } else {
                    categoryNav.classList.remove("sticky-top-category");
                }
            });
        });
    </script>
</body>

</html>
