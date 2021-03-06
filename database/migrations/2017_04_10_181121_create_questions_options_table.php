<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsOptionsTable extends Migration
{
    
    public function up()
    {
        Schema::create('questions_options', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
            $table->string('option');
            $table->tinyInteger('correct')->default(0);
            $table->timestamps();
           
        });
    }

    public function down()
    {
        Schema::drop('questions_options');
    }
}
