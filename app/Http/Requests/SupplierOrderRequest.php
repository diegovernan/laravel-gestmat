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
            'quantity' => 'required|numeric|max:10',
            'order_at' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'O produto é obrigatório.',
            'supplier_id.required' => 'O fornecedor é obrigatório.',
            'quantity.required' => 'A quantidade mínima de produto é obrigatória.',
            'quantity.numeric' => 'A quantidade mínima de produto é não é válida.',
            'quantity.max' => 'A quantidade mínima de produto precisa ter no máximo 10 caracteres.',
            'order_at.required' => 'A data de entrega é obrigatória.',
            'order_at.date' => 'A data de entrega não é válida.'
        ];
    }
}