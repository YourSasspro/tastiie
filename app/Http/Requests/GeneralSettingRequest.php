<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GeneralSettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'site_name' => 'required|string|max:255',
            'site_description' => 'required|string|max:255',
            'site_address' => 'required|string|max:255',
            'site_email' => 'required|email',
            'site_phone' => 'required|string|max:255',
            'site_copy_right' => 'required|string|max:255',
            'site_logo' => 'nullable|image|max:4096',
            'site_favicon' => 'nullable|image|max:4096',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'site_name.required' => __('validation.required', ['attribute' => __('gen.site_name')]),
            'site_name.string' => __('validation.string', ['attribute' => __('gen.site_name')]),
            'site_name.max' => __('validation.max.string', ['attribute' => __('gen.site_name'), 'max' => 255]),
            'site_description.required' => __('validation.required', ['attribute' => __('gen.site_description')]),
            'site_description.string' => __('validation.string', ['attribute' => __('gen.site_description')]),
            'site_description.max' => __('validation.max.string', ['attribute' => __('gen.site_description'), 'max' => 255]),
            'site_address.required' => __('validation.required', ['attribute' => __('gen.site_address')]),
            'site_address.string' => __('validation.string', ['attribute' => __('gen.site_address')]),
            'site_address.max' => __('validation.max.string', ['attribute' => __('gen.site_address'), 'max' => 255]),
            'site_email.required' => __('validation.required', ['attribute' => __('gen.site_email')]),
            'site_email.email' => __('validation.email', ['attribute' => __('gen.site_email')]),
            'site_phone.required' => __('validation.required', ['attribute' => __('gen.site_phone')]),
            'site_phone.string' => __('validation.string', ['attribute' => __('gen.site_phone')]),
            'site_phone.max' => __('validation.max.string', ['attribute' => __('gen.site_phone'), 'max' => 255]),
            'site_copy_right.required' => __('validation.required', ['attribute' => __('gen.site_copy_right')]),
            'site_copy_right.string' => __('validation.string', ['attribute' => __('gen.site_copy_right')]),
            'site_copy_right.max' => __('validation.max.string', ['attribute' => __('gen.site_copy_right'), 'max' => 255]),
            'site_logo.image' => __('validation.image', ['attribute' => __('gen.site_logo')]),
            'site_logo.max' => __('validation.max.file', ['attribute' => __('gen.site_logo'), 'max' => 4096]),
            'site_favicon.image' => __('validation.image', ['attribute' => __('gen.site_favicon')]),
            'site_favicon.max' => __('validation.max.file', ['attribute' => __('gen.site_favicon'), 'max' => 4096]),
        ];
    }
}
