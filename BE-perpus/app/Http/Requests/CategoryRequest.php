<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name category must be filled',
            'name.string' => 'Name category must be a string',
            'name.max' => 'Name category must not exceed 255 characters'
        ];
    }
}
