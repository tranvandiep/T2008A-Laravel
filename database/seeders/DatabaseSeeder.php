<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
	/**
	 * Seed the application's database.
	 *
	 * @return void
	 */
	public function run() {
		// \App\Models\User::factory(10)->create();
		//insert data category: Bep Tu & Bep Dien Tu
		DB::table('category')->insert([
				'name' => 'Bep Tu'
			]);
		DB::table('category')->insert([
				'name' => 'Bep Dien Tu'
			]);
	}
}
