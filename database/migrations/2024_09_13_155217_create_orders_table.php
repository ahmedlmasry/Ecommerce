<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->enum('payment_method', array(''));
			$table->text('note');
			$table->decimal('total_price');
			$table->text('address');
			$table->integer('client_id')->unsigned();
			$table->decimal('delivery_charge');
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}