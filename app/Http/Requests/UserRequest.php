<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
    public function rules()
    {
        if ($this->isMethod('post')) {
            return [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:255',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:8|confirmed',
                'password_confirmation' => 'required',
                'role' => 'required|exists:roles,name',
                'image' => 'nullable|image|max:4096',
            ];
        } elseif ($this->isMethod('put')) {
            return [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'phone_number' => 'required|string|max:255',
                'email' => [
                    'required',
                    'email',
                    Rule::unique('users', 'email')->ignore($this->user),
                ],
                'password' => 'nullable|min:8|confirmed',
                'password_confirmation' => 'nullable',
                'role' => 'required|exists:roles,name',
                'image' => 'nullable|image|max:4096',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => __('validation.required', ['attribute' => __('gen.name')]),
            'email.required' => __('validation.required', ['attribute' => __('gen.email')]),
            'email.unique' => __('validation.unique', ['attribute' => __('gen.email')]),
            'password.required' => __('validation.required', ['attribute' => __('gen.password')]),
            'password.confirmed' => __('validation.confirmed', ['attribute' => __('gen.password')]),
            'password_confirmation.required' => __('validation.required', ['attribute' => __('gen.confirm_password')]),
            'role.required' => __('validation.required', ['attribute' => __('gen.role')]),
            'image.image' => __('validation.image', ['attribute' => __('gen.image')]),
            'acc_verify_through.required' => __('validation.required', ['attribute' => __('gen.account_verification_through')]),
        ];
    }
}
