<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateKeyPersonsTable extends Migration {

	public function up()
	{
		Schema::create('key_persons', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->longText('address');
			$table->string('phone_number');
			$table->longText('notes');
			$table->timestamps();
			$table->float('reate');
			$table->float('negotiations');
			$table->float('connections');
		});
	}

	public function down()
	{
		Schema::drop('key_persons');
	}
}