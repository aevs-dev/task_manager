<?php

namespace App\Enums\Rbac\Projects;

enum TaskPermissionEnum: string
{
    case CREATE_TASK = 'create_task';
    case EDIT_OWN_TASK = 'edit_own_task';
    case REMOVE_OWN_TASK = 'remove_own_task';
    case ASSIGN_TO_OWN_TASK = 'assign_to_own_task';
    case ATTACH_MEDIA_TO_OWN_TASK = 'attach_media_to_own_task';
    case CHANGE_OWN_TASK_STATUS = 'change_own_task_status';

    // Управление задачами, на которые назначен
    case EDIT_TASK = 'edit_task';
    case REMOVE_TASK = 'remove_task';
    case ASSIGN_TO_TASK = 'assign_to_task';
    case ATTACH_MEDIA_TO_TASK = 'attach_media_to_task';
    case CHANGE_TASK_STATUS = 'change_task_status';

    // Управление сторонними задачами (админские привилегии)
    case EDIT_EXTERNAL_TASK = 'edit_external_task';
    case REMOVE_EXTERNAL_TASK = 'remove_external_task';
    case ASSIGN_TO_EXTERNAL_TASK = 'assign_to_external_task';
    case ATTACH_MEDIA_TO_EXTERNAL_TASK = 'attach_media_to_external_task';
    case CHANGE_EXTERNAL_TASK_STATUS = 'change_external_task_status';

}
