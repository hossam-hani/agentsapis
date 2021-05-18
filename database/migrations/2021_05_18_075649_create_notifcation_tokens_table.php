<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNotifcationTokensTable extends Migration {

	public function up()
	{
		Schema::create('notifcation_tokens', function(Blueprint $table) {
			$table->increments('id');
			$table->longText('token');
			$table->timestamps();
			$table->bigInteger('user_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('notifcation_tokens');
	}
}