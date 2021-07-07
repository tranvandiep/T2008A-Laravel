<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttendenceTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('attendence', function (Blueprint $table) {
				$table->id();
				$table->unsignedBigInteger('schedule_id');
				$table->foreign('schedule_id')->references('id')->on('schedule');
				$table->unsignedBigInteger('student_id');
				$table->foreign('student_id')->references('id')->on('student');
				$table->unsignedInteger('status');
				$table->string('note', 500);
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('attendence');
	}
}
