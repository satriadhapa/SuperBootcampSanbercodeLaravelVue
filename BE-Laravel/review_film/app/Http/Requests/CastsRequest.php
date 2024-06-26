<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CastsRequest extends FormRequest
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
            'name' => 'required|max:255',
            'age' => 'required|max:3',
            'bio' => 'required|max:255'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Name tidak boleh kosong',
            'name.max' => 'Name tidak boleh lebih dari 255 karaktr',
            'age.required' => 'age tidak boleh kosong',
            'age.max' => 'age tidak boleh lebih dari 3 karaktr',
            'bio.required' => 'bio tidak boleh kosong',
            'bio.max' => 'bio tidak boleh lebih dari 255 karaktr',
        ];
    }
}
