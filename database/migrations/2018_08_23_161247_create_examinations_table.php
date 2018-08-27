<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
          $table->increments('id');
          $table->tinyInteger('sequence')->unsigned(); //UNSIGNED TINYINTEGER: 1 A 255
          $table->integer('unity_id')->unsigned()->unique();
          $table->foreign('unity_id')->references('id')->on('unities');
          $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examinations');
    }
}
