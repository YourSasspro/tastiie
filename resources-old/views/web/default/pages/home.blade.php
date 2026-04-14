@extends('web.default.layouts.app')

@push('styles')
    <style>
        .star-label {
            font-size: 52px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        .carousel-heading{
            color:#002147;
        }
        .carousel-description{
            color:#002147;
        }
        .carousel-subdescription{
            color:#002147;
        }
    </style>
@endpush

@section('content')

    @php
        $decodedCarousels = isset($carousels) ? json_decode($carousels) : [];
    @endphp
    <!-- Carousel section -->
    <section class="my-5 pt-4 carousel-section">
        <div class="container-fluid px-0">
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    @if ($decodedCarousels && $decodedCarousels->services)
                        @foreach ($decodedCarousels->services as $key => $carousel)
                            <button type="button" data-bs-target="#carouselExampleCaptions"
                                data-bs-slide-to="{{ $key }}" class="{{ $loop->first ? 'active' : '' }}"
                                aria-current="true" aria-label="Slide 1"></button>
                        @endforeach
                    @endif

                </div>
                <div class="carousel-inner">

                    @if ($decodedCarousels && $decodedCarousels->services)
                        @foreach ($decodedCarousels->services as $key => $carousel)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }} carousel-height">
                                <img src="{{ asset('storage/' . $carousel?->image ?? '') }}"
                                    class="d-block w-100 img-fluid carousel-height" alt="...">
                                <div class="d-flex align-items-center">
                                    <div class="carousel-caption">
                                        <h5 class="carousel-heading">{{ $carousel?->title ?? '' }}</h5>
                                        <p class="carousel-description m-0">{{ $carousel?->description ?? '' }}</p>
                                        <p class="carousel-subdescription m-0">{{ $carousel?->sub_description ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <!-- End carousel section -->

    <!-- Categories section -->
    <section class="my-5">
        <div class="container">
            <div class="row sticky-row">
                <div class="col-md-12 px-3">
                    <div id="categoryNav" class=" sticky-row" data-bs-spy="scroll" data-bs-target="#categoryNav"
                        data-bs-offset="10">
                        <div class="row">
                            <div class="col-10 mt-3 d-flex overflow-auto border-bottom pb-2">
                                @forelse ($categories as $category)
                                    <a href="#{{ $category->slug }}" class="category-link text-decoration-none px-3">
                                        <h2 class="description fs-5">{{ $category->name }}</h2>
                                    </a>
                                @empty
                                    {{-- not found --}}
                                    <div class="text-center text-danger">
                                        <h2 class="description fs-5">
                                            @lang('gen.no_record_found')
                                        </h2>
                                    </div>
                                @endforelse

                            </div>
                            <div class="col-2 text-end">

                                <div class="dropdown" data-bs-auto-close="outside">
                                    <a class="btn bg-blue btn-dropdown text-white rounded-0" href="#" role="button"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-filter text-white fs-3"></i>
                                    </a>

                                    <ul class="dropdown-menu">
                                        @foreach ($dietaryPreferences as $preference)
                                            <li>
                                                <div class="dropdown-item">
                                                    <div class="form-check">
                                                        <input class="form-check-input dietary-filter" type="checkbox"
                                                            value="{{ $preference }}"
                                                            id="preference_{{ $loop->index }}">
                                                        <label class="form-check-label"
                                                            for="preference_{{ $loop->index }}">
                                                            {{ ucfirst($preference) }}</label>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div data-bs-spy="scroll" data-bs-target="#categoryNav" data-bs-offset="0" class="scrollspy-example">

                        {{-- @foreach ($categories as $category)
                            <div id="{{ $category->slug }}" class="my-5">
                                <div class="d-flex">
                                    <h2 class="subheading calltoaction-bg p-2 text-white fw-bold">
                                        {{ $category->name }}
                                    </h2>
                                </div>
                                <div class="row">
                                    @foreach ($category->products as $product)
                                        <div class="col-md-4 mt-3">
                                            <div class="card rounded-0 h-100">
                                                <div class="card-header bg-transparent border-0 p-0">
                                                    <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                                        aria-controls="offcanvasExample"
                                                        class="text-decoration-none bluecolor-txt subheading fw-bold showDetails"
                                                        data-product="{{ $product }}">
                                                        <x-misc.img :src="asset('storage/' . $product->image)"
                                                            class="img-fluid w-100" />
                                                    </a>
                                                </div>
                                                <div class="card-body">
                                                    <div class="d-flex justify-content-between mb-2">
                                                        <div>
                                                            <h2 class="heading bluecolor-txt">
                                                                {{ $product->price }}€
                                                            </h2>
                                                        </div>
                                                        <div>
                                                            <button class="btn p-0 border-0 addtocartBtnGeneral"
                                                                data-product-id="{{ $product->id }}">
                                                                <i class="fa-solid fa-circle-plus txt-orange fs-1"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                    <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                                        aria-controls="offcanvasExample"
                                                        class="text-decoration-none bluecolor-txt subheading fw-bold showDetails"
                                                        data-product="{{ $product }}">
                                                        {{ $product->name }}
                                                    </a>
                                                    <div class="d-flex gap-2 mt-2">
                                                        @php
                                                            $dietary_preferences = json_decode($product->dietary_preferences, true) ?? [];
                                                        @endphp
                                                        @if (!empty($dietary_preferences))
                                                            @foreach ($dietary_preferences as $dietary_preference)
                                                                <p class="calltoaction-bg subdescription p-1 m-0">
                                                                    <span class="text-white">
                                                                        {{ $dietary_preference }}
                                                                    </span>
                                                                </p>
                                                            @endforeach
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach --}}
                        <div id="loader" class="text-center mt-3" style="display: none;">
                            <div class="spinner-border  text-dark" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <div id="productContainer">
                            @include('web.default.pages.partials.filtered-products', ['categories' => $categories,])
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End categories section -->

    {{-- Newsletter subscribe --}}
    @include('web.default.pages.includes.newsletter-subs')

    <!-- dish Offcanvas seciton -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">

        <div class="offcanvas-body p-0 position-relative pb-3">
            <button class="btn border-0 p-0 btn-close-2" data-bs-dismiss="offcanvas"><i
                    class="bi bi-x-circle-fill text-white fs-1"></i>
            </button>
            <x-misc.img :src="asset('storage/')" id="productImage" class="img-fluid" style="width: var(--bs-offcanvas-width);" />
            <div class="px-3">
                <div class="d-flex gap-2 align-items-center mt-3">
                    <div>
                        <x-misc.img :src="asset('assets/img/country-flag.png')" width="40" alt="" id="countryImage" class="img-fluid" />
                    </div>
                    <div>
                        <h4 class="heading bluecolor-txt fs-5" id="productName"></h4>
                    </div>
                </div>
                <div class="d-flex gap-2 align-items-center mt-3">
                    <div>
                        <div class="d-flex align-items-center gap-1" id="reviewSection">
                            <div>
                                <i class="fa-solid fa-star txt-orange"></i>
                                <i class="fa-solid fa-star txt-orange"></i>
                                <i class="fa-solid fa-star txt-orange"></i>
                                <i class="fa-solid fa-star txt-orange"></i>
                                <i class="fa-regular fa-star txt-orange"></i>
                            </div>
                            <div>
                                <a href="" class="text-secondary description reviewOffcanvas">
                                    0 reviews
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-4" id="shortDescriptionSection">

                </div>
                <div class="mt-4" id="ingredientsSection">

                </div>
                <div class="mt-4" id="allergensSection">

                </div>
                <div class="mt-4" id="preparationSection">
                </div>
                <div class="mt-4" id="weightSection">
                </div>
                <div class="mt-4" id="nutritionalSection">
                </div>
                <div class="d-flex justify-content-between align-items-center mt-4">

                </div>
                <div class="mt-4" id="expiryDateSection">
                    <h3 class="heading fw-bold bluecolor-txt">Expiry Dates</h3>
                    <p class="description bluecolor-txt fw-normal m-0">

                    </p>
                </div>
                <button class="btn orange-bg w-100 text-white mt-3 rounded-5 addtocartBtnGeneral"
                    id="addToCartBtn">@lang('gen.add_to_cart')</button>
            </div>
        </div>
    </div>
    <!-- dish End offcanvas section -->

    <!-- chef offcanvas section -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample2"
        aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-body p-0 pb-3 position-relative">
            <button class="btn border-0 p-0 btn-close-2" data-bs-dismiss="offcanvas"><i
                    class="bi bi-x-circle-fill text-white fs-1"></i>
            </button>
            <img src="https://placehold.co/600x400" id="reviewProdImage" alt="" class="img-fluid w-100">

        </div>
    </div>
    <!-- End chef offcanvas section -->

    <!-- Add review modal section -->
        @include('web.default.pages.partials.add-review-model')
    <!-- End add review modal section -->
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {

            $(document).on('click', '.showDetails', function(e) {
                e.preventDefault();
                let product = $(this).data('product');
                let reviews = product.reviews;
                // console.log(reviews);

                if (reviews && reviews.length > 0) {
                    let totalRating = 0;
                    reviews.forEach(review => {
                        totalRating += review.rating;
                    });
                    let avgRating = totalRating / reviews.length;
                    let avgRatingHtml = '';
                    for (let i = 1; i <= 5; i++) {
                        if (i <= avgRating) {
                            avgRatingHtml += '<i class="fa-solid fa-star txt-orange"></i>';
                        } else {
                            avgRatingHtml += '<i class="fa-regular fa-star txt-orange"></i>';
                        }
                    }
                    $('#reviewSection').html(`
                        <div>
                            ${avgRatingHtml}
                        </div>
                        <div>
                            <a href="" class="text-secondary description reviewOffcanvas">
                                ${reviews.length} @lang('gen.reviews')
                            </a>
                        </div>
                    `);
                } else {
                    $('#reviewSection').html(`
                        <div>
                            <i class="fa-regular fa-star txt-orange"></i>
                            <i class="fa-regular fa-star txt-orange"></i>
                            <i class="fa-regular fa-star txt-orange"></i>
                            <i class="fa-regular fa-star txt-orange"></i>
                            <i class="fa-regular fa-star txt-orange"></i>
                        </div>
                        <div>
                            <a href="" class="text-secondary description reviewOffcanvas">
                                0 @lang('gen.reviews')
                            </a>
                        </div>
                    `);
                }


                $('#productName').text(product.name);
                $('#productName').data('product-id', product.id);
                // Set product image
                $('#productImage').attr('src', "{{ asset('storage/') }}" + '/' + product.image);
                // Function to conditionally display sections
                function updateSection(sectionId, title, value) {
                    if (value) {
                        $(sectionId).html(`
                            <h3 class="heading fw-bold bluecolor-txt">${title}</h3>
                            <p class="description bluecolor-txt fw-normal">${value}</p>
                        `).show();
                    } else {
                        $(sectionId).hide();
                    }
                }

                updateSection('#shortDescriptionSection', '@lang('gen.short_description')', product.short_description);
                updateSection('#ingredientsSection', '@lang('gen.ingredients')', product.ingredients);
                updateSection('#allergensSection', '@lang('gen.allergens')', product.allergens);
                updateSection('#preparationSection', '@lang('gen.preparation_advice')', product.preparation_advice);
                updateSection('#weightSection', '@lang('gen.weight')', product.weight);
                updateSection('#expiryDateSection', "@lang('gen.expiry_date')", product.expiry_date);

                // **for Nutritional Values**
                if (product.nutritional_values) {
                    try {
                        let nutritionalValues = JSON.parse(product.nutritional_values);

                        if (Array.isArray(nutritionalValues) && nutritionalValues.length > 0) {
                            let nutritionalValuesHtml = nutritionalValues.map(item => `
                                <div>
                                    <p class="description fw-normal m-0 text-center bluecolor-txt weight-circle pt-1">
                                        ${item.value}</br>${item.unit}
                                    </p>
                                    <p class="description fw-normal m-0 text-center bluecolor-txt">${item.name}</p>
                                </div>
                            `).join('');

                            $('#nutritionalSection').html(`
                                <h3 class="heading fw-bold bluecolor-txt">@lang('gen.nutritional_values')</h3>
                                <p class="description bluecolor-txt fw-normal m-0">For 100g:</p>
                                <div class="d-flex gap-2 align-items-center mt-4" id="nutritionalValuesContainer">
                                    ${nutritionalValuesHtml}
                                </div>
                            `).show();
                        } else {
                            $('#nutritionalSection').hide();
                        }
                    } catch (error) {
                        console.error("Error parsing nutritional_values:", error);
                        $('#nutritionalSection').hide();
                    }
                } else {
                    $('#nutritionalSection').hide();
                }

                $('#addToCartBtn').data('product-id', product.id);

                // Show the offcanvas
                $('#offcanvasExample').offcanvas('show');
            });

            // **Add to Cart Button Click Event**
            $(document).on('click', '.addtocartBtnGeneral', function() {
                let productId = $(this).data('product-id');

                if (!productId) {
                    // console.error("Product ID not found!");
                    toastr.error("Product ID not found!");
                    return;
                }
                // if user is not login
                if (!@json(auth()->check())) {
                    toastr.error("Please login to add product to cart!");
                    // hide
                    $('#offcanvasExample').offcanvas('hide');
                    // show login model
                    $('#exampleModalToggle').modal('show');
                    return;
                }

                $.ajax({
                    url: "{{ route('carts.store') }}",
                    method: "POST",
                    data: {
                        _token: "{{ csrf_token() }}",
                        product_id: productId,
                        quantity: 1
                    },
                    success: function(response) {
                        if (response.status === 200) {
                            toastr.success(response.message);
                            window.location.href = '{{ route('carts.index') }}'
                        }
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            // Validation error - display each error message
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                toastr.error(value[0]);
                            });
                        } else if (xhr.status === 400 || xhr.status === 404) {
                            var response = JSON.parse(xhr.responseText);
                            toastr.error(response.message);
                        } else {
                            // Generic error message for unexpected issues
                            var response = JSON.parse(xhr.responseText);
                            if (response.message === 'Your email address is not verified.') {
                                window.location.href = '/email/verify';
                            } else {
                                toastr.error(response.message);
                            }

                            // toastr.error("An unexpected error occurred. Please try again.");
                        }
                        console.error(xhr.responseText);
                    },
                    complete: function() {}

                });

            });

        });

        // filter products
        $(document).ready(function() {
            $('#filterDate, #filterTime').on('change', function() {
                let date = $('#filterDate').val();
                let time = $('#filterTime').val();

                // Show loader
                $('#loader').show();

                $.ajax({
                    url: '{{ route('filter.products') }}',
                    method: 'GET',
                    data: {
                        date: date,
                        time: time
                    },
                    success: function(response) {
                        $('#productContainer').html(response); // Update products section
                    },
                    complete: function() {
                        // Hide loader after request completes
                        $('#loader').hide();
                    }
                });
            });
            // by dietary preferences
            $('.dietary-filter').on('change', function() {
                let selectedPreferences = [];

                // Get all checked dietary preferences
                $('.dietary-filter:checked').each(function() {
                    selectedPreferences.push($(this).val());
                });

                $.ajax({
                    url: '{{ route('filter.products.by.preferences') }}',
                    method: 'GET',
                    data: {
                        preferences: selectedPreferences
                    },
                    beforeSend: function() {
                        // $('#productContainer').html(''); // Clear products section
                        // Show loader
                        $('#loader').show();
                    },
                    success: function(response) {
                        $('#productContainer').html(response);
                    },
                    complete: function() {
                        // Hide loader after request completes
                        $('#loader').hide();
                    }
                });

            });



            // review offcanvas
            $(document).on('click', '.reviewOffcanvas', function(e) {
                e.preventDefault();
                let productId = $('#productName').data('product-id');
                let reviewRoute = "{{ route('product.review', ':id') }}";
                reviewRoute = reviewRoute.replace(':id', productId);
                $('#offcanvasExample2 .offcanvas-body').empty();
                $('#offcanvasExample2').offcanvas('show');
                // add loading
                $('#offcanvasExample2 .offcanvas-body').html(`
                    <div class="text-center mt-5 loaderContainer d-flex justify-content-center align-items-center" style="height: 70vh;">
                        <div class="spinner-border text-dark" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                `);
                $.ajax({
                    url: reviewRoute,
                    method: 'GET',
                    data: {
                        product_id: productId
                    },
                    success: function(response) {
                        $('#offcanvasExample2 .offcanvas-body').html(response);
                    },
                    error: function(xhr) {
                        if (xhr.status === 422) {
                            // Validation error - display each error message
                            var errors = xhr.responseJSON.errors;
                            $.each(errors, function(key, value) {
                                toastr.error(value[0]);
                            });
                        } else if (xhr.status === 400 || xhr.status === 404) {
                            var response = JSON.parse(xhr.responseText);
                            toastr.error(response.message);
                        } else {
                            // Generic error message for unexpected issues
                            toastr.error("An unexpected error occurred. Please try again.");
                        }
                        console.error(xhr.responseText);
                    },
                    complete: function() {
                        // hide the loader
                        $('#offcanvasExample2 .offcanvas-body .loaderContainer').remove();
                    }
                });
            });

            // add review model
            $(document).on('click', '#addReviewModelBtn', function(e) {
                e.preventDefault();

                // if user not login then open login model
                if (!@json(auth()->check())) {
                    toastr.error("Please login to add review!");
                    // hide
                    $('#offcanvasExample').offcanvas('hide');
                    $('#offcanvasExample2').offcanvas('hide');
                    // show login model
                    $('#exampleModalToggle').modal('show');
                    return;
                }

                let productId = $(this).data('product-id');
                $('#addReviewProductId').val(productId);
                $('#addReviewModel').modal('show');
            });
        });
    </script>

    {{-- Star Rating --}}
    <script>
        const LABELCOLORINACTIV = "#dccfcf";
        const LABELCOLORACTIV = "#ff8119";

        const RATINGSLABELS = document.querySelectorAll("form.star label");
        const RATINGSINPUTS = document.querySelectorAll("form.star input");

        // make inputs disappear
        RATINGSINPUTS.forEach(function(anInput) {
            anInput.style.display = "none";
        });

        // manage label click & hover display
        function notationLabels(e) {
            let currentLabelRed = e.target;
            let currentLabelBlack = e.target;

            // console.log(e.target.localName);

            if (e.type == "mouseenter" || !e.target.control.checked) {
                // coloring red from the clicked/hovered label included, going backward till the node start - if we are hovering or the star isn't already checked.
                while (currentLabelRed != null) {
                    currentLabelRed.style.color = LABELCOLORACTIV;
                    currentLabelRed = currentLabelRed.previousElementSibling;
                }

                // coloring black from the clicked/hovered label excluded, going forward till the node end
                while ((currentLabelBlack = currentLabelBlack.nextElementSibling) != null) {
                    currentLabelBlack.style.color = LABELCOLORINACTIV;
                }
            } else {
                // if the clicked label was already checked we uncheck it and prevent the click event from doing its job - defacto enabling zero star rating
                e.target.control.checked = false;
                e.preventDefault();
            }
            if (e.type == "click") {
                // Assuming the rating value is stored in the value attribute of the input
                const ratingValue = e.target.control.value;
                const ratingInput = document.getElementById('rating');
                ratingInput.value = ratingValue;
            }
        }

        function notationLabelsOut(e) {
            let notesNode = e.target.parentNode.querySelectorAll("label");
            let currentLabel = notesNode[notesNode.length - 1];

            // console.log("out : " + e.target.localName);
            // console.log("out checked: " + e.target.control.checked);

            notesNode.forEach(function redrum(starLabel) {
                starLabel.style.color = LABELCOLORACTIV;
            });

            while (currentLabel != null && !currentLabel.control.checked) {
                currentLabel.style.color = LABELCOLORINACTIV;
                currentLabel = currentLabel.previousElementSibling;

                //console.log("currentLabel null?: " + currentLabel);
                // previousElementSibling become the input ...
            }
        }

        document.addEventListener("DOMContentLoaded", function() {
            RATINGSLABELS.forEach(function(aStar) {
                aStar.style.color = "#eee";
                aStar.addEventListener("click", notationLabels);
                aStar.addEventListener("mouseenter", notationLabels);
                aStar.addEventListener("mouseout", notationLabelsOut);
            });

            // stop a callback to the label click event function notationLabels passed on the input element associated ... why ... that's behond me
            // alternatively we could check for e.target.localName in the notationLabels function
            RATINGSINPUTS.forEach(function(aStarInput) {
                aStarInput.addEventListener("click", function(e) {
                    e.stopPropagation();
                });
            });
        });
    </script>
    {{-- end star rating  --}}
@endpush
