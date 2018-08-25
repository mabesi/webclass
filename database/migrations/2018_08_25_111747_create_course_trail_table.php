<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTrailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_trail', function (Blueprint $table) {
          $table->integer('course_id')->unsigned();
          $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
          $table->integer('trail_id')->unsigned();
          $table->foreign('trail_id')->references('id')->on('trails')->onDelete('cascade');
          $table->tinyInteger('sequence')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_trail');
    }
}
