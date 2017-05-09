<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserActionsTable extends Migration
{
  
    public function up()
    {
        Schema::create('user_actions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('action');
            $table->string('action_model');
            $table->integer('action_id');
            $table->timestamps();
            
        });
    }

  
    public function down()
    {
        Schema::drop('user_actions');
    }
}
