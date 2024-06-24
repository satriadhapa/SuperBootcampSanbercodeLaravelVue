<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'summary' => 'required|string|min:3',
            'year' => 'required|date',
            'poster' => 'mimes:jpg,bmp,png',
            'genre_id' => 'required'

        ];
    }
    public function messages()
    {
        return[
            'title.required' => 'Title is required',
            'summary.required' => 'Summary is required',
            'year.required' => 'Year is required',
            'poster.mimes' => 'Only jpg, bmp, png files are allowed',
            'genre_id.required' => 'Genre is required'

        ];
    }
}
