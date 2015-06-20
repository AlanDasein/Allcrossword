<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistoryTable extends Migration {

	public function up()
	{
		Schema::create('history', function(Blueprint $table)
		{
			
			$table->increments('id');
			$table->integer('nick_id')->index();
			$table->integer('crossword_id')->unique();
			$table->string('language', 20)->index();
			$table->boolean('reported')->index();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->index();
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			
		});
		
	}

	public function down()
	{
		Schema::drop('history');
	}

}