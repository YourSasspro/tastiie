@extends('admin.layouts.app')

@section('title', trans('gen.product'))

@push('styles')
    <!-- jQuery UI CSS & Theme -->
    <link href="https://code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css" rel="stylesheet"/>
    <link href="https://cdn.rawgit.com/dubrox/Multiple-Dates-Picker-for-jQuery-UI/master/jquery-ui.multidatespicker.css" rel="stylesheet"/>

@endpush

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.edit_with_name', ['attribute' => trans('gen.product')])" />
            <x-admin.breadcrumb :currentPage="__('gen.edit', ['attribute' => trans('gen.product')])" />
        </x-admin.container-header>

        <x-admin.container-body class="p-4">
            <x-forms.form :action="route('admin.products.update', $product->id)" method="PUT">
                <div class="row">


                    {{-- Product Name --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="name">
                            @lang('gen.name') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="text" name="name" id="name" :value="old('name',$product->name ?? '')" placeholder="Name" />
                        <x-forms.input-error :messages="$errors->get('name')" />
                    </div>

                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="role">
                            @lang('gen.select_with_name', ['attribute' => trans('gen.category')]) <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-select name="category_id" :selectTitle="__('gen.select_with_name', ['attribute' => trans('gen.category')])" :hasData="!empty($categories)">
                            @forelse ($categories as $id => $category)
                                <option value="{{ $category?->id }}" {{ old('category_id',$product->category_id ?? '') == $category?->id ? 'selected' : '' }}>
                                    {{ $category?->name }}
                                </option>
                            @empty
                                @lang('gen.no_result_found')
                            @endforelse
                        </x-forms.form-select>
                        <x-forms.input-error :messages="$errors->get('category_id')" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="image">
                            @lang('gen.select_with_name',['attribute' => trans('gen.image')])<span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="file" name="image" id="image" onchange="previewImage(event, 'imagePreview1')" />
                        <x-forms.input-error :messages="$errors->get('image')" />
                    </div>
                    <div class="col-md-6 mb-3">
                        <x-misc.img :src="asset('storage/'.$product->image ?? '')" width="150" id="imagePreview1"/>
                    </div>
                    {{-- short description  --}}
                    <div class="col-md-12 mb-3">
                        <x-forms.form-label for="short_description">
                            @lang('gen.short_description')
                        </x-forms.form-label>
                        <x-forms.form-textarea name="short_description" id="short_description" class="editor"
                            :value="old('short_description', $product->short_description)" />
                        <x-forms.input-error :messages="$errors->get('short_description')" />
                    </div>

                    {{-- ingredients --}}
                    <div class="col-md-12 mb-3">
                        <x-forms.form-label for="ingredients">
                            @lang('gen.ingredients') (@lang('gen.comma_separated'))
                        </x-forms.form-label>
                        <x-forms.form-textarea name="ingredients" id="ingredients" class="editor"
                            :value="old('ingredients', $product->ingredients??'')" />
                        <x-forms.input-error :messages="$errors->get('ingredients')" />
                    </div>
                    {{-- allergens --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="allergens">
                            @lang('gen.allergens')
                        </x-forms.form-label>
                        <x-forms.form-textarea name="allergens" id="allergens" class="editor"
                            :value="old('allergens',$product->allergens ??'')" />
                        <x-forms.input-error :messages="$errors->get('allergens')" />
                    </div>
                    {{-- preparation advice  --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="preparation_advice">
                            @lang('gen.preparation_advice') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-textarea name="preparation_advice" id="preparation_advice" class="editor"
                            :value="old('preparation_advice',$product->preparation_advice??'')" />
                        <x-forms.input-error :messages="$errors->get('preparation_advice')" />
                    </div>
                    {{-- weight --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="weight">
                            @lang('gen.weight') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="text" name="weight" id="weight" :value="old('weight',$product->weight ??'')" placeholder="Weight" />
                        <x-forms.input-error :messages="$errors->get('weight')" />
                    </div>
                    {{-- price  --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="price">
                            @lang('gen.price') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="text" name="price" id="price" :value="old('price',$product->price??'')" placeholder="Price" />
                        <x-forms.input-error :messages="$errors->get('price')" />
                    </div>
                    {{-- quantity --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="quantity">
                            @lang('gen.quantity') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="text" name="quantity" id="quantity" :value="old('quantity', $product->quantity ?? '')" placeholder="Quantity" />
                        <x-forms.input-error :messages="$errors->get('quantity')" />
                    </div>
                    {{-- expiry date  --}}
                    <!-- <div class="col-md-6 mb-3">
                        <x-forms.form-label for="expiry_date">
                            @lang('gen.expiry_date') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-textarea name="expiry_date" id="expiry_date" class="editor"
                            :value="old('expiry_date',$product->expiry_date ?? '')" />
                        <x-forms.input-error :messages="$errors->get('expiry_date')" />
                    </div> -->
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="expiry_date">
                            @lang('gen.expiry_date') <span class="text-danger">*</span>
                        </x-forms.form-label>

                        <x-forms.form-input
                            type="date"
                            name="expiry_date"
                            id="expiry_date"
                            class="form-control"
                            :value="old('expiry_date', $product->expiry_date ?? '')"
                        />

                        <x-forms.input-error :messages="$errors->get('expiry_date')" />
                    </div>


                    {{-- Select Availability Days: --}}
                    

                    <!--<div class="col-md-12 mb-3">-->
                    <!--    <x-forms.form-label for="dates">-->
                    <!--        @lang('gen.select_availability_dates') <span class="text-danger">*</span>-->
                    <!--    </x-forms.form-label>-->
                    <!--    <input type="text" id="mdp-demo" class="form-control" name="dates[]" required  />-->

                    <!--    <x-forms.input-error :messages="$errors->get('dates')" />-->
                    <!--</div>-->
                    <!---->
                    <div class="col-md-12 mb-3">
                        <x-forms.form-label>
                            @lang('gen.select_availability_dates')
                        </x-forms.form-label>
                    
                        <div id="availabilities-wrapper">
                            @if(isset($product->availabilities) && count($product->availabilities) > 0)
                                @foreach($product->availabilities as $index => $availability)
                                    <div class="row availability-row mb-2 align-items-end">
                                        <div class="col-md-8">
                                            <x-forms.form-input type="date" name="dates[]" 
                                                                value="{{ $availability->available_date }}" required />
                                        </div>
                                        
                                        <div class="col-md-2">
                                            @if($index == 0)
                                                <button type="button" class="btn btn-success add-availability">+</button>
                                            @else
                                                <button type="button" class="btn btn-danger remove-availability">−</button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="row availability-row mb-2 align-items-end">
                                    <div class="col-md-4">
                                        <x-forms.form-input type="date" name="dates[0]" required />
                                    </div>
                                    
                                    <div class="col-md-2">
                                        <button type="button" class="btn btn-success add-availability">+</button>
                                    </div>
                                </div>
                            @endif
                        </div>
                        <x-forms.input-error :messages="$errors->get('availabilities')" />
                    </div>


                    
                    <!---->

                    {{-- start Time: --}}
                    <div class="col-md-6 mb-3 ">
                        <x-forms.form-label for="start_time">
                            @lang('gen.start_time') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="time" name="start_time" id="start_time" :value="old('start_time', isset($product->availabilities) && count($product->availabilities) > 0 ? $product->availabilities[0]->start_time : '')"
                            required />

                        <x-forms.input-error :messages="$errors->get('start_time')" />
                    </div>


                    {{-- end time  --}}
                    <div class="col-md-6 mb-3">
                        <x-forms.form-label for="end_time">
                            @lang('gen.end_time') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="time" name="end_time" id="end_time" :value="old('end_time', isset($product->availabilities) && count($product->availabilities) > 0 ? $product->availabilities[0]->end_time : '')"
                            required />
                        <x-forms.input-error :messages="$errors->get('end_time')" />
                    </div>
                    <br>
                    <hr>

                    {{-- nutritional_values --}}
                    <div class="col-md-12 mb-3">
                        <div class="d-flex justify-content-between">
                            <h5>
                                @lang('gen.nutritional_values')
                            </h5>
                            <button type="button" class="btn btn-primary" id="addNutritionalValues">
                                @lang('gen.add_with_name',['attribute' => trans('gen.nutritional_values')])
                            </button>
                        </div>
                    </div>
                    <div id="nutritionalValues">
                        @if(isset($product->nutritional_values))
                        @php
                            $nutritional_values = json_decode($product->nutritional_values) ?? [];
                        @endphp
                            @foreach ($nutritional_values as $key => $nutritional_value)
                                <div class="row nutritional-values-row">
                                    <div class="col-md-3 mb-3">
                                        <x-forms.form-input type="text" name="nutritional_values[{{$key}}][name]" id="name" placeholder="Name" value="{{$nutritional_value->name}}" required/>
                                        <x-forms.input-error :messages="$errors->get('nutritional_values.name')" />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <x-forms.form-input type="text" name="nutritional_values[{{$key}}][value]" id="value" placeholder="Value" value="{{$nutritional_value->value}}" required />
                                        <x-forms.input-error :messages="$errors->get('nutritional_values.value')" />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <x-forms.form-input type="text" name="nutritional_values[{{$key}}][unit]" id="unit" placeholder="Unit" value="{{$nutritional_value?->unit}}" required />
                                        <x-forms.input-error :messages="$errors->get('nutritional_values.unit')" />
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <button type="button" class="btn btn-danger removeNutritionalValues" >
                                            @lang('gen.remove')
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <hr>
                    {{-- dietary_preferences --}}
                    <div class="col-md-12 mb-3 mt-4">
                        <div class="d-flex justify-content-between">
                            <h5>
                                @lang('gen.dietary_preferences')
                            </h5>
                            <button type="button" class="btn btn-primary" id="addDietaryPreference">
                                @lang('gen.add_with_name',['attribute' => trans('gen.dietary_preferences')])
                            </button>
                        </div>
                    </div>
                    <div id="dietaryPreferences" class="mb-3">

                        @if (isset($product->dietary_preferences))
                            @php
                                $dietary_preferences = json_decode($product->dietary_preferences) ?? [];
                            @endphp
                            @foreach ($dietary_preferences as $key => $dietary_preference)
                                <div class="row preferences-row">
                                    <div class="col-md-6 mb-3">
                                        <x-forms.form-input type="text" name="dietary_preferences[]" id="dietary_preferences" placeholder="Dietary Preferences" value="{{$dietary_preference}}" required/>
                                        <x-forms.input-error :messages="$errors->get('dietary_preferences')" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <button type="button" class="btn btn-danger removeDietaryPreference" >
                                            @lang('gen.remove')
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>

                </div>

                <div class="col-md-6 mb-2">
                    <x-buttons.submit :title="__('gen.update', ['attribute' => trans('gen.product')])" />
                </div>
            </x-forms.form>
        </x-admin.container-body>
    </x-admin.container>
@endsection



@push('styles')
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 100px;
        }
        #multi_option {
            display: block !important;
            max-width: 100%;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('#short_description'))
                .catch(error => {
                    console.error(error);
                });

                ClassicEditor
                .create(document.querySelector('#ingredients'))
                .catch(error => {
                    console.error(error);
                });
                ClassicEditor
                .create(document.querySelector('#allergens'))
                .catch(error => {
                    console.error(error);
                });
                ClassicEditor
                .create(document.querySelector('#preparation_advice'))
                .catch(error => {
                    console.error(error);
                });
                VirtualSelect.init({
                    ele: '#multi_option'
                });
        });

        // addDietaryPreference

        document.getElementById('addDietaryPreference').addEventListener('click', function() {
            let dietaryPreferences = document.getElementById('dietaryPreferences');
            let dietaryPreference = document.createElement('div');
            dietaryPreference.classList.add('row', 'preferences-row');
            dietaryPreference.innerHTML = `
                <div class="col-md-6 mb-3">
                    <x-forms.form-input type="text" name="dietary_preferences[]" id="dietary_preferences" placeholder="Dietary Preferences" required/>
                    <x-forms.input-error :messages="$errors->get('dietary_preferences')" />
                </div>
                <div class="col-md-6 mb-3">
                    <button type="button" class="btn btn-danger removeDietaryPreference">
                        @lang('gen.remove')
                    </button>
                </div>
            `;
            dietaryPreferences.appendChild(dietaryPreference);
        });

        // removeDietaryPreference

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('removeDietaryPreference')) {
                e.target.closest('.preferences-row').remove();
            }
        });

        // addNutritionalValues

        document.getElementById('addNutritionalValues').addEventListener('click', function() {
            let nutritionalValues = document.getElementById('nutritionalValues');
            let nutritionalCount = nutritionalValues.querySelectorAll('.nutritional-values-row').length;

            let nutritionalValue = document.createElement('div');
            nutritionalValue.classList.add('row', 'nutritional-values-row');
            nutritionalValue.innerHTML = `
                <div class="col-md-3 mb-3">
                    <x-forms.form-input type="text" name="nutritional_values[${nutritionalCount}][name]" id="name" placeholder="Name" required/>
                    <x-forms.input-error :messages="$errors->get('nutritional_values.name')" />
                </div>
                <div class="col-md-3 mb-3">
                    <x-forms.form-input type="text" name="nutritional_values[${nutritionalCount}][value]" id="value" placeholder="Value" required />
                    <x-forms.input-error :messages="$errors->get('nutritional_values.value')" />
                </div>
                <div class="col-md-3 mb-3">
                    <x-forms.form-input type="text" name="nutritional_values[${nutritionalCount}][unit]" id="unit" placeholder="Unit" required />
                    <x-forms.input-error :messages="$errors->get('nutritional_values.unit')" />
                </div>
                <div class="col-md-3 mb-3">
                    <button type="button" class="btn btn-danger removeNutritionalValues" >
                        @lang('gen.remove')
                    </button>
                </div>
            `;
            nutritionalValues.appendChild(nutritionalValue);
        });

        // removeNutritionalValues

        document.addEventListener('click', function(e) {
            if (e.target.classList.contains('removeNutritionalValues')) {
                e.target.closest('.nutritional-values-row').remove();
            }
        });
    </script>

    <!-- jQuery UI Script (Load After jQuery) -->
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

<!-- MultiDatesPicker Plugin -->
<link href="https://cdn.rawgit.com/dubrox/Multiple-Dates-Picker-for-jQuery-UI/master/jquery-ui.multidatespicker.css" rel="stylesheet"/>
<script src="https://cdn.rawgit.com/dubrox/Multiple-Dates-Picker-for-jQuery-UI/master/jquery-ui.multidatespicker.js"></script>

    <script>
        $( document ).ready(function() {
            $('#mdp-demo').multiDatesPicker();
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const wrapper = document.getElementById('availabilities-wrapper');
        
            wrapper.addEventListener('click', function(e) {
                // Add new availability row
                if (e.target.classList.contains('add-availability')) {
                    const row = e.target.closest('.availability-row');
                    const clone = row.cloneNode(true);
        
                    // Clear values in cloned inputs
                    clone.querySelectorAll('input').forEach(input => input.value = '');
        
                    // Change button in cloned row to "remove"
                    const btn = clone.querySelector('button');
                    btn.classList.remove('btn-success', 'add-availability');
                    btn.classList.add('btn-danger', 'remove-availability');
                    btn.textContent = '−';
        
                    wrapper.appendChild(clone);
                }
        
                // Remove row
                if (e.target.classList.contains('remove-availability')) {
                    e.target.closest('.availability-row').remove();
                }
            });
        });


    </script>
@endpush
