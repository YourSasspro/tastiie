@extends('admin.layouts.app')

@section('pageTitle', trans('gen.blog_category'))

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.all', ['attribute' => trans('gen.blog_category')])" />
            <x-admin.breadcrumb :currentPage="__('gen.blog_category')" />
        </x-admin.container-header>

        <x-admin.container-body>

            <div class="card-header border-0 bg-white">
                <div class="row my-3">
                    <div class="col-md-6 mb-2">
                        <div class="input-search position-relative">
                            <x-buttons.add :route="route('admin.blog-categories.create')" :title="__('gen.create', ['attribute' => __('gen.blog_category')])" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table text-center" id="dataTable">
                    <thead>
                        <tr>
                            <th class="text-secondary">#</th>
                            <th class="text-secondary">@lang('gen.name')</th>
                            <th class="text-secondary">@lang('gen.slug')</th>
                            <th class="text-secondary">@lang('gen.actions')</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($categories as $category)
                            <tr>
                                <td class="align-middle text-start">{{ $loop->iteration }}</td>
                                <td class="align-middle text-start">{{ $category->name ?? '' }}</td>
                                <td class="align-middle text-start">{{ $category->slug ?? '' }}</td>
                                <td class="align-middle text-start">
                                    <div>
                                        <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                            id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fa-solid fa-ellipsis-v"></i>
                                        </a>

                                        <div class="dropdown-menu p-2 ps-0" aria-genledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="{{ route('admin.blog-categories.edit', $category->id) }}">
                                                @lang('gen.edit')
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <x-buttons.del :route="route('admin.blog-categories.destroy', $category->id)" />
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
