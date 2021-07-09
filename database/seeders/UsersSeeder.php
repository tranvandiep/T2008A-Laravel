<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('users')
			->where('id', 1)
			->update([
				'role_id' => 3
			]);
	}
}
