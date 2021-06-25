<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class LibraryController extends Controller {
	public function index(Request $request) {
		$title = 'Danh sach quan sach trong thu vien';
		//Fake mang du lieu quan sach
		// $bookList = [];
		// for ($i = 0; $i < 10; $i++) {
		// 	$bookList[] = [
		// 		'title'     => "Quan sach ".$i,
		// 		'thumbnail' => 'https://cdn0.fahasa.com/media/catalog/product/cache/1/image/9df78eab33525d08d6e5fb8d27136e95/q/u/quangganhlodi-biacung1.jpg',
		// 		'price'     => '50.000'
		// 	];
		// }
		$bookList = DB::table('product')->get();

		return view('library.index')->with([
				'title'    => $title,
				'bookList' => $bookList
			]);
	}

	public function input(Request $request) {
		$title = 'Nhap thong tin quan sach moi';

		return view('library.input')->with([
				'title' => $title
			]);
	}

	public function save(Request $request) {
		// var_dump($request->all());
		$title     = $request->title;
		$price     = $request->price;
		$thumbnail = $request->thumbnail;

		// echo $title;

		//save database & xu ly business logic
		DB::table('product')->insert([
				'title'       => $title,
				'thumbnail'   => $thumbnail,
				'content'     => '',
				'category_id' => 1,
				'price'       => $price,
				'created_at'  => date('Y-m-d H:i:s'),
				'updated_at'  => date('Y-m-d H:i:s')
			]);

		return redirect()->route('library_index');
	}
}
