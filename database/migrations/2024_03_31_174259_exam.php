<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('exam', function (Blueprint $table) {
            $table->increments('ID_Exam');
            $table->string('nom', 200);
            $table->unsignedInteger('ID_Class');
            $table->unsignedInteger('ID_Matiere');
            $table->date('date');
            $table->timestamps();
        });
        Schema::table('exam', function (Blueprint $table) {
            $table->foreign('ID_Class')->references('ID_Class')->on('class')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('exam', function (Blueprint $table) {
            $table->foreign('ID_Matiere')->references('ID_Matiere')->on('matiere')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('exam');
    }
};
