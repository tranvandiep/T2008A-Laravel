<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/schedule'],

function () {
		Route::get('/index', [App\Http\Controllers\Schedule\ScheduleController::class , 'index'])->name('schedule_index');
	});