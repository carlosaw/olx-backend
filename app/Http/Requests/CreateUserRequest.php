<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateUserRequest extends FormRequest
{
    // Regras para criação de usuário
    public function rules(): array
    {
        return [
            //
            'name' => 'required|min:3|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|string',
            'state_id' => 'required|exists:states,id'
        ];
    }
    // Resposta ao falhar requisição
    protected function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response()->json(
                [
                    'errors' => $validator->errors(),
                    'status' => 'error'
                ]
            )
        );
    }
}
