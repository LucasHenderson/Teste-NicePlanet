<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CadastroRuralRequest extends FormRequest
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
            'idProdutor' => [
                'required'
            ],
            'idPropriedade' => [
                'required'
            ]
        ];
    }

    public function messages()
    {
        return [
            'idProdutor.required' => 'O campo idProdutor é obrigatório!',
            'idPropriedade.required' => 'O campo idPropriedade é obrigatório!',
        ];
    }
}
