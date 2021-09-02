<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|min:2|max:20',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome de usuário é obrigatório.',
            'name.string' => 'O nome de usuário não é válido.',
            'name.min' => 'O nome de usuário precisa ter no mínimo 2 caracteres.',
            'name.max' => 'O nome de usuário precisa ter no máximo 20 caracteres.',
        ];
    }
}
