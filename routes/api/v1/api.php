<?php

use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;


Route::prefix('users')->controller(UserController::class)->group(function () {
    require __DIR__ . '/users/users.php';
});
