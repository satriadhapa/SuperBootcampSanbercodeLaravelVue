<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'image' => 'nullable|mimes:jpg,bmp,png',
            'stok' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Judul harus diisi',
            'summary.string' => 'Ringkasan harus berupa teks',
            'image.mimes' => 'Hanya format JPG, BMP, dan PNG yang diperbolehkan untuk poster',
           'stok.integer' => 'Stok harus berupa angka',
            'category_id.exists' => 'Kategori harus ada di database',
        ];
    }
}

