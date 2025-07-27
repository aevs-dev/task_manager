<?php

namespace App\Policies;

use App\Http\Repository\Project\ProjectRepository;
use App\Models\Project;
use App\Models\User;

class ProjectPolicy
{
    public function __construct(
        private readonly ProjectRepository $projectRepository
    )
    {
    }

    public function get(User $user, Project $project): bool
    {
        if (auth()->user()->isAdmin()) return true;

        $projects = $this->projectRepository->getProjectsByFilters($project->id, memberId: $user->id);
        if ($projects->count()) return true;
        return false;
    }
}
