<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
  
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->text('result');
            $table->integer('lesson_id')->unsigned();
            $table->timestamps();
            
        });
    }

  
    public function down()
    {
        Schema::drop('tests');
    }
}
