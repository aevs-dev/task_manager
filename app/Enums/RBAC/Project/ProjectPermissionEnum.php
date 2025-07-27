<?php

namespace App\Enums\Rbac\Project;

enum ProjectPermissionEnum: string
{
    case VIEW_USERS = 'view_users';
    case ADD_USER = 'add_user';
    case EXCLUDE_USER = 'exclude_user';
    case MANAGE_USER_PERMISSIONS = 'manage_user_permissions';

}
