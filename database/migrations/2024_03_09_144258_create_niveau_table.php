<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNiveauTable extends Migration
{
    public function up()
    {
        Schema::create('niveau', function (Blueprint $table) {
            $table->increments('ID_Niveau');
            $table->string('nom', 30);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('niveau');
    }
};