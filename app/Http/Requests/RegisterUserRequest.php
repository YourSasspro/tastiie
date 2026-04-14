<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
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
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required|string|min:8',
            'phone_number' => 'required|string|max:255',
            'delivery_address' => 'required|string|max:255',
            'where_did_you_hear_about_us' => 'required|string|max:255',
            'enterprise' => 'nullable|string|max:255',
        ];
    }


    public function messages(): array
    {
        return [
            'first_name.required' => __('validation.required', ['attribute' => __('gen.first_name')]),
            'last_name.required' => __('validation.required', ['attribute' => __('gen.last_name')]),
            'email.required' => __('validation.required', ['attribute' => __('gen.email')]),
            'email.email' => __('validation.email', ['attribute' => __('gen.email')]),
            'email.unique' => __('validation.unique', ['attribute' => __('gen.email')]),
            'password.required' => __('validation.required', ['attribute' => __('gen.password')]),
            'password.min' => __('validation.min.string', ['attribute' => __('gen.password'), 'min' => 8]),
            'password.confirmed' => __('validation.confirmed', ['attribute' => __('gen.password')]),
            'password_confirmation.required' => __('validation.required', ['attribute' => __('gen.confirm_password')]),
            'phone_number.required' => __('validation.required', ['attribute' => __('gen.phone_number')]),
            'delivery_address.required' => __('validation.required', ['attribute' => __('gen.delivery_address')]),
            'where_did_you_hear_about_us.required' => __('validation.required', ['attribute' => __('gen.where_did_you_hear_about_us')]),
            'enterprise.required' => __('validation.required', ['attribute' => __('gen.enterprise')]),


        ];
    }
}
