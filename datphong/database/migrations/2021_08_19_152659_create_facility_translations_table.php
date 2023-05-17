<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacilityTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facility_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('facility_model_id');
            $table->string('locale');
            $table->foreign('facility_model_id')->references('id')->on('facilities')->onDelete('cascade');
            $table->string('name');
            $table->string('head_title')->nullable();
            $table->text('head_description')->nullable();
            $table->string('main_title')->nullable();
            $table->text('main_description')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('facility_translations');
    }
}
