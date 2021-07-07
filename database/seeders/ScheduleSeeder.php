<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('schedule')->insert([
				'subject_name' => 'Java I',
				'teacher_name' => 'TRAN VAN DIEP',
				'frametime'    => 0,
				'starttime'    => 13.5,
				'endtime'      => 17.5,
				'begin_date'   => '2021-06-20',
				'end_date'     => '2021-07-26',
				'note'         => 'TEST'
			]);

		DB::table('schedule')->insert([
				'subject_name' => 'PHP/Laravel',
				'teacher_name' => 'TRAN VAN DIEP',
				'frametime'    => 0,
				'starttime'    => 8,
				'endtime'      => 12,
				'begin_date'   => '2021-06-22',
				'end_date'     => '2021-07-16',
				'note'         => 'TEST'
			]);
	}
}
