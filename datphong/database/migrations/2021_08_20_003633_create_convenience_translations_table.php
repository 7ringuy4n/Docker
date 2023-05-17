<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConvenienceTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('convenience_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('convenience_model_id');
            $table->string('locale');
            $table->foreign('convenience_model_id')->references('id')->on('convenience')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('convenience_translations');
    }
}
