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
    <link href="{{ getLogo() }}" rel="icon" />

    {{-- Style Libraries --}}

    {{-- Bootstrap Icons --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />

    {{-- Font Awesome Icons --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" rel="stylesheet" />

    {{-- Customize Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    {{-- Jquery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>


    {{-- Datatable --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.bootstrap5.css">

    {{-- Datatable --}}
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.bootstrap5.js"></script>

    {{-- Toast --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- Virtual Select --}}
    <link rel="stylesheet" href="https://msfdn.digitalisolutions.net/plugins/virtual-select/virtual-select.min.css">


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

        .ui-auticomplete {
            width: 460px !important;
            z-index: 999999999999;
            height: 200px;
            overflow-y: auto;
            overflow-x: hidden;
        }
    </style>

    @stack('styles')


</head>

<body>
    {{-- Header --}}
    @include('web.default.layouts.partials.navbar')

    {{-- Content --}}

    @yield('content')

    {{-- Footer --}}
    @include('web.default.layouts.partials.footer')

    {{-- Auth Modals --}}
    @include('auth.partials.login-modal')
    @include('auth.partials.signup-modal')

    {{-- << JavaScript Libraries >> --}}

    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    {{-- Jquery --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}

    {{-- JS Assets --}}
    @vite(['resources/js/assets/main.js', 'resources/js/assets/register-user.js', 'resources/js/assets/login.js', 'resources/js/toggleLocale.js'])

    {{-- Toast --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    {{-- Virtual Select --}}
    <script src="https://msfdn.digitalisolutions.net/plugins/virtual-select/virtual-select.min.js"></script>



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



             // use for geocode api
     var suggestionsContainer = $("#suggestionsContainer");
     $("#location").autocomplete({
         source: function(request, response) {
             var searchTerm = request.term;
             performAddressSearch(searchTerm, response);
         },
         minLength: 3,
         select: function(event, ui) {
             $("#location").val(ui.item.value);
             var selectedAddress = ui.item.value;
             console.log("location:" + ui.item.latitude + " long:" + ui.item.longitude);
             event.preventDefault();
         },
         appendTo: "#suggestionsContainer"
     }).autocomplete("instance")._renderItem = function(ul, item) {
         return $("<li>").append("<div>" + item.label + "</div>").appendTo(ul);
     };

     function performAddressSearch(searchTerm, response) {
         var apiUrl = "https://geocode.maps.co/search?q=" + encodeURIComponent(searchTerm) +
             "&api_key={{ env('GEOCODE_API_KEY') }}";
         $.ajax({
             url: apiUrl,
             dataType: "json",
             success: function(data) {
                 var suggestions = [];
                 for (var i = 0; i < data.length; i++) {
                     suggestions.push({
                         value: data[i].display_name,
                         label: data[i].display_name,
                         latitude: parseFloat(data[i].lat),
                         longitude: parseFloat(data[i].lon),
                         place_id: data[i].place_id,
                     });
                 }
                 response(suggestions);
             },
             error: function() {}
         });
     }


     var latitude;
     var longitude;

     $("#location").on('autocompleteselect', function(event, ui) {
         console.log(ui.item)
         latitude = ui.item.latitude;
         longitude = ui.item.longitude;
         city = ui.item.city;
         state = ui.item.state;
         country = ui.item.country;
         countryCode = ui.item.countryCode;
         place_id = ui.item.place_id;
         console.log('place_id', place_id)
         $('#latitude').val(latitude);
         $('#longitude').val(longitude);
         // Update map iframe
        //  $('.gmap_iframe').attr('src', 'https://maps.google.com/maps?q=' + latitude + ',' +
        //      longitude + '&t=k&z=16&ie=UTF8&iwloc=&output=embed');

     });

        });
    </script>

    <script>

    </script>


    @stack('scripts')
</body>

</html>
