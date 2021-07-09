<?php

namespace App\Http\Controllers\Pos;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use DB;
use Illuminate\Http\Request;

class PosController extends Controller {
	public function __construct() {
		$this->middleware('auth');
		$this->middleware('permission');
	}

	public function index(Request $request) {
		$dataList = DB::table('product')
			->leftJoin('category', 'category.id', '=', 'product.category_id')
			->select('product.*', 'category.name as category_name');
		if (isset($request->s)) {
			$dataList = $dataList->where('product.title', 'like', '%'.$request->s.'%');
		}
		$dataList = $dataList->paginate(12);

		return view('pos.index')->with([
				'dataList' => $dataList
			]);
	}

	public function save(Request $request) {
		$json     = $request->data;
		$cartList = json_decode($json, true);

		$customerId = 1;

		$orders = Orders::create([
				'customer_id' => $customerId,
				'total_money' => $request->total_money,
				'order_date'  => date('Y-m-d H:i:s')
			]);

		foreach ($cartList as $item) {
			DB::table('order_detail')->insert([
					'order_id'    => $orders->id,
					'product_id'  => $item['id'],
					'price'       => $item['price'],
					'amount'      => $item['num'],
					'total_money' => $item['price']*$item['num'],
					'created_at'  => date('Y-m-d H:i:s'),
					'updated_at'  => date('Y-m-d H:i:s')
				]);
		}

		echo "success";
	}
}
