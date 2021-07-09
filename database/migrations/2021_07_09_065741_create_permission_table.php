<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('permission', function (Blueprint $table) {
				$table->unsignedBigInteger('role_id');
				$table->foreign('role_id')->references('id')->on('roles');

				$table->unsignedBigInteger('route_id');
				$table->foreign('route_id')->references('id')->on('routes');

				$table->primary(['role_id', 'route_id']);

				$table->integer('status');
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('permission');
	}
}
