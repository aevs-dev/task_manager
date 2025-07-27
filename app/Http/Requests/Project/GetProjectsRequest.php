<?php

namespace App\Http\Requests\Project;

use App\Http\DTO\Project\SearchProjectsDTO;
use Closure;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class GetProjectsRequest extends FormRequest
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
            'filter_type' => [
                'required',
                Rule::in(['i_member', 'i_owner', 'all']),
                function (string $attribute, mixed $value, Closure $fail) {
                    if ($value == 'all' && !auth()->user()->isAdmin()) {
                        $fail('У вас не достаточно разрешений на данный тип фильтрации!');
                    }
                },
            ],
            'project_id' => ['integer'],
            'owner_id' => ['integer'],
            'member_id' => ['integer', 'min:1'],
            'title' => ['string', 'min:1', 'max:128'],
            'description' => ['string', 'min:1', 'max:1024'],
            'date_from' => ['date_format:Y-m-d', 'before_or_equal:date_to'],
            'date_to' => ['date_format:Y-m-d'],
            'with' => ['array', 'max:2'],
            'with.*' => ['string', Rule::in(['owner', 'members'])]
        ];
    }

    public function toDto(): SearchProjectsDTO
    {
        return SearchProjectsDTO::fromArray($this->validated());
    }
}
