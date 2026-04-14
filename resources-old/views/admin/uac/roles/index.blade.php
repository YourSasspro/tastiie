@extends('admin.layouts.app')

@section('pageTitle', trans('gen.roles'))

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.all', ['attribute' => trans('gen.roles')])" />
            <x-admin.breadcrumb :currentPage="__('gen.roles')" />
        </x-admin.container-header>

        <x-admin.container-body>

            <div class="card-header border-0 bg-white">
                <div class="row my-3">
                    <div class="col-md-6 mb-2">
                        <div class="input-search position-relative">
                            <x-buttons.add :route="route('roles.create')" :title="__('gen.create', ['attribute' => __('gen.role')])" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table text-center" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-secondary align-middle text-start">@lang('gen.index')</th>
                            <th class="text-secondary align-middle text-start">@lang('gen.name')</th>
                            <th class="text-secondary align-middle text-start">@lang('gen.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td class="align-middle text-start">{{ $loop->iteration ?? '' }}</td>
                                <td class="align-middle text-start">{{ $role->name ?? '' }}</td>
                                <td class="align-middle text-start">
                                    <div>
                                        <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-v"></i>
                                        </a>

                                        <div class="dropdown-menu p-2 ps-0" aria-genledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('roles.edit', $role->id) }}">
                                                @lang('gen.edit')
                                            </a>
                                            @if ($role->name !== 'Super Admin')
                                                <a class="dropdown-item" href="#">
                                                    <x-buttons.del :route="route('roles.destroy', $role->id)" />
                                                </a>
                                            @endif
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
@endsection

@push('scripts')
    <script>
        new DataTable('#dataTable');
    </script>
@endpush
