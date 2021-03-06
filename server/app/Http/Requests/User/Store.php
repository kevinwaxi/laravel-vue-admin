<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'bail|required|string|max:255',
            'email' => 'bail|required|email|unique:users',
            'mobile_number' => 'bail|required|string|max:255',
            'password' => 'bail|required|string|min:8|confirmed|max:255',
            'pin' => 'bail|nullable|string|min:8|max:255',
            'is_otp_verification_enabled_at_login' => 'boolean',
            'otp_type' => 'string',
            'is_client_lock_enabled' => 'boolean',
            'clients_allowed' => 'bail|integer|gt:0',
            'is_ip_lock_enabled' => 'boolean',
            'is_active' => 'bail|required|boolean',
        ];
    }
}
