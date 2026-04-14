<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginUserRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('validation.required', ['attribute' => __('gen.email')]),
            'email.email' => __('validation.email', ['attribute' => __('gen.email')]),
            'password.required' => __('validation.required', ['attribute' => __('gen.password')]),
            'password.min' => __('validation.min.string', ['attribute' => __('gen.password'), 'min' => 8]),
        ];
    }
}
