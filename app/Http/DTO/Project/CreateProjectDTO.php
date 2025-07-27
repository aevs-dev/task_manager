<?php

namespace App\Http\DTO\Project;


use App\Http\DTO\DTOInterface;

class CreateProjectDTO implements DTOInterface
{

    public function __construct(
        public readonly ?int $userId,
        public readonly ?string $title,
        public readonly ?string $description,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            userId: $data['user_id'] ?? null,
            title: $data['title'] ?? null,
            description: $data['description'] ?? null,
        );
    }

    public function toArray(): array
    {
        return [
            "userId" => $this->userId,
            "title" => $this->title,
            "description" => $this->description,
        ];
    }

    public function toSnakeCaseArray(): array
    {
        return [
            "user_id" => $this->userId,
            "title" => $this->title,
            "description" => $this->description,
        ];
    }


}
