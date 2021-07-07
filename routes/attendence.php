<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/attendence'],

function () {
		Route::get('/index', [App\Http\Controllers\Schedule\AttendenceController::class , 'index'])->name('attendence_index');

		Route::post('/save', [App\Http\Controllers\Schedule\AttendenceController::class , 'save'])->name('attendence_save');
	});