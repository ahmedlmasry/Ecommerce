<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->string('phone');
			$table->string('password');
			$table->string('contact_whats');
			$table->string('image');
			$table->string('pin_code')->nullable();
			$table->string('contact_phone');
			$table->integer('city_id')->unsigned();
			$table->boolean('status');
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}
