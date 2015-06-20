<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration {

	public function up()
	{
		Schema::create('reports', function(Blueprint $table)
		{
			
			$table->increments('id');
			$table->integer('nick_id')->index();
			$table->integer('crossword_id')->index();
			$table->string('complaint', 255);
			$table->string('status', 50)->index();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->index();
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			
		});
		
	}

	public function down()
	{
		Schema::drop('reports');
	}

}