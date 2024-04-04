<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEtudiantTable extends Migration
{
    public function up()
{
    Schema::create('etudiant', function (Blueprint $table) {
        $table->increments('ID_Etudiant');
        $table->string('nom', 20);
        $table->string('prenom', 20);
        $table->date('date_naissance');
        $table->string('email', 30)->unique();
        $table->string('tele', 20);
        $table->integer('ID_Niveau')->unsigned();;
        $table->integer('ID_Class')->unsigned();;
        $table->string('filiere', 30);
        $table->date('date_inscription');
        $table->string('password', 255);
        $table->timestamps();
    });
    Schema::table('etudiant', function (Blueprint $table) {
        $table->foreign('ID_Niveau')->references('ID_Niveau')->on('niveau')->onDelete('cascade')->onUpdate('cascade');
    });
    Schema::table('etudiant', function (Blueprint $table) {
        $table->foreign('ID_Class')->references('ID_Class')->on('class')->onDelete('cascade')->onUpdate('cascade');
    });
}

    public function down()
    {
        Schema::dropIfExists('etudiants');
    }
}

