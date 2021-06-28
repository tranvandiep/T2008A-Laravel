<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class ProductController extends Controller {
	public function index(Request $request) {
		$category_id = $request->category_id;
		$s           = $request->s;

		// $productList = DB::table('product')
		// 	->paginate(10);
		//select product.*, category.name as category_name from product left join category on category.id = product.category_id where product.category_id = $category_id and product.title like '%$s%' limit 0, 10
		$productList = DB::table('product')
			->leftJoin('category', 'category.id', '=', 'product.category_id')
			->select('product.*', 'category.name as category_name');

		if (isset($category_id) && $category_id > 0) {
			$productList = $productList->where('product.category_id', '=', $category_id);
		}
		if (isset($s)) {
			$productList = $productList->where('product.title', 'like', '%'.$s.'%');
		}
		$productList = $productList->paginate(10);

		$categoryList = DB::table('category')
			->get();

		return view('product.index')->with([
				'productList'  => $productList,
				'title'        => 'Product List Management',
				'count'        => 0,
				'categoryList' => $categoryList,
				'category_id'  => $category_id
			]);
	}

	public function editor(Request $request) {

	}

	public function post(Request $request) {

	}

	public function delete(Request $request) {
		$id = $request->id;
		if (isset($id)) {
			DB::table('product')
				->where('id', '=', $id)
				->delete();
		}
	}
}
