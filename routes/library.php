<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| SEO
 */

// Route::get('/library/index', [App\Http\Controllers\Library\LibraryController::

// class , 'index'])->name('library_index');

// Route::get('/library/input', [App\Http\Controllers\Library\LibraryController::class , 'input'])->name('library_input');

// Route::post('/library/save', [App\Http\Controllers\Library\LibraryController::class , 'save'])->name('library_save');

Route::group(['prefix' => '/library'],
function () {
		Route::get('/index', [App\Http\Controllers\Library\LibraryController::class , 'index'])->name('library_index');

		Route::get('/input', [App\Http\Controllers\Library\LibraryController::class , 'input'])->name('library_input');

		Route::post('/save', [App\Http\Controllers\Library\LibraryController::class , 'save'])->name('library_save');
	});