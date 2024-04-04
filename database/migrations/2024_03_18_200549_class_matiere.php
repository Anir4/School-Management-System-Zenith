<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up()
    {
        Schema::create('class_matiere', function (Blueprint $table) {
            $table->increments('ID_Class_matiere');
            $table->unsignedInteger('ID_Class');
            $table->unsignedInteger('ID_Matiere');
            $table->integer('status');
            $table->integer('deleted');
            $table->unsignedInteger('created_by');
            $table->timestamps();
        });
        Schema::table('class_matiere', function (Blueprint $table) {
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('class_matiere', function (Blueprint $table) {
            $table->foreign('ID_Class')->references('ID_Class')->on('class')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::table('class_matiere', function (Blueprint $table) {
            $table->foreign('ID_Matiere')->references('ID_Matiere')->on('matiere')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('class_matiere');
    }
};
