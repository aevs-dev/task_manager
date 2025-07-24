<?php

use Illuminate\Support\Facades\Route;


Route::withoutMiddleware('auth:sanctum')->group(function () {
    Route::post('register', 'register')->name('users.register');
    Route::post('login', 'login')->name('users.login');
    Route::get('/email/verify/{id}/{hash}','verifyEmail')->middleware(['signed'])->name('verification.verify');
    Route::post('/email/check-code','checkAuthEmailCode')->name('users.email_auth_code');
});


Route::get('me', 'me')->name('users.me');
Route::post('logout', 'logout')->name('users.logout');

