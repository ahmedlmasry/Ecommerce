<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCommentsTable extends Migration {

	public function up()
	{
		Schema::create('comments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('body');
			$table->integer('client_id')->unsigned();
			$table->integer('post_id')->unsigned();
			$table->enum('rating', array(''));
		});
	}

	public function down()
	{
		Schema::drop('comments');
	}
}