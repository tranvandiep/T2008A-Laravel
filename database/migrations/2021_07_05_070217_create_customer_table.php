<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('customer', function (Blueprint $table) {
				$table->id();
				$table->string('fullname', 60);
				$table->string('phone_number', 20);
				$table->string('email', 150);
				$table->string('address', 200);
				$table->date('birthday');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('customer');
	}
}
