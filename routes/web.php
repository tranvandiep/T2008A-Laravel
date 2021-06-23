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
|
 */

Route::get('/',

function () {
		return view('welcome');
	});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class , 'index'])->name('home');

Route::get('/hello-1.html', function () {
		return '<h1 style="text-align: center;">Hello World!!!</h1>';
	});

Route::get('/hello-2.html', function () {
		return view('lesson01/hello2');
	});

Route::get('/test.aspx', function () {
		return view('lesson01/hello2');
	});

Route::get('/x/{x}/y/{y}', function ($x, $y) {
		$s = $x+$y;
		return $s;
	});

Route::get('/gia-tri-x/{x}/gia-tri-y/{y}', function ($x, $y) {
		$s = $x+$y;
		return $s;
	});

Route::get('/hello-3.html', [App\Http\Controllers\Lesson01\TestController::class , "showHello3"]);

Route::get('/hello-4.html', [App\Http\Controllers\Lesson01\TestController::class , "showHello4"]);

Route::get('/{hrefParam}.html', function ($hrefParam) {
		return $hrefParam;
	});
