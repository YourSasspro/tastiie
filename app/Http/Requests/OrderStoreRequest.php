<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderStoreRequest extends FormRequest
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
            'first_name' => 'required|string',
            'last_name' => 'nullable|string',
            'email' => 'required|email',
            'phone_no' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'country' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'required|string',
            'order_note' => 'nullable|string',
            // 'payment_method' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => __('validation.required', ['attribute' => __('gen.first_name')]),
            'last_name.string' => __('validation.string', ['attribute' => __('gen.last_name')]),
            'email.required' => __('validation.required', ['attribute' => __('gen.email')]),
            'email.email' => __('validation.email', ['attribute' => __('gen.email')]),
            'phone_no.required' => __('validation.required', ['attribute' => __('gen.phone_no')]),
            'phone_no.string' => __('validation.string', ['attribute' => __('gen.phone_no')]),
            'address.required' => __('validation.required', ['attribute' => __('gen.address')]),
            'address.string' => __('validation.string', ['attribute' => __('gen.address')]),
            'city.required' => __('validation.required', ['attribute' => __('gen.city')]),
            'city.string' => __('validation.string', ['attribute' => __('gen.city')]),
            'country.required' => __('validation.required', ['attribute' => __('gen.country')]),
            'country.string' => __('validation.string', ['attribute' => __('gen.country')]),
            'state.required' => __('validation.required', ['attribute' => __('gen.state')]),
            'state.string' => __('validation.string', ['attribute' => __('gen.state')]),
            'zip_code.required' => __('validation.required', ['attribute' => __('gen.zip_code')]),
            'zip_code.string' => __('validation.string', ['attribute' => __('gen.zip_code')]),
            'order_note.string' => __('validation.string', ['attribute' => __('gen.order_note')]),
            // 'payment_method.required' => __('validation.required', ['attribute' => __('gen.payment_method')]),
        ];
    }
}
