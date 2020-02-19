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
            'cost_price' => 'required|string|min:4|max:8',
            'sale_price' => 'required|string|min:4|max:8'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome de produto é obrigatório.',
            'name.string' => 'O nome de produto não é válido.',
            'name.min' => 'O nome de produto precisa ter no mínimo 2 caracteres.',
            'name.max' => 'O nome de produto precisa ter no máximo 20 caracteres.',
            'cost_price.required' => 'O preço custo de produto é obrigatório.',
            'cost_price.string' => 'O preço custo de produto não é válido.',
            'cost_price.min' => 'O preço custo de produto precisa ter no mínimo 4 caracteres.',
            'cost_price.max' => 'O preço custo de produto precisa ter no máximo 8 caracteres.',
            'sale_price.required' => 'O preço venda de produto é obrigatório.',
            'sale_price.string' => 'O preço venda de produto não é válido.',
            'sale_price.min' => 'O preço venda de produto precisa ter no mínimo 4 caracteres.',
            'sale_price.max' => 'O preço venda de produto precisa ter no máximo 8 caracteres.',
        ];
    }
}
