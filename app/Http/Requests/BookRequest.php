<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BookRequest extends FormRequest
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


    public function rules()
    {
        return [
            'title' => 'required',
            'author' => 'required',
            'publish_year' => 'required',
            'description' => 'required',
            'category_id' => ['required' , Rule::exists('book_categories' , 'id')]
        ];
    }
}
