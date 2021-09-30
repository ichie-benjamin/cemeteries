<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\UserController;

Route::group(['middleware' => ['auth','role:admin|super_admin'], 'prefix' => 'admin','as' => 'admin.'], function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/crud/generator', [DashboardController::class, 'crudGUI'])->name('crud.gui');

    Route::resources([
        'settings' => SettingsController::class,
        'users' => UserController::class
    ]);
});
