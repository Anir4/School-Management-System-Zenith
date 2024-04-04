<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('class_subject_timetable', function (Blueprint $table) {
            $table->increments('id');
            
            $table->unsignedInteger('ID_Class');
            $table->unsignedInteger('ID_Matiere');
            $table->unsignedInteger('week_id');
            $table->string('debut',25);
            $table->string('fin',25);
            $table->string('room_num',255);
            $table->timestamps();
        });
      

    }

    public function down()
    {
        Schema::dropIfExists('class_subject_timetab');
    }
};
