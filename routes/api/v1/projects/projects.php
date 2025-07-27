<?php

use Illuminate\Support\Facades\Route;

Route::middleware('can:get,project')->group(function () {

    Route::get('{project}', 'getOne')->name('projects.get_one')
        ->where('project', '[0-9]+');
});

Route::get('', 'get')->name('projects.get');
Route::post('', 'create')->name('projects.create');


