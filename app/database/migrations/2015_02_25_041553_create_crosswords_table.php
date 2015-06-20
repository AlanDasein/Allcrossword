<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCrosswordsTable extends Migration {

	public function up()
	{
		Schema::create('crosswords', function(Blueprint $table)
		{
			
			$table->increments('id');
			$table->string('token', 100)->unique();
			$table->integer('nick_id')->index();
			$table->string('language', 20)->index();
			$table->float('complexity')->index();
			$table->string('notes', 255)->nullable();
			$table->mediumText('scheme');
			$table->mediumText('layout');
			$table->tinyInteger('reported')->index();
			$table->date('published_at')->index();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->index();
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'))->index();
			
		});
		
	}

	public function down()
	{
		Schema::drop('crosswords');
	}

}