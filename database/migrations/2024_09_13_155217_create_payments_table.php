<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePaymentsTable extends Migration {

	public function up()
	{
		Schema::create('payments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('order_id');
			$table->enum('payment_method', array('cash', 'visa'));
			$table->enum('payment_status', array('paid', 'failed'));
			$table->decimal('amount');
		});
	}

	public function down()
	{
		Schema::drop('payments');
	}
}