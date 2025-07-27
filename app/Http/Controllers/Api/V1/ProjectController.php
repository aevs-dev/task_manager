<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Project\CreateProjectRequest;
use App\Http\Requests\Project\GetOneProjectRequest;
use App\Http\Requests\Project\GetProjectsRequest;
use App\Http\Resources\Project\ProjectResource;
use App\Http\Services\Project\ProjectSevice;
use App\Models\Project;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectController extends Controller
{
    public function __construct(
        private readonly ProjectSevice $projectSevice
    )
    {}


    public function getOne(Project $project, GetOneProjectRequest $request): JsonResource
    {
        $dto = $request->toDto();
        if ($dto->withMembers) $project->load('members.pivot.role');
        if ($dto->withOwner) $project->load('owner');

        return (new ProjectResource($project));
    }

    public function get(GetProjectsRequest $request): JsonResource
    {
        $dto = $request->toDto();
        $data = $this->projectSevice->getProjectsByFilter($dto);

        return ProjectResource::collection($data);
    }

    public function create(CreateProjectRequest $request): JsonResource
    {
        $dto = $request->toDto();
        $project = $this->projectSevice->createProject($dto);

        return (new ProjectResource($project));
    }


}
