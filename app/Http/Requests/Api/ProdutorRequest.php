<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProdutorRequest extends FormRequest
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
            'nomeProdutor' => [
                'required',
                'max:255'
            ],
            'cpfProdutor' => [
                'required'
            ]
        ];
    }

    public function messages()
    {
        return [
            'nomeProdutor.required' => 'O campo nomeProdutor é obrigatório!',
            'nomeProdutor.max' => 'O campo nomeProdutor não pode ter mais de 255 caracteres!',
            'cpfProdutor.required' => 'O campo cpfProdutor é obrigatório!',
            'cpfProdutor.cpf' => 'O campo cpfProdutor deve seguir o padrão de CPF!'
        ];
    }
}
