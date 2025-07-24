<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function validationData(): array
    {
        return $this->post();
    }


    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'max:255', 'email:rfc,dns'],
            'password' => ['required', 'string', 'max:255']
        ];
    }

    public function messages(): array
    {
        return [
            'password.required' => 'Пароль не может быть пустым',
            'password.max' => 'Пароль не может превышать 255 символов',
            'password.string' => 'Пароль должен быть строкой',

            'email.required' => 'Почта не может быть пустой',
            'email.max' => 'Почта не может превышать 255 символов',
            'email.string' => 'Почта должна быть строкой',
            'email.email' => 'Некорректный формат почты'
        ];
    }
}
