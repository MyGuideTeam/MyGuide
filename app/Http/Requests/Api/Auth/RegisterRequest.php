<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6',
            'gender' => ['required' , Rule::in(['MALE' , 'FEMALE'])],
            'type' => ['required' , Rule::in(['BLIND' , 'RELATIVE']) ],
            'age' => 'required|min:1',
            'phone_number' => 'required',
        ];
    }
}
