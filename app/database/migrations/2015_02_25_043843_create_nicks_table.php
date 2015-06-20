<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNicksTable extends Migration {

	public function up()
	{
		Schema::create('nicks', function(Blueprint $table)
		{
			
			$table->increments('id');
			$table->integer('author_id')->index();
			$table->string('label', 20)->unique();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->index();
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			
		});
		
	}

	public function down()
	{
		Schema::drop('nicks');
	}

}