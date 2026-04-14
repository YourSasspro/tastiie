@extends('admin.layouts.app')

@section('title', trans('gen.become_a_leader'))

@push('styles')
    <style>
        .nav-tabs .nav-link {
            border: none;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
        }

        .nav-tabs .nav-link.active {
            border-bottom: 3px solid #007bff !important;
            /* Change to desired active color */
            color: #007bff !important;
            background-color: white !important;
        }

        .nav-tabs .nav-link:hover {
            color: #0056b3;
            /* Change to desired hover color */
        }

        .tab-content {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
        }
    </style>
@endpush

@php
    $extraData = isset($becomeALeader?->extra_data) ? json_decode($becomeALeader?->extra_data) : null;
@endphp

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.edit_with_name', ['attribute' => trans('gen.become_a_leader')])" />
            <x-admin.breadcrumb :currentPage="__('gen.edit', ['attribute' => trans('gen.become_a_leader')])" />
        </x-admin.container-header>

        <x-admin.container-body class="p-4">



            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">@lang('gen.become_a_leader')</a>
                </li>
            </ul>

            <x-alerts.validation-alert/>

            <div class="tab-content mt-3" id="myTabContent">

                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <x-forms.form :action="route('cms.become-a-leader.update')" method="PUT">

                        <div class="col-md-12 mb-3">
                            <x-forms.form-label for="title">
                                @lang('gen.title') <span class="text-danger">*</span>
                            </x-forms.form-label>
                            <x-forms.form-input type="text" name="title"
                                id="title" :value="old('title',  $becomeALeader?->title  ?? '')" />
                            <x-forms.input-error :messages="$errors->get('title')" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <x-forms.form-label for="description">
                                @lang('gen.description') <span class="text-danger">*</span>
                            </x-forms.form-label>
                            <x-forms.form-input type="text" name="description"
                                id="description" :value="old('description',  $becomeALeader?->description  ?? '')" />
                            <x-forms.input-error :messages="$errors->get('description')" />
                        </div>

                        <small class="fw-bold text-secondary">@lang('gen.services')</small>
                        <div class="row mt-3">
                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="services_0_title">
                                    @lang('gen.title') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="text" name="services[0][title]"
                                    id="services_0_title" :value="old('title', isset($extraData->services[0]->title)?$extraData->services[0]->title:'' ?? '')" />
                                <x-forms.input-error :messages="$errors->get('services[0][title]')" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-forms.form-label for="services_0_icon">
                                    @lang('gen.select_with_name',['attribute' => trans('gen.icon')])<span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="file" name="services[0][icon]" id="hero_image" onchange="previewImage(event, 'imagePreview1')" />
                                <x-forms.input-error :messages="$errors->get('hero_image')" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-misc.img 
                                :src="asset('storage/' . (!empty($extraData->services) && isset($extraData->services[0]->icon) ? $extraData->services[0]->icon : 'default.png'))" 
                                width="150" 
                                id="imagePreview1"/>
                            </div>
                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="services_0_desc">
                                    @lang('gen.description') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="text" name="services[0][desc]"
                                    id="services_0_desc" :value="old('title',  $extraData->services[0]->desc  ?? '')" />
                                <x-forms.input-error :messages="$errors->get('services[0][desc]')" />
                            </div>
                            <hr>
                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="services_0_title">
                                    @lang('gen.title') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="text" name="services[1][title]"
                                    id="services_0_title" :value="old('title',  $extraData->services[1]->title  ?? '')" />
                                <x-forms.input-error :messages="$errors->get('services[1][title]')" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-forms.form-label for="services_0_icon">
                                    @lang('gen.select_with_name',['attribute' => trans('gen.icon')])<span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="file" name="services[1][icon]" id="hero_image" onchange="previewImage(event, 'imagePreview2')" />
                                <x-forms.input-error :messages="$errors->get('services[1][icon]')" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-misc.img 
                                    :src="asset('storage/' . (!empty($extraData->services) && isset($extraData->services[1]->icon) ? $extraData->services[1]->icon : 'default.png'))" 
                                    width="150" 
                                    id="imagePreview2"/>
                            </div>
                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="services_0_desc">
                                    @lang('gen.description') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="text" name="services[1][desc]"
                                    id="services_0_desc" :value="old('title',  $extraData->services[1]->desc  ?? '')" />
                                <x-forms.input-error :messages="$errors->get('services[1][desc]')" />
                            </div>
                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="services_0_title">
                                    @lang('gen.title') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="text" name="services[2][title]"
                                    id="services_0_title" :value="old('title',  $extraData->services[2]->title ?? '')" />
                                <x-forms.input-error :messages="$errors->get('services[2][title]')" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-forms.form-label for="services_0_icon">
                                    @lang('gen.select_with_name',['attribute' => trans('gen.icon')])<span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="file" name="services[2][icon]" id="hero_image" onchange="previewImage(event, 'imagePreview3')" />
                                <x-forms.input-error :messages="$errors->get('services[2][icon]')" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-misc.img 
                                :src="asset('storage/' . (!empty($extraData->services) && isset($extraData->services[2]->icon) ? $extraData->services[2]->icon : 'default.png'))" 
                                width="150" 
                                id="imagePreview3"/>
                            </div>
                            <div class="col-md-12 mb-3">
                                <x-forms.form-label for="services_0_desc">
                                    @lang('gen.description') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="text" name="services[2][desc]"
                                    id="services_0_desc" :value="old('title',  $extraData->services[2]->desc ?? '')" />
                                <x-forms.input-error :messages="$errors->get('services[2][desc]')" />
                            </div>
                            <hr>
                            <small class="fw-bold text-secondary mt-3 mb-3">@lang('gen.section_with_name',['attribute'=> '2'])</small>
                            <div class="col-md-12 mb-3 ">
                                <x-forms.form-label for="section_2_title">
                                    @lang('gen.title') <span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="text" name="section_2_title"
                                    id="section_2_title" :value="old('section_2_title', $extraData?->section_2_title ?? '')" />
                                <x-forms.input-error :messages="$errors->get('section_2_title')" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-forms.form-label for="section_2_image">
                                    @lang('gen.select_with_name',['attribute' => trans('gen.icon')])<span class="text-danger">*</span>
                                </x-forms.form-label>
                                <x-forms.form-input type="file" name="section_2_image" id="section_2_image" onchange="previewImage(event, 'imagePreview2')" />
                                <x-forms.input-error :messages="$errors->get('section_2_image')" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <x-misc.img :src="asset('storage/'.$extraData?->section_2_image)" width="150" id="imagePreview2"/>
                            </div>
                            <hr>
                            <small class="fw-bold text-secondary mt-3 mb-3">@lang('gen.section_with_name',['attribute'=> '3'])</small>
                            <div class="d-flex justify-content-between mb-3">
                                <small class="fw-bold">@lang('gen.clients')</small>
                                <div class="">
                                    <button type="button" class="btn btn-primary btn-sm" id="add-client">
                                        @lang('gen.add_with_name', ['attribute' => trans('gen.clients')])
                                    </button>
                                </div>
                            </div>

                            <div id="clients-container">
                                @if (isset($extraData->clients))
                                    @foreach ($extraData->clients as $key => $client)
                                        <div class="row client-row mb-3">
                                            <div class="col-md-12 mb-2">
                                                <x-forms.form-label
                                                    for="client_icon{{ $key + 1 }}">@lang('gen.image')
                                                    <span class="text-danger">*</span>
                                                    <x-misc.img :src="asset('storage/' . $client->image)" width="50" />
                                                </x-forms.form-label>
                                                <x-forms.form-input type="file" name="clients[{{ $key }}][image]"
                                                    id="service_image_{{ $key + 1 }}" />
                                                <input type="hidden" name="clients[{{ $key }}][old_image]" value="{{ $client?->image }}">
                                            </div>
                                            <div class="col-md-12 mb-2">
                                                <button type="button"
                                                    class="btn btn-danger remove-client btn-sm">Remove</button>
                                            </div>
                                        </div>
                                        <hr>
                                    @endforeach
                                @else
                                    <div class="row client-row mb-3">
                                        <div class="col-md-12 mb-2">
                                            <x-forms.form-label for="client_image_1">@lang('gen.image') <span
                                                    class="text-danger">*</span></x-forms.form-label>
                                            <x-forms.form-input type="file" name="clients[0][image]" id="client_image_1" required />
                                        </div>

                                        <div class="col-md-12 mb-2">
                                            <button type="button" class="btn btn-danger btn-sm remove-client">Remove</button>
                                        </div>
                                    </div>
                                    <hr>
                                @endif
                            </div>

                            <div class="col-md-6 mb-2">
                                <x-buttons.submit :title="__('gen.update')" />
                            </div>
                        </div>
                    </x-forms.form>
                </div>
            </div>

        </x-admin.container-body>
    </x-admin.container>
@endsection
@push('scripts')


<script>
    document.addEventListener("DOMContentLoaded", function() {
        const servicesContainer = document.getElementById('clients-container');

        // Function to attach the remove event to a service row
        function attachRemoveEvent(button) {
            button.addEventListener('click', function() {
                const serviceRow = this.closest('.client-row');
                servicesContainer.removeChild(serviceRow);
            });
        }

        // Attach remove event to existing service rows
        const existingRemoveButtons = servicesContainer.querySelectorAll('.remove-client');
        existingRemoveButtons.forEach(button => {
            attachRemoveEvent(button);
        });

        // Add new service row
        document.getElementById('add-client').addEventListener('click', function() {
            const serviceCount = servicesContainer.getElementsByClassName('client-row').length;

            // Create a new service row
            const newServiceRow = document.createElement('div');
            newServiceRow.className = 'row client-row mb-3';


            newServiceRow.innerHTML = `
                <div class="col-md-12 mb-2">
                    <x-forms.form-label for="service_image_${serviceCount + 1}">@lang('gen.image') <span class="text-danger">*</span></x-forms.form-label>
                    <x-forms.form-input type="file" name="clients[${serviceCount}][image]" id="service_image_${serviceCount + 1}" required/>
                </div>
                <div class="col-md-12 mb-2">
                    <button type="button" class="btn btn-danger btn-sm remove-client">Remove</button>
                </div>
                <hr>
            `;

            // Append the new row
            servicesContainer.appendChild(newServiceRow);

            // Attach the remove event to the new row's remove button
            attachRemoveEvent(newServiceRow.querySelector('.remove-client'));
        });



    });
</script>


@endpush
