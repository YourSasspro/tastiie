@extends('admin.layouts.app')

@section('pageTitle', trans('gen.users'))

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.all', ['attribute' => trans('gen.users')])" />
            <x-admin.breadcrumb :currentPage="__('gen.users')" />
        </x-admin.container-header>

        <x-admin.container-body>

            <div class="card-header border-0 bg-white">
                <div class="row my-3">
                    <div class="col-md-6 mb-2">
                        <div class="input-search position-relative">
                            <x-buttons.add :route="route('users.create')" :title="__('gen.create', ['attribute' => __('gen.user')])" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table text-center" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-secondary">@lang('gen.image')</th>
                            <th class="text-secondary">@lang('gen.first_name')</th>
                            <th class="text-secondary">@lang('gen.last_name')</th>
                            <th class="text-secondary">@lang('gen.email')</th>
                            <th class="text-secondary">@lang('gen.account_verification')</th>
                            <th class="text-secondary">@lang('gen.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td class="align-middle text-start">
                                    <x-misc.img src="{{ $user->image }}" style="width: 4em;" />
                                </td>
                                <td class="align-middle text-start">{{ $user->first_name ?? '' }}</td>
                                <td class="align-middle text-start">{{ $user->last_name ?? '' }}</td>
                                <td class="align-middle text-start">{{ $user->email ?? '' }}</td>
                                <td class="align-middle text-start">
                                    @if ($user->email_verified_at)
                                        <span class="badge bg-success">@lang('gen.verified')</span>
                                    @else
                                        <span class="badge bg-danger">@lang('gen.not_verified')</span>
                                    @endif
                                </td>
                                <td class="align-middle text-start">
                                    <div>
                                        <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-v"></i>
                                        </a>

                                        <div class="dropdown-menu p-2 ps-0" aria-genledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('users.edit', $user->id) }}">
                                                @lang('gen.edit')
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <x-buttons.del :route="route('users.destroy', $user->id)" />
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
@endsection

@push('scripts')
    <script>
        new DataTable('#dataTable');
    </script>
@endpush
