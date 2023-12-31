<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email' => [
                'required',
                'email',
                'max:255'
            ],
            'password' => [
                'required',
                'min:4',
                'max:255'
            ],
            'device_name' => [
                'required',
                'max:255'
            ]
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'O campo email é obrigatório!',
            'email.email' => 'O campo email deve ser um endereço de email válido!',
            'email.max' => 'O campo email não pode ter mais de 255 caracteres!',
            'password.required' => 'O campo senha é obrigatório!',
            'password.min' => 'O campo senha deve ter pelo menos 4 caracteres!',
            'password.max' => 'O campo senha não pode ter mais de 255 caracteres!',
            'device_name.required' => 'O campo nome do dispositivo é obrigatório!',
            'device_name.max' => 'O campo nome do dispositivo não pode ter mais de 255 caracteres!',
        ];
    }
}
