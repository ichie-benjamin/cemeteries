<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CementeriesController;
use App\Http\Controllers\Admin\MemorialsController;

Route::group(['middleware' => ['auth','role:admin|super_admin'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/my/photos', [AdminController::class, 'photos'])->name('photos');

    Route::resources([
        'cemeteries' => CementeriesController::class,
        'memorials' => MemorialsController::class,
    ]);
});
