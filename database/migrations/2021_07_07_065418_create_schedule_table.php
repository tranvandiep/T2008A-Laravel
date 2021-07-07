<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScheduleTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('schedule', function (Blueprint $table) {
				$table->id();
				$table->string('subject_name', 200);
				$table->string('teacher_name', 50);
				// frametime: 0 -> 2, 4, 6 & 1 -> 3, 5, 7
				$table->unsignedInteger('frametime');
				// 8, 8.5, 10, 10.5, ...
				$table->unsignedFloat('starttime');
				$table->unsignedFloat('endtime');
				$table->date('begin_date');
				$table->date('end_date');
				$table->string('note', 500);
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('schedule');
	}
}
