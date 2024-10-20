<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCartsTable extends Migration {

	public function up()
	{
		Schema::create('carts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
            $table->decimal('price', 8, 2);
            $table->decimal('total_price', 8, 2);
			$table->integer('quantity');
			$table->integer('client_id')->unsigned();
			$table->integer('product_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('carts');
	}
}
