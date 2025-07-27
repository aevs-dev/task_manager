<?php

namespace App\Http\Repository\Project;

use App\Enums\Rbac\Project\ProjectDefaultRoleEnum;
use App\Models\Project;
use App\Models\ProjectRole;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function Laravel\Prompts\error;

class ProjectRepository
{

    public function getQuery(): Builder
    {
        return Project::query();
    }

    public function getProjectsByFilters(
        int|null $projectId = null, int|null $ownerId = null,
        int|null $memberId = null, string|null $title = null, string|null $description = null,
        Carbon|null $dateFrom = null, Carbon|null $dateTo = null,
        bool $withOwner = false, bool $withMembers = false
    ): Collection
    {
        $query = $this->getQuery();

        if ($projectId) $query->where('id', $projectId);
        if ($ownerId) $query->where('user_id', $ownerId);
        if ($title) $query->where('title', $title);
        if ($description) $query->where('description', $description);
        if ($dateFrom) $query->whereDate('created_at', '>=', $dateFrom);
        if ($dateTo) $query->whereDate('created_at', '<=', $dateTo);

        if ($memberId) {
            $query->whereHas('members', function (Builder $membersQuery) use ($memberId) {
                $membersQuery->whereKey($memberId);
            });
        }

        if ($withOwner) $query->with('owner');
        if ($withMembers) $query->with('members.pivot.role');

        return $query->get();
    }

    /**
     * @throws \Throwable
     */
    public function createProject(int $userId, string $title, string|null $description): Project
    {

        DB::beginTransaction();

        try {

            $project = new Project();
            $project->user_id = $userId;
            $project->title = $title;
            $project->description = $description;
            $project->saveOrFail();

            $ownerRole = ProjectRole::query()->find(ProjectDefaultRoleEnum::OWNER->value);
            $project->members()->attach($userId, ['project_role_id' => $ownerRole->id]);

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error("Ошибка создания проекта: {$e->getMessage()}", [
                    'project' => isset($project) ? $project->toArray() : null,
                    'ownerRole' => $ownerRole ?? null
                ]
            );
            abort(500, 'Ошибка создания проекта!');
        }

        $ownerPermissionIds = $ownerRole->permissions->pluck('id');
        $permissionsRecords = array_map(function ($permissionId) use ($userId, $project) {
            return [
                'project_permission_id' => $permissionId,
                'user_id' => $userId,
                'project_id' => $project->id
            ];
        }, $ownerPermissionIds);


        try
        {
            DB::table('user_project_permissions')->insert($permissionsRecords);

        } catch (\Throwable $e) {
            DB::rollBack();
            Log::error("Ошибка настройки разрешений проекта: {$e->getMessage()}", [
                'project' => isset($project) ? $project->toArray() : null,
                'ownerRole' => $ownerRole ?? null
            ]);

            abort(500, 'Ошибка настройки разрешений проекта');
        }

        DB::commit();

        return $project;
    }
}
