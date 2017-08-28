<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ];
    }

    public function messages()
    {
        return [
            'email.required' => __('auth.validates.required', ['field' => 'email']),
            'email.email' => __('auth.validates.email'),
            'password.required' => __('auth.validates.required', ['field' => 'password']),
            'password.min' => __('auth.validates.min', ['field' => 'password', 'min' => 5]),
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
