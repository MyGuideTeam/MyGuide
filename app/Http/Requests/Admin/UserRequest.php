<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'email' => ['required' , Rule::unique('users' , 'email')->ignore($this->id)],
            'password' => ($this->isMethod('POST') ? 'required' : ''),
            'gender' => ['required' , Rule::in(['MALE' , 'FEMALE'])],
            'phone_number' => 'required',
            'type' => ['required' , Rule::in('BLIND' , 'RELATIVE')],
            'age' => 'required'
        ];
    }
}
