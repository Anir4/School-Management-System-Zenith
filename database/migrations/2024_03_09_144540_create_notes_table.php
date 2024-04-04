<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->increments('ID_Notes');
            $table->unsignedInteger('ID_Etudiant');
            $table->unsignedInteger('ID_Matiere');
            $table->integer('note1');
            $table->integer('note2');
            $table->integer('devoir');
            $table->string('mention', 20);
            $table->timestamps();
        });

        Schema::table('notes', function (Blueprint $table) {
            $table->foreign('ID_Etudiant')->references('ID_Etudiant')->on('etudiant')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ID_Matiere')->references('ID_Matiere')->on('matiere')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('notes');
    }
}

