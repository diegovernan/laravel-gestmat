<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:20',
            'price' => 'required|string|min:4|max:8'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome de produto é obrigatório.',
            'name.string' => 'O nome de produto não é válido.',
            'name.min' => 'O nome de produto precisa ter no mínimo 2 caracteres.',
            'name.max' => 'O nome de produto precisa ter no máximo 20 caracteres.',
            'price.required' => 'O preço de produto é obrigatório.',
            'price.string' => 'O preço de produto não é válido.',
            'price.min' => 'O preço de produto precisa ter no mínimo 4 caracteres.',
            'price.max' => 'O preço de produto precisa ter no máximo 8 caracteres.',
        ];
    }
}
