<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
   
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lesson_id')->unsigned();
            $table->foreign('lesson_id')->references('id')->on('lessons')->onDelete('cascade');
            $table->text('question_text');
            $table->text('answer_explanation');
            $table->string('more_info_link');
            $table->timestamps();
          
        });
    }

    public function down()
    {
        Schema::drop('questions');
    }
}
