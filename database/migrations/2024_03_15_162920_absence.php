<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{public function up(): void
    {
        Schema::create('absences', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ID_Etudiant');
            $table->unsignedInteger('ID_Matiere');
            $table->boolean('present');
            $table->dateTime('date');
            $table->timestamps();

            $table->foreign('ID_Etudiant')->references('ID_Etudiant')->on('etudiant')->onDelete('cascade');
            $table->foreign('ID_Matiere')->references('ID_Matiere')->on('matiere')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absences');
    }
    
};
