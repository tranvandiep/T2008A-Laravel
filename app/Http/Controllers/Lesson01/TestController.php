<?php

namespace App\Http\Controllers\Lesson01;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestController extends Controller {
	public function showHello3(Request $request) {
		return '<h1 style="text-align: center;">Hello World 3!!!</h1>';
	}

	public function showHello4(Request $request) {
		return view('lesson01.hello2');
	}
}
