<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

	public function up()
	{
		Schema::create('products', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->decimal('price');
			$table->text('image');
			$table->text('description');
			$table->integer('category_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('products');
	}
}