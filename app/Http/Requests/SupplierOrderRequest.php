<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => 'required',
            'supplier_id' => 'required',
            'quantity' => 'required|numeric|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'O produto é obrigatório.',
            'supplier_id.required' => 'O fornecedor é obrigatório.',
            'quantity.required' => 'A quantidade desejada de produto é obrigatória.',
            'quantity.numeric' => 'A quantidade desejada de produto é não é válida.',
            'quantity.max' => 'A quantidade desejada de produto precisa ter no máximo 1000.'
        ];
    }
}
