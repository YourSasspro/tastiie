@extends('admin.layouts.app')

@section('title', trans('gen.landing_page_full'))

@section('content')

    @php
        $servicesExtraData = isset($landingPageSection->extra_data) ? json_decode($landingPageSection->extra_data) : null;
    @endphp

    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.edit_with_name', ['attribute' => trans('gen.landing_page_full')])" />
            <x-admin.breadcrumb :currentPage="__('gen.edit', ['attribute' => trans('gen.landing_page_full')])" />
        </x-admin.container-header>

        <x-admin.container-body class="p-4">
            <x-forms.form :action="route('cms.landing-page.update')" method="PUT">

                <x-alerts.alert :message="session('success')"/>
                <x-alerts.validation-alert />

                <div class="row">
                    {{-- First Name --}}
                    <div class="d-flex justify-content-between">
                        <small class="fw-bold">@lang('gen.carousels')</small>
                        <div class="">
                            <button type="button" class="btn btn-primary btn-sm" id="add-service">
                                @lang('gen.add_with_name', ['attribute' => trans('gen.carousel')])
                            </button>
                        </div>
                    </div>

                    <div id="services-container">
                        @if (isset($servicesExtraData->services))
                            @foreach ($servicesExtraData->services as $key => $service)
                                <div class="row service-row mb-3">
                                    <div class="col-md-6 mb-2">
                                        <x-forms.form-label
                                            for="service_icon_{{ $key + 1 }}">@lang('gen.image')
                                            <span class="text-danger">*</span>
                                            <x-misc.img :src="asset('storage/' . $service->image)" width="45" />
                                        </x-forms.form-label>
                                        <x-forms.form-input type="file" name="services[{{ $key }}][image]"
                                            id="service_image_{{ $key + 1 }}" />
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <x-forms.form-label
                                            for="service_title_{{ $key + 1 }}">@lang('gen.title') <span
                                                class="text-danger">*</span>
                                        </x-forms.form-label>
                                        <x-forms.form-input type="text"
                                            name="services[{{ $key }}][title]"
                                            id="service_title_{{ $key + 1 }}" :value="old('service_title.' . $key, $service->title ?? '')" />
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <x-forms.form-label for="service_description_{{ $key + 1 }}">@lang('gen.description')
                                            <span class="text-danger">*</span></x-forms.form-label>
                                        <x-forms.form-input type="text"
                                            name="services[{{ $key }}][description]"
                                            id="service_description_{{ $key + 1 }}" :value="old(
                                                'service_description.' . $key,
                                                $service->description ?? '',
                                            )" />
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <x-forms.form-label
                                            for="service_subdescription_{{ $key + 1 }}">@lang('gen.sub_description') <span
                                                class="text-danger">*</span></x-forms.form-label>
                                        <x-forms.form-input type="text"
                                            name="services[{{ $key }}][sub_description]"
                                            id="service_sub_description_{{ $key + 1 }}" :value="old(
                                                'service_sub_description.' . $key, $service->sub_description ?? '',
                                            )" />
                                    </div>
                                    <div class="col-md-6 mb-2">
                                        <button type="button"
                                            class="btn btn-danger remove-service">Remove</button>
                                    </div>
                                </div>
                                <hr>
                            @endforeach
                        @else
                            <div class="row service-row mb-3">
                                <div class="col-md-6 mb-2">
                                    <x-forms.form-label for="service_image_1">@lang('gen.image') <span
                                            class="text-danger">*</span></x-forms.form-label>
                                    <x-forms.form-input type="file" name="services[0][image]" id="service_image_1" required />
                                </div>
                                <div class="col-md-6 mb-2">
                                    <x-forms.form-label for="service_title_1">@lang('gen.title') <span
                                            class="text-danger">*</span></x-forms.form-label>
                                    <x-forms.form-input type="text" name="services[0][title]" id="service_title_1" required />
                                </div>
                                <div class="col-md-6 mb-2">
                                    <x-forms.form-label for="service_description_1">@lang('gen.description') <span
                                            class="text-danger">*</span></x-forms.form-label>
                                    <x-forms.form-input type="text" name="services[0][description]"
                                        id="service_description_1" required />
                                </div>
                                <div class="col-md-6 mb-2">
                                    <x-forms.form-label for="service_subdescription_1">@lang('gen.sub_description') <span
                                            class="text-danger">*</span></x-forms.form-label>
                                    <x-forms.form-input type="text" name="services[0][sub_description]"
                                        id="service_sub_description_1" required/>
                                </div>
                                <div class="col-md-6 mb-2">
                                    <button type="button" class="btn btn-danger btn-sm remove-service">Remove</button>
                                </div>
                            </div>
                            <hr>
                        @endif
                    </div>

                </div>

                <div class="col-md-6 mb-2 mt-3">
                    <x-buttons.submit :title="__('gen.update', ['attribute' => trans('gen.landing_page_full')])" />
                </div>
            </x-forms.form>
        </x-admin.container-body>
    </x-admin.container>
@endsection
@push('scripts')


    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const servicesContainer = document.getElementById('services-container');

            // Function to attach the remove event to a service row
            function attachRemoveEvent(button) {
                button.addEventListener('click', function() {
                    const serviceRow = this.closest('.service-row');
                    servicesContainer.removeChild(serviceRow);
                });
            }

            // Attach remove event to existing service rows
            const existingRemoveButtons = servicesContainer.querySelectorAll('.remove-service');
            existingRemoveButtons.forEach(button => {
                attachRemoveEvent(button);
            });

            // Add new service row
            document.getElementById('add-service').addEventListener('click', function() {
                const serviceCount = servicesContainer.getElementsByClassName('service-row').length;

                // Create a new service row
                const newServiceRow = document.createElement('div');
                newServiceRow.className = 'row service-row mb-3';


                newServiceRow.innerHTML = `
                    <div class="col-md-6 mb-2">
                        <x-forms.form-label for="service_image_${serviceCount + 1}">@lang('gen.image') <span class="text-danger">*</span></x-forms.form-label>
                        <x-forms.form-input type="file" name="services[${serviceCount}][image]" id="service_image_${serviceCount + 1}" required/>
                    </div>
                    <div class="col-md-6 mb-2">
                        <x-forms.form-label for="service_title_${serviceCount + 1}">@lang('gen.title') <span class="text-danger">*</span></x-forms.form-label>
                        <x-forms.form-input type="text" name="services[${serviceCount}][title]" id="service_title_${serviceCount + 1}" required/>
                    </div>
                    <div class="col-md-6 mb-2">
                        <x-forms.form-label for="service_description_${serviceCount + 1}">@lang('gen.description') <span class="text-danger">*</span></x-forms.form-label>
                        <x-forms.form-input type="text" name="services[${serviceCount}][description]" id="service_description_${serviceCount + 1}" required/>
                    </div>
                    <div class="col-md-6 mb-2">
                        <x-forms.form-label for="service_subdescription_${serviceCount + 1}">@lang('gen.sub_description') <span class="text-danger">*</span></x-forms.form-label>
                        <x-forms.form-input type="text" name="services[${serviceCount}][sub_description]" id="service_sub_description_${serviceCount + 1}" required/>
                    </div>
                    <div class="col-md-6 mb-2">
                        <button type="button" class="btn btn-danger btn-sm remove-service">Remove</button>
                    </div>
                    <hr>
                `;

                // Append the new row
                servicesContainer.appendChild(newServiceRow);

                // Attach the remove event to the new row's remove button
                attachRemoveEvent(newServiceRow.querySelector('.remove-service'));
            });



        });
    </script>

@endpush
