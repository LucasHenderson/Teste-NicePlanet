<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class PropriedadeRequest extends FormRequest
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
            'nomePropriedade' => [
                'required',
                'max:255'
            ],
            'localizacao' => [
                'required',
                'max:255'
            ],
            'tamanho' => [
                'required',
                'numeric'
            ],
            'uso' => [
                'required',
                'max:255'
            ]
        ];
    }

    public function messages()
    {
        return [
            'nomePropriedade.required' => 'O campo nomePropriedade é obrigatório!',
            'nomePropriedade.max' => 'O campo nomePropriedade não pode ter mais de 255 caracteres!',
            'localizacao.required' => 'O campo localização é obrigatório!',
            'localizacao.max' => 'O campo localização não pode ter mais de 255 caracteres!',
            'tamanho.required' => 'O campo tamanho é obrigatório!',
            'tamanho.numeric' => 'O campo tamanho deve ser um número!',
            'uso.required' => 'O campo uso é obrigatório!',
            'uso.max' => 'O campo uso não pode ter mais de 255 caracteres!',
        ];
    }
}
