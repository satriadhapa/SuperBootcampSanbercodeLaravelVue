<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BooksRequest extends FormRequest
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
            'stok' => 'required|string',
            'image' => 'nullable|mimes:jpg,bmp,png',
            'category_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Title is required',
            'summary.required' => 'Summary is required',
            'stok.required' => 'Stok is required',
            'image.mimes' => 'Only jpg, bmp, png formats are allowed for the poster',
            'category_id.required' => 'Category_id is required'
        ];
    }
}
