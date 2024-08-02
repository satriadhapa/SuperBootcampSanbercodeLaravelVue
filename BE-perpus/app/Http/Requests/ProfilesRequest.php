<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfilesRequest extends FormRequest
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
            'bio' => 'required|string',
            'age' => 'required|integer',
            'user_id' => 'required|integer'

        ];
    }
    public function messages()
    {
        return [
            'bio.required' => 'bio tidak boleh kosong',
            'age.required' => 'age tidak boleh kosong',
            'user_id.required' => 'user id tidak boleh kosong'

        ];
    }
}
