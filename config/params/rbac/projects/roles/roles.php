<?php

// Базовые роли (предустановленные)
// ID ролей инкрементируются сразу на + 100

use App\Enums\Rbac\Project\RoleTypeEnum;

$memberPermissions = [
    // Разрешения для задач в проекте
    'create_task', 'edit_own_task', 'remove_own_task', 'assign_to_own_task',
    'attach_media_to_own_task', 'change_own_task_status', 'view_task',

    // Разрешения в целом всего для проекта
    'view_users'
];

$employeePermissions = array_merge($memberPermissions, [
    'edit_task', 'remove_task', 'assign_to_task',
    'attach_media_to_task', 'change_task_status',
    'add_user'
]);

$moderatorPermissions = array_merge($employeePermissions, [
    'edit_external_task', 'remove_external_task', 'assign_to_external_task',
    'attach_media_to_external_task', 'change_external_task_status',
    'view_external_task', 'exclude_user', 'manage_user_permissions'
]);

$ownerPermissions = array_merge($moderatorPermissions, [
    'remove_project'
]);

return [
    [
        'id' => 1,
        'title' => 'Участник',
        'type' => RoleTypeEnum::BASE->value,
        'description' => 'Данная роль содержит в себе только функционал управления собственными объектами',
        'permissions' => $memberPermissions
    ],
    [
        'id' => 101,
        'title' => 'Сотрудник',
        'type' => RoleTypeEnum::BASE->value,
        'description' => 'Данная роль содержит в себе функционал роли "Участник" + управление объектами на которые назначен',
        'permissions' => $employeePermissions
    ],
    [
        'id' => 201,
        'title' => 'Модератор',
        'type' => RoleTypeEnum::BASE->value,
        'description' => 'Данная роль содержит в себе себе функционал роли "Сотрудник" + управление чужими объектами',
        'permissions' => $moderatorPermissions
    ],
    [
        'id' => 301,
        'title' => 'Владелец',
        'type' => RoleTypeEnum::BASE->value,
        'description' => 'Данная роль содержит в себе себе функционал роли "Модератор" + критические действия',
        'permissions' => $ownerPermissions
    ]
];
