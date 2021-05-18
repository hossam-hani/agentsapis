<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->longText('content');
			$table->enum('type', array('article', 'image', 'video'));
			$table->string('section');
			$table->timestamps();
			$table->bigInteger('user_id')->unsigned();
			$table->softDeletes();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}