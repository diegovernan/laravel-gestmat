<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:20',
            'phone' => 'required|string|min:15|max:15',
            'email' => 'required|string|email|max:255'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome de fornecedor é obrigatório.',
            'name.string' => 'O nome de fornecedor não é válido.',
            'name.min' => 'O nome de fornecedor precisa ter no mínimo 2 caracteres.',
            'name.max' => 'O nome de fornecedor precisa ter no máximo 20 caracteres.',
            'phone.required' => 'O telefone de fornecedor é obrigatório.',
            'phone.string' => 'O telefone de fornecedor não é válido.',
            'phone.min' => 'O telefone de fornecedor precisa ter no mínimo 15 caracteres.',
            'phone.max' => 'O telefone de fornecedor precisa ter no máximo 15 caracteres.',
            'email.required' => 'O e-mail de fornecedor é obrigatório.',
            'email.string' => 'O e-mail de fornecedor não é válido.',
            'email.email' => 'O e-mail de fornecedor não é válido.',
            'email.max' => 'O e-mail de fornecedor precisa ter no máximo 255 caracteres.'
        ];
    }
}
