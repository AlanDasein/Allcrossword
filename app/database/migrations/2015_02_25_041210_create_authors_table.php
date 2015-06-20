<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthorsTable extends Migration {

	public function up()
	{
		Schema::create('authors', function(Blueprint $table)
		{
			
			$table->increments('id');
			$table->string('contact', 50)->unique()->index();
			$table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->index();
			$table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP'));
			
		});
		
	}

	public function down()
	{
		Schema::drop('authors');
	}

}