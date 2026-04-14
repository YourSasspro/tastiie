@extends('admin.layouts.app')

@section('pageTitle', trans('gen.orders'))

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.all', ['attribute' => trans('gen.orders')])" />
            <x-admin.breadcrumb :currentPage="__('gen.orders')" />
        </x-admin.container-header>

        <x-admin.container-body>

            <div class="card-header border-0 bg-white">
                <div class="row my-3">
                    <div class="col-md-6 mb-2">
                        {{-- <div class="input-search position-relative">
                            <x-buttons.add :route="route('users.create')" :title="__('gen.create', ['attribute' => __('gen.user')])" />
                        </div> --}}
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table text-center" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-secondary">@lang('gen.order_id')</th>
                            <th class="text-secondary">@lang('gen.order_date')</th>
                            <th class="text-secondary">@lang('gen.total')</th>
                            <th class="text-secondary">@lang('gen.payment_status')</th>
                            {{-- <th>@lang('gen.payment_method')</th> --}}
                            <th class="text-secondary">@lang('gen.status')</th>
                            <th class="text-secondary">@lang('gen.details')</th>
                            <th class="text-secondary">@lang('gen.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($orders as $order)
                            <tr>
                                <td class="align-middle fw-bold text-center" data-order="{{$order->id }}">
                                    <a href="{{route('admin.orders.show',['order' => $order->id])}}" class="text-dark">
                                        {{ $order->order_number ?? '' }}
                                    </a>
                                </td>
                                <td class="align-middle">{{ $order->created_at ?? '' }}</td>
                                
                                <td class="align-middle">
                                    ${{ $order->total_amount ?? '' }}</td>
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
                                    <a href="{{route('admin.orders.show',['order' => $order->id])}}" class="btn btn-dark btn-sm">
                                        @lang('gen.details')
                                    </a>
                                </td>
                                <td class="align-middle text-start">
                                    <div>
                                        <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-v"></i>
                                        </a>

                                        <div class="dropdown-menu p-2 ps-0" aria-genledby="dropdownMenuLink">
                                            {{-- <a class="dropdown-item" href="{{ route('admin.orders.edit', $order->id) }}">
                                                @lang('gen.edit')
                                            </a> --}}
                                            {{-- <a class="dropdown-item" href="#">
                                                <x-buttons.del :route="route('admin.orders.destroy', $order->id)" />
                                            </a> --}}
                                            <a class="dropdown-item order_status" style="cursor: pointer" data-order-id="{{ $order->id }}" data-order-status="{{ $order->status }}">
                                                @lang('gen.change_status')
                                            </a>
                                            <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                                method="POST" id="delete-form-{{ $order->id }}">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                            <a href="javascript:void(0)" class="dropdown-item"
                                                                        onclick="swal({
                                                title: 'Are you sure?',
                                                text: 'This action cannot be undone!',
                                                icon: 'warning',
                                                buttons: true,
                                                dangerMode: true,
                                                }).then((willDelete) => {
                                                if (willDelete) {
                                                    document.getElementById('delete-form-{{ $order->id }}').submit();
                                                }});">
                                                @lang('gen.delete')
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </x-admin.container-body>
    </x-admin.container>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">@lang('gen.change_order_status')</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" method="POST" class="my-3">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <select name="status" id="status" class="form-select">
                                <option value="pending">@lang('gen.pending')</option>
                                <option value="processing">@lang('gen.processing')</option>
                                <option value="completed">@lang('gen.completed')</option>
                                <option value="cancelled">@lang('gen.cancelled')</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('gen.close')</button>
                        <button type="submit" class="btn btn-primary">@lang('gen.save_changes')</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        // new DataTable('#dataTable');
        new DataTable('#dataTable', {
            order: [[0, 'desc']] // 1 = order_date column
        });
    </script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>
    $('.order_status').click(function() {
        let id = $(this).data('order-id');
        let status = $(this).data('order-status');
        $('#status').val(status);
        let url = "{{ route('admin.orders.update.status', ':id') }}";
        url = url.replace(':id', id);
        $('form').attr('action', url);

        $('#exampleModal').modal('show');
    });
</script>
@endpush
