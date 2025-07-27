<?php

namespace App\Http\Requests\Project;

use App\Http\DTO\Project\SearchOneProjectDTO;
use App\Http\DTO\Project\SearchProjectsDTO;
use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetOneProjectRequest extends FormRequest
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
        return $this->query();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'with' => ['array', 'max:2'],
            'with.*' => ['string', Rule::in(['owner', 'members'])]
        ];
    }

    public function toDto(): SearchOneProjectDTO
    {
        $data = $this->validated();
        $data['project_id'] = $this->route('project')->id;

        return SearchOneProjectDTO::fromArray($this->validated());
    }
}
