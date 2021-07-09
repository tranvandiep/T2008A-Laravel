<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/permission'],

function () {
		Route::get('/role', [App\Http\Controllers\Permission\PermissionController::class , 'viewRoles'])->name('permission_role');

		Route::get('/setting', [App\Http\Controllers\Permission\PermissionController::class , 'viewSetting'])->name('permission_setting');

		Route::post('/save', [App\Http\Controllers\Permission\PermissionController::class , 'save'])->name('permission_save');

		Route::get('/test', [App\Http\Controllers\Permission\PermissionController::class , 'test'])->name('permission_test');
	});