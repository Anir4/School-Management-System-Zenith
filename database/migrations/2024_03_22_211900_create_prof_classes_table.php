<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfClassesTable extends Migration
{
    public function up()
    {
        Schema::create('prof_classe', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('prof_id');
            $table->unsignedInteger('classe_id');
            $table->timestamps();

            $table->foreign('prof_id')->references('ID_Prof')->on('prof')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('classe_id')->references('ID_Class')->on('class')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('prof_classe');
    }
}
