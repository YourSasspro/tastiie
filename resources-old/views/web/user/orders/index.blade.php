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
                        @lang('gen.my_orders')
                    </h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End Order Status -->
    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="order_review">
                        <table class="table table-hover table-responsive" id="dataTable">
                            <thead>
                                <tr>
                                    <th>@lang('gen.order_id')</th>
                                    <th>@lang('gen.order_date')</th>
                                    <th>@lang('gen.total')</th>
                                    <th>@lang('gen.payment_status')</th>
                                    {{-- <th>@lang('gen.payment_method')</th> --}}
                                    <th>@lang('gen.status')</th>
                                    <th>@lang('gen.details')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="align-middle fw-bold">
                                            {{ $order->order_number ?? '' }}
                                        </td>
                                        <td class="align-middle">{{ $order->created_at ?? '' }}</td>
                                        <td class="align-middle">
                                            €{{ $order->total_amount ?? '' }}</td>
                                        <td class="align-middle text-center">
                                            @if ($order->payment_status == 'paid')
                                                <span class="badge bg-success">Paid</span>
                                            @else
                                                <span class="badge bg-danger">
                                                    {{ $order->payment_status ?? '' }}
                                                </span>
                                            @endif
                                        </td>
                                        {{-- <td class="align-middle">{{ $order->payment_method ?? '' }}</td> --}}
                                        <td class="align-middle text-center">
                                            @if ($order->status == 'pending')
                                                <span class="badge bg-warning">Pending</span>
                                            @elseif ($order->status == 'processing')
                                                <span class="badge bg-info">Processing</span>
                                            @elseif ($order->status == 'completed')
                                                <span class="badge bg-success">Completed</span>
                                            @else
                                                <span class="badge bg-danger">Cancelled</span>
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('orders.show', ['id' => $order->id]) }}"
                                                class="btn btn-dark btn-sm">
                                                Details
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



@push('scripts')
    <script>
        new DataTable('#dataTable');
    </script>
@endpush
