@extends('admin.layouts.app')

@section('title', trans('gen.faqs'))

@section('content')
    <x-admin.container>
        <x-admin.container-header>
            <x-admin.module-title :title="__('gen.edit_with_name', ['attribute' => trans('gen.faqs')])" />
            <x-admin.breadcrumb :currentPage="__('gen.edit', ['attribute' => trans('gen.faqs')])" />
        </x-admin.container-header>

        <x-admin.container-body class="p-4">
            <x-forms.form :action="route('cms.faqs.update', $faq->id)" method="PUT">
                <x-alerts.validation-alert />
                <div class="row">
                    {{-- Question --}}
                    <div class="col-md-12 mb-3">
                        <x-forms.form-label for="question">
                            @lang('gen.question') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-input type="text" name="question" id="question" :value="old('question',$faq->question)" />
                        <x-forms.input-error :messages="$errors->get('question')" />
                    </div>

                    {{-- Answer --}}
                    <div class="col-md-12 mb-3">
                        <x-forms.form-label for="answer">
                            @lang('gen.answer') <span class="text-danger">*</span>
                        </x-forms.form-label>
                        <x-forms.form-textarea name="answer" id="answer" class="editor"
                            :value="old('answer',$faq->answer)" />
                        <x-forms.input-error :messages="$errors->get('answer')" />
                    </div>

                </div>

                <div class="col-md-6 mb-2">
                    <x-buttons.submit :title="__('gen.update', ['attribute' => trans('gen.faqs')])" />
                </div>
            </x-forms.form>
        </x-admin.container-body>
    </x-admin.container>
@endsection


@push('styles')
    <style>
        .ck-editor__editable[role="textbox"] {
            min-height: 200px;
        }
    </style>
@endpush

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            ClassicEditor
                .create(document.querySelector('#answer'))
                .catch(error => {
                    console.error(error);
                });
        });
    </script>
@endpush
