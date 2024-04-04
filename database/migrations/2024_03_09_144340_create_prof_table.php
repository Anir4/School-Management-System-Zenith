<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfTable extends Migration
{
    public function up()
    {
        Schema::create('prof', function (Blueprint $table) {
            $table->increments('ID_Prof');
            $table->string('nom', 20);
            $table->string('prenom', 20);
            $table->string('tele', 20);
            $table->string('email', 30);
            $table->string('password', 255);
            $table->date('date_inscription');
            $table->string('niveau',30);
            $table->integer('salaire');
            $table->integer('ID_Matiere')->unsigned();
            $table->timestamps();
        });

        Schema::table('prof', function (Blueprint $table) {
            $table->foreign('ID_Matiere')->references('ID_Matiere')->on('matiere')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('prof');
    }
}

