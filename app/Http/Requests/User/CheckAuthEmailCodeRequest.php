<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class CheckAuthEmailCodeRequest extends FormRequest
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
            'code' => ['required', 'digits:6']
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Код не может быть пустым',
            'code.digits' => 'Неверный формат кода',

            'email.required' => 'Почта не может быть пустой',
            'email.max' => 'Почта не может превышать 255 символов',
            'email.string' => 'Почта должна быть строкой',
            'email.email' => 'Некорректный формат почты'
        ];
    }
}
