<?php

// Базовые роли (предустановленные)

use App\Enums\Rbac\Projects\RoleTypeEnum;

$memberPermissions = [
    'create_task', 'edit_own_task', 'remove_own_task', 'assign_to_own_task',
    'attach_media_to_own_task', 'change_own_task_status', 'view_task'
];

$employeePermissions = array_merge($memberPermissions, [
    'edit_task', 'remove_task', 'assign_to_task',
    'attach_media_to_task', 'change_task_status'
]);

$moderatorPermissions = array_merge($employeePermissions, [
    'edit_external_task', 'remove_external_task', 'assign_to_external_task',
    'attach_media_to_external_task', 'change_external_task_status',
    'view_external_task'
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
        'id' => 2,
        'title' => 'Сотрудник',
        'type' => RoleTypeEnum::BASE->value,
        'description' => 'Данная роль содержит в себе функционал роли "Участник" + управление объектами на которые назначен',
        'permissions' => $employeePermissions
    ],
    [
        'id' => 3,
        'title' => 'Модератор',
        'type' => RoleTypeEnum::BASE->value,
        'description' => 'Данная роль содержит в себе себе функционал роли "Сотрудник" + управление чужими объектами',
        'permissions' => $moderatorPermissions
    ]
];
