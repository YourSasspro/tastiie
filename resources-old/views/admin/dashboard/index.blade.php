@extends('admin.layouts.app')

@section('pageTitle', trans('gen.dashboard'))

@section('content')

    <div class="container-fluid pt-4 px-4">
        <div class="row">
            {{-- Today Sales --}}
            <div class="col-sm-6 col-xl-3 mt-3">
                <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-line fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">
                            @lang('gen.today_sales')
                        </p>
                        <h6 class="mb-0">
                            ${{ $todaySales ?? 0 }}
                        </h6>
                    </div>
                </div>
            </div>

            {{-- Total Sales --}}
            <div class="col-sm-6 col-xl-3 mt-3">
                <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-chart-bar fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">
                            @lang('gen.total_sales')
                        </p>
                        <h6 class="mb-0">
                            ${{ $totalSales ?? 0 }}
                        </h6>
                    </div>
                </div>
            </div>

            {{-- Total Category --}}
            <div class="col-sm-6 col-xl-3 mt-3">
                <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-list-alt fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">@lang('gen.total_categories')</p>
                        <h6 class="mb-0">{{ $totalCategories ?? 0 }}</h6>
                    </div>
                </div>
            </div>

            {{-- Total Products --}}
            <div class="col-sm-6 col-xl-3 mt-3">
                <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-box fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">@lang('gen.total_products')</p>
                        <h6 class="mb-0">{{ number_format($totalProducts ?? 0) }}</h6>
                    </div>
                </div>
            </div>

            {{-- Total Orders --}}
            <div class="col-sm-6 col-xl-3 mt-3">
                <div class="bg-white rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-shopping-cart fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">@lang('gen.total_orders')</p>
                        <h6 class="mb-0">{{ number_format($totalOrders ?? 0) }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Sales Charts --}}
    <div class="container-fluid px-4">
        <div class="row mt-2">
            <div class="col-md-12 mt-4">
                <div class="shadow text-center rounded p-4 card border-0">
                    <div class="card-body">
                        <canvas id="barChart" class="dashboard-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Recent Transactions --}}
    <div class="container-fluid pt-4 px-4 mt-3 mb-5">
        <div class="card shadow border-0 p-3 rounded-3">
            <div class="card-header bg-white p-0 m-0">
                <h5 class="text-start ps-3 mt-2 pb-1 heading">
                    @lang('gen.recent_transactions')
                </h5>
            </div>
            <div class="card-body p-0 m-0 mt-2">
                <div class="table-responsive text-center">
                    <table class="table text-start">
                        <thead>
                            <tr>
                                <th class="text-secondary">@lang('gen.transaction#')</th>
                                <th class="text-secondary">@lang('gen.date')</th>
                                <th class="text-secondary">@lang('gen.customer_name')</th>
                                <th class="text-secondary">@lang('gen.payment_method')</th>
                                <th class="text-secondary">@lang('gen.amount')</th>
                                <th class="text-secondary">@lang('gen.payment_status')</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recentTransactions as $transaction)
                                <tr>
                                    <td class="align-middle">
                                        {{ $transaction->transaction_id ?? '' }}
                                    </td>
                                    <td class="align-middle">{{ $transaction->created_at ?? '' }}</td>
                                    <td class="align-middle">{{ $transaction->order?->user?->name ?? '' }}</td>
                                    <td class="align-middle">{{ $transaction->payment_method ?? '' }}</td>
                                    <td class="align-middle">${{ $transaction?->amount ?? '' }}</td>
                                    <td class="align-middle ms-2">
                                        @if ($transaction->payment_status == 'paid')
                                            <span class="badge bg-success">Paid</span>
                                        @else
                                            <span class="badge bg-danger">
                                                {{ $transaction->payment_status ?? '' }}
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <style>
        #barChart {
            height: 311px;
        }
    </style>
@endpush

@push('scripts')
    {{-- BarCharts --}}
    <script>
        var ctx = document.getElementById("barChart").getContext("2d");
        var myChart = new Chart(ctx, {
            type: "bar",
            data: {
                labels: {!! json_encode($months) !!},
                datasets: [{
                    label: "Sales",
                    data: {!! json_encode($sales) !!},
                    backgroundColor: "rgba(98, 95, 237, 1)"
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                },
                responsive: true,
                maintainAspectRatio: false,
            }
        });
    </script>
@endpush
