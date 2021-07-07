<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		for ($i = 0; $i < 10; $i++) {
			DB::table('student')->insert([
					'rollno'   => 'R'.$i,
					'fullname' => 'Sinh Vien '.$i,
					'email'    => 'sv'.$i.'@gmail.com',
					'address'  => 'Ha Noi',
					'birthday' => '1999-02-06'
				]);
		}
	}
}
