<?php

namespace App\Http\DTO\Project;

use App\Http\DTO\DTOInterface;
use Carbon\Carbon;

class SearchProjectsDTO implements DTOInterface
{

    public function __construct(
        public readonly string $filterType,
        public readonly ?int $projectId,
        public readonly ?int $ownerId,
        public readonly ?int $memberId,
        public readonly ?string $title,
        public readonly ?string $description,
        public readonly ?Carbon $dateFrom,
        public readonly ?Carbon $dateTo,
        public readonly bool $withOwner = false,
        public readonly bool $withMembers = false,
    )
    {
    }

    public static function fromArray(array $data): self
    {
        return new self(
            filterType: $data['filter_type'] ?? null,
            projectId: $data['project_id'] ?? null,
            ownerId: $data['owner_id'] ?? null,
            memberId: $data['member_id'] ?? null,
            title: $data['title'] ?? null,
            description: $data['description'] ?? null,
            dateFrom: isset($data['date_from']) ? Carbon::parse($data['date_from']) : null,
            dateTo: isset($data['date_to']) ? Carbon::parse($data['date_to']) : null,
            withOwner: isset($data['with']) && in_array('owner', $data['with']),
            withMembers: isset($data['with']) && in_array('members', $data['with']),
        );
    }

    public function toArray(): array
    {
        return [
            "filterType" => $this->filterType,
            "projectId" => $this->projectId,
            "ownerId" => $this->ownerId,
            "memberId" => $this->memberId,
            "title" => $this->title,
            "description" => $this->description,
            "dateFrom" => $this->dateFrom,
            "dateTo" => $this->dateTo,
            "withOwner" => $this->withOwner,
            "withMembers" => $this->withMembers,
        ];
    }


    public function toSnakeCaseArray(): array
    {
        return [
            "filter_type" => $this->filterType,
            "project_id" => $this->projectId,
            "owner_id" => $this->ownerId,
            "member_id" => $this->memberId,
            "title" => $this->title,
            "description" => $this->description,
            "date_from" => $this->dateFrom,
            "date_to" => $this->dateTo,
            "with_owner" => $this->withOwner,
            "with_members" => $this->withMembers,
        ];
    }
}
