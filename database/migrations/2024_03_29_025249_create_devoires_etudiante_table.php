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
        Schema::create('devoires_etudiante', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ID_Etudiant');
            $table->unsignedInteger('ID_Ressources');
            $table->string('titre',200);
            $table->enum('status', ['confirmed', 'not_confirmed'])->default('not_confirmed');
            $table->string('pdf_url')->nullable(); // Add the PDF URL column
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('ID_Etudiant')->references('ID_Etudiant')->on('etudiant')->onDelete('cascade');
            $table->foreign('ID_Ressources')->references('ID_Ressources')->on('ressources')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devoires_etudiante');
    }
};
