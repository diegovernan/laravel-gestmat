<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InventoryRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => 'required',
            'minimum_quantity' => 'required|numeric|max:1000',
            // 'available_quantity' => 'required|numeric|max:1000',
            // 'sold_quantity' => 'required|numeric|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'O produto é obrigatório.',
            'minimum_quantity.required' => 'A quantidade mínima de produto é obrigatória.',
            'minimum_quantity.numeric' => 'A quantidade mínima de produto é não é válida.',
            'minimum_quantity.max' => 'A quantidade mínima de produto precisa ter no máximo 1000.',
            'available_quantity.required' => 'A quantidade disponível de produto é obrigatória.',
            'available_quantity.numeric' => 'A quantidade disponível de produto é não é válida.',
            'available_quantity.max' => 'A quantidade disponível de produto precisa ter no máximo 1000.',
            'sold_quantity.required' => 'A quantidade vendida de produto é obrigatória.',
            'sold_quantity.numeric' => 'A quantidade vendida de produto é não é válida.',
            'sold_quantity.max' => 'A quantidade vendida de produto precisa ter no máximo 1000.'
        ];
    }
}
