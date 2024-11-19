<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username'     => 'required|string|max:255',
            'phone_number' => 'required|string|max:20',
        ];
    }
}
