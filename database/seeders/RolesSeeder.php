<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('roles')->insert([
				'role_name' => 'Admin'
			]);
		DB::table('roles')->insert([
				'role_name' => 'Mod'
			]);
		DB::table('roles')->insert([
				'role_name' => 'User'
			]);
	}
}
