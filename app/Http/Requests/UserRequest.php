<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
        'name' => 'string|required|max:255', // Nome é obrigatório, deve ser uma string e ter no máximo 255 caracteres
        'email' => 'string|email|required|unique:users,email', // E-mail deve ser uma string, um e-mail válido, obrigatório e único na tabela de usuários
        //'senha' => 'string|required|min:8', // Senha obrigatória e deve ter no mínimo 8 caracteres
        //'idade' => 'integer|nullable|min:18', // Idade deve ser um número inteiro, opcional e no mínimo 18
        // Adicione mais campos e regras conforme necessário
        ];
    }

    public function messages()
{
    return [
        'email.unique' => 'O e-mail informado já está em uso. Por favor, utilize outro.',
        'name.required' => 'O nome é obrigatório.',
        //'senha.min' => 'A senha deve ter pelo menos 8 caracteres.',
        //'idade.min' => 'A idade deve ser no mínimo 18 anos.',
        // Adicione outras mensagens conforme necessário
    ];
}

}
