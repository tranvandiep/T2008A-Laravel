<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('product', function (Blueprint $table) {
				$table->id();
				$table->string('title', 250);
				$table->string('thumbnail', 500);
				$table->longText('content');
				$table->float('price');
				$table->unsignedBigInteger('category_id');
				$table->timestamps();
			});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists('product');
	}
}
