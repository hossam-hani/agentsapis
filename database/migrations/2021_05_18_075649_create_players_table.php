<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePlayersTable extends Migration {

	public function up()
	{
		Schema::create('players', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 255);
			$table->longText('address');
			$table->string('phone_number');
			$table->timestamps();
			$table->softDeletes();
			$table->longText('image');
			$table->longText('notes');
			$table->enum('position', array('Rightdefender', 'Leftdefender', 'Centraldefender', 'Defensivemidfielder', 'Centralmidfielder', 'Leftmidfielder', 'Rightmidfielder', 'Forward', 'GoalKeepers'));
			$table->date('birth_date');
			$table->string('nationality');
			$table->longText('mbti_mini_link');
			$table->longText('mbti_full_link');
			$table->longText('dna_mini_link');
			$table->string('dna_full_link');
			$table->enum('tag', array('Freeplayers', 'Problems', 'currentplayers', 'currentplayer/problem', 'free/partnership', 'otheragence', 'otheragence/partnership'));
			$table->bigInteger('team_id')->unsigned()->nullable();
			$table->bigInteger('key_person_id')->unsigned()->nullable();
			$table->bigInteger('agent_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('players');
	}
}