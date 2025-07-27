<?php

namespace App\Http\DTO\Project;

use App\Http\DTO\DTOInterface;
use Carbon\Carbon;

class SearchOneProjectDTO implements DTOInterface
{

    public function __construct(
        public readonly bool $projectId,
        public readonly bool $withOwner = false,
        public readonly bool $withMembers = false,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            projectId: isset($data['project_id']) ?? null,
            withOwner: isset($data['with']) && in_array('owner', $data['with']),
            withMembers: isset($data['with']) && in_array('members', $data['with']),
        );
    }

    public function toArray(): array
    {
        return [
            "projectId" => $this->projectId,
            "withOwner" => $this->withOwner,
            "withMembers" => $this->withMembers,
        ];
    }


    public function toSnakeCaseArray(): array
    {
        return [
            "project_id" => $this->projectId,
            "with_owner" => $this->withOwner,
            "with_members" => $this->withMembers,
        ];
    }
}
