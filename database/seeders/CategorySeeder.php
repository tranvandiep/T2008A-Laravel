<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('category')->insert([
				'name' => 'Bep Tu 1'
			]);
		DB::table('category')->insert([
				'name' => 'Bep Dien Tu 1'
			]);
	}
}
