<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRessourcesTable extends Migration
{
    public function up()
    {
        Schema::create('ressources', function (Blueprint $table) {
            $table->increments('ID_Ressources');
            $table->string('titre', 30);
            $table->string('description', 100);
            $table->string('URL', 50);
            $table->string('type', 50);
            $table->unsignedInteger('ID_Class');
            $table->unsignedInteger('ID_Matiere');
            $table->date('date')->nullable();
            $table->timestamps();
        });

        Schema::table('ressources', function (Blueprint $table) {
            $table->foreign('ID_Class')->references('ID_Class')->on('class')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('ressources', function (Blueprint $table) {
            $table->foreign('ID_Matiere')->references('ID_Matiere')->on('matiere')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ressources');
    }
}
