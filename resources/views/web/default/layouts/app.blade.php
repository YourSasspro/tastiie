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
    <!--<link rel="stylesheet" href="https://msfdn.digitalisolutions.net/plugins/virtual-select/virtual-select.min.css">-->

    <link rel="stylesheet" href="/assets/css/style.css" />
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
        /**/
        /**/
      /* Mobile Footer Centering */
    @media (max-width: 767px) {
        footer {
            text-align: center !important;
        }

    footer .footer-links,
    footer .footer-socials,
    footer .footer-text {
        justify-content: center !important;
        text-align: center !important;
        margin-bottom: 10px; /* optional spacing */
    }
}

.hero-card {
        position: relative;
        z-index: 10;
        background: white;
        padding: 40px 50px;
        border-radius: 12px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
        text-align: center;
        max-width: 650px !important;
        margin-left: 10px !important; /* Move card to the right */
      }
.main-heading {
            color: var(--primary-color);
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 25px;
            letter-spacing: 0.5px;
            line-height: 1.3;
            text-transform: uppercase;
        }
    </style>
<!---->
<style>
    /* Updated Navigation Arrows for Mobile */
      .custom-nav {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        width: 40px;
        height: 40px;
        background-color: #3b5998;
        border: none;
        border-radius: 50%;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 10;
        transition: opacity 0.3s;
      }

      .custom-nav.prev {
        left: 5px;
        /* Moved inside slightly for mobile tap space */
      }

      .custom-nav.next {
        right: 5px;
      }

      /* Desktop override for arrows */
      @media (min-width: 992px) {
        .custom-nav.prev {
          left: -25px;
        }

        .custom-nav.next {
          right: -25px;
        }
      }

      /* Ensure the carousel doesn't cut off shadows */
      .carousel-inner {
        padding: 15px 0;
      }

      /* Custom Time Dropdown Styling */
      .custom-time-dropdown {
        position: relative;
        width: 100%;
        font-family: 'Inter', sans-serif;
      }

      .time-trigger {
        display: flex;
        align-items: center;
        cursor: pointer;
        width: 100%;
        color: #001c69;
        font-weight: 500;
        justify-content: space-between;
        /* Ensure arrow pushes to right if needed, but flex settings below might override */
      }

      /* Adjust selected time spacing */
      .selected-time {
        margin-left: 10px;
        margin-right: auto;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
      }

      .arrow-icon {
        font-size: 12px;
        transition: transform 0.3s ease;
      }

      .custom-time-dropdown.active .arrow-icon {
        transform: rotate(180deg);
      }

      .time-dropdown-menu {
        position: absolute;
        top: 100%;
        left: 0;
        width: 300px;
        margin-top: 10px;
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 20px rgba(0, 0, 0, 0.15);
        display: none;
        z-index: 1000;
        overflow: hidden;
        padding: 10px 0;
        border: 1px solid #eee;
      }

      .custom-time-dropdown.active .time-dropdown-menu {
        display: block;
        animation: fadeIn 0.2s ease;
      }

      .time-option {
        padding: 12px 20px;
        cursor: pointer;
        color: #001c69;
        font-weight: 600;
        font-size: 15px;
        transition: background 0.2s;
        display: flex;
        align-items: center;
      }

      .time-option:hover {
        background-color: #f8f9fa;
      }

      .price {
        font-weight: 700;
        margin-left: 5px;
      }

      .dropdown-info-text {
        padding: 15px 20px;
        font-size: 13px;
        color: #6c757d;
        background-color: #f8f9fa;
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        line-height: 1.4;
        margin: 5px 0;
      }

      .relais-option {
        font-style: italic;
        justify-content: space-between;
      }

      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: translateY(-10px);
        }

        to {
          opacity: 1;
          transform: translateY(0);
        }
      }

      /* Adjust wrapper to allow absolute dropdown to overflow */
      .input-wrapper.custom-time-wrapper {
        overflow: visible !important;
        cursor: pointer;
      }

      /* Creneaux Section */
      .creneaux-section {
        padding: 40px 0;
        background-color: #fff;
        border-bottom: 1px solid var(--medium-gray);
      }

      .creneaux-container {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
      }

      .date-selector-wrapper {
        flex: 1;
        display: flex;
        align-items: center;
        gap: 10px;
        overflow: hidden;
        position: relative;
        min-width: 300px; /* Ensure it doesn't shrink too much */
      }

      .date-strip {
        display: flex;
        gap: 10px;
        overflow-x: auto;
        scroll-behavior: smooth;
        padding: 5px 0;
        -ms-overflow-style: none; /* IE and Edge */
        scrollbar-width: none; /* Firefox */
      }

      .date-strip::-webkit-scrollbar {
        display: none;
      }

      .date-card {
        min-width: 100px;
        height: 80px;
        background: #f8f9fa;
        border: 1px solid #e9ecef;
        border-radius: 8px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        transition: all 0.3s ease;
        user-select: none;
      }

      .date-card:hover {
        border-color: var(--primary-color);
        background: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
      }

      .date-card.active {
        background: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
        box-shadow: 0 4px 12px rgba(0, 28, 105, 0.2);
      }

      .date-card .day {
        font-size: 14px;
        font-weight: 600;
        text-transform: uppercase;
        margin-bottom: 5px;
      }

      .date-card .date {
        font-size: 18px;
        font-weight: 700;
      }

      .scroll-btn {
        background: white;
        border: 1px solid #e9ecef;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        color: var(--primary-color);
        transition: all 0.3s ease;
        z-index: 2;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
      }

      .scroll-btn:hover {
        background: var(--primary-color);
        color: white;
      }

      /* Time Selector */
      .time-selector-wrapper {
        flex: 0 0 300px;
      }

      .custom-select-wrapper {
        position: relative;
        user-select: none;
        width: 100%;
      }

      .custom-select-trigger {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
        font-size: 16px;
        font-weight: 500;
        color: var(--text-color);
        height: 60px;
        background: white;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      .custom-select-trigger:hover {
        border-color: var(--primary-color);
      }

      .custom-select-trigger i {
        color: var(--primary-color);
      }

      .custom-options {
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: white;
        border: 1px solid #e9ecef;
        border-top: none;
        border-radius: 0 0 8px 8px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        opacity: 0;
        visibility: hidden;
        pointer-events: none;
        transform: translateY(-10px);
        transition: all 0.3s ease;
        z-index: 100;
        max-height: 250px;
        overflow-y: auto;
      }

      .custom-select.open .custom-options {
        opacity: 1;
        visibility: visible;
        pointer-events: all;
        transform: translateY(0);
      }

      .custom-option {
        padding: 15px 20px;
        font-size: 15px;
        color: var(--text-color);
        cursor: pointer;
        transition: all 0.2s ease;
        border-bottom: 1px solid #f8f9fa;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      .custom-option:last-child {
        border-bottom: none;
      }

      .custom-option:hover {
        background: #f8f9fa;
        color: var(--primary-color);
      }

      .custom-option.selected {
        background: rgba(0, 28, 105, 0.05);
        color: var(--primary-color);
        font-weight: 600;
      }

      .option-price {
        font-weight: 600;
        color: var(--orange-color);
      }

      /* Delivery Search Bar (Header Center) */
      .delivery-search-container {
        display: flex;
        align-items: center;
        background: #fff;
        border-radius: 8px; /* Slightly rounded */
        /* padding: 5px; */
        gap: 10px;
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
      }

      .input-wrapper.address-wrapper {
        min-width: 250px;
        border-right: none;
        border-radius: 4px;
        box-shadow: none;
        border: 1px solid #e0e0e0;
      }
      
      .input-wrapper.custom-dropdown-wrapper {
        min-width: 140px;
        cursor: pointer;
        position: relative;
        border-radius: 4px;
        box-shadow: none;
        border: 1px solid #e0e0e0;
        padding: 5px 15px;
        height: 50px;
        display: flex;
        align-items: center;
      }

      .input-wrapper.custom-dropdown-wrapper:hover {
         border-color: var(--primary-color);
      }

      .dropdown-trigger {
        display: flex;
        align-items: center;
        width: 100%;
        justify-content: space-between;
        font-size: 14px;
        font-weight: 600;
        color: var(--text-color);
      }
      
      .selected-text {
        margin: 0 5px;
        white-space: nowrap;
      }

      .custom-dropdown-menu {
        position: absolute;
        top: 110%;
        left: 0;
        background: white;
        border: 1px solid #eee;
        border-radius: 8px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        min-width: 280px; /* Increased width for longer text */
        max-height: 300px; /* Scrollable */
        overflow-y: auto;
        padding: 5px 0;
        opacity: 0;
        visibility: hidden;
        transform: translateY(10px);
        transition: all 0.3s ease;
        z-index: 1100;
        text-align: left;
      }

      .custom-dropdown-wrapper.active .custom-dropdown-menu {
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
      }

      .dropdown-item {
        padding: 10px 20px;
        cursor: pointer;
        font-size: 14px;
        color: #333;
        transition: background 0.2s;
      }

      .dropdown-item:hover {
        background: #f8f9fa;
        color: var(--primary-color);
      }

      .dropdown-info {
        padding: 10px 20px;
        font-size: 12px;
        color: #666;
        background: #f9f9f9;
        border-top: 1px solid #eee;
        border-bottom: 1px solid #eee;
        margin: 5px 0;
      }

      /* Mobile styles for the search bar */
      @media (max-width: 992px) {

        
        .mobile-inputs-row {
          display: flex;
          gap: 10px;
          padding: 10px 0;
        }

        .input-wrapper.custom-dropdown-wrapper {
           flex: 1;
           min-width: auto;
           padding: 5px 10px;
           height: 48px;
           justify-content: center;
        }
        
        /* Align last dropdown to the right to prevent overflow */
        .mobile-inputs-row .input-wrapper:last-child .custom-dropdown-menu {
            left: auto;
            right: 0;
        }

        .dropdown-trigger {
           justify-content: center;
           width: 100%;
        }
        
        .dropdown-trigger .selected-text {
           font-size: 13px;
           white-space: nowrap;
           overflow: hidden;
           text-overflow: ellipsis;
        }
        
        .dropdown-trigger i {
           font-size: 16px;
           margin-right: 5px;
        }
        
        .dropdown-trigger .arrow-icon {
           display: none;
        }
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
    <!--<script src="https://msfdn.digitalisolutions.net/plugins/virtual-select/virtual-select.min.js"></script>-->



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

    
    <!-- date JS  -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get current date
            let today = new Date();
            let yyyy = today.getFullYear();
            let mm = String(today.getMonth() + 1).padStart(2, '0');
            let dd = String(today.getDate()).padStart(2, '0');

            // Set date input value (YYYY-MM-DD)
            document.getElementById("filterDate").value = `${yyyy}-${mm}-${dd}`;

            // Get current time (HH:MM)
            let hours = String(today.getHours()).padStart(2, '0');
            let minutes = String(today.getMinutes()).padStart(2, '0');

            // Set time input value
            document.getElementById("filterTime").value = `${hours}:${minutes}`;
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Get current date
            let today = new Date();
            let yyyy = today.getFullYear();
            let mm = String(today.getMonth() + 1).padStart(2, '0');
            let dd = String(today.getDate()).padStart(2, '0');

            // Set date input value (YYYY-MM-DD)
            document.getElementById("filterDate1").value = `${yyyy}-${mm}-${dd}`;

            // Get current time (HH:MM)
            let hours = String(today.getHours()).padStart(2, '0');
            let minutes = String(today.getMinutes()).padStart(2, '0');

            // Set time input value
            document.getElementById("filterTime1").value = `${hours}:${minutes}`;
        });
    </script>
    <!---->
    <!-- Header Logic JS -->
<script>

document.addEventListener('DOMContentLoaded', function () {

    const months = ['Jan', 'Fév', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sep', 'Oct', 'Nov', 'Déc'];

    /* =============================================
       1. GENERATE DATES (Excluding Weekends)
    ============================================= */
    function generateDates() {
        const dateMenus = [
            document.getElementById('headerDateMenu'), 
            document.getElementById('mobileDateMenu')
        ];
        
        const today = new Date();

        dateMenus.forEach(menu => {
            if (!menu) return;
            menu.innerHTML = '';

            let addedCount = 0;
            let daysOffset = 0;

            // Loop until we have 15 non-weekend days
            while (addedCount < 15) {
                const date = new Date(today);
                date.setDate(today.getDate() + daysOffset);

                const dayOfWeek = date.getDay(); // 0 = Sunday, 6 = Saturday

                // Only add if it's NOT Saturday or Sunday
                if (dayOfWeek !== 0 && dayOfWeek !== 6) {
                    const label = `${date.getDate()} ${months[date.getMonth()]}`;
                    const value = date.toISOString().split('T')[0];

                    const item = document.createElement('div');
                    item.className = 'dropdown-item';
                    item.textContent = label;
                    item.dataset.value = value;

                    item.addEventListener('click', function (e) {
                        e.stopPropagation();
                        updateDateUI(label, value);
                        document.querySelectorAll('.custom-dropdown-wrapper').forEach(w => w.classList.remove('active'));
                        fireAjaxFilter();
                    });

                    menu.appendChild(item);
                    addedCount++;
                }
                daysOffset++;
            }
        });
    }

    /* =============================================
       2. GENERATE TIME SLOTS (Same as before)
    ============================================= */
    function formatTime(hour) {
        const period = hour >= 12 ? 'PM' : 'AM';
        const h = hour % 12 || 12;
        return `${h}:00 ${period}`;
    }

    function generateTimeSlots() {
        const timeMenus = [
            document.getElementById('headerTimeMenu'), 
            document.getElementById('mobileTimeMenu')
        ];

        timeMenus.forEach(menu => {
            if (!menu) return;
            menu.innerHTML = '';

            for (let h = 7; h < 24; h++) {
                const start = formatTime(h);
                const end   = formatTime(h + 1);
                const label = `${start} - ${end}`;
                const value = `${String(h).padStart(2, '0')}:00`;

                const item = document.createElement('div');
                item.className = 'dropdown-item';
                item.textContent = label;
                item.dataset.value = value;

                item.addEventListener('click', function (e) {
                    e.stopPropagation();
                    updateTimeUI(label, value);
                    document.querySelectorAll('.custom-dropdown-wrapper').forEach(w => w.classList.remove('active'));
                    fireAjaxFilter();
                });
                menu.appendChild(item);
            }
        });
    }

    /* =============================================
       3. UI UPDATE HELPERS
    ============================================= */
    function updateDateUI(label, value) {
        const targets = ['headerSelectedDate', 'mobileSelectedDate'];
        targets.forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.textContent = label;
                el.dataset.value = value;
            }
        });
    }

    function updateTimeUI(label, value) {
        const targets = ['headerSelectedTime', 'mobileSelectedTime'];
        targets.forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.textContent = label;
                el.dataset.value = value;
            }
        });
    }

    /* =============================================
       4. TOGGLE LOGIC
    ============================================= */
    const wrappers = [
        'headerDateWrapper', 'headerTimeWrapper', 
        'mobileDateWrapper', 'mobileTimeWrapper'
    ];

    wrappers.forEach(id => {
        const wrapper = document.getElementById(id);
        if (!wrapper) return;

        wrapper.addEventListener('click', function (e) {
            e.stopPropagation();
            const isActive = this.classList.contains('active');
            document.querySelectorAll('.custom-dropdown-wrapper').forEach(w => w.classList.remove('active'));
            if (!isActive) this.classList.add('active');
        });
    });

    document.addEventListener('click', () => {
        document.querySelectorAll('.custom-dropdown-wrapper').forEach(w => w.classList.remove('active'));
    });

    /* =============================================
       5. AJAX FILTER
    ============================================= */
    function fireAjaxFilter() {
        const date = document.getElementById('headerSelectedDate').dataset.value || 
                     document.getElementById('mobileSelectedDate').dataset.value || '';
                     
        const time = document.getElementById('headerSelectedTime').dataset.value || 
                     document.getElementById('mobileSelectedTime').dataset.value || '';

        if (!date || !time) return;

        $('#loader').show();
        $.ajax({
            url: '{{ route("filter.products") }}',
            method: 'GET',
            data: { date, time },
            success: function (response) {
                $('#productContainer').html(response);
            },
            complete: function () {
                $('#loader').hide();
            }
        });
    }

    // Initialize
    generateDates();
    generateTimeSlots();

    // Set Default UI to first available weekday
    const firstDateItem = document.querySelector('#headerDateMenu .dropdown-item');
    if (firstDateItem) {
        updateDateUI(firstDateItem.textContent, firstDateItem.dataset.value);
    }
});
</script>




    @stack('scripts')
</body>

</html>
