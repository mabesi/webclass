<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('statement');
            $table->text('answer1');
            $table->text('answer2');
            $table->text('answer3');
            $table->text('answer4');
            $table->tinyInteger('right_answer')->unsigned(); //UNSIGNED TINYINTEGER: 1 A 255
            $table->integer('examination_id')->unsigned();
            $table->foreign('examination_id')->references('id')->on('examinations');
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
        Schema::dropIfExists('questions');
    }
}
