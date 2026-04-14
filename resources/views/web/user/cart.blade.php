@extends('web.default.layouts.app')


@push('styles')
@endpush

@section('content')
    <section class="order-status bg-light py-5 mt-5 section-gap">
        <div class="container mt-5">
            <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
                <div>
                    <h2 class="heading fs-4 m-0 ">
                        <i class="bi bi-1-circle-fill"></i> @lang('gen.carts')
                    </h2>
                </div>
                <div>
                    <h2 class="heading fs-4 mx-2 m-0 checkout-border text-secondary">
                        <i class="bi bi-2-circle-fill mb-3"></i> @lang('gen.checkout')
                    </h2>
                </div>
                <div>
                    <h2 class="heading fs-4 m-0 text-secondary">
                        <i class="bi bi-3-circle-fill"></i> @lang('gen.order_status')
                    </h2>
                </div>
            </div>
        </div>
    </section>

    <!-- Checkout -->
    <section class="mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7 mt-3">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="text-secondary">
                                        @lang('gen.image')
                                    </th>
                                    <th class="text-secondary">
                                        @lang('gen.product')
                                    </th>
                                    <th class="text-secondary">
                                        @lang('gen.price')
                                    </th>
                                    <th class="text-secondary">
                                        @lang('gen.quantity')
                                    </th>
                                    <th class="text-secondary">
                                        @lang('gen.total')
                                    </th>
                                    <th class="text-secondary">
                                        @lang('gen.remove')
                                    </th>
                                </tr>
                            </thead>
                            <tbody>

                                @php
                                    $grand_total = 0;
                                @endphp
                                @forelse ($carts as $item)
                                    @php
                                        $subtotal = $item->price * $item->quantity;
                                        $grand_total += $subtotal;
                                    @endphp
                                    <tr data-id="{{ $item->id }}">
                                        <td class=" align-middle">
                                            <x-misc.img :src="asset('storage/'.$item->product?->image)" width="70" height="70" alt=""
                                                class="img-fluid" />
                                        </td>
                                        <td class=" align-middle">
                                            <div>
                                                <h2 class="heading fs-6 mb-1">
                                                    {{ $item->product?->name }}
                                                </h2>
                                            </div>
                                        </td>
                                        <td class=" align-middle">
                                            €{{ number_format($item->price, 2) }}
                                        </td>
                                        <td class=" align-middle">
                                            <div class="d-flex gap-3 align-items-center w-100">
                                                <div class="quantity d-flex justify-content-center">
                                                    <button class="btn orange-bg text-white minusBtn rounded-0 px-1">
                                                        -
                                                    </button>
                                                    <input type="number" class="form-control quantityInput" data-id="{{ $item->id }}" style="width: 50px" value="{{ $item->quantity }}" />

                                                    <button class="btn orange-bg text-white plusBtn rounded-0 px-1">
                                                        +
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class=" align-middle">
                                            €{{ number_format($subtotal, 2) }}
                                        </td>
                                        <td class="align-middle">
                                            <a href="#" class="remove-btn text-decoration-underline text-dark removeBtn" data-id="{{ $item->id }}">
                                                <i class="bi bi-x-circle-fill text-danger fs-4"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">
                                            @lang('gen.no_result_found')
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-5 mt-3 p-3">
                    <div class="border border-2 p-3">
                        <h2 class="heading border-bottom py-3">
                            @lang('gen.cart_totals')
                        </h2>
                        <div class="border-bottom pb-3">
                            <div class="d-flex justify-content-between mt-4">
                                <p class="m-0 mt-3 fs-5 fw-bold">
                                    @lang('gen.total')
                                </p>
                                <p class="m-0 mt-3 fs-5 fw-bold" id="grandTotal">
                                    €{{ number_format($grand_total, 2) }}
                                </p>
                            </div>
                        </div>
                        <a href="{{route('checkout')}}" class="btn orange-bg text-white rounded-5 w-100 py-2 mt-3">
                            @lang('gen.proceed_to_checkout')
                        </a>
                        <a href="{{route('home')}}" class="btn orange-bg text-white rounded-5 w-100 py-2 mt-3">
                            @lang('gen.continue_shopping')
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Checkout -->
@endsection



@push('scripts')
<script>


    $(document).ready(function () {
    $(".plusBtn").on("click", function () {
        let input = $(this).siblings(".quantityInput");
        let currentQuantity = parseInt(input.val());
        let newQuantity = currentQuantity + 1;
        let productId = $(this).closest("tr").data("id");

        updateCartQuantity(productId, newQuantity, input, currentQuantity);
    });

    $(".minusBtn").on("click", function () {
        let input = $(this).siblings(".quantityInput");
        let currentQuantity = parseInt(input.val());

        if (currentQuantity > 1) {
            let newQuantity = currentQuantity - 1;
            let productId = $(this).closest("tr").data("id");

            updateCartQuantity(productId, newQuantity, input, currentQuantity);
        }
    });

    $(".removeBtn").on("click", function () {
        let row = $(this).closest("tr");
        let productId = row.data("id");
        let deleteRoute = "{{ route('carts.destroy', ':id') }}";
        deleteRoute = deleteRoute.replace(':id', productId);

        $.ajax({
            url: deleteRoute,
            type: "DELETE",
            data: {
                _token: "{{ csrf_token() }}",
                id: productId
            },
            success: function (response) {
                if (response.success) {
                    row.remove();
                    updateGrandTotal();
                    toastr.success("Item removed from cart");
                } else {
                    toastr.error(response.message);
                }
            },
            error: function (xhr) {
                toastr.error("Something went wrong. Please try again.");
            }
        });
    });

    function updateCartQuantity(productId, newQuantity, input, previousQuantity) {
        let updateRoute = "{{ route('carts.update', ':id') }}";
        updateRoute = updateRoute.replace(':id', productId);
        $.ajax({
            url: updateRoute,
            type: "PUT",
            data: {
                _token: "{{ csrf_token() }}",
                id: productId,
                quantity: newQuantity
            },
            success: function (response) {
                if (response.success) {
                    input.val(newQuantity);
                    updateGrandTotal();
                    toastr.success(response.message)
                } else {
                    toastr.error(response.message);
                    input.val(previousQuantity);
                }
            },
            error: function (xhr) {
                let errorResponse = xhr.responseJSON;
                if (errorResponse && errorResponse.message) {
                    toastr.error(errorResponse.message);
                    input.val(previousQuantity); // Reset to original quantity
                }
            }
        });
    }

    // function updateGrandTotal() {
    //     let grandTotal = 0;
    //     $(".quantityInput").each(function () {
    //         let row = $(this).closest("tr");
    //         let price = parseFloat(row.find(".price").text().replace("$", ""));
    //         let quantity = parseInt($(this).val());
    //         let subtotal = price * quantity;
    //         row.find(".subtotal").text(`$${subtotal.toFixed(2)}`);
    //         grandTotal += subtotal;
    //     });
    //     $(".grand-total").text(`$${grandTotal.toFixed(2)}`);
    // }
    function updateGrandTotal() {
            let grandTotal = 0;
            $(".quantityInput").each(function() {
                let row = $(this).closest("tr");
                let price = parseFloat(row.find("td:nth-child(3)").text().replace("$", ""));
                let quantity = parseInt($(this).val());
                let subtotal = price * quantity;
                row.find("td:nth-child(5)").text("$" + subtotal.toFixed(2));
                grandTotal += subtotal;
            });
            $("#grandTotal").text("$" + grandTotal.toFixed(2));
        }
});

</script>

@endpush
