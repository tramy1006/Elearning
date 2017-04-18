<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlideTable extends Migration
{

    public function up()
    {
        Schema::create('slide', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('hinh');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('slide');
    }
}
