<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgentsTable extends Migration {

	public function up()
	{
		Schema::create('agents', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->timestamps();
			$table->softDeletes();
			$table->longText('notes');
			$table->bigInteger('player_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('agents');
	}
}