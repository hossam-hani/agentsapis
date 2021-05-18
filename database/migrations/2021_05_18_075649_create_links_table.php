<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLinksTable extends Migration {

	public function up()
	{
		Schema::create('links', function(Blueprint $table) {
			$table->increments('id');
			$table->longText('code');
			$table->timestamps();
			$table->softDeletes();
			$table->bigInteger('post_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('links');
	}
}