<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCateConvenienceTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cate_convenience_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cate_convenience_model_id');
            $table->string('locale');
            $table->foreign('cate_convenience_model_id')->references('id')->on('cate_convenience')->onUpdate('cascade')->onDelete('cascade');
            $table->string('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cate_convenience_translations');
    }
}
