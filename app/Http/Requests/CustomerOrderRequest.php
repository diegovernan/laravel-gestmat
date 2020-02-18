<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'product_id' => 'required',
            'customer_id' => 'required',
            'quantity' => 'required|numeric|max:1000',
            'order_at' => 'required|date'
        ];
    }

    public function messages()
    {
        return [
            'product_id.required' => 'O produto é obrigatório.',
            'customer_id.required' => 'O cliente é obrigatório.',
            'quantity.required' => 'A quantidade vendida de produto é obrigatória.',
            'quantity.numeric' => 'A quantidade vendida de produto é não é válida.',
            'quantity.max' => 'A quantidade vendida de produto precisa ter no máximo 1000.',
            'order_at.required' => 'A data de venda é obrigatória.',
            'order_at.date' => 'A data de venda não é válida.'
        ];
    }
}
