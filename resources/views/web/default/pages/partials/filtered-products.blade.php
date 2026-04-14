@foreach ($categories as $category)
    <div id="{{ $category->slug }}" class="my-5">
        <div class="d-flex">
            <h2 class="subheading calltoaction-bg p-2 text-white fw-bold">
                {{ $category->name }}
            </h2>
        </div>
        <div class="row">
            @forelse ($category->products as $product)
                <div class="col-md-3 mt-3">
                    <div class="card rounded-0 h-100">
                        <div class="card-header bg-transparent border-0 p-0">
                            <a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                aria-controls="offcanvasExample"
                                class="text-decoration-none bluecolor-txt subheading fw-bold showDetails" data-product="{{ $product }}">
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
            @empty
                <div class="col-md-12">
                    <div class="text-center text-danger" role="alert">
                        No products found.
                    </div>
                </div>
            @endforelse
        </div>
    </div>
@endforeach
