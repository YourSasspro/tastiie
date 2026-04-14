<button class="btn border-0 p-0 btn-close-2" data-bs-dismiss="offcanvas"><i
    class="bi bi-x-circle-fill text-white fs-1"></i>
</button>
<x-misc.img :src="asset('storage/'.$product->image)" id="reviewProdImage" alt="" class="img-fluid w-100" />
<div class="px-3">
<h4 class="heading bluecolor-txt fs-5 mt-3" id="reviewProdName">
    {{ $product->name ?? ''}}
</h4>
<div id="avgReviewSection">

    <p class="description fs-5 bluecolor-txt m-0">
        @lang('gen.avarage_rating'): {{ number_format($product->average_rating ?? 0.0,1)}} / 5
    </p>

    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center gap-1 mt-2">
            {{-- <div>
                @for ($i = 0; $i < $product->average_rating; $i++)
                    <i class="fa-solid fa-star txt-orange"></i>
                @endfor
                @for ($i = 0; $i < 5 - $product->average_rating; $i++)
                    <i class="fa-regular fa-star txt-orange"></i>
                @endfor
            </div> --}}
            <div>
                @for ($i = 0; $i < floor($product->average_rating); $i++)
                    <i class="fa-solid fa-star txt-orange"></i>
                @endfor
        
                @if ($product->average_rating - floor($product->average_rating) >= 0.5)
                    <i class="fa-solid fa-star-half-stroke txt-orange"></i>
                    @php $filledStars = floor($product->average_rating) + 1; @endphp
                @else
                    @php $filledStars = floor($product->average_rating); @endphp
                @endif
        
                @for ($i = 0; $i < (5 - $filledStars); $i++)
                    <i class="fa-regular fa-star txt-orange"></i>
                @endfor
            </div>
            <div class="ms-2">
                <a href="#" class="text-secondary description">
                    {{ $product->reviews_count ?? ''}} @lang('gen.reviews')
                </a>
            </div>
        </div>
        <div>
            <button class="btn txt-orange p-0 border-0" id="addReviewModelBtn" data-product-id="{{$product->id}}"><span><i class="bi bi-plus-circle me-2"></i></span>@lang('gen.add_review')</button>
        </div>
    </div>
</div>
<div class="card border-0 rounded-4 mt-3">
    <div class="card-body" id="reviewsSection">

        @forelse ($product->reviews as $review)
            <div>
                <div class="text-center">
                    @for ($i = 0; $i < $review->rating; $i++)
                        <i class="fa-solid fa-star txt-orange"></i>
                    @endfor
                    @for ($i = 0; $i < 5 - $review->rating; $i++)
                        <i class="fa-regular fa-star txt-orange"></i>
                    @endfor
                </div>
                <div>
                    <p class="description fw-normal text-center">{{ $review?->user?->name }}</p>
                    <div class="d-flex justify-content-between">
                        <div class="d-flex gap-2">
                            <i class="fa-solid fa-quote-left text-danger fs-4"></i>
                            <p class="description mt-3">{{ $review?->review }}</p>
                        </div>
                        <div>
                            <i class="fa-solid fa-quote-right text-danger fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center">
                <p class="description">
                    @lang('gen.no_review_yet')
                </p>
            </div>
        @endforelse
    </div>
</div>
</div>
