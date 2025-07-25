<?php

namespace App\Console\Services\Rbac\Projects\Permissions;

use App\Models\ProjectPermission;

class SynchronizeTasksPermissionsService
{
    public function synchronize(): void
    {
        $permissions = config('params.rbac.projects.permissions.permissions.tasks');

        foreach ($permissions as $permissionInfo) {
            ProjectPermission::query()->updateOrCreate(['id' => $permissionInfo['id']], $permissionInfo);
        }

    }
}
