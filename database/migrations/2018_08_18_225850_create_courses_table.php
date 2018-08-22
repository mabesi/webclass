<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title',60);
          $table->integer('category_id')->unsigned();
          $table->foreign('category_id')->references('id')->on('categories');
          $table->string('keywords',60);
          $table->integer('instructor_id')->unsigned();
          $table->foreign('instructor_id')->references('id')->on('instructors');
          $table->string('status',1)->default('N');;
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
        Schema::dropIfExists('courses');
    }
}
