<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet" />

    {{-- Customize Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    {{-- Datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

    {{-- Toast --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- Virtual Select --}}
    <link rel="stylesheet" href="https://msfdn.digitalisolutions.net/plugins/virtual-select/virtual-select.min.css">

    {{-- Ckeditor --}}
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.css" />

    {{-- Template --}}
    @vite(['resources/css/dashasset/style.css', 'resources/css/dashasset/dashstyle.css'])

    {{-- ckeditor  --}}
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/44.1.0/ckeditor5.css" />

    {{-- Custom Style --}}

    @stack('styles')

    {{-- notification style --}}
    <style>
        /* Custom Scrollbar */
        .dropdown-menu::-webkit-scrollbar {
            width: 6px;
        }

        .dropdown-menu::-webkit-scrollbar-thumb {
            background-color: #888;
            border-radius: 4px;
        }

        .dropdown-menu::-webkit-scrollbar-thumb:hover {
            background-color: #555;
        }

        .dropdown-menu::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        {{-- Spinner --}}
        @include('admin.layouts.partials.spinner')

        {{-- Sidebar --}}
        @include('admin.layouts.partials.sidebar')

        {{-- Content --}}
        <div class="content pb-5">
            {{-- Navbar --}}
            @include('admin.layouts.partials.navbar')

            {{-- Content --}}
            @yield('content')
        </div>
    </div>


    {{-- << JavaScript Libraries >> --}}

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    {{-- Datatable --}}
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

    {{-- Charts --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

    {{-- Toast --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- Virtual Select --}}
    <script src="https://msfdn.digitalisolutions.net/plugins/virtual-select/virtual-select.min.js"></script>

    {{-- CK Editor --}}
    <script defer src="https://cdn.ckeditor.com/ckeditor5/41.4.1/classic/ckeditor.js"></script>


    {{-- Template --}}
    @vite(['resources/js/dashasset/main.js', 'resources/js/toggleLocale.js'])

    {{-- CK Editor --}}
    <script defer src="https://cdn.ckeditor.com/ckeditor5/41.4.1/classic/ckeditor.js"></script>


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            @if (session('message'))
                toastr.options.progressBar = true; // Enable progress bar
                toastr.options.timeOut = 5000; // Adjust timeout if needed
                toastr.options.closeButton = true; // Enable close button
                toastr.{{ session('type', 'info') }}("{{ session('message') }}");
            @endif
        });
    </script>

    {{-- image preview --}}

    <script>
        function previewImage(event, previewElementId) {
            const file = event.target.files[0];
            const previewElement = document.getElementById(previewElementId);

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewElement.src = e.target.result; // Set the src
                }
                reader.readAsDataURL(file); // Read the file
            } else {
                // If no file is selected, revert to the placeholder image
                // previewElement.src = 'https://placehold.co/600x400';
            }
        }
    </script>



    {{-- Scripts --}}
    @stack('scripts')
</body>

</html>
