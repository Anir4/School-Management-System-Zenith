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
        Schema::create('frais', function (Blueprint $table) {
            $table->increments('ID_Frais');
            $table->integer('ID_Etudiant')->unsigned();
            $table->integer('montant');
            $table->integer('payement');
            $table->integer('reste');
            $table->timestamps();
        });
    
    Schema::table('frais', function (Blueprint $table) {
        $table->foreign('ID_Etudiant')->references('ID_Etudiant')->on('etudiant')->onDelete('cascade')->onUpdate('cascade');
    });
}
    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('frais');
    }

    
};
