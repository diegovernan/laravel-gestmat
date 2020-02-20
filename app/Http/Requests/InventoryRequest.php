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
            'minimum_quantity' => 'required|numeric|max:1000'
        ];
    }

    public function messages()
    {
        return [
            'minimum_quantity.required' => 'A quantidade mínima de produto é obrigatória.',
            'minimum_quantity.numeric' => 'A quantidade mínima de produto é não é válida.',
            'minimum_quantity.max' => 'A quantidade mínima de produto precisa ter no máximo 1000.'
        ];
    }
}
