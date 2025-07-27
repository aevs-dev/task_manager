<?php

// Разрешения связанные с задачами.
// ID (с 1 по 200-ый зарезервировано)

return [

    // Разрешение на управление своими задачами
    [
        'id' => 1,
        'tech_name' => 'create_task',
        'name' => 'Создание своих задач',
        'description' => null,
        'category' => 'tasks'
    ],
    [
        'id' => 2,
        'tech_name' => 'edit_own_task',
        'name' => 'Редактирование своих задач',
        'description' => null,
        'category' => 'tasks'
    ],
    [
        'id' => 3,
        'tech_name' => 'remove_own_task',
        'name' => 'Удаление своих задач',
        'description' => null,
        'category' => 'tasks'
    ],
    [
        'id' => 4,
        'tech_name' => 'assign_to_own_task',
        'name' => 'Назначение на свои задачи',
        'description' => null,
        'category' => 'tasks'
    ],
    [
        'id' => 5,
        'tech_name' => 'attach_media_to_own_task',
        'name' => 'Прикрепление медиа на свои задачи',
        'description' => null,
        'category' => 'tasks'
    ],
    [
        'id' => 6,
        'tech_name' => 'change_own_task_status',
        'name' => 'Изменение статуса своих задач',
        'description' => null,
        'category' => 'tasks'
    ],


    // --------------------------------------------
    // Разрешение на управление задачами на которые назначен

    [
        'id' => 7,
        'tech_name' => 'edit_task',
        'name' => 'Редактирование задач',
        'description' => null,
        'category' => 'tasks'
    ],
    [
        'id' => 8,
        'tech_name' => 'remove_task',
        'name' => 'Удаление задач',
        'description' => null,
        'category' => 'tasks'
    ],
    [
        'id' => 9,
        'tech_name' => 'assign_to_task',
        'name' => 'Назначение на задачи',
        'description' => null,
        'category' => 'tasks'
    ],
    [
        'id' => 10,
        'tech_name' => 'attach_media_to_task',
        'name' => 'Прикрепление медиа на задачи',
        'description' => null,
        'category' => 'tasks'
    ],
    [
        'id' => 11,
        'tech_name' => 'change_task_status',
        'name' => 'Изменение статуса задач',
        'description' => null,
        'category' => 'tasks'
    ],

    // -------------------------
    // Разрешение на управление сторонними задачами (Админская привелегии по задачам в рамках проекта)

    [
        'id' => 12,
        'tech_name' => 'edit_external_task',
        'name' => 'Редактирование сторонних задач',
        'description' => null,
        'category' => 'tasks'
    ],
    [
        'id' => 13,
        'tech_name' => 'remove_external_task',
        'name' => 'Удаление сторонних задач',
        'description' => null,
        'category' => 'tasks'
    ],
    [
        'id' => 14,
        'tech_name' => 'assign_to_external_task',
        'name' => 'Назначение на сторонние задачи',
        'description' => null,
        'category' => 'tasks'
    ],
    [
        'id' => 15,
        'tech_name' => 'attach_media_to_external_task',
        'name' => 'Прикрепление медиа на сторонние задачи',
        'description' => null,
        'category' => 'tasks'
    ],
    [
        'id' => 16,
        'tech_name' => 'change_external_task_status',
        'name' => 'Изменение статуса сторонних задач',
        'description' => null,
        'category' => 'tasks'
    ],
    [
        'id' => 17,
        'tech_name' => 'view_external_task',
        'name' => 'Просмотр сторонних задач',
        'description' => null,
        'category' => 'tasks'
    ],

    // --------------------------------------
    // Другие'

    [
        'id' => 18,
        'tech_name' => 'view_task',
        'name' => 'Просмотр задач',
        'description' => null,
        'category' => 'tasks'
    ],

];
