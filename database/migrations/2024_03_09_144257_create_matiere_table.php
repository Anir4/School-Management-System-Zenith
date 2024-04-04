<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatiereTable extends Migration
{
    public function up()
    {
        Schema::create('matiere', function (Blueprint $table) {
            $table->increments('ID_Matiere');
            $table->string('nom', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('matiere');
    }
}

