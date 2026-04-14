<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
        if($this->isMethod('post')) {
            return [
                'title' => 'required|string|max:255',
                'category_id' => 'required|exists:blog_categories,id',
                'content' => 'required|string',
                'images' => 'required',
                'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5096',

            ];
        }

        return [
            'title' => 'required|string|max:255',
            'category_id' => 'required|exists:blog_categories,id',
            'content' => 'required|string',
            'images' => 'nullable',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5096',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => __('validation.required', ['attribute' => __('gen.title')]),
            'title.string' => __('validation.string', ['attribute' => __('gen.title')]),
            'title.max' => __('validation.max.string', ['attribute' => __('gen.title'), 'max' => 255]),
            'category_id.required' => __('validation.required', ['attribute' => __('gen.category')]),
            'category_id.exists' => __('validation.exists', ['attribute' => __('gen.category')]),
            'content.required' => __('validation.required', ['attribute' => __('gen.content')]),
            'content.string' => __('validation.string', ['attribute' => __('gen.content')]),

            'images.required' => __('validation.required', ['attribute' => __('gen.images')]),
            'images.*.image' => __('validation.image', ['attribute' => __('gen.images')]),
            'images.*.mimes' => __('validation.mimes', ['attribute' => __('gen.images'), 'values' => 'jpeg, png, jpg, gif, svg']),
        ];
    }
}
