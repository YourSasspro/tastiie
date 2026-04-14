@extends('admin.layouts.app')

@section('pageTitle', trans('gen.settings'))

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.social_links_settings')" />
            <x-admin.breadcrumb :currentPage="__('gen.social_links_settings')" />
        </x-admin.container-header>

        <x-admin.container-body class="p-4">


            {{-- Setting Form --}}
            <x-forms.form :action="route('setting.social.update')">
                <input type="hidden" name="key" value="settings_social_links" />
                <div class="row">
                    {{-- Platform --}}
                    <div class="col-md-12 mb-3">
                        <x-forms.form-select name="platform" :selectTitle="__('gen.select_with_name', ['attribute' => trans('gen.platform_name')])" :hasData="true">
                            @foreach ($platForms as $platform)
                                <option value="{{ $platform['name'] }}" @selected($platform['name'] == old('platform'))>
                                    <span>{{ $platform['name'] }}</span>
                                </option>
                            @endforeach
                        </x-forms.form-select>
                        <x-forms.input-error :messages="$errors->get('platform')" />
                    </div>

                    {{-- Platform Link --}}
                    <div class="col-md-12 mb-3">
                        <x-forms.form-input type="text" name="link" id="link" :value="old('link')"
                            placeholder="{{ __('gen.platform_link') }}" />
                        <x-forms.input-error :messages="$errors->get('link')" />
                    </div>

                    {{-- Submit Button --}}
                    <div class="col-md-2 mb-2">
                        <x-buttons.submit :title="__('gen.save')" />
                    </div>
                </div>
            </x-forms.form>

            {{-- Social Links Table --}}
            <div class="table-responsive mt-4">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>@lang('gen.platform_name')</th>
                            <th>@lang('gen.platform_link')</th>
                            <th>@lang('gen.actions')</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($settingSocialLinks as $socialLink)
                            <tr>
                                <td>
                                    <a href="{{ $socialLink['link'] }}" target="_blank">
                                        {{ $socialLink['platform'] }}
                                    </a>
                                </td>
                                <td>{{ $socialLink['link'] }}</td>
                                <td>
                                    <x-forms.form :action="route('setting.social.delete', $socialLink['id'])" method="DELETE">
                                        <x-buttons.submit :title="__('gen.delete')" onclick="return confirm('@lang('gen.are_you_sure_delete')')"
                                            class="btn btn-sm btn-danger" icon="ti ti-trash"
                                            style="display: inline-block" />
                                    </x-forms.form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center">
                                    @lang('gen.no_result_found')
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>


        </x-admin.container-body>
    </x-admin.container>
@endsection
