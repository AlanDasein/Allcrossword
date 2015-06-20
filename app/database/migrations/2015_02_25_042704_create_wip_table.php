<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWipTable extends Migration {

	public function up()
	{
		Schema::create('wip', function(Blueprint $table)
		{
			
			$table->increments('id');
			$table->string('token', 100)->unique();
			$table->integer('crossword_id')->index();
			$table->string('contact', 50)->index();
			$table->mediumText('work');
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->index();
			
		});
		
	}

	public function down()
	{
		Schema::drop('wip');
	}

}