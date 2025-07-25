<?php

use App\Http\Controllers\Api\V1\ProjectController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('users')->controller(UserController::class)->group(function () {
    require __DIR__ . '/users/users.php';
});

Route::prefix('projects')->controller(ProjectController::class)->group(function () {
    require __DIR__ . '/projects/projects.php';
});
