<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class RoutesSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		DB::table('routes')->insert([
				'route_name'  => 'pos_index',
				'route_title' => 'POS Bán Hàng'
			]);

		DB::table('routes')->insert([
				'route_name'  => 'pos_save',
				'route_title' => 'Lưu Đơn Hàng Từ POS UI'
			]);

		DB::table('routes')->insert([
				'route_name'  => 'schedule_index',
				'route_title' => 'Quản Lý Lịch Học'
			]);

		DB::table('routes')->insert([
				'route_name'  => 'attendence_index',
				'route_title' => 'View Điểm Danh'
			]);

		DB::table('routes')->insert([
				'route_name'  => 'attendence_save',
				'route_title' => 'Lưu Kết Quả Điểm Danh'
			]);
	}
}
