<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/product'],

function () {
		Route::get('/index', [App\Http\Controllers\Product\ProductController::class , 'index'])->name('product_index');

		Route::get('/editor', [App\Http\Controllers\Product\ProductController::class , 'editor'])->name('product_editor');

		Route::post('/post', [App\Http\Controllers\Product\ProductController::class , 'save'])->name('product_post');

		Route::post('/delete', [App\Http\Controllers\Product\ProductController::class , 'delete'])->name('product_delete');
	});