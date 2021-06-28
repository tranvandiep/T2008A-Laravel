<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		for ($i = 0; $i < 36; $i++) {
			DB::table('product')->insert([
					'title'       => 'Tieu De '.$i,
					'thumbnail'   => 'https://res.cloudinary.com/ziczacgroup/image/upload/v1583834689/vf4gyxt7gmthx4eykvlp.jpg',
					'content'     => 'Noi dung '.$i,
					'price'       => 12*$i,
					'category_id' => 1,
					'created_at'  => date('Y-m-d H:i:s'),
					'updated_at'  => date('Y-m-d H:i:s')
				]);
		}
	}
}
