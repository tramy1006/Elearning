<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonsTable extends Migration
{

    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->longText('tomtat');
            $table->mediumText('noidung');
            $table->string('hinh');
            $table->string('media');
            $table->string('audio');
            $table->integer('luotxem')->default('0');
            $table->integer('level');
            $table->integer('total_question');
            $table->integer('cate_id')->unsigned();
            $table->foreign('cate_id')->references('id')->on('categories')->onDelete('cascade');
            $table->timestamps();

            
        });
    }
 
    public function down()
    {
        Schema::drop('lessons');
    }
}
