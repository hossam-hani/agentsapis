<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotificationTable extends Migration {

	public function up()
	{
		Schema::create('notification', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->longText('content');
			$table->timestamps();
			$table->bigInteger('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('notification');
	}
}