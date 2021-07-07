<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('student', function (Blueprint $table) {
				$table->id();
				$table->string('rollno', 20);
				$table->string('fullname', 50);
				$table->string('email', 150);
				$table->string('address', 200);
				$table->date('birthday');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('student');
	}
}
