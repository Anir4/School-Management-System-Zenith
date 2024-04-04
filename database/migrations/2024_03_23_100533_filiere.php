<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('filiere', function (Blueprint $table) {
        $table->increments('ID_Filiere');
        $table->string('nom', 20);
        $table->integer('ID_Niveau')->unsigned();;
        $table->integer('ID_Class')->unsigned();;
        $table->timestamps();
    });
    Schema::table('filiere', function (Blueprint $table) {
        $table->foreign('ID_Niveau')->references('ID_Niveau')->on('niveau')->onDelete('cascade')->onUpdate('cascade');
    });
    Schema::table('filiere', function (Blueprint $table) {
        $table->foreign('ID_Class')->references('ID_Class')->on('class')->onDelete('cascade')->onUpdate('cascade');
    });
}

    public function down()
    {
        Schema::dropIfExists('filiere');
    }
};
