<?php

namespace App\Console\Services\Rbac\Projects\Roles;

use App\Models\ProjectPermission;
use App\Models\ProjectRole;

class SynchronizeRolesService
{
    public function synchronize(): void
    {
        /**
         * @var ProjectRole $model
         */

        $roles = config('params.rbac.projects.roles.roles');

        foreach ($roles as $roleInfo) {
            $model = ProjectRole::query()->updateOrCreate(['id' => $roleInfo['id']], $roleInfo);
            $permissionIds = ProjectPermission::query()->whereIn('tech_name', $roleInfo['permissions'])->pluck('id');
            $model->permissions()->sync($permissionIds);
        }

    }
}
