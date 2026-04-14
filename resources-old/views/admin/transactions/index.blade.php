@extends('admin.layouts.app')

@section('pageTitle', trans('gen.transactions'))

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.all', ['attribute' => trans('gen.transactions')])" />
            <x-admin.breadcrumb :currentPage="__('gen.transactions')" />
        </x-admin.container-header>

        <x-admin.container-body>

            <div class="card-header border-0 bg-white">
                <div class="row my-3">
                    <div class="col-md-6 mb-2">
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover text-center" id="dataTable">
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
                        @foreach ($transactions as $transaction)
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
        </x-admin.container-body>
    </x-admin.container>



@endsection

@push('scripts')
    <script>
        new DataTable('#dataTable');
    </script>


@endpush
