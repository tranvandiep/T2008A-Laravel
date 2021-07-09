<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class ScheduleController extends Controller {
	public function __construct() {
		$this->middleware('auth');
		$this->middleware('permission');
	}

	public function index(Request $request) {
		$today = date('Y-m-d');

		$scheduleList = DB::table('schedule')
			->where('begin_date', '<=', $today)
			->where('end_date', '>=', $today)
			->get();

		$mydate = new \DateTime();
		$mydate->modify('+7 hours');

		$frametimeToday = $mydate->format('N');
		switch ($frametimeToday) {
			case 1:
			case 3:
			case 5:
				$frametimeToday = 0;
				break;
			case 2:
			case 4:
			case 6:
				$frametimeToday = 1;
				break;
			default:
				$frametimeToday = 2;
				break;
		}
		$currentTime = $mydate->format('H')+$mydate->format('i')/60;

		// echo $frametimeToday.'-'.$currentTime;

		return view('schedule.index')->with([
				'scheduleList'   => $scheduleList,
				'index'          => 0,
				'frametimeToday' => $frametimeToday,
				'currentTime'    => $currentTime
			]);
	}
}
