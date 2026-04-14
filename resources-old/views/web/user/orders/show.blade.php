@extends('web.default.layouts.app')


@push('styles')
    <style>
        /*page header*/
        .page-header .page-title {
            font-weight: 900;
            font-size: 4rem;
        }

        .page-header.breadcrumb-wrap {
            padding: 20px;
            background-color: #f7f8f9;
        }

        .page-header .breadcrumb {
            display: inline-block;
            padding: 0;
            text-transform: capitalize;
            color: #6e6e6e;
            font-size: 0.875rem;
            background: none;
            margin: 0;
            border-radius: 0;
        }

        .page-header .breadcrumb span {
            position: relative;
            text-align: center;
            padding: 0 10px;
        }

        .page-header .breadcrumb span::before {
            content: "\F285";
            font-family: "bootstrap-icons" !important;
            display: inline-block;
            font-size: 9px;
        }

        .order_review {
            border: 1px solid #e2e9e1;
            padding: 30px;
            border-radius: 10px;
        }

        table {
            width: 100%;
            margin-bottom: 1.5rem;
            border-collapse: collapse;
            vertical-align: middle;
        }

        table td,
        table th {
            padding: 10px 20px;
            border: 1px solid #e2e9e1;
            vertical-align: middle;
        }

        table thead>tr>th {
            vertical-align: middle;
            border-bottom: 0;
        }

        table p {
            margin-bottom: 0;
        }

        table.clean td,
        table.clean th {
            border: 0;
            border-top: 1px solid #e2e9e1;
        }

        table .product-thumbnail img {
            max-width: 80px;
        }

        .payment_option .custome-radio {
            margin-bottom: 10px;
        }

        .payment_option .custome-radio .form-check-label {
            color: #292b2c;
            font-weight: 600;
        }
    </style>
@endpush

@section('content')
    <!-- Order Status -->
    <section class="order-status bg-light py-5 mt-5 section-gap">
        <div class="container mt-5">
            <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
                <div>
                    <h2 class="heading fs-4 m-0 checkout-border text-secondary">
                        {{-- orders icon --}}
                        <i class="bi bi-box"></i>
                        @lang('gen.order_detail')
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Order Status -->
    <section class="mt-5 mb-5">
        <div class="container">
            <div class="card card-shadow border-0 mt-4 rounded-3 shadow-lg p-3">
                <div class="card-body">
                    <div class="row my-4 align-items-center">
                        <div class="col-md-4">
                            <h5 class=" ">
                                Order#
                                <span class="fw-bold">{{ $order->order_number ?? '1344334' }}</span>
                            </h5>
                        </div>
                        <div class="col-md-4 text-center">
                            <div class="">
                                {{-- {!! QrCode::size(60)->generate($order->order_number) !!} --}}
                            </div>
                        </div>
                        <div class="col-md-4 text-end">
                            <a href="{{route('orders.download-pdf', $order->id)}}"
                                class="btn btn-success rounded-3 mt-2 btn-sm" id="download-pdf">Download Invoice <i
                                    class="bi bi-file-earmark"></i>
                            </a>
                            <a href="{{ route('orders.index') }}"
                                class="btn btn-dark rounded-3 mt-2 btn-sm">
                                Back <i class="bi bi-arrow-left"></i>
                            </a>
                        </div>

                    </div>
                    <div class="row">

                        <div class="col-md-4 mt-3">
                            <p class="text-secondary m-0">Billing address</p>
                            <div class="card border-0 card-shadow disabled-bg mt-3 shadow">
                                <div class="card-body">
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-house-chimney-window fs-4"></i>
                                        <p class="m-0"> {{ $order->shippingAddress->name ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 card-shadow disabled-bg mt-3 shadow">
                                <div class="card-body">
                                    <div class="d-flex gap-2">
                                        <i class="fa-solid fa-location-dot fs-4"></i>
                                        <div>
                                            <p class="m-0 border-bottom border-dark pb-1">
                                                {{ $order->shippingAddress->address }}
                                            </p>
                                            <p class="m-0 mt-2">{{ $order->shippingAddress->email ?? '' }}</p>
                                            <p class="m-0 mt-1">{{ $order->shippingAddress->city ?? '' }}</p>
                                            <p class="m-0 mt-1">{{ $order->shippingAddress->country }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 card-shadow disabled-bg mt-3 shadow">
                                <div class="card-body">
                                    <div class="d-flex gap-2">
                                        <i class="fa-solid fa-phone fs-4"></i>
                                        <p class="m-0">
                                            {{ $order->shippingAddress->phone_no ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mt-3">
                            <p class="text-secondary m-0">Shipping address</p>
                            <div class="card border-0 card-shadow disabled-bg mt-3 shadow">
                                <div class="card-body">
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="fa-solid fa-house-chimney-window fs-4"></i>
                                        <p class="m-0"> {{ $order->shippingAddress->name ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 card-shadow disabled-bg mt-3 shadow">
                                <div class="card-body shadow">
                                    <div class="d-flex gap-2">
                                        <i class="fa-solid fa-location-dot fs-4"></i>
                                        <div>
                                            <p class="m-0 border-bottom border-dark pb-1">
                                                {{ $order->shippingAddress->address }}
                                            </p>
                                            <p class="m-0 mt-2">{{ $order->shippingAddress->email ?? '' }}</p>
                                            <p class="m-0 mt-1">{{ $order->shippingAddress->city ?? '' }}</p>
                                            <p class="m-0 mt-1">{{ $order->shippingAddress->country }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card border-0 card-shadow disabled-bg mt-3 shadow">
                                <div class="card-body shadow">
                                    <div class="d-flex gap-2">
                                        <i class="fa-solid fa-phone fs-4"></i>
                                        <p class="m-0">
                                            {{ $order->shippingAddress->phone_no ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mt-3">
                            <p class="text-secondary m-0"></p>
                            <div>
                                <p class="text-secondary m-0 ">Payment Status</p>
                                <div class="card border-0 card-shadow disabled-bg mt-2 shadow">
                                    <div class="card-body">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="bi bi-credit-card-2-front-fill fs-4"></i>
                                            <p class="m-0">
                                                {{ $order->payment_status ?? '...' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="text-secondary m-0 mt-3">Payment method</p>
                                <div class="card border-0 card-shadow disabled-bg mt-2 shadow">
                                    <div class="card-body">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="bi bi-credit-card-2-front-fill fs-4"></i>
                                            <p class="m-0">
                                                {{ $order->payment_method ?? '...' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <p class="text-secondary m-0 mt-3">Order Status</p>
                                <div class="card border-0 card-shadow disabled-bg mt-2 shadow">
                                    <div class="card-body">
                                        <div class="d-flex gap-2 align-items-center">
                                            <i class="bi bi-credit-card-2-front-fill fs-4"></i>
                                            <p class="m-0">
                                                {{ $order->status ?? '...' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <h5 class="  mt-2">
                            Items <span class="fw-bold">Ordered</span>
                        </h5>
                        <div class="disabled-bg mt-2 p-2 px-5 rounded-3 d-flex gap-2">
                            <h5 class=" ">Order Date: </h5>
                            <h5 class="">{{ $order->created_at ?? '' }}</h5>
                        </div>
                    </div>

                    <!-- accordion -->
                    <div class="accordion mt-3" id="accordionExample">
                        <div class="accordion-item rounded-4 border-0">
                            <h2 class="accordion-header rounded-4 border">
                                <button class="accordion-button collapsed rounded-4  " type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false"
                                    aria-controls="collapseThree">
                                    <i class="bi bi-phone-flip me-2"></i> Order Items
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse show border-0"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body border-0">
                                    @foreach ($order->items as $item)
                                        <div class="row">
                                            <div class="col-md-6 mt-2">
                                                <div class="card disabled-bg border-0 rounded-4 h-100">
                                                    <div class="card-body">
                                                        <p class="text-secondary">Product name</p>
                                                        <div class=" border-bottom border-dark pb-2">
                                                            {{ $item->product->name ?? '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <div class="card disabled-bg border-0 rounded-4 h-100">
                                                    <div class="card-body">
                                                        <p class="text-secondary">Price</p>
                                                        <div class=" border-bottom border-dark pb-2">
                                                            €{{ $item->price ?? '' }}
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <div class="card disabled-bg border-0 rounded-4 h-100">
                                                    <div class="card-body">
                                                        <p class="text-secondary">Quantity</p>
                                                        <div class=" border-bottom border-dark pb-2">
                                                            {{ $item->quantity ?? '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-2 mt-2">
                                                <div class="card disabled-bg border-0 rounded-4 h-100">
                                                    <div class="card-body">
                                                        <p class="text-secondary">Subtotal</p>
                                                        <div class=" border-bottom border-dark pb-2">
                                                            €{{ $item->subtotal ?? '' }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="row mt-3">
                                        <div class="col-md-10"></div>
                                        <div class="col-md-2 disabled-bg p-2 rounded-3">
                                            <h5 class="  fw-bold m-0">Subtotal:
                                                €{{ $order->total_amount ?? '0.00' }}
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End accordion -->
                    <div class="row mt-3">
                        <div class="col-md-7"></div>
                        <div class="col-md-5 disabled-bg rounded-3 p-3">
                            <div class="row border-bottom border-dark">
                                <div class="col-6">
                                    {{-- <h5 class="  text-secondary mb-1">Shipping Fees</h5>
                                    <h5 class="  text-secondary mb-1">Discount</h2> --}}
                                        <h5 class="  fw-bold">Total Amount</h5>
                                </div>
                                <div class="col-6">
                                    {{-- <h5 class="  text-secondary mb-1">
                                        €{{ $order->shipping ?? '0.00' }}
                                        </h2>
                                        <h5 class="  text-secondary mb-1">
                                            €{{ $order->discount ?? '0.00' }}
                                        </h5> --}}
                                        <h5 class="  fw-bold">
                                            €{{ number_format($order->total_amount, 2) ?? '' }}
                                        </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@push('scripts')

@endpush
