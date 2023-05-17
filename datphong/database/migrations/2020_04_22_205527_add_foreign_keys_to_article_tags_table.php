<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToArticleTagsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('article_tags', function(Blueprint $table)
		{
			$table->foreign('article_id', 'article_tags_ibfk_1')->references('id')->on('article')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('tags_id', 'article_tags_ibfk_2')->references('id')->on('tags')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('article_tags', function(Blueprint $table)
		{
			$table->dropForeign('article_tags_ibfk_1');
			$table->dropForeign('article_tags_ibfk_2');
		});
	}

}
