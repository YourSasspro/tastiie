@extends('admin.layouts.app')

@section('pageTitle', trans('gen.blogs'))

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.all', ['attribute' => trans('gen.blogs')])" />
            <x-admin.breadcrumb :currentPage="__('gen.blogs')" />
        </x-admin.container-header>

        <x-admin.container-body>

            <div class="card-header border-0 bg-white">
                <div class="row my-3">
                    <div class="col-md-6 mb-2">
                        <div class="d-flex">
                            <x-buttons.add :route="route('admin.blogs.create')" icon="fas fa-plus-circle" :title="__('gen.create', ['attribute' => trans('gen.blog')])" />
                            <x-buttons.add :route="route('admin.blog-categories.index')" :title="__('gen.list_with_name', ['attribute' => trans('gen.blog_category')])" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table text-center" id="dataTable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>@lang('gen.image')</th>
                            <th>@lang('gen.title')</th>
                            <th>@lang('gen.category')</th>
                            <th>@lang('gen.actions')></th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($blogs as $blog)
                        <tr>
                            <td class="align-middle text-start">{{ $loop->iteration }}</td>
                            <td class="align-middle text-start">
                                @if ($blog->images)
                                    <x-misc.img src="{{ asset('storage/'.json_decode($blog->images,true)[0]) }}" style="width: 4em;" />
                                @endif
                            </td>
                            <td class="align-middle text-start">{{ $blog->title ?? '' }}</td>
                            <td class="align-middle text-start">{{ $blog->category?->name ?? '' }}</td>
                            <td class="align-middle text-start">
                                <div>
                                    <a class="btn btn-secondary bg-transparent border-0 text-dark" role="button"
                                        id="dropdownMenuLink" data-bs-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis-v"></i>
                                    </a>

                                    <div class="dropdown-menu p-2 ps-0" aria-genledby="dropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('admin.blogs.edit', $blog->id) }}">
                                            @lang('gen.edit')
                                        </a>
                                        <a class="dropdown-item" href="#">
                                            <x-buttons.del :route="route('admin.blogs.destroy', $blog->id)" />
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
