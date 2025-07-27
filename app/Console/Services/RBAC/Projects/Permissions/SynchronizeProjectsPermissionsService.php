<?php

namespace App\Console\Services\Rbac\Projects\Permissions;

use App\Models\ProjectPermission;

class SynchronizeProjectsPermissionsService
{
    public function synchronize(): void
    {
        $permissions = config('params.rbac.projects.permissions.permissions.projects');

        foreach ($permissions as $permissionInfo) {
            ProjectPermission::query()->updateOrCreate(['id' => $permissionInfo['id']], $permissionInfo);
        }

    }
}
