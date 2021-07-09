<?php

namespace App\Http\Controllers\Schedule;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;

class AttendenceController extends Controller {
	public function __construct() {
		$this->middleware('auth');
		$this->middleware('permission');
	}

	public function index(Request $request) {
		$schedule_id = $request->schedule_id;

		$today = date('Y-m-d');

		$mydate = new \DateTime();
		$mydate->modify('+1 day');
		$tomorrow = $mydate->format('Y-m-d');

		$studentList    = DB::table('student')->get();
		$attendenceList = DB::table('student')
			->leftJoin('attendence', 'attendence.student_id', '=', 'student.id')
			->select('student.*', 'attendence.status', 'attendence.note')
			->where('attendence.schedule_id', $schedule_id)
			->where('created_at', '>=', $today)
			->where('created_at', '<=', $tomorrow)
			->get();

		$list = [];
		foreach ($studentList as $item) {
			$status = 1;
			$note   = '';
			foreach ($attendenceList as $att) {
				if ($att->id == $item->id) {
					$status = $att->status;
					$note   = $att->note;
					break;
				}
			}
			$list[] = [
				'id'       => $item->id,
				'rollno'   => $item->rollno,
				'fullname' => $item->fullname,
				'status'   => $status,
				'note'     => $note
			];
		}

		return view('schedule.attendence')->with([
				'studentList' => $list,
				'index'       => 0,
				'schedule_id' => $schedule_id
			]);
	}

	public function save(Request $request) {
		$studentList = DB::table('student')->get();
		$schedule_id = $request->schedule_id;
		$created_at  = $updated_at  = date('Y-m-d H:i:s');

		$today = date('Y-m-d');

		$mydate = new \DateTime();
		$mydate->modify('+1 day');
		$tomorrow = $mydate->format('Y-m-d');

		$attendenceList = DB::table('student')
			->leftJoin('attendence', 'attendence.student_id', '=', 'student.id')
			->select('student.*', 'attendence.id as att_id', 'attendence.status', 'attendence.note')
			->where('attendence.schedule_id', $schedule_id)
			->where('created_at', '>=', $today)
			->where('created_at', '<=', $tomorrow)
			->get();

		foreach ($studentList as $item) {
			$status = 0;
			$note   = '';
			if (isset($_POST['att_'.$item->id])) {
				$status = $_POST['att_'.$item->id];
			}
			if (isset($_POST['note_'.$item->id])) {
				$note = $_POST['note_'.$item->id];
			}

			$att_id = 0;
			foreach ($attendenceList as $att) {
				if ($att->id == $item->id) {
					$att_id = $att->att_id;
					break;
				}
			}

			if ($att_id > 0) {
				DB::table('attendence')
					->where('id', $att_id)
					->update([
						'student_id'  => $item->id,
						'schedule_id' => $schedule_id,
						'status'      => $status,
						'note'        => $note,
						'created_at'  => $created_at,
						'updated_at'  => $updated_at
					]);
			} else {
				DB::table('attendence')->insert([
						'student_id'  => $item->id,
						'schedule_id' => $schedule_id,
						'status'      => $status,
						'note'        => $note,
						'created_at'  => $created_at,
						'updated_at'  => $updated_at
					]);
			}
		}

		return redirect()->route('schedule_index');
	}
}
