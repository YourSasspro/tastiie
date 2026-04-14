@extends('admin.layouts.app')

@section('pageTitle', trans('gen.subscribers'))

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.subscribers')" />
            <x-admin.breadcrumb :currentPage="__('gen.subscribers')" />
        </x-admin.container-header>

        <x-admin.container-body class="p-4">
            <div class="table-responsive px-2">
                <table class="table table-striped" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-secondary align-middle text-start">@lang('gen.index')</th>
                            <th class="text-secondary align-middle text-start">@lang('gen.name')</th>
                            <th class="text-secondary align-middle text-start">@lang('gen.email')</th>
                            <th class="text-secondary align-middle text-start">@lang('gen.subscribe')</th>
                            <th class="text-secondary align-middle text-start">@lang('gen.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($emails as $data)
                            <tr>
                                <td class="align-middle text-start">{{ $loop->iteration }}</td>
                                <td class="align-middle text-start">{{ $data->name ?? '-' }}</td>
                                <td class="align-middle text-start">{{ $data->email ?? '-' }}</td>
                                <td class="align-middle text-start">{{ $data->is_subscribed ? 'Active' : 'Un subscribed' }}
                                </td>
                                <td class="align-middle text-start">
                                    <form action="{{ route('remove.sub.email', $data) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('@lang('gen.are_you_sure_delete')')">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        @endforelse
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
