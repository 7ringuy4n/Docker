<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBenefitTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('benefit', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('thumb')->nullable();
            $table->string('status')->default('inactive');
            $table->integer('sort')->default(1);
            $table->dateTime('created')->nullable();
            $table->string('created_by')->nullable();
            $table->dateTime('modified')->nullable();
            $table->string('modified_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('benefit');
    }
}
