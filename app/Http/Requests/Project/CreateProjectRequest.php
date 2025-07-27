<?php

namespace App\Http\Requests\Project;

use App\Http\DTO\Project\CreateProjectDTO;
use App\Http\DTO\Project\SearchProjectsDTO;
use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CreateProjectRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function validationData(): array
    {
        return $this->post();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'min:1', 'max:128'],
            'description' => ['string', 'min:1', 'max:1024'],
        ];
    }

    public function toDto(): CreateProjectDTO
    {
        $data = $this->validated();
        $data['user_id'] = auth()->user()->id;

        return CreateProjectDTO::fromArray($data);
    }
}
