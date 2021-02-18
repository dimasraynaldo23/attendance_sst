<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'name' => [
                'required', 'string', 'max:255'
            ],
            'email' => [
                'required', 'email', 'max:255',
                Rule::unique('users', 'email')->ignore(Auth::user()->id)
            ],
            'position' => [
                'required', 'string', 'max:255'
            ],
            'address' => [
                'required', 'string', 'max:255' 
            ],
            'avatar' => [
                'required', 'image', 'mimes:jpeg,png,jpg,svg,gif|max:2048'
            ],
        ];
    }
}
