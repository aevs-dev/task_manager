<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'email:rfc,dns', 'unique:users'],
            'password' => ['required', 'string', 'max:255', 'confirmed'],
            'password_confirmation' => ['required', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'password.confirmed' => 'Пароли не совпадают',
            'password.required' => 'Пароль не может быть пустым',
            'password.max' => 'Пароль не может превышать 255 символов',
            'password.string' => 'Пароль должен быть строкой',

            'name.required' => 'Имя не может быть пустым',
            'name.max' => 'Имя не может превышать 255 символов',
            'name.string' => 'Имя должно быть строкой',

            'email.required' => 'Почта не может быть пустой',
            'email.max' => 'Почта не может превышать 255 символов',
            'email.string' => 'Почта должна быть строкой',
            'email.email' => 'Некорректный формат почты',
            'email.unique' => 'Почта уже занята!',

            'password_confirmation.required' => 'Пароль не может быть пустым',
            'password_confirmation.string' => 'Пароль должен быть строкой',

        ];
    }
}
