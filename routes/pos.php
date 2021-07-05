<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/pos'],

function () {
		Route::get('/index', [App\Http\Controllers\Pos\PosController::class , 'index'])->name('pos_index');
		Route::post('/save', [App\Http\Controllers\Pos\PosController::class , 'save'])->name('pos_save');
	});