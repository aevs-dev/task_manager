<?php

namespace App\Http\Services\Project;

use App\Http\DTO\Project\CreateProjectDTO;
use App\Http\DTO\Project\SearchProjectsDTO;
use App\Http\Repository\Project\ProjectRepository;
use App\Models\Project;
use Illuminate\Database\Eloquent\Collection;

class ProjectSevice
{

    public function __construct(
        private readonly ProjectRepository $projectRepository
    ) {}

    public function getProjectsByFilter(SearchProjectsDTO $dto): Collection
    {
        $repositoryArgs = $dto->toArray();
        unset($repositoryArgs['filterType']);

        return $this->projectRepository->getProjectsByFilters(...$repositoryArgs);
    }

    public function createProject(CreateProjectDTO $dto): Project
    {
        return $this->projectRepository->createProject(...$dto->toArray());
    }
}
