<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/category'],

function () {
		Route::get('/index', [App\Http\Controllers\Api\ApiCategoryController::class , 'index']);

		Route::post('/store', [App\Http\Controllers\Api\ApiCategoryController::class , 'store']);

		Route::post('/remove/{id}', [App\Http\Controllers\Api\ApiCategoryController::class , 'destroy']);
	});