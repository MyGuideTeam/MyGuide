<?php

namespace App\Http\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProfileRequest extends FormRequest
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
            'name' => 'nullable|max:255',
            'email' => ['nullable' , 'email' , Rule::unique('users' , 'email')->ignore(auth('api')->user()->id)],
            'gender' => ['nullable' , Rule::in(['MALE' , 'FEMALE'])],
            'age' => 'nullable|min:1',
            'phone_number' => 'nullable',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,svg'
        ];
    }
}
