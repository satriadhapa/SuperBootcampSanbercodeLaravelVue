<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'summary' => 'required|string|min:3',
            'year' => 'required|string',
            'poster' => 'nullable|mimes:jpg,bmp,png',
            'genre_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'summary.required' => 'Summary is required',
            'year.required' => 'Year is required',
            'poster.mimes' => 'Only jpg, bmp, png formats are allowed for the poster',
            'genre_id.required' => 'Genre ID is required'
        ];
    }
}
