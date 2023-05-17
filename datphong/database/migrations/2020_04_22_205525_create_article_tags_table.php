<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticleTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('article_tags', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('article_id')->unsigned()->nullable()->index('article_id');
			$table->integer('tags_id')->unsigned()->nullable()->index('tags_id');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('article_tags');
	}

}
