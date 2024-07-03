<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CastMovieRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'cast_id' => 'required',
            'movie_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => "nama cast tidak boleh kosong",
            'cast_id.required' => "cast id tidak boleh kosong",
            'movie_id.required' => "movie id cast tidak boleh kosong"
        ];
    }
}
